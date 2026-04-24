<x-layout.frontend>

    <link
        href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,200;0,9..144,300;0,9..144,400;1,9..144,200;1,9..144,300;1,9..144,400&family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,500;9..40,600&display=swap"
        rel="stylesheet">

    <style>
        /* ── fonts ── */
        .ff-display {
            font-family: 'Fraunces', serif
        }

        .ff-body {
            font-family: 'DM Sans', sans-serif
        }

        /* ── keyframes ── */
        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(36px)
            }

            to {
                opacity: 1;
                transform: none
            }
        }

        @keyframes fadeLeft {
            from {
                opacity: 0;
                transform: translateX(36px)
            }

            to {
                opacity: 1;
                transform: none
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0
            }

            to {
                opacity: 1
            }
        }

        @keyframes scaleUp {
            from {
                opacity: 0;
                transform: scale(.9)
            }

            to {
                opacity: 1;
                transform: scale(1)
            }
        }

        @keyframes floatY {

            0%,
            100% {
                transform: translateY(0)
            }

            50% {
                transform: translateY(-20px)
            }
        }

        @keyframes spinSlow {
            from {
                transform: rotate(0)
            }

            to {
                transform: rotate(360deg)
            }
        }

        @keyframes shimmer {
            0% {
                background-position: -300% center
            }

            100% {
                background-position: 300% center
            }
        }

        @keyframes pulse2 {

            0%,
            100% {
                opacity: 1;
                transform: scale(1)
            }

            50% {
                opacity: .45;
                transform: scale(1.5)
            }
        }

        @keyframes lineW {
            from {
                width: 0
            }

            to {
                width: 100%
            }
        }

        @keyframes countUp {
            from {
                opacity: 0;
                transform: translateY(10px)
            }

            to {
                opacity: 1;
                transform: none
            }
        }

        @keyframes marquee {
            from {
                transform: translateX(0)
            }

            to {
                transform: translateX(-50%)
            }
        }

        /* ── animation helpers ── */
        .a-fadeUp {
            animation: fadeUp .8s cubic-bezier(.22, 1, .36, 1) both
        }

        .a-fadeLeft {
            animation: fadeLeft .8s cubic-bezier(.22, 1, .36, 1) both
        }

        .a-fadeIn {
            animation: fadeIn 1s ease both
        }

        .a-scaleUp {
            animation: scaleUp .85s cubic-bezier(.22, 1, .36, 1) both
        }

        .d1 {
            animation-delay: .08s
        }

        .d2 {
            animation-delay: .18s
        }

        .d3 {
            animation-delay: .3s
        }

        .d4 {
            animation-delay: .44s
        }

        .d5 {
            animation-delay: .58s
        }

        .d6 {
            animation-delay: .72s
        }

        /* ── micro ── */
        .float {
            animation: floatY 8s ease-in-out infinite
        }

        .float2 {
            animation: floatY 11s ease-in-out infinite reverse
        }

        .float3 {
            animation: floatY 14s ease-in-out infinite .5s
        }

        .spin {
            animation: spinSlow 22s linear infinite
        }

        .pulse {
            animation: pulse2 2s ease-in-out infinite
        }

        /* shimmer text */
        .shimmer {
            background: linear-gradient(90deg, #065f46, #059669, #34d399, #6ee7b7, #34d399, #059669, #065f46);
            background-size: 300% auto;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: shimmer 5s linear infinite;
        }

        /* ── scroll reveal ── */
        .reveal {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity .75s ease, transform .75s cubic-bezier(.22, 1, .36, 1)
        }

        .reveal.in {
            opacity: 1;
            transform: none
        }

        .reveal-l {
            opacity: 0;
            transform: translateX(-30px);
            transition: opacity .75s ease, transform .75s cubic-bezier(.22, 1, .36, 1)
        }

        .reveal-l.in {
            opacity: 1;
            transform: none
        }

        .reveal-r {
            opacity: 0;
            transform: translateX(30px);
            transition: opacity .75s ease, transform .75s cubic-bezier(.22, 1, .36, 1)
        }

        .reveal-r.in {
            opacity: 1;
            transform: none
        }

        /* ── interactive ── */
        .card-hover {
            transition: transform .35s cubic-bezier(.22, 1, .36, 1), box-shadow .35s ease
        }

        .card-hover:hover {
            transform: translateY(-8px) scale(1.015);
            box-shadow: 0 28px 60px rgba(0, 0, 0, .11)
        }

        .btn-primary {
            transition: all .28s cubic-bezier(.22, 1, .36, 1)
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 14px 40px rgba(5, 150, 105, .35)
        }

        .btn-ghost {
            transition: all .28s cubic-bezier(.22, 1, .36, 1)
        }

        .btn-ghost:hover {
            transform: translateY(-3px);
            border-color: #059669;
            color: #059669
        }

        /* pill accent bar on card */
        .card-bar {
            transform: scaleX(0);
            transform-origin: left;
            transition: transform .32s ease
        }

        .card-hover:hover .card-bar {
            transform: scaleX(1)
        }

        /* ── marquee ── */
        .marquee-inner {
            animation: marquee 28s linear infinite;
            display: flex;
            width: max-content
        }

        .marquee-inner:hover {
            animation-play-state: paused
        }

        /* ── hero bg mesh ── */
        .hero-mesh {
            background:
                radial-gradient(ellipse 70% 60% at 15% 40%, rgba(167, 243, 208, .35) 0%, transparent 55%),
                radial-gradient(ellipse 55% 50% at 85% 20%, rgba(209, 250, 229, .4) 0%, transparent 50%),
                radial-gradient(ellipse 40% 40% at 60% 80%, rgba(52, 211, 153, .12) 0%, transparent 55%),
                #f0fdf4;
        }

        /* ── feature icon glow ── */
        .icon-glow {
            box-shadow: 0 0 0 8px rgba(52, 211, 153, .12), 0 0 0 16px rgba(52, 211, 153, .05)
        }

        /* stat counter */
        .stat-num {
            font-family: 'Fraunces', serif;
            font-size: clamp(2.2rem, 4vw, 3.2rem);
            font-weight: 300;
            line-height: 1
        }
    </style>

    <div class="ff-body text-gray-800 overflow-x-hidden">

        {{-- ══════════════════════════════════ HERO ══════════════════════════════════ --}}
        <section class="hero-mesh relative min-h-screen pt-16 flex items-center overflow-hidden">

            {{-- decorative orbs --}}
            <div
                class="float  pointer-events-none absolute top-32  left-[8%]  w-64 h-64 rounded-full bg-emerald-200 opacity-40 blur-3xl">
            </div>
            <div
                class="float2 pointer-events-none absolute bottom-16 right-[6%] w-80 h-80 rounded-full bg-teal-200   opacity-30 blur-3xl">
            </div>
            <div
                class="float3 pointer-events-none absolute top-1/2  right-1/4  w-48 h-48 rounded-full bg-green-100  opacity-50 blur-2xl">
            </div>

            {{-- spinning decorative ring --}}
            <div
                class="spin pointer-events-none absolute -right-32 top-1/2 -translate-y-1/2 w-[520px] h-[520px] rounded-full border border-dashed border-emerald-300/30 hidden lg:block">
            </div>
            <div class="spin pointer-events-none absolute -right-20 top-1/2 -translate-y-1/2 w-[380px] h-[380px] rounded-full border border-dotted border-emerald-400/20 hidden lg:block"
                style="animation-direction:reverse"></div>

            {{-- dot grid texture --}}
            <div class="pointer-events-none absolute inset-0 opacity-[.045]"
                style="background-image:radial-gradient(rgba(5,150,105,.9) 1px,transparent 1px);background-size:28px 28px">
            </div>

            <div
                class="relative max-w-7xl mx-auto px-6 lg:px-10 w-full grid lg:grid-cols-2 gap-16 items-center py-20 lg:py-0 min-h-[calc(100vh-4rem)]">

                {{-- LEFT copy --}}
                <div>

                    {{-- trust chip --}}
                    <div
                        class="a-fadeUp d1 inline-flex items-center gap-2.5 bg-white/80 backdrop-blur border border-emerald-200 rounded-full px-4 py-2 mb-8 shadow-sm">
                        <span class="pulse inline-block w-2 h-2 rounded-full bg-emerald-500 flex-shrink-0"></span>
                        <span class="text-emerald-700 text-xs font-medium tracking-widest uppercase">Nepal's #1
                            Healthcare Platform</span>
                    </div>

                    {{-- headline --}}
                    <h1 class="a-fadeUp d2 ff-display font-light leading-[1.05] text-gray-900 mb-6"
                        style="font-size:clamp(3rem,5.5vw,5.2rem)">
                        Smart care,<br>
                        <em class="italic shimmer">effortlessly</em><br>
                        booked.
                    </h1>

                    <p class="a-fadeUp d3 text-gray-500 leading-relaxed mb-10 max-w-[46ch]" style="font-size:1.05rem">
                        Find specialist doctors, browse real-time availability, and lock in appointments in seconds.
                        Mediverse makes world-class healthcare accessible for everyone.
                    </p>

                    {{-- CTA row --}}
                    <div class="a-fadeUp d4 flex flex-wrap gap-4 mb-14">
                        <a href="/register"
                            class="btn-primary inline-flex items-center gap-2.5 bg-emerald-600 text-white font-medium text-sm tracking-wide px-8 py-4 rounded-full shadow-lg">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <rect x="3" y="4" width="18" height="18" rx="2" />
                                <path d="M16 2v4M8 2v4M3 10h18" />
                            </svg>
                            Book Appointment
                        </a>
                        <a href="#doctors"
                            class="btn-ghost inline-flex items-center gap-2.5 border border-gray-200 text-gray-700 font-medium text-sm tracking-wide px-8 py-4 rounded-full bg-white/70 backdrop-blur">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <circle cx="11" cy="11" r="8" />
                                <path d="M21 21l-4.35-4.35" />
                            </svg>
                            Explore Doctors
                        </a>
                    </div>

                    {{-- social proof --}}
                    <div class="a-fadeUp d5 flex items-center gap-5">
                        <div class="flex -space-x-3">
                            @foreach (['3774/3774299', '3774/3774290', '3774/3774278', '3774/3774262'] as $n)
                                <img src="https://cdn-icons-png.flaticon.com/64/{{ $n }}.png"
                                    class="w-9 h-9 rounded-full border-2 border-white object-cover bg-emerald-100 p-0.5">
                            @endforeach
                        </div>
                        <div>
                            <div class="flex text-amber-400 text-xs mb-0.5">★★★★★</div>
                            <p class="text-xs text-gray-400">Trusted by <strong class="text-gray-700">12,000+</strong>
                                patients across Nepal</p>
                        </div>
                    </div>

                </div>

                {{-- RIGHT visual --}}
                <div class="a-fadeLeft d3 hidden lg:flex justify-center items-center relative">

                    {{-- outer glow halo --}}
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div
                            class="w-72 h-72 rounded-full bg-gradient-to-br from-emerald-300 to-teal-400 opacity-20 blur-3xl">
                        </div>
                    </div>

                    {{-- main card --}}
                    <div
                        class="relative z-10 bg-white/80 backdrop-blur-xl border border-white rounded-3xl p-10 shadow-2xl shadow-emerald-900/10">

                        <img src="https://cdn-icons-png.flaticon.com/512/3774/3774299.png"
                            class="float w-64 drop-shadow-xl">

                        {{-- floating info chips --}}
                        <div
                            class="float2 absolute -top-6 -left-8 bg-white rounded-2xl shadow-xl border border-gray-100 px-4 py-3 flex items-center gap-3">
                            <div
                                class="w-9 h-9 rounded-xl bg-emerald-100 flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor"
                                    stroke-width="2" viewBox="0 0 24 24">
                                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" />
                                    <polyline points="22 4 12 14.01 9 11.01" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs font-semibold text-gray-800">Appointment Booked</p>
                                <p class="text-[10px] text-gray-400">2 mins ago</p>
                            </div>
                        </div>

                        <div
                            class="float3 absolute -bottom-6 -right-6 bg-white rounded-2xl shadow-xl border border-gray-100 px-4 py-3">
                            <p class="text-[10px] text-gray-400 mb-1">Next available</p>
                            <p class="text-sm font-semibold text-gray-800">Today, 3:00 PM</p>
                            <div class="mt-1.5 h-1.5 rounded-full bg-emerald-100 overflow-hidden">
                                <div class="h-full w-3/4 bg-emerald-500 rounded-full"></div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            {{-- bottom scroll cue --}}
            <div class="a-fadeIn d6 absolute bottom-8 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2">
                <span class="text-[10px] text-gray-400 tracking-widest uppercase">Scroll</span>
                <div class="w-px h-10 bg-gradient-to-b from-gray-300 to-transparent"></div>
            </div>

        </section>

        {{-- ══════════════════════════════════ STATS STRIP ══════════════════════════════════ --}}
        <section class="bg-gray-900 py-14 overflow-hidden relative">

            <div
                class="pointer-events-none absolute inset-0 bg-[radial-gradient(ellipse_60%_80%_at_80%_50%,rgba(52,211,153,.08)_0%,transparent_65%)]">
            </div>

            <div class="max-w-6xl mx-auto px-6 lg:px-10">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8 md:gap-0 md:divide-x divide-white/10">

                    @php
                        $stats = [
                            ['n' => '50+', 'label' => 'Specialist Doctors'],
                            ['n' => '12k+', 'label' => 'Happy Patients'],
                            ['n' => '98%', 'label' => 'Satisfaction Rate'],
                            ['n' => '24/7', 'label' => 'Available Support'],
                        ];
                    @endphp

                    @foreach ($stats as $i => $s)
                        <div class="reveal text-center {{ $i > 0 ? 'md:px-10' : 'md:pr-10' }}">
                            <div class="stat-num text-white mb-1">{{ $s['n'] }}</div>
                            <div class="text-white/40 text-xs tracking-widest uppercase">{{ $s['label'] }}</div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>

        {{-- ══════════════════════════════════ HOW IT WORKS ══════════════════════════════════ --}}
        <section class="py-28 bg-white relative overflow-hidden">

            <div
                class="pointer-events-none absolute top-0 right-0 w-1/2 h-full bg-[radial-gradient(ellipse_60%_60%_at_100%_50%,rgba(209,250,229,.5)_0%,transparent_70%)]">
            </div>
            <div class="pointer-events-none absolute inset-0 opacity-[.03]"
                style="background-image:radial-gradient(rgba(5,150,105,.8) 1px,transparent 1px);background-size:32px 32px">
            </div>

            <div class="relative max-w-6xl mx-auto px-6 lg:px-10">

                <div class="reveal text-center mb-16">
                    <p class="text-emerald-600 text-[10px] font-medium tracking-[.2em] uppercase mb-3">Simple Process
                    </p>
                    <h2 class="ff-display font-light text-gray-900 leading-tight"
                        style="font-size:clamp(2rem,4vw,3.2rem)">
                        Care in <em class="italic text-emerald-700">three steps</em>
                    </h2>
                </div>

                @php
                    $steps = [
                        [
                            'n' => '01',
                            'icon' => 'M21 21l-4.35-4.35M11 19A8 8 0 1 0 11 3a8 8 0 0 0 0 16z',
                            'title' => 'Find Your Doctor',
                            'sub' =>
                                'Browse our curated list of verified specialists by specialty, rating, and availability.',
                        ],
                        [
                            'n' => '02',
                            'icon' => 'M8 6h13M8 12h13M8 18h13M3 6h.01M3 12h.01M3 18h.01',
                            'title' => 'Check Availability',
                            'sub' =>
                                'View real-time schedules, select a time slot that fits your routine, and confirm instantly.',
                        ],
                        [
                            'n' => '03',
                            'icon' => 'M22 11.08V12a10 10 0 1 1-5.93-9.14M22 4 12 14.01l-3-3',
                            'title' => 'Book & Attend',
                            'sub' =>
                                'Receive an instant confirmation. Show up and experience healthcare that truly cares.',
                        ],
                    ];
                @endphp

                <div class="grid md:grid-cols-3 gap-6 lg:gap-8 relative">

                    {{-- connector line (desktop) --}}
                    <div
                        class="hidden md:block absolute top-12 left-[20%] right-[20%] h-px bg-gradient-to-r from-transparent via-emerald-200 to-transparent">
                    </div>

                    @foreach ($steps as $i => $step)
                        <div class="reveal card-hover relative bg-[#f8fffe] border border-gray-100 rounded-3xl p-8"
                            style="transition-delay:{{ $i * 120 }}ms">

                            {{-- accent bottom bar --}}
                            <div
                                class="card-bar absolute bottom-0 left-0 right-0 h-[3px] bg-gradient-to-r from-emerald-500 to-teal-400 rounded-b-3xl">
                            </div>

                            <div class="flex items-center gap-4 mb-6">
                                <div
                                    class="icon-glow w-12 h-12 rounded-2xl bg-emerald-100 flex items-center justify-center flex-shrink-0">
                                    <svg class="w-5 h-5 text-emerald-700" fill="none" stroke="currentColor"
                                        stroke-width="2" viewBox="0 0 24 24">
                                        <path d="{{ $step['icon'] }}" />
                                    </svg>
                                </div>
                                <span
                                    class="ff-display text-4xl font-light text-gray-100 leading-none select-none">{{ $step['n'] }}</span>
                            </div>

                            <h3 class="font-semibold text-gray-900 mb-2 text-[1rem]">{{ $step['title'] }}</h3>
                            <p class="text-gray-400 text-sm leading-relaxed">{{ $step['sub'] }}</p>

                        </div>
                    @endforeach

                </div>
            </div>
        </section>

        {{-- ══════════════════════════════════ DOCTORS ══════════════════════════════════ --}}
        <section id="doctors" class="py-28 bg-[#f8fffe] relative">

            <div class="pointer-events-none absolute inset-0 opacity-[.03]"
                style="background-image:radial-gradient(rgba(5,150,105,.8) 1px,transparent 1px);background-size:28px 28px">
            </div>

            <div class="relative max-w-7xl mx-auto px-6 lg:px-10">

                {{-- header --}}
                <div class="reveal flex flex-col sm:flex-row sm:items-end justify-between gap-6 mb-14">
                    <div>
                        <p class="text-emerald-600 text-[10px] font-medium tracking-[.2em] uppercase mb-3">Our
                            Specialists</p>
                        <h2 class="ff-display font-light text-gray-900 leading-tight"
                            style="font-size:clamp(2rem,4vw,3.2rem)">
                            Meet our <em class="italic text-emerald-700">doctors</em>
                        </h2>
                    </div>
                    <a href="/doctors"
                        class="btn-ghost inline-flex items-center gap-2 border border-gray-200 text-gray-600 text-sm font-medium px-6 py-3 rounded-full self-start sm:self-auto">
                        View All
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path d="M5 12h14M12 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>


                {{-- ************* search doctors **************** --}}
                <div class="mb-14">
                    <p class="text-emerald-600 text-[10px] font-medium tracking-[.2em] uppercase mb-3">Find your
                        specialist</p>

                    <form action="{{ route('home') }}" method="GET"
                        class="bg-gradient-to-br from-emerald-50 to-teal-50 border border-emerald-100 rounded-2xl p-7">

                        {{-- inputs row --}}
                        <div class="flex flex-col sm:flex-row gap-3">

                            {{-- name search --}}
                            <div class="relative flex-[2]">
                                <svg class="pointer-events-none absolute left-3.5 top-1/2 -translate-y-1/2 w-4 h-4 text-emerald-300"
                                    fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <circle cx="11" cy="11" r="8" />
                                    <path d="M21 21l-4.35-4.35" />
                                </svg>
                                <input type="text" name="name" placeholder="Search doctor by name…"
                                    class="w-full h-12 pl-10 pr-4 rounded-xl border border-emerald-200 bg-white
                      text-sm text-emerald-900 placeholder-emerald-300
                      focus:outline-none focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/10
                      transition">
                            </div>

                            {{-- specialization select --}}
                            <div class="relative flex-1">
                                <svg class="pointer-events-none absolute left-3.5 top-1/2 -translate-y-1/2 w-4 h-4 text-emerald-300"
                                    fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path d="M12 2a10 10 0 1 0 0 20A10 10 0 0 0 12 2zm0 0v4m0 14v-4M2 12h4m14 0h-4" />
                                </svg>
                                <select name="specialization"
                                    class="w-full h-12 pl-10 pr-9 appearance-none rounded-xl border border-emerald-200 bg-white
                       text-sm text-emerald-900
                       focus:outline-none focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/10
                       transition cursor-pointer">
                                    <option value="">All Specializations</option>
                                    @foreach ($doctors as $doctor)
                                        <option value="{{ $doctor->doctor->specialization }}">
                                            {{ $doctor->doctor->specialization }}</option>
                                    @endforeach
                                </select>
                                <svg class="pointer-events-none absolute right-3 top-1/2 -translate-y-1/2 w-3.5 h-3.5 text-emerald-300"
                                    fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                    <path d="M6 9l6 6 6-6" />
                                </svg>
                            </div>

                            {{-- submit --}}
                            <button type="submit"
                                class="h-12 px-7 bg-emerald-600 hover:bg-emerald-700 active:scale-95
                     text-white text-sm font-medium rounded-xl
                     inline-flex items-center gap-2 transition whitespace-nowrap">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5"
                                    viewBox="0 0 24 24">
                                    <circle cx="11" cy="11" r="8" />
                                    <path d="M21 21l-4.35-4.35" />
                                </svg>
                                Search
                            </button>

                        </div>

                        {{-- quick filter tags --}}
                        <div class="flex flex-wrap items-center gap-2 mt-4">
                            <span class="text-[10px] text-emerald-400 uppercase tracking-widest">Popular:</span>
                            @foreach (['Cardiologist', 'Neurologist', 'Dermatologist', 'Pediatrician'] as $tag)
                                <a href="?specialization={{ $tag }}"
                                    class="inline-flex items-center gap-1.5 px-3 py-1 bg-white border border-emerald-100
                  text-emerald-700 text-xs rounded-full hover:bg-emerald-50 transition">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
                                    {{ $tag }}
                                </a>
                            @endforeach
                        </div>

                    </form>
                </div>

                {{-- cards --}}
                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">

                    @foreach ($doctors as $i => $doctor)
                        @if ($doctor->doctor)
                            <div class="reveal card-hover group relative bg-white border border-gray-100 rounded-3xl overflow-hidden shadow-sm"
                                style="transition-delay:{{ $i * 100 }}ms">

                                {{-- top teal band --}}
                                <div class="h-2 bg-gradient-to-r from-emerald-500 to-teal-400"></div>

                                <div class="p-7">

                                    {{-- doctor identity --}}
                                    <div class="flex items-center gap-4 mb-6">

                                        <div class="relative flex-shrink-0">
                                            <img src="{{ asset($doctor->doctor?->profile_image) }}"
                                                alt="{{ $doctor->name }}"
                                                class="w-16 h-16 rounded-2xl object-cover border-2 border-emerald-100">
                                            {{-- status dot --}}
                                            @if ($doctor->doctor?->status === 'active')
                                                <span
                                                    class="pulse absolute -bottom-1 -right-1 w-4 h-4 rounded-full bg-emerald-400 border-2 border-white flex-shrink-0"></span>
                                            @endif
                                        </div>

                                        <div class="min-w-0">
                                            <h3 class="font-semibold text-gray-900 truncate">{{ $doctor->name }}</h3>
                                            <p class="text-xs text-emerald-600 font-medium mt-0.5">
                                                {{ $doctor->doctor?->specialization }}</p>
                                            <div class="flex text-amber-400 text-[10px] mt-1">★★★★★</div>
                                        </div>

                                    </div>

                                    {{-- divider --}}
                                    <div class="h-px bg-gray-100 mb-5"></div>

                                    {{-- meta info --}}
                                    <div class="grid grid-cols-2 gap-3 mb-6">
                                        <div class="bg-gray-50 rounded-xl p-3">
                                            <p class="text-[10px] text-gray-400 uppercase tracking-wider mb-1">
                                                Experience</p>
                                            <p class="font-semibold text-gray-800 text-sm">
                                                {{ $doctor->doctor?->experience_years }} yrs</p>
                                        </div>
                                        <div class="bg-gray-50 rounded-xl p-3">
                                            <p class="text-[10px] text-gray-400 uppercase tracking-wider mb-1">Patients
                                            </p>
                                            <p class="font-semibold text-gray-800 text-sm">1.2k+</p>
                                        </div>
                                    </div>

                                    {{-- status + book --}}
                                    <div class="flex items-center justify-between">
                                        <span
                                            class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-emerald-50 border border-emerald-100 text-emerald-700 text-[10px] font-medium tracking-wide uppercase rounded-full">
                                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                            {{ $doctor->doctor?->status ?? 'Available' }}
                                        </span>
                                        <a href="{{ route('doctor_profile', $doctor->doctor?->id) }}"
                                            class="btn-primary inline-flex items-center gap-1.5 bg-emerald-600 text-white text-xs font-semibold px-5 py-2.5 rounded-xl">
                                            Book Now
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor"
                                                stroke-width="2.5" viewBox="0 0 24 24">
                                                <path d="M5 12h14M12 5l7 7-7 7" />
                                            </svg>
                                        </a>
                                    </div>

                                </div>

                                {{-- bottom accent bar (hover reveal) --}}
                                <div
                                    class="card-bar absolute bottom-0 left-0 right-0 h-[3px] bg-gradient-to-r from-emerald-500 to-teal-400">
                                </div>

                            </div>
                        @endif
                    @endforeach

                </div>
            </div>
        </section>

        {{-- ══════════════════════════════════ TRUST MARQUEE ══════════════════════════════════ --}}
        <section class="py-14 bg-white border-y border-gray-100 overflow-hidden">
            <p class="reveal text-center text-[10px] text-gray-300 tracking-[.25em] uppercase mb-8">Trusted by leading
                clinics &amp; hospitals</p>
            <div class="marquee-inner select-none">
                @php
                    $partners = [
                        'Norvic Hospital',
                        'Grande Hospital',
                        'B&B Hospital',
                        'Bir Hospital',
                        'Teaching Hospital',
                        'HAMS Hospital',
                        'Star Hospital',
                        'Norvic Hospital',
                        'Grande Hospital',
                        'B&B Hospital',
                        'Bir Hospital',
                        'Teaching Hospital',
                        'HAMS Hospital',
                        'Star Hospital',
                    ];
                @endphp
                @foreach ($partners as $p)
                    <span
                        class="mx-10 text-gray-300 font-medium text-sm tracking-wide whitespace-nowrap">{{ $p }}</span>
                @endforeach
            </div>
        </section>

        {{-- ══════════════════════════════════ FEATURES ═════════════════════════════════ --}}
        <section class="py-28 bg-[#f8fffe] relative overflow-hidden">

            <div
                class="pointer-events-none absolute -left-32 top-1/2 -translate-y-1/2 w-72 h-72 rounded-full bg-emerald-100 opacity-60 blur-3xl float">
            </div>

            <div class="relative max-w-6xl mx-auto px-6 lg:px-10">

                <div class="reveal-l text-center mb-16">
                    <p class="text-emerald-600 text-[10px] font-medium tracking-[.2em] uppercase mb-3">Why Mediverse
                    </p>
                    <h2 class="ff-display font-light text-gray-900 leading-tight"
                        style="font-size:clamp(2rem,4vw,3.2rem)">
                        Built for <em class="italic text-emerald-700">modern healthcare</em>
                    </h2>
                </div>

                @php
                    $features = [
                        [
                            'icon' => 'M13 10V3L4 14h7v7l9-11h-7z',
                            'title' => 'Instant Booking',
                            'desc' => 'Lock in your slot in under 60 seconds — no phone calls, no waiting.',
                        ],
                        [
                            'icon' =>
                                'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0 1 12 2.944a11.955 11.955 0 0 1-8.618 3.04A12.02 12.02 0 0 0 3 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z',
                            'title' => 'Verified Specialists',
                            'desc' =>
                                'Every doctor on our platform is verified, board-certified, and regularly reviewed.',
                        ],
                        [
                            'icon' =>
                                'M15 17h5l-1.405-1.405A2.032 2.032 0 0 1 18 14.158V11a6.002 6.002 0 0 0-4-5.659V5a2 2 0 1 0-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 1 1-6 0v-1m6 0H9',
                            'title' => 'Smart Reminders',
                            'desc' => 'Automated SMS and email reminders so you never miss an appointment again.',
                        ],
                        [
                            'icon' =>
                                'M9 5H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2M9 5a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2M9 5a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2',
                            'title' => 'Digital Records',
                            'desc' =>
                                'All your medical history, prescriptions, and notes stored securely in one place.',
                        ],
                        [
                            'icon' => 'M12 8v4l3 3m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0z',
                            'title' => 'Real-time Availability',
                            'desc' => 'Live slot updates so you always see exactly when your doctor is free.',
                        ],
                        [
                            'icon' =>
                                'M4.318 6.318a4.5 4.5 0 0 0 0 6.364L12 20.364l7.682-7.682a4.5 4.5 0 0 0-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 0 0-6.364 0z',
                            'title' => 'Patient-First Design',
                            'desc' => 'Every interaction crafted around your comfort, privacy, and peace of mind.',
                        ],
                    ];
                @endphp

                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5">
                    @foreach ($features as $i => $f)
                        <div class="reveal card-hover group bg-white border border-gray-100 rounded-2xl p-7 relative overflow-hidden"
                            style="transition-delay:{{ $i * 80 }}ms">

                            <div
                                class="card-bar absolute bottom-0 left-0 right-0 h-[2px] bg-gradient-to-r from-emerald-500 to-teal-400">
                            </div>

                            <div
                                class="icon-glow w-11 h-11 rounded-xl bg-emerald-50 flex items-center justify-center mb-5">
                                <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor"
                                    stroke-width="1.75" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="{{ $f['icon'] }}" />
                                </svg>
                            </div>

                            <h3 class="font-semibold text-gray-900 mb-2 text-[.95rem]">{{ $f['title'] }}</h3>
                            <p class="text-gray-400 text-sm leading-relaxed">{{ $f['desc'] }}</p>

                        </div>
                    @endforeach
                </div>

            </div>
        </section>

        {{-- ══════════════════════════════════ TESTIMONIALS ══════════════════════════════════ --}}
        <section class="bg-gray-900 py-28 relative overflow-hidden">

            <div
                class="pointer-events-none absolute inset-0 bg-[radial-gradient(ellipse_55%_65%_at_15%_50%,rgba(52,211,153,.09)_0%,transparent_65%)]">
            </div>
            <div class="pointer-events-none absolute inset-0 opacity-[.03]"
                style="background-image:radial-gradient(rgba(255,255,255,.7) 1px,transparent 1px);background-size:28px 28px">
            </div>

            <div class="relative max-w-6xl mx-auto px-6 lg:px-10">

                <div class="reveal text-center mb-14">
                    <p class="text-emerald-400 text-[10px] font-medium tracking-[.2em] uppercase mb-3">Patient Stories
                    </p>
                    <h2 class="ff-display font-light text-white leading-tight"
                        style="font-size:clamp(2rem,4vw,3.2rem)">
                        Heard from our <em class="italic text-emerald-400">patients</em>
                    </h2>
                </div>

                @php
                    $testimonials = [
                        [
                            'name' => 'Priya Sharma',
                            'role' => 'Kathmandu',
                            'text' =>
                                'Booking was seamless. Found a cardiologist, picked a slot, and got confirmed in under 3 minutes. Genuinely remarkable.',
                            'stars' => 5,
                        ],
                        [
                            'name' => 'Rohan Thapa',
                            'role' => 'Lalitpur',
                            'text' =>
                                'I was skeptical at first, but Mediverse completely changed how I think about doctor appointments. Zero hassle.',
                            'stars' => 5,
                        ],
                        [
                            'name' => 'Anita Gurung',
                            'role' => 'Pokhara',
                            'text' =>
                                'The reminder system is a lifesaver. I never forget appointments anymore and my health has genuinely improved.',
                            'stars' => 5,
                        ],
                    ];
                @endphp

                <div class="grid md:grid-cols-3 gap-6">
                    @foreach ($testimonials as $i => $t)
                        <div class="reveal group bg-white/[.04] border border-white/[.08] rounded-3xl p-8 hover:bg-white/[.07] transition-colors duration-300"
                            style="transition-delay:{{ $i * 120 }}ms">

                            {{-- quote mark --}}
                            <div
                                class="ff-display text-6xl font-light text-emerald-400/20 leading-none mb-3 select-none">
                                "</div>

                            <p class="text-white/70 text-sm leading-relaxed mb-8">{{ $t['text'] }}</p>

                            <div class="flex items-center gap-3 pt-4 border-t border-white/[.08]">
                                <div
                                    class="w-9 h-9 rounded-full bg-emerald-800 flex items-center justify-center flex-shrink-0">
                                    <span
                                        class="text-emerald-300 text-sm font-semibold">{{ substr($t['name'], 0, 1) }}</span>
                                </div>
                                <div>
                                    <p class="text-white text-sm font-medium">{{ $t['name'] }}</p>
                                    <p class="text-white/30 text-xs">{{ $t['role'] }}</p>
                                </div>
                                <div class="ml-auto flex text-amber-400 text-xs">
                                    @for ($s = 0; $s < $t['stars']; $s++)
                                        ★
                                    @endfor
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>

            </div>
        </section>

        {{-- ══════════════════════════════════ CTA ══════════════════════════════════ --}}
        <section class="relative py-36 overflow-hidden">

            {{-- rich layered background --}}
            <div
                class="pointer-events-none absolute inset-0 bg-gradient-to-br from-emerald-50 via-[#f0fdf4] to-teal-50">
            </div>
            <div
                class="pointer-events-none absolute inset-0 bg-[radial-gradient(circle_at_20%_50%,rgba(52,211,153,.12)_0%,transparent_50%),radial-gradient(circle_at_80%_30%,rgba(5,150,105,.09)_0%,transparent_45%)]">
            </div>
            <div class="pointer-events-none absolute inset-0 opacity-[.04]"
                style="background-image:radial-gradient(rgba(5,150,105,.9) 1px,transparent 1px);background-size:28px 28px">
            </div>

            {{-- decorative arc --}}
            <div
                class="float pointer-events-none absolute top-10 right-1/4 w-56 h-56 rounded-full border-2 border-dashed border-emerald-300/25">
            </div>
            <div
                class="float2 pointer-events-none absolute bottom-10 left-1/3 w-36 h-36 rounded-full border border-dotted border-emerald-400/20">
            </div>

            <div class="relative max-w-2xl mx-auto px-6 text-center">
                <div class="reveal">

                    <p class="text-emerald-600 text-[10px] font-medium tracking-[.2em] uppercase mb-5">Get Started
                        Today</p>

                    <h2 class="ff-display font-light text-gray-900 leading-[1.05] mb-6"
                        style="font-size:clamp(2.8rem,6vw,5rem)">
                        Your health journey<br>starts <em class="italic shimmer">right now.</em>
                    </h2>

                    <div
                        class="w-14 h-[1.5px] bg-gradient-to-r from-emerald-500 to-teal-400 mx-auto rounded-full mb-8">
                    </div>

                    <p class="text-gray-400 text-sm leading-relaxed max-w-[44ch] mx-auto mb-10">
                        Join thousands of patients who have already transformed their healthcare experience. Sign up
                        free — no credit card required.
                    </p>

                    <div class="flex flex-wrap items-center justify-center gap-4">
                        <a href="/register"
                            class="btn-primary inline-flex items-center gap-2.5 bg-emerald-600 text-white font-semibold text-sm tracking-wide px-9 py-4 rounded-full shadow-lg">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                                <circle cx="9" cy="7" r="4" />
                                <path d="M22 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75" />
                            </svg>
                            Create Free Account
                        </a>
                        <a href="#doctors"
                            class="btn-ghost inline-flex items-center gap-2 border border-gray-200 text-gray-600 text-sm font-medium px-8 py-4 rounded-full">
                            Browse Doctors
                        </a>
                    </div>

                    {{-- mini trust badges --}}
                    <div class="flex flex-wrap items-center justify-center gap-6 mt-12 text-xs text-gray-400">
                        <span class="flex items-center gap-1.5">
                            <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor"
                                stroke-width="2" viewBox="0 0 24 24">
                                <path
                                    d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0 1 12 2.944a11.955 11.955 0 0 1-8.618 3.04A12.02 12.02 0 0 0 3 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                            HIPAA Compliant
                        </span>
                        <span class="flex items-center gap-1.5">
                            <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor"
                                stroke-width="2" viewBox="0 0 24 24">
                                <rect x="3" y="11" width="18" height="11" rx="2" />
                                <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                            </svg>
                            Secure & Private
                        </span>
                        <span class="flex items-center gap-1.5">
                            <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor"
                                stroke-width="2" viewBox="0 0 24 24">
                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                            </svg>
                            100% Free to Join
                        </span>
                    </div>

                </div>
            </div>
        </section>

    </div>

    <script>
        // Scroll reveal
        const observer = new IntersectionObserver(entries => {
            entries.forEach(e => {
                if (e.isIntersecting) {
                    e.target.classList.add('in');
                    observer.unobserve(e.target);
                }
            });
        }, {
            threshold: 0.1
        });

        document.querySelectorAll('.reveal, .reveal-l, .reveal-r').forEach(el => observer.observe(el));
    </script>

</x-layout.frontend>
