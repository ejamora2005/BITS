<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>BITS Articles</title>
    <link rel="icon" href="{{ asset('images/bits.png') }}" type="image/png">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=poppins:400,500,600,700,800,900" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-[#071a33] antialiased">
    @php
        $articles = [
            [
                'category' => 'Announcements',
                'title' => 'BITS Strengthens Its Online Home for SLSU Bontoc IT Students',
                'excerpt' => 'The Bontoc Information Technology Society website now gives members one place to access organization updates, project information, instructor profiles, officer details, articles, and student resources.',
                'meta' => 'Organization update',
                'read' => '3 min read',
                'status' => 'Featured',
                'date' => 'Aug 2026',
                'author' => 'BITS Publication Team',
                'tags' => ['Website', 'Members', 'Updates'],
            ],
            [
                'category' => 'Projects',
                'title' => 'BITS Connect Supports Student Records and Participation Tracking',
                'excerpt' => 'BITS Connect is an academic system built to help Information Technology students monitor participation, organize member records, and keep organization requirements easier to manage.',
                'meta' => 'BITS system',
                'read' => '4 min read',
                'status' => 'Working',
                'date' => 'Aug 2026',
                'author' => 'BITS Development Team',
                'tags' => ['Records', 'Participation', 'System'],
            ],
            [
                'category' => 'Projects',
                'title' => 'SLSU-BC Wayfinder Highlights Student Capstone Innovation',
                'excerpt' => 'SLSU-BC Wayfinder is a student capstone project that helps students and visitors locate campus offices, rooms, buildings, parking areas, and faculty or staff offices around SLSU-Bontoc Campus.',
                'meta' => 'Student capstone project',
                'read' => '4 min read',
                'status' => 'Working',
                'date' => 'Aug 2026',
                'author' => 'Student Capstone Team',
                'tags' => ['Capstone', 'Campus Map', 'Navigation'],
            ],
            [
                'category' => 'Student Life',
                'title' => 'Peer Support Helps BSIT Students Build Confidence in Programming',
                'excerpt' => 'BITS encourages students to learn with classmates through coding practice, project collaboration, documentation work, and shared technical problem solving.',
                'meta' => 'Student support',
                'read' => '3 min read',
                'status' => 'Active',
                'date' => 'Aug 2026',
                'author' => 'BITS Academic Support',
                'tags' => ['Programming', 'Peer Learning', 'BSIT'],
            ],
            [
                'category' => 'Resources',
                'title' => 'Project Documentation Reminders for Student Teams',
                'excerpt' => 'Student teams are encouraged to prepare clear titles, objectives, screenshots, developer names, adviser or instructor guidance, and short summaries before submitting project writeups.',
                'meta' => 'Documentation guide',
                'read' => '2 min read',
                'status' => 'Ready',
                'date' => 'Aug 2026',
                'author' => 'BITS Documentation Team',
                'tags' => ['Guide', 'Projects', 'Review'],
            ],
            [
                'category' => 'Events',
                'title' => 'Programming Activities Prepare Members for Real Project Work',
                'excerpt' => 'Through programming activities and technical learning sessions, BITS helps members practice coding habits, interface design, system planning, and collaborative development.',
                'meta' => 'Learning activity',
                'read' => '3 min read',
                'status' => 'Recent',
                'date' => 'Aug 2026',
                'author' => 'BITS Events Team',
                'tags' => ['Activities', 'Skills', 'Collaboration'],
            ],
        ];

        $categories = ['All', 'Announcements', 'Projects', 'Events', 'Student Life', 'Resources'];
        $featured = $articles[0];
    @endphp

    <main class="site-frame min-h-screen overflow-hidden">
        <header class="nav-shell">
            <nav class="mx-auto flex max-w-7xl items-center justify-between px-5 py-4 md:px-8">
                <a href="{{ url('/') }}" class="brand-mark">
                    <span class="brand-icon">
                        <img src="{{ asset('images/bits.png') }}" alt="Bontoc Information Technology Society logo">
                    </span>
                    <span class="brand-copy">
                        <strong>Bontoc Information Technology Society</strong>
                    </span>
                </a>
                <button type="button" class="mobile-menu-toggle" data-mobile-menu-toggle aria-expanded="false" aria-label="Open navigation menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <div class="hidden items-center gap-5 text-sm font-bold md:flex">
                    <a class="nav-link" href="{{ url('/#about') }}">About</a>
                    <a class="nav-link is-active" href="{{ route('articles') }}" aria-current="page">Articles</a>
                    <a class="nav-link" href="{{ url('/#desk') }}">Updates</a>
                    <a class="nav-link" href="{{ url('/#projects') }}">Projects</a>
                    <a class="nav-link" href="{{ url('/#instructors') }}">Instructors</a>
                    <a class="nav-link" href="{{ url('/#officers') }}">Officers</a>
                    <a class="nav-cta" href="{{ url('/#contact') }}">Contact</a>
                </div>
            </nav>
            <div class="mobile-menu-panel" data-mobile-menu>
                <a class="nav-link" href="{{ url('/#about') }}">About</a>
                <a class="nav-link is-active" href="{{ route('articles') }}" aria-current="page">Articles</a>
                <a class="nav-link" href="{{ url('/#desk') }}">Updates</a>
                <a class="nav-link" href="{{ url('/#projects') }}">Projects</a>
                <a class="nav-link" href="{{ url('/#instructors') }}">Instructors</a>
                <a class="nav-link" href="{{ url('/#officers') }}">Officers</a>
                <a class="nav-cta" href="{{ url('/#contact') }}">Contact</a>
            </div>
        </header>

        <section class="articles-hero mx-auto grid max-w-7xl gap-8 px-5 py-14 md:px-8 lg:grid-cols-[.92fr_1.08fr] lg:items-center">
            <div data-reveal>
                <p class="section-kicker">Articles</p>
                <h1>BITS updates, systems, and student project stories.</h1>
                <p>Read organization news, project highlights, capstone features, learning notes, and resources prepared for SLSU Bontoc Campus IT students.</p>
                <div class="article-hero-tags" aria-label="Article topics">
                    <span>Organization News</span>
                    <span>Student Systems</span>
                    <span>Capstone Features</span>
                </div>
                <div class="article-stats" aria-label="Article highlights">
                    <div>
                        <strong>{{ count($articles) }}</strong>
                        <span>Recent posts</span>
                    </div>
                    <div>
                        <strong>{{ count($categories) - 1 }}</strong>
                        <span>Categories</span>
                    </div>
                    <div>
                        <strong>BSIT</strong>
                        <span>Programming focus</span>
                    </div>
                </div>
            </div>

            <article class="article-featured-card" data-reveal>
                <div class="article-featured-top">
                    <span>{{ $featured['status'] }}</span>
                    <img src="{{ asset('images/bits.png') }}" alt="">
                </div>
                <p>{{ $featured['category'] }}</p>
                <h2>{{ $featured['title'] }}</h2>
                <span>{{ $featured['excerpt'] }}</span>
                <div class="article-tags">
                    @foreach ($featured['tags'] as $tag)
                        <span>{{ $tag }}</span>
                    @endforeach
                </div>
                <div class="article-meta">
                    <strong>{{ $featured['date'] }} / {{ $featured['author'] }}</strong>
                    <small>{{ $featured['read'] }}</small>
                </div>
            </article>
        </section>

        <section class="articles-board mx-auto max-w-7xl px-5 pb-16 md:px-8">
            <div class="article-toolbar" data-reveal>
                <label class="sr-only" for="article-search">Search articles</label>
                <input id="article-search" type="search" data-article-search placeholder="Search BITS articles..." autocomplete="off">
                <div class="article-filter-row" aria-label="Article categories">
                    @foreach ($categories as $category)
                        <button type="button" data-article-filter="{{ Str::slug($category) }}" class="{{ $loop->first ? 'is-active' : '' }}" aria-pressed="{{ $loop->first ? 'true' : 'false' }}">
                            {{ $category }}
                        </button>
                    @endforeach
                </div>
            </div>

            <div class="articles-layout">
                <div>
                    <div class="article-section-heading" data-reveal>
                        <div>
                            <p class="section-kicker">Recent</p>
                            <h2>Latest articles for the BITS community.</h2>
                        </div>
                        <span data-article-count>{{ count($articles) }} articles</span>
                    </div>

                    <div class="article-grid" data-article-list>
                        @foreach ($articles as $article)
                            <article class="article-card" data-article-card data-article-category="{{ Str::slug($article['category']) }}" data-article-title="{{ Str::lower($article['title'].' '.$article['excerpt'].' '.$article['category']) }}" data-reveal>
                                <div class="article-card-top">
                                    <span>{{ $article['category'] }}</span>
                                    <small>{{ $article['status'] }}</small>
                                </div>
                                <h3>{{ $article['title'] }}</h3>
                                <p>{{ $article['excerpt'] }}</p>
                                <div class="article-tags">
                                    @foreach ($article['tags'] as $tag)
                                        <span>{{ $tag }}</span>
                                    @endforeach
                                </div>
                                <div class="article-meta">
                                    <strong>{{ $article['date'] }} / {{ $article['author'] }}</strong>
                                    <small>{{ $article['read'] }}</small>
                                </div>
                            </article>
                        @endforeach
                    </div>

                    <div class="article-empty" data-article-empty hidden>
                        <strong>No matching articles yet.</strong>
                        <p>BITS can publish a new post under this category once the article is ready.</p>
                    </div>
                </div>

                <aside class="article-side-panel" data-reveal>
                    <div>
                        <p class="section-kicker">Publication Notes</p>
                        <h2>For BITS announcements, capstone features, and project writeups.</h2>
                    </div>
                    <div class="article-timeline">
                        <article>
                            <span>Draft</span>
                            <p>Collect the title, authors, adviser or instructor, screenshots, and short project summary.</p>
                        </article>
                        <article>
                            <span>Review</span>
                            <p>Check names, year levels, links, project purpose, and organization wording.</p>
                        </article>
                        <article>
                            <span>Publish</span>
                            <p>Share the approved article on the BITS website for students and visitors to read.</p>
                        </article>
                    </div>
                    <a href="{{ url('/#contact') }}" class="primary-button">Submit Article</a>
                </aside>
            </div>
        </section>
    </main>
</body>
</html>
