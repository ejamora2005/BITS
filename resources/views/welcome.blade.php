<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Bontoc Information Technology Society</title>
    <link rel="icon" href="{{ asset('images/bits.png') }}" type="image/png">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=poppins:400,500,600,700,800,900" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-[#071a33] antialiased">
    @php
        $buildingImage = collect(['backdrop.jpg', 'backdrop.png', 'backdrop.webp', 'bits-building.jpg', 'bits-building.png', 'bits-building.webp', 'bits-building.svg'])
            ->first(fn ($image) => file_exists(public_path('images/'.$image)));
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
                    <a class="nav-link" href="#about">About</a>
                    <a class="nav-link" href="{{ route('articles') }}">Articles</a>
                    <a class="nav-link" href="#desk">Updates</a>
                    <a class="nav-link" href="#projects">Projects</a>
                    <a class="nav-link" href="#instructors">Instructors</a>
                    <a class="nav-link" href="#officers">Officers</a>
                    <a class="nav-cta" href="#contact">Contact</a>
                </div>
            </nav>
            <div class="mobile-menu-panel" data-mobile-menu>
                <a class="nav-link" href="#about">About</a>
                <a class="nav-link" href="{{ route('articles') }}">Articles</a>
                <a class="nav-link" href="#desk">Updates</a>
                <a class="nav-link" href="#projects">Projects</a>
                <a class="nav-link" href="#instructors">Instructors</a>
                <a class="nav-link" href="#officers">Officers</a>
                <a class="nav-cta" href="#contact">Contact</a>
            </div>
        </header>

        <section class="hero-system" style="--hero-building-image: url('{{ asset('images/'.$buildingImage) }}')">
            <div class="hero-grid mx-auto grid max-w-[96rem] gap-12 px-5 py-16 md:px-8 lg:grid-cols-[.88fr_1.18fr] lg:items-center lg:py-20">
                <div class="relative z-10" data-reveal>
                    <p class="eyebrow">Bontoc Information Technology Society</p>
                    <h1>Empowering SLSU Bontoc IT students to learn, lead, and build together.</h1>
                    <p class="hero-copy">BITS is the school organization home for technology students of Southern Leyte State University - Bontoc Campus, bringing announcements, student participation, instructors, officers, projects, and campus activities into one polished space.</p>
                    <div class="mt-8 flex flex-wrap gap-3">
                        <a href="{{ route('articles') }}" class="primary-button">Articles</a>
                        <a href="#projects" class="secondary-button">Projects</a>
                    </div>
                    <div class="signal-row">
                        <div>
                            <strong>211</strong>
                            <span>Enrolled students</span>
                        </div>
                    </div>
                </div>

                <div class="hero-media-stack" data-reveal>
                    <div class="mini-console">
                        <div class="hero-video">
                            <iframe
                                src="https://www.youtube.com/embed/e_oIbzp8ktI?rel=0&modestbranding=1&playsinline=1"
                                title="BITS video"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen
                            ></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="about" class="content-section mx-auto grid max-w-7xl gap-8 px-5 md:px-8 lg:grid-cols-[.82fr_1.18fr]">
            <div data-reveal>
                <p class="section-kicker">About</p>
                <h2>The official online space for BITS students, instructors, projects, and updates.</h2>
            </div>
            <div class="glass-panel" data-reveal>
                <p>Bontoc Information Technology Society is an academic organization for Information Technology students of SLSU Bontoc Campus. It is dedicated to enhancing students' technical skills, academic growth, leadership, and collaboration through programming activities, student systems, technical learning, organizational service, instructor guidance, and project-based initiatives.</p>
            </div>
        </section>

        <section id="desk" class="content-band">
            <div class="mx-auto max-w-7xl px-5 md:px-8">
                <div class="section-heading" data-reveal>
                    <p class="section-kicker">Organization Updates</p>
                    <h2>Announcements, schedules, and reminders for BITS students.</h2>
                </div>
                <div class="command-desk">
                    <article class="desk-card desk-card-large" data-reveal>
                        <div class="desk-header">
                            <span>Student Notices</span>
                            <strong>Now</strong>
                        </div>
                        <div class="feed-list">
                            @foreach ([
                                ['Organization Assembly', 'BITS organization assembly on August 26 at 2:00 PM. Attendance, committees, and student orientation details will be discussed.', 'Important'],
                            ] as [$title, $copy, $status])
                                <div class="feed-item">
                                    <span>{{ $status }}</span>
                                    <div>
                                        <h3>{{ $title }}</h3>
                                        <p>{{ $copy }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </article>
                    <article class="desk-card" data-reveal>
                        <div class="desk-header">
                            <span>Quick Links</span>
                            <strong>BITS</strong>
                        </div>
                        <div class="quick-grid">
                            <a href="#membership">Apply</a>
                            <a href="#vault">Files</a>
                            <a href="#projects">Projects</a>
                            <a href="#events">Events</a>
                        </div>
                    </article>
                </div>
            </div>
        </section>

        <section id="programs" class="content-band">
            <div class="mx-auto max-w-7xl px-5 md:px-8">
                <div class="section-heading" data-reveal>
                    <p class="section-kicker">Core Programs</p>
                    <h2>Programs focused on coding, collaboration, service, and student development.</h2>
                </div>
                <div class="program-matrix">
                    @foreach ([
                        ['Build Labs', 'Student teams work on BITS Connect, Wayfinder, campus tools, and academic outputs.'],
                        ['Skill Sessions', 'Workshops and practice sessions for programming, UI design, databases, and documentation.'],
                        ['Student Support', 'Peer guidance, instructor support, and committee work for active BITS students.'],
                        ['Community Tech', 'Technology service, publication work, and digital support for campus activities.'],
                    ] as [$title, $copy])
                        <article class="matrix-card" data-reveal>
                            <span>{{ sprintf('%02d', $loop->iteration) }}</span>
                            <h3>{{ $title }}</h3>
                            <p>{{ $copy }}</p>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <section id="projects" class="content-section mx-auto max-w-7xl px-5 md:px-8">
            <div class="section-heading" data-reveal>
                <p class="section-kicker">Projects</p>
                <h2>BITS systems, campus tools, and selected student capstone projects.</h2>
            </div>
            <div class="project-lab">
                @foreach ([
                    [
                        'title' => 'BITS Connect',
                        'copy' => 'A BITS academic system for student records, participation updates, and organization requirements.',
                        'meta' => 'Student record support',
                        'status' => 'Working',
                        'logo' => 'bits.png',
                        'url' => 'https://bitsorg.info/',
                        'developer' => 'Tech Team ni Pilato',
                        'details' => 'BITS Connect helps BITS students stay updated, monitor participation, and keep track of organization requirements for academic and organization activities.',
                    ],
                    [
                        'title' => 'SLSU-BC Wayfinder',
                        'copy' => 'A student capstone project and campus navigation tool that helps students and visitors locate offices, rooms, and buildings around SLSU-Bontoc Campus.',
                        'meta' => 'Student capstone project',
                        'status' => 'Working',
                        'logo' => 'slsulogo.png',
                        'url' => 'https://slsubontocwayfinder.com/',
                        'developer' => 'Mark Steven B. Peligro',
                        'details' => 'SLSU-BC Wayfinder helps users find buildings, campus areas, rooms, parking areas, and faculty or staff offices around SLSU-Bontoc Campus.',
                    ],
                ] as $project)
                    <article class="project-card" data-reveal>
                        <div class="project-card-top">
                            <span class="project-logo">
                                <img src="{{ asset('images/'.$project['logo']) }}" alt="{{ $project['title'] }} logo">
                            </span>
                            <div class="project-status">{{ $project['status'] }}</div>
                        </div>
                        <h3>{{ $project['title'] }}</h3>
                        <p>{{ $project['copy'] }}</p>
                        <strong>{{ $project['meta'] }}</strong>
                        <div class="project-actions">
                            <button
                                type="button"
                                class="project-info"
                                data-project-info
                                data-title="{{ $project['title'] }}"
                                data-status="{{ $project['status'] }}"
                                data-meta="{{ $project['meta'] }}"
                                data-developer="{{ $project['developer'] }}"
                                data-description="{{ $project['details'] }}"
                                data-logo="{{ asset('images/'.$project['logo']) }}"
                                data-url="{{ $project['url'] }}"
                            >Info</button>
                            <a href="{{ $project['url'] }}" class="project-visit" target="_blank" rel="noopener noreferrer">Visit System</a>
                        </div>
                    </article>
                @endforeach
            </div>
        </section>

        <div class="project-modal" data-project-modal aria-hidden="true">
            <div class="project-modal-backdrop" data-project-modal-close></div>
            <section class="project-modal-panel" role="dialog" aria-modal="true" aria-labelledby="project-modal-title">
                <button type="button" class="project-modal-close" data-project-modal-close aria-label="Close project information">&times;</button>
                <div class="project-modal-head">
                    <span class="project-modal-logo">
                        <img src="" alt="" data-project-modal-logo>
                    </span>
                    <div>
                        <p data-project-modal-status></p>
                        <h3 id="project-modal-title" data-project-modal-title></h3>
                    </div>
                </div>
                <div class="project-modal-body">
                    <div>
                        <span>System Type</span>
                        <strong data-project-modal-meta></strong>
                    </div>
                    <div>
                        <span>Developer</span>
                        <strong data-project-modal-developer></strong>
                    </div>
                    <div class="project-modal-description">
                        <span>Description</span>
                        <p data-project-modal-description></p>
                    </div>
                </div>
                <a href="#" class="project-modal-link" target="_blank" rel="noopener noreferrer" data-project-modal-link>Visit System</a>
            </section>
        </div>

        <section id="instructors" class="content-section mx-auto max-w-7xl px-5 md:px-8">
            <div class="section-heading instructor-section-heading" data-reveal>
                <p class="section-kicker">Instructors</p>
                <h2>Faculty guidance for BITS students.</h2>
            </div>

            @php
                $instructors = [
                    [
                        'name' => 'Rexal S. Toledo',
                        'role' => 'Instructor I, Information Technology',
                        'education' => 'BS / MS ongoing',
                        'expertise' => 'Programming, web development, database management, graphic design, and video editing',
                        'image' => 'instructors/web/rexal.png',
                    ],
                    [
                        'name' => 'Junnie Ryh M. Sumacot',
                        'role' => 'Information Technology Instructor',
                        'education' => 'Master\'s Degree Holder',
                        'expertise' => 'Programming, network administration, embedded systems, and simple automations',
                        'image' => 'instructors/web/sumacot.png',
                    ],
                    [
                        'name' => 'Christine A. Makilang',
                        'role' => 'BSIT Instructor',
                        'education' => 'BS Information Technology; Professional Education Unit earner',
                        'expertise' => 'BSIT learning support, digital outputs, and student activity guidance',
                        'image' => 'instructors/web/makilang.png',
                    ],
                    [
                        'name' => 'Ejie C. Florida',
                        'role' => 'Part-time Instructor',
                        'education' => 'Public faculty details for BITS confirmation',
                        'expertise' => 'Development, research support, and student project guidance',
                        'image' => 'instructors/web/ejie.png',
                    ],
                    [
                        'name' => 'Julius Amfil E. Dublado',
                        'role' => 'Instructor I, Information Technology',
                        'education' => 'BS Information Technology',
                        'expertise' => 'Programming, designing, and editing',
                        'image' => 'instructors/web/fhel.png',
                    ],
                    [
                        'name' => 'Dr. Sherwin G. Caday',
                        'role' => 'Program Chair, BS Information Technology',
                        'education' => 'BS Computer Engineering; MS Information Technology',
                        'expertise' => 'GIS, networking, and computer systems',
                        'image' => 'instructors/web/caday.png',
                    ],
                ];
            @endphp

            <div class="instructor-carousel" data-instructor-carousel data-reveal>
                @foreach ($instructors as $index => $instructor)
                    @php
                        $previousIndex = ($index - 1 + count($instructors)) % count($instructors);
                        $nextIndex = ($index + 1) % count($instructors);
                        $previousInstructor = $instructors[$previousIndex];
                        $nextInstructor = $instructors[$nextIndex];
                    @endphp
                    <article class="instructor-slide instructor-focus-slide" data-carousel-slide>
                        <div class="instructor-card-main">
                            <div class="instructor-stage" aria-label="{{ $instructor['name'] }} featured instructor">
                                <div class="portrait-glow" aria-hidden="true"></div>
                                <button class="side-instructor side-instructor-left" type="button" data-carousel-to="{{ $previousIndex }}" aria-label="Show {{ $previousInstructor['name'] }}">
                                    <img src="{{ asset('images/'.$previousInstructor['image']) }}" alt="" loading="lazy" draggable="false">
                                </button>
                                <button class="side-instructor side-instructor-right" type="button" data-carousel-to="{{ $nextIndex }}" aria-label="Show {{ $nextInstructor['name'] }}">
                                    <img src="{{ asset('images/'.$nextInstructor['image']) }}" alt="" loading="lazy" draggable="false">
                                </button>
                                <img src="{{ asset('images/'.$instructor['image']) }}" alt="{{ $instructor['name'] }}" class="focus-instructor-image" loading="{{ $index === 0 ? 'eager' : 'lazy' }}" draggable="false">
                                <div class="portrait-platform" aria-hidden="true"></div>
                            </div>
                            <div class="instructor-caption">
                                <h3>{{ $instructor['name'] }}</h3>
                                <div class="instructor-role-row">
                                    <p class="instructor-role">{{ $instructor['role'] }}</p>
                                    <button
                                        type="button"
                                        class="instructor-info"
                                        data-instructor-info
                                        data-name="{{ $instructor['name'] }}"
                                        data-role="{{ $instructor['role'] }}"
                                        data-education="{{ $instructor['education'] }}"
                                        data-expertise="{{ $instructor['expertise'] }}"
                                        data-image="{{ asset('images/'.$instructor['image']) }}"
                                        aria-label="View {{ $instructor['name'] }} information"
                                    >i</button>
                                </div>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            <div class="project-modal instructor-modal" data-instructor-modal aria-hidden="true">
                <div class="project-modal-backdrop" data-instructor-modal-close></div>
                <section class="project-modal-panel" role="dialog" aria-modal="true" aria-labelledby="instructor-modal-title">
                    <button type="button" class="project-modal-close" data-instructor-modal-close aria-label="Close instructor information">&times;</button>
                    <div class="project-modal-head">
                        <span class="project-modal-logo instructor-modal-photo">
                            <img src="" alt="" data-instructor-modal-image>
                        </span>
                        <div>
                            <p data-instructor-modal-role></p>
                            <h3 id="instructor-modal-title" data-instructor-modal-name></h3>
                        </div>
                    </div>
                    <div class="project-modal-body">
                        <div>
                            <span>Education</span>
                            <strong data-instructor-modal-education></strong>
                        </div>
                        <div>
                            <span>Expertise</span>
                            <strong data-instructor-modal-expertise></strong>
                        </div>
                    </div>
                </section>
            </div>
        </section>

        <section id="officers" class="content-band">
            <div class="mx-auto max-w-screen-2xl px-5 md:px-10">
                <div class="section-heading" data-reveal>
                    <p class="section-kicker">Officers</p>
                    <h2>An officer board for the student leadership team.</h2>
                </div>
                <div class="officer-grid">
                    @foreach ([
                        ['President', 'Analou Oclarit', null],
                        ['Vice President', 'Danica Marie Cabahug', 'officers/cabahug.png'],
                        ['Secretary/Treasurer', 'Kristin Agad Andam', null],
                        ['Graphic Designer', 'John Brunz Camarista', null],
                    ] as [$role, $name, $image])
                        <article class="officer-card" data-reveal>
                            @if ($image)
                                <span class="officer-card-image" style="--officer-image: url('{{ asset('images/'.$image) }}')" aria-hidden="true"></span>
                            @endif
                            <h3>{{ $role }}</h3>
                            <p>{{ $name }}</p>
                        </article>
                    @endforeach
                </div>
                <div class="officer-group-heading" data-reveal>
                    <p class="section-kicker">Representatives</p>
                </div>
                <div class="officer-grid representatives-grid">
                    @foreach ([
                        ['2A', '2A Representative', 'Apollo Paderes'],
                        ['2B', '2B Representative', 'Diana Jean'],
                        ['3B', '3B Representative', 'Jonathan Layo'],
                    ] as [$initials, $role, $name])
                        <article class="officer-card" data-reveal>
                            <h3>{{ $role }}</h3>
                            <p>{{ $name }}</p>
                        </article>
                    @endforeach
                </div>
                <div class="officer-group-heading" data-reveal>
                    <p class="section-kicker">Tech Team</p>
                </div>
                <div class="officer-grid tech-team-grid">
                    @foreach ([
                        ['TT', 'Ahnjellou Gesulga', 'officers/Gesulga-removebg-preview.png'],
                        ['TT', 'Emil Jon Amora', 'officers/amora.png'],
                        ['TT', 'John Mark Yecyec', 'officers/yecyec.webp'],
                        ['TT', 'Rogelniño Mondido Fe Inal', 'officers/inal.png'],
                        ['TT', 'Wyndel Medina', 'officers/Medina-removebg-preview.png'],
                    ] as [$initials, $name, $image])
                        <article class="officer-card" data-reveal>
                            @if ($image)
                                <span class="officer-card-image" style="--officer-image: url('{{ asset('images/'.$image) }}')" aria-hidden="true"></span>
                            @endif
                            <h3>Technical Support Team</h3>
                            <p>{{ $name }}</p>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <section id="membership" class="content-section mx-auto max-w-7xl px-5 md:px-8">
            <div class="section-heading" data-reveal>
                <p class="section-kicker">Student Path</p>
                <h2>How students join, participate, and contribute to BITS committees.</h2>
            </div>
            <div class="membership-suite">
                <article class="membership-steps" data-reveal>
                    @foreach ([
                        ['01', 'Apply', 'Submit basic student details and preferred committee.'],
                        ['02', 'Orient', 'Attend orientation and learn BITS guidelines, committees, and activities.'],
                        ['03', 'Assign', 'Join a committee, project team, or event unit.'],
                        ['04', 'Build', 'Contribute to workshops, tools, publications, or outreach.'],
                    ] as [$number, $title, $copy])
                        <div>
                            <span>{{ $number }}</span>
                            <h3>{{ $title }}</h3>
                            <p>{{ $copy }}</p>
                        </div>
                    @endforeach
                </article>
                <article class="committee-panel" data-reveal>
                    <div class="desk-header">
                        <span>Committee Tracks</span>
                        <strong>Choose</strong>
                    </div>
                    <div class="committee-grid">
                        <span>Development</span>
                        <span>Design</span>
                        <span>Documentation</span>
                        <span>Events</span>
                        <span>Publication</span>
                        <span>Outreach</span>
                    </div>
                </article>
            </div>
        </section>

        <section id="vault" class="content-band">
            <div class="mx-auto max-w-7xl px-5 md:px-8">
                <div class="section-heading" data-reveal>
                    <p class="section-kicker">Resource Vault</p>
                    <h2>SLSU student portals, manuals, and official online resources.</h2>
                </div>
                <div class="vault-shell" data-reveal>
                    <div class="vault-tabs" role="tablist" aria-label="Resource categories">
                        <button class="is-active" type="button" data-vault-tab="portals">Portals</button>
                        <button type="button" data-vault-tab="manuals">Manuals</button>
                        <button type="button" data-vault-tab="campus">Campus Links</button>
                    </div>
                    <div class="vault-panel is-active" data-vault-panel="portals">
                        <article><a href="https://sis.southernleytestateu.edu.ph/" target="_blank" rel="noopener noreferrer"><strong>SLSU SIS</strong><span>Student Information System for grades, enrolment, balances, clearance, and records</span></a></article>
                        <article><a href="https://lms.southernleytestateu.edu.ph/" target="_blank" rel="noopener noreferrer"><strong>SLSU LMS</strong><span>Learning Management System for online classes, activities, and course materials</span></a></article>
                        <article><a href="https://my.southernleytestateu.edu.ph/" target="_blank" rel="noopener noreferrer"><strong>Online Admission</strong><span>SLSU admission portal for applicants and student requirements</span></a></article>
                    </div>
                    <div class="vault-panel" data-vault-panel="manuals">
                        <article><a href="https://sis.southernleytestateu.edu.ph/download/student-manual" target="_blank" rel="noopener noreferrer"><strong>Student Manual</strong><span>Official SLSU student manual and university guidelines</span></a></article>
                        <article><a href="https://sis.southernleytestateu.edu.ph/tutorials" target="_blank" rel="noopener noreferrer"><strong>SIS Tutorials</strong><span>Guides for enrolment, clearance, account access, and student portal use</span></a></article>
                        <article><a href="https://sis.southernleytestateu.edu.ph/announcements" target="_blank" rel="noopener noreferrer"><strong>SIS Announcements</strong><span>Portal notices and student system updates</span></a></article>
                    </div>
                    <div class="vault-panel" data-vault-panel="campus">
                        <article><a href="https://southernleytestateu.edu.ph/" target="_blank" rel="noopener noreferrer"><strong>SLSU Website</strong><span>Official Southern Leyte State University website</span></a></article>
                        <article><a href="https://www.facebook.com/southernleytestateu" target="_blank" rel="noopener noreferrer"><strong>SLSU Facebook</strong><span>Official university announcements and public updates</span></a></article>
                        <article><a href="https://www.facebook.com/slsubitsofficial" target="_blank" rel="noopener noreferrer"><strong>BITS Facebook</strong><span>Official BITS page for organization posts and student updates</span></a></article>
                    </div>
                </div>
            </div>
        </section>

        <section id="features" class="content-section mx-auto max-w-7xl px-5 md:px-8">
            <div class="section-heading" data-reveal>
                <p class="section-kicker">Website Features</p>
                <h2>Website areas that support BITS announcements, projects, events, and students.</h2>
            </div>
            <div class="feature-lab">
                @foreach ([
                    ['Announcements', 'Official updates, urgent notices, meeting reminders, and campus activity posts.'],
                    ['Project Gallery', 'BITS systems, academic projects, and student team outputs.'],
                    ['Student Records', 'Student information, committee assignments, and participation records.'],
                    ['Resource Vault', 'Workshop files, guides, templates, references, and shared learning links.'],
                    ['Event Tracker', 'Upcoming activities, completed events, reports, and attendance highlights.'],
                    ['Campus Linkages', 'College, campus, alumni, and community collaboration updates.'],
                ] as [$title, $copy])
                    <article class="feature-module" data-reveal>
                        <span></span>
                        <h3>{{ $title }}</h3>
                        <p>{{ $copy }}</p>
                    </article>
                @endforeach
            </div>
        </section>

        <section id="events" class="content-section mx-auto grid max-w-7xl gap-8 px-5 md:px-8 lg:grid-cols-[.9fr_1.1fr]">
            <div data-reveal>
                <p class="section-kicker">Events</p>
                <h2>BITS activities for students, officers, instructors, and student project teams.</h2>
            </div>
            <div class="event-stack" data-reveal>
                @foreach ([
                    ['Organization Assembly', 'Student orientation, attendance checking, officer announcements, and committee assignments.'],
                    ['SIS and LMS Assistance', 'Guidance for student portal access, LMS concerns, online enrolment, and account-related questions.'],
                    ['Project and Capstone Consultation', 'Instructor-guided support for system planning, documentation, interface design, and project presentation.'],
                ] as [$title, $copy])
                    <article>
                        <span>{{ sprintf('%02d', $loop->iteration) }}</span>
                        <div>
                            <h3>{{ $title }}</h3>
                            <p>{{ $copy }}</p>
                        </div>
                    </article>
                @endforeach
            </div>
        </section>

        <section id="contact" class="final-cta">
            <div class="mx-auto flex max-w-7xl flex-col gap-7 px-5 py-14 md:flex-row md:items-center md:justify-between md:px-8">
                <div data-reveal>
                    <p class="eyebrow">Contact the organization</p>
                    <h2>Contact BITS and follow the official organization channels.</h2>
                </div>
                <div class="social-panel" data-reveal>
                    <a href="mailto:bits@slsu.edu.ph" class="primary-button">Contact BITS</a>
                    <div class="contact-quicklinks" aria-label="SLSU student links">
                        <a href="https://sis.southernleytestateu.edu.ph/" target="_blank" rel="noopener noreferrer">SIS</a>
                        <a href="https://lms.southernleytestateu.edu.ph/" target="_blank" rel="noopener noreferrer">LMS</a>
                        <a href="https://sis.southernleytestateu.edu.ph/download/student-manual" target="_blank" rel="noopener noreferrer">Student Manual</a>
                    </div>
                    <div class="social-actions" aria-label="BITS official social links">
                        <a href="https://youtube.com/@slsubitsofficial?si=01gFrPt7FmpB63xO" class="social-link social-link-youtube" target="_blank" rel="noopener noreferrer" aria-label="BITS YouTube">
                            <svg viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M21.6 7.2s-.2-1.5-.8-2.1c-.8-.8-1.6-.8-2-.9C16 4 12 4 12 4s-4 0-6.8.2c-.4.1-1.2.1-2 .9-.6.6-.8 2.1-.8 2.1S2 9 2 10.9v1.8c0 1.9.4 3.7.4 3.7s.2 1.5.8 2.1c.8.8 1.8.8 2.2.9 1.6.1 6.6.2 6.6.2s4 0 6.8-.2c.4-.1 1.2-.1 2-.9.6-.6.8-2.1.8-2.1s.4-1.8.4-3.7v-1.8c0-1.9-.4-3.7-.4-3.7ZM10 15.2V8.8l5.8 3.2L10 15.2Z"/>
                            </svg>
                            <span>YouTube</span>
                        </a>
                        <a href="https://www.facebook.com/slsubitsofficial" class="social-link social-link-facebook" target="_blank" rel="noopener noreferrer" aria-label="BITS Facebook">
                            <svg viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M14.2 8.1V6.6c0-.7.5-.9.9-.9h2.2V2.1L14.2 2c-3.5 0-4.3 2.6-4.3 4.3v1.8H7.1v3.7h2.8V22h4.3V11.8h2.9l.4-3.7h-3.3Z"/>
                            </svg>
                            <span>Facebook</span>
                        </a>
                        <a href="https://www.tiktok.com/@slsubitsofficial" class="social-link social-link-tiktok" target="_blank" rel="noopener noreferrer" aria-label="BITS TikTok">
                            <svg viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M16.7 2c.3 2.4 1.6 3.9 3.9 4.1v3.8c-1.4.1-2.7-.3-3.8-1.1v7c0 3.6-2.4 6.2-5.9 6.2-3.2 0-5.7-2.4-5.7-5.4 0-3.3 2.7-5.8 6.3-5.5v3.9c-1.4-.2-2.3.5-2.3 1.6 0 1 .8 1.7 1.8 1.7 1.2 0 1.9-.7 1.9-2.3V2h3.8Z"/>
                            </svg>
                            <span>TikTok</span>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section class="chatbot-widget" data-chatbot data-bot-image="{{ asset('images/bitsbot.png') }}" aria-label="BITS Gemini chatbot">
            <button class="chatbot-toggle" type="button" data-chatbot-toggle aria-label="Open BITS chatbot">
                <img src="{{ asset('images/bitsbot.png') }}" alt="BITSBot">
            </button>

            <div class="chatbot-panel" data-chatbot-panel aria-hidden="true">
                <div class="chatbot-header">
                    <div>
                        <span class="chatbot-avatar">
                            <img src="{{ asset('images/bitsbot.png') }}" alt="">
                        </span>
                        <div>
                            <strong>BITSBot</strong>
                            <small>BITS questions only</small>
                        </div>
                    </div>
                    <button type="button" data-chatbot-close aria-label="Close chatbot">&times;</button>
                </div>

                <div class="chatbot-messages" data-chatbot-messages>
                    <div class="chat-message bot">
                        <span class="chat-message-avatar">
                            <img src="{{ asset('images/bitsbot.png') }}" alt="">
                        </span>
                        <div class="chat-bubble">
                        <p>Hello! I am BITSBot. I can answer organization-related questions about BITS, SLSU Bontoc Campus activities, student participation, officers, instructors, events, project teams, resources, and technology programs.</p>
                        </div>
                    </div>
                </div>

                <div class="chatbot-prompts">
                    <button type="button" data-chat-prompt="Who are the developers of this website?">Developer</button>
                    <button type="button" data-chat-prompt="What are the BITS committees?">Committees</button>
                    <button type="button" data-chat-prompt="What projects can students build?">Projects</button>
                </div>

                <form class="chatbot-form" data-chatbot-form>
                    <input type="text" name="message" data-chatbot-input placeholder="Ask BITSBot..." autocomplete="off" maxlength="1200">
                    <button type="submit">Send</button>
                </form>
            </div>
        </section>
    </main>
</body>
</html>
