<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

Route::get('/', function () {
    return view('welcome');
});

Route::view('/articles', 'articles')->name('articles');

Route::post('/bits-chatbot', function (Request $request) {
    $validated = $request->validate([
        'message' => ['required', 'string', 'max:1200'],
        'history' => ['array', 'max:8'],
        'history.*.role' => ['required_with:history', 'in:user,model'],
        'history.*.text' => ['required_with:history', 'string', 'max:1200'],
    ]);

    $apiKey = config('services.gemini.key');
    $model = config('services.gemini.model', 'gemini-3.5-flash');
    $developerReply = implode("\n", [
        'Tech Team ni Pilato created this BITS website as a student academic project for the organization.',
        '',
        'We are BSIT Major in Programming students from SLSU Bontoc Campus. Our 4th year developers are Emil Jon Amora, Ahnjellou Gesulga, and John Mark Yecyec, while our 3rd year developers are Wyndel Medina, Rogelniño Mondido Fe Inal, Jericho Kuizon, and Kevin Lozada.',
    ]);
    $normalizedMessage = Str::lower($validated['message']);

    if (Str::contains($normalizedMessage, ['developer', 'developed', 'creator', 'created', 'made', 'programmer'])) {
        return response()->json([
            'reply' => $developerReply,
        ]);
    }

    $geminiErrorReply = function (int $status, ?string $message = null): string {
        $normalizedMessage = strtolower($message ?? '');

        if ($status === 403) {
            if (str_contains($normalizedMessage, 'disabled') || str_contains($normalizedMessage, 'not been used')) {
                return 'Gemini is connected, but the Gemini API is not enabled for this Google project yet. Open Google AI Studio or Google Cloud Console, enable the Gemini API / Generative Language API for this API key project, then try again.';
            }

            if (str_contains($normalizedMessage, 'api key') || str_contains($normalizedMessage, 'permission')) {
                return 'Gemini rejected this API key. Check that your key is active and restricted only to the Gemini API / Generative Language API.';
            }

            return 'Gemini rejected the request. Please check that the API is enabled and this API key is allowed to use Gemini.';
        }

        if ($status === 404) {
            return 'Gemini could not find the selected model. Check GEMINI_MODEL in your .env file.';
        }

        if ($status === 429) {
            return 'Gemini free-tier quota is currently reached. Please wait a bit, then try again.';
        }

        return 'Gemini could not answer right now. Please check the API key, model name, or free-tier quota.';
    };

    if (blank($apiKey)) {
        return response()->json([
            'reply' => 'Gemini is not connected yet. Add your GEMINI_API_KEY in the .env file, then restart the Laravel server.',
        ], 503);
    }

    $history = collect($validated['history'] ?? [])
        ->take(-8)
        ->map(fn ($item) => [
            'role' => $item['role'],
            'parts' => [
                ['text' => $item['text']],
            ],
        ])
        ->values()
        ->all();

    $contents = [
        ...$history,
        [
            'role' => 'user',
            'parts' => [
                ['text' => $validated['message']],
            ],
        ],
    ];

    try {
        $response = Http::timeout(25)
            ->retry(2, 300, throw: false)
            ->withHeaders([
                'x-goog-api-key' => $apiKey,
                'Content-Type' => 'application/json',
            ])
            ->post("https://generativelanguage.googleapis.com/v1beta/models/{$model}:generateContent", [
                'systemInstruction' => [
                    'parts' => [[
                        'text' => 'You are BITSBot, the official website assistant for Bontoc Information Technology Society, an academic student organization of Southern Leyte State University - Bontoc Campus. Answer only questions related to BITS as a campus academic organization: membership, officers, instructors, committees, announcements, articles, recent posts, events, student project teams, student activities, resources, technology programs, campus service, learning activities connected to BITS or SLSU Bontoc Campus technology students, and the website developers. If asked about the Articles page, say that it contains recent BITS updates, announcements, project briefs, event recaps, student life posts, resources, category filters, search, and publication notes for article submissions. If asked about the website developer team, answer naturally in plain text with no Markdown and no numbered list. Say: Tech Team ni Pilato created this BITS website as a student academic project for the organization. Mention that they are BSIT Major in Programming students from SLSU Bontoc Campus. The 4th year developers are Emil Jon Amora, Ahnjellou Gesulga, and John Mark Yecyec. The 3rd year developers are Wyndel Medina, Rogelniño Mondido Fe Inal, Jericho Kuizon, and Kevin Lozada. Known instructor and mentor profiles shown on the website: Rexal S. Toledo - Instructor I, Information Technology, BS/MS ongoing, programming, web development, database management, graphic design, video editing; Junnie Ryh M. Sumacot - Information Technology Instructor, Master\'s Degree Holder, programming, network administration, embedded systems, simple automations; Christine A. Makilang - BSIT Instructor, BS Information Technology, Professional Education Unit earner; Ejie C. Florida - Part-time Instructor, public faculty details for confirmation by BITS; Julius Amfil E. Dublado - Instructor I, Information Technology, BS Information Technology, programming, designing, editing; Dr. Sherwin G. Caday - Program Chair, BS Information Technology, BS Computer Engineering, MS Information Technology, GIS, networking, computer systems. If the user asks anything unrelated, do not answer the unrelated request. Politely say: "I can only answer BITS organization-related questions. You can ask me about membership, officers, instructors, articles, recent updates, events, projects, resources, committees, technology programs, or the website developers." Be friendly, concise, and student-focused. If organization information is not yet available, say that BITS can update the website with those details.',
                    ]],
                ],
                'contents' => $contents,
                'generationConfig' => [
                    'temperature' => 0.7,
                    'maxOutputTokens' => 420,
                ],
            ]);

        if ($response->failed()) {
            $geminiMessage = data_get($response->json(), 'error.message');

            Log::warning('Gemini chatbot request failed', [
                'status' => $response->status(),
                'body' => $response->json(),
            ]);

            return response()->json([
                'reply' => $geminiErrorReply($response->status(), $geminiMessage),
            ], 502);
        }

        $reply = data_get($response->json(), 'candidates.0.content.parts.0.text');

        return response()->json([
            'reply' => filled($reply) ? $reply : 'Gemini responded, but no text answer was returned.',
        ]);
    } catch (Throwable $exception) {
        Log::error('Gemini chatbot exception', [
            'message' => $exception->getMessage(),
        ]);

        return response()->json([
            'reply' => 'The chatbot service is temporarily unavailable. Please try again later.',
        ], 500);
    }
})->middleware('throttle:20,1');
