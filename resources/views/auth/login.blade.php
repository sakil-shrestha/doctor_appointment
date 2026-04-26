<x-layout.frontend>

<link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,200;0,9..144,300;1,9..144,200;1,9..144,300&family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,500;9..40,600&display=swap" rel="stylesheet">

<style>
    .ff { font-family: 'Fraunces', serif }
    .dm { font-family: 'DM Sans', sans-serif }

    /* ── keyframes ── */
    @keyframes fadeUp    { from { opacity:0; transform:translateY(28px) } to { opacity:1; transform:none } }
    @keyframes fadeIn    { from { opacity:0 } to { opacity:1 } }
    @keyframes scaleIn   { from { opacity:0; transform:scale(.95) } to { opacity:1; transform:scale(1) } }
    @keyframes slideUp   { from { opacity:0; transform:translateY(18px) } to { opacity:1; transform:none } }
    @keyframes shimmer   { 0% { background-position:-300% center } 100% { background-position:300% center } }
    @keyframes pulseDot  { 0%,100% { opacity:1; transform:scale(1) } 50% { opacity:.35; transform:scale(1.7) } }
    @keyframes floatOrb  { 0%,100% { transform:translateY(0) scale(1) } 50% { transform:translateY(-22px) scale(1.04) } }
    @keyframes spinRing  { from { transform:rotate(0deg) } to { transform:rotate(360deg) } }
    @keyframes lineSlide { from { width:0; opacity:0 } to { width:3rem; opacity:1 } }
    @keyframes cardIn    { from { opacity:0; transform:translateY(32px) scale(.97) } to { opacity:1; transform:none } }

    /* ── animation utilities ── */
    .a-fadeUp  { animation: fadeUp  .75s cubic-bezier(.22,1,.36,1) both }
    .a-fadeIn  { animation: fadeIn  .9s  ease both }
    .a-scaleIn { animation: scaleIn .8s  cubic-bezier(.22,1,.36,1) both }
    .a-cardIn  { animation: cardIn  .85s cubic-bezier(.22,1,.36,1) both }

    .d1  { animation-delay:.05s } .d2  { animation-delay:.14s }
    .d3  { animation-delay:.25s } .d4  { animation-delay:.37s }
    .d5  { animation-delay:.51s } .d6  { animation-delay:.66s }
    .d7  { animation-delay:.82s } .d8  { animation-delay:.98s }

    .float-orb  { animation: floatOrb 9s  ease-in-out infinite }
    .float-orb2 { animation: floatOrb 13s ease-in-out infinite reverse }
    .float-orb3 { animation: floatOrb 11s ease-in-out infinite .6s }
    .spin-ring  { animation: spinRing 26s linear infinite }
    .spin-ring2 { animation: spinRing 20s linear infinite reverse }
    .pulse-dot  { animation: pulseDot 2s  ease-in-out infinite }
    .line-slide { animation: lineSlide .55s .8s cubic-bezier(.22,1,.36,1) both }

    /* shimmer headline */
    .shimmer-text {
        background: linear-gradient(90deg, #065f46, #059669, #34d399, #6ee7b7, #34d399, #059669, #065f46);
        background-size: 300% auto;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        animation: shimmer 5s linear infinite;
    }

    /* ── form inputs ── */
    .field {
        width: 100%;
        font-family: 'DM Sans', sans-serif;
        font-size: .9rem;
        color: #111827;
        background: #f8fffe;
        border: 1.5px solid #e5e7eb;
        border-radius: 14px;
        padding: .88rem 1rem .88rem 2.9rem;
        outline: none;
        transition: border-color .2s, box-shadow .2s, background .2s;
    }
    .field::placeholder { color: #9ca3af }
    .field:focus {
        border-color: #059669;
        background: #fff;
        box-shadow: 0 0 0 4px rgba(5,150,105,.1);
    }
    .field-error { border-color: #ef4444 !important; background: #fff5f5 !important }
    .field-error:focus { box-shadow: 0 0 0 4px rgba(239,68,68,.1) !important }

    /* ── checkbox ── */
    .custom-check {
        appearance: none;
        width: 18px; height: 18px;
        border-radius: 6px;
        border: 1.5px solid #d1d5db;
        background: #f8fffe;
        cursor: pointer;
        flex-shrink: 0;
        transition: all .2s;
    }
    .custom-check:checked {
        background: #059669;
        border-color: #059669;
        background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 16 16' fill='white' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M12.207 4.793a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0l-2-2a1 1 0 011.414-1.414L6.5 9.086l4.293-4.293a1 1 0 011.414 0z'/%3E%3C/svg%3E");
    }

    /* ── submit button ── */
    .btn-signin {
        width: 100%;
        display: flex; align-items: center; justify-content: center; gap: .6rem;
        background: #059669; color: #fff;
        font-family: 'DM Sans', sans-serif; font-size: .9rem; font-weight: 600;
        letter-spacing: .02em;
        padding: .95rem 1rem;
        border: none; border-radius: 14px; cursor: pointer;
        transition: all .28s cubic-bezier(.22,1,.36,1);
    }
    .btn-signin:hover {
        background: #047857;
        transform: translateY(-2px);
        box-shadow: 0 14px 36px rgba(5,150,105,.32);
    }
    .btn-signin:active { transform: translateY(0) }
    .btn-signin:disabled { opacity: .7; cursor: not-allowed; transform: none }

    /* ── social buttons ── */
    .btn-social {
        display: flex; align-items: center; justify-content: center; gap: .55rem;
        border: 1.5px solid #e5e7eb; border-radius: 13px;
        padding: .75rem 1rem;
        font-family: 'DM Sans', sans-serif; font-size: .85rem; font-weight: 500;
        color: #4b5563; background: #fff;
        cursor: pointer;
        transition: all .22s ease;
    }
    .btn-social:hover { border-color: #d1d5db; background: #f9fafb; transform: translateY(-1px) }

    /* ── info chip on left panel ── */
    .info-chip {
        display: flex; align-items: center; gap: .75rem;
        background: rgba(255,255,255,.07);
        border: 1px solid rgba(255,255,255,.11);
        border-radius: 14px;
        padding: .85rem 1.1rem;
        backdrop-filter: blur(12px);
    }

    /* pw toggle */
    .pw-btn { cursor: pointer; color: #9ca3af; transition: color .2s }
    .pw-btn:hover { color: #059669 }
</style>


{{-- ══════════════════════════════════════════════════════
     LOGIN SECTION — sits between navbar & footer
     pt-20 clears the fixed navbar height (80px / 5rem)
     ══════════════════════════════════════════════════════ --}}
<section class="relative min-h-screen pt-20 pb-16 flex items-center justify-center overflow-hidden">

    {{-- extra atmospheric orbs (on top of layout's blobs) --}}
    <div class="float-orb  pointer-events-none absolute top-24  left-[5%]   w-72 h-72 rounded-full bg-emerald-300 opacity-20 blur-3xl"></div>
    <div class="float-orb2 pointer-events-none absolute bottom-16 right-[6%]  w-80 h-80 rounded-full bg-teal-200   opacity-25 blur-3xl"></div>
    <div class="float-orb3 pointer-events-none absolute top-1/2  left-1/2    w-52 h-52 rounded-full bg-green-200  opacity-20 blur-2xl -translate-x-1/2 -translate-y-1/2"></div>

    {{-- spinning decorative rings --}}
    <div class="spin-ring  pointer-events-none absolute left-[38%] top-1/2 -translate-y-1/2 w-[700px] h-[700px] rounded-full border border-dashed  border-emerald-300/20 hidden lg:block"></div>
    <div class="spin-ring2 pointer-events-none absolute left-[40%] top-1/2 -translate-y-1/2 w-[520px] h-[520px] rounded-full border border-dotted border-emerald-400/15 hidden lg:block"></div>

    {{-- dot-grid texture --}}
    <div class="pointer-events-none absolute inset-0 opacity-[.04]"
         style="background-image:radial-gradient(rgba(5,150,105,.9) 1px,transparent 1px);background-size:28px 28px"></div>


    <div class="relative z-10 w-full max-w-6xl mx-auto px-6 lg:px-10 flex items-center gap-16 lg:gap-24">

        {{-- ════════════ LEFT — brand storytelling ════════════ --}}
        <div class="hidden lg:flex flex-col flex-1 max-w-lg">

            {{-- logo badge --}}
            <div class="a-fadeUp d1 inline-flex items-center gap-3 mb-10 w-fit">
                <div class="w-10 h-10 rounded-2xl bg-emerald-600 flex items-center justify-center shadow-lg shadow-emerald-900/20">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/>
                    </svg>
                </div>
                <span class="text-gray-800 font-semibold text-lg tracking-wide dm">Mediverse</span>
            </div>

            {{-- headline --}}
            <div class="mb-3">
                <h2 class="a-fadeUp d2 ff font-light text-gray-900 leading-[1.06]"
                    style="font-size:clamp(2.6rem,3.8vw,3.8rem)">
                    Care that<br>remembers
                    <em class="italic shimmer-text">you.</em>
                </h2>
                <div class="line-slide h-[2px] bg-gradient-to-r from-emerald-500 to-teal-400 rounded-full mt-4"></div>
            </div>

            <p class="a-fadeUp d3 dm text-gray-400 text-[.93rem] leading-[1.85] max-w-[38ch] mb-10">
                Sign back in to manage appointments, view your health records, and stay connected with your specialist doctors — all in one place.
            </p>

            {{-- feature chips --}}
            <div class="space-y-3">
                @php
                    $chips = [
                        ['icon'=>'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0 1 12 2.944a11.955 11.955 0 0 1-8.618 3.04A12.02 12.02 0 0 0 3 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z',
                         'label' => 'Verified specialist doctors across Nepal'],
                        ['icon'=>'M12 8v4l3 3m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0z',
                         'label' => 'Real-time slot availability & instant booking'],
                        ['icon'=>'M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 0 0 3-3V8a3 3 0 0 0-3-3H6a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3z',
                         'label' => 'Digital health records & prescriptions'],
                    ];
                @endphp

                @foreach($chips as $i => $chip)
                <div class="a-fadeUp info-chip" style="animation-delay:{{ .42 + $i * .13 }}s">
                    <div class="w-9 h-9 rounded-xl bg-emerald-100 flex items-center justify-center flex-shrink-0">
                        <svg class="w-4 h-4 text-emerald-700" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="{{ $chip['icon'] }}"/>
                        </svg>
                    </div>
                    <span class="dm text-gray-600 text-sm">{{ $chip['label'] }}</span>
                </div>
                @endforeach
            </div>

            {{-- social proof --}}
            <div class="a-fadeUp d7 flex items-center gap-4 mt-10 pt-8 border-t border-gray-100">
                <div class="flex -space-x-3">
                    @foreach(['3774/3774299','3774/3774290','3774/3774278','3774/3774262'] as $ic)
                    <img src="https://cdn-icons-png.flaticon.com/48/{{ $ic }}.png"
                         class="w-9 h-9 rounded-full border-2 border-white bg-emerald-100 p-0.5 object-cover">
                    @endforeach
                </div>
                <div>
                    <div class="flex text-amber-400 text-xs mb-0.5">★★★★★</div>
                    <p class="dm text-xs text-gray-400">
                        Trusted by <span class="text-gray-700 font-semibold">12,000+</span> patients
                    </p>
                </div>
                <div class="ml-auto flex items-center gap-1.5">
                    <span class="pulse-dot inline-block w-2 h-2 rounded-full bg-emerald-500 flex-shrink-0"></span>
                    <span class="dm text-[10px] text-emerald-600 font-medium tracking-wide uppercase">Live</span>
                </div>
            </div>

        </div>


        {{-- ════════════ RIGHT — form card ════════════ --}}
        <div class="a-cardIn flex-1 w-full max-w-[440px] mx-auto lg:mx-0">

            <div class="bg-white rounded-3xl shadow-2xl shadow-gray-200/70 border border-gray-100/80 p-8 lg:p-9">

                {{-- card header --}}
                <div class="mb-7">
                    <h1 class="a-fadeUp d1 ff font-light text-gray-900 leading-tight mb-2"
                        style="font-size:1.95rem">
                        Welcome <em class="italic text-emerald-700">back</em>
                    </h1>
                    <p class="a-fadeUp d2 dm text-gray-400 text-sm">
                        No account yet?
                        <a href="/register"
                           class="text-emerald-600 font-medium hover:text-emerald-700 transition-colors underline-offset-2 hover:underline">
                            Create one free
                        </a>
                    </p>
                </div>

                {{-- ── validation errors ── --}}
                @if ($errors->any())
                <div class="a-fadeUp mb-5 flex items-start gap-3 bg-red-50 border border-red-100 rounded-2xl p-4">
                    <svg class="w-5 h-5 text-red-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/>
                    </svg>
                    <div class="space-y-0.5">
                        @foreach ($errors->all() as $error)
                            <p class="dm text-red-600 text-sm">{{ $error }}</p>
                        @endforeach
                    </div>
                </div>
                @endif

                {{-- ── session status (password reset etc.) ── --}}
                @if (session('status'))
                <div class="a-fadeUp mb-5 flex items-center gap-3 bg-emerald-50 border border-emerald-100 rounded-2xl p-4">
                    <svg class="w-5 h-5 text-emerald-500 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M9 12l2 2 4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0z"/>
                    </svg>
                    <p class="dm text-emerald-700 text-sm">{{ session('status') }}</p>
                </div>
                @endif

                {{-- ── THE FORM ── --}}
                <form method="POST" action="{{ route('login') }}" id="loginForm" novalidate>
                    @csrf

                    {{-- Email --}}
                    <div class="a-fadeUp d3 mb-5">
                        <label for="email"
                               class="block dm text-[11px] font-semibold text-gray-500 tracking-[.1em] uppercase mb-2">
                            Email Address
                        </label>
                        <div class="relative">
                            <span class="absolute left-3.5 top-1/2 -translate-y-1/2 pointer-events-none text-gray-400">
                                <svg style="width:17px;height:17px" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24">
                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                                    <polyline points="22,6 12,12 2,6"/>
                                </svg>
                            </span>
                            <input
                                type="email"
                                id="email"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="you@example.com"
                                autocomplete="email"
                                required
                                class="field {{ $errors->has('email') ? 'field-error' : '' }}"
                            />
                        </div>
                        @error('email')
                            <p class="dm text-red-500 text-xs mt-1.5 ml-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div class="a-fadeUp d4 mb-5">
                        <div class="flex items-center justify-between mb-2">
                            <label for="password"
                                   class="block dm text-[11px] font-semibold text-gray-500 tracking-[.1em] uppercase">
                                Password
                            </label>
                            @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}"
                               class="dm text-xs text-emerald-600 font-medium hover:text-emerald-700 transition-colors">
                                Forgot password?
                            </a>
                            @endif
                        </div>
                        <div class="relative">
                            <span class="absolute left-3.5 top-1/2 -translate-y-1/2 pointer-events-none text-gray-400">
                                <svg style="width:17px;height:17px" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24">
                                    <rect x="3" y="11" width="18" height="11" rx="2"/>
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                                </svg>
                            </span>
                            <input
                                type="password"
                                id="password"
                                name="password"
                                placeholder="Enter your password"
                                autocomplete="current-password"
                                required
                                class="field pr-12 {{ $errors->has('password') ? 'field-error' : '' }}"
                            />
                            <button type="button" id="pwToggle"
                                    class="pw-btn absolute right-3.5 top-1/2 -translate-y-1/2"
                                    aria-label="Toggle password">
                                <svg id="eyeIcon" style="width:17px;height:17px" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                                    <circle cx="12" cy="12" r="3"/>
                                </svg>
                            </button>
                        </div>
                        @error('password')
                            <p class="dm text-red-500 text-xs mt-1.5 ml-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Remember me --}}
                    <div class="a-fadeUp d5 flex items-center gap-2.5 mb-7">
                        <input type="checkbox" id="remember" name="remember" class="custom-check">
                        <label for="remember" class="dm text-sm text-gray-500 cursor-pointer select-none">
                            Keep me signed in for 30 days
                        </label>
                    </div>

                    {{-- Submit --}}
                    <div class="a-fadeUp d6">
                        <button type="submit" class="btn-signin" id="submitBtn">
                            <svg style="width:17px;height:17px" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4M10 17l5-5-5-5M15 12H3"/>
                            </svg>
                            <span id="btnLabel">Sign In to Mediverse</span>
                        </button>
                    </div>

                </form>

                {{-- Divider --}}
                <div class="a-fadeUp d7 flex items-center gap-3 my-6">
                    <div class="flex-1 h-px bg-gray-100"></div>
                    <span class="dm text-gray-300 text-xs tracking-wide">or continue with</span>
                    <div class="flex-1 h-px bg-gray-100"></div>
                </div>

                {{-- Social buttons --}}
                <div class="a-fadeUp d8 grid grid-cols-2 gap-3">
                    <a href="{{ route('google.redirect') }}" class="btn-social">
                        <svg class="w-4 h-4" viewBox="0 0 24 24">
                            <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                            <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                            <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                            <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                        </svg>
                        <span class="dm">Google</span>
                    </a>
                    <button type="button" class="btn-social">
                        <svg class="w-4 h-4 text-gray-700" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0 0 24 12c0-6.63-5.37-12-12-12z"/>
                        </svg>
                        <span class="dm">GitHub</span>
                    </button>
                </div>

            </div>

            {{-- Register nudge --}}
            <p class="a-fadeUp d8 dm text-center text-sm text-gray-400 mt-6">
                Don't have an account?
                <a href="/register"
                   class="text-emerald-600 font-semibold hover:text-emerald-700 transition-colors">
                    Sign up free →
                </a>
            </p>

        </div>
        {{-- end right --}}

    </div>
    {{-- end two-col --}}

</section>

<script>
    // ── Password show / hide ──
    const pwInput  = document.getElementById('password');
    const pwToggle = document.getElementById('pwToggle');
    const eyeIcon  = document.getElementById('eyeIcon');

    const pathOpen   = `<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>`;
    const pathClosed = `<path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94"/><path d="M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19"/><line x1="1" y1="1" x2="23" y2="23"/>`;

    pwToggle.addEventListener('click', () => {
        const hidden = pwInput.type === 'password';
        pwInput.type = hidden ? 'text' : 'password';
        eyeIcon.innerHTML = hidden ? pathClosed : pathOpen;
    });

    // ── Submit loading state ──
    document.getElementById('loginForm').addEventListener('submit', function () {
        const btn   = document.getElementById('submitBtn');
        const label = document.getElementById('btnLabel');
        btn.disabled = true;
        label.textContent = 'Signing in…';
    });
</script>

</x-layout.frontend>
