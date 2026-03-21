<x-layout.frontend>

<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400;1,600&family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,500&display=swap" rel="stylesheet">

<style>
  .font-cormorant { font-family: 'Cormorant Garamond', serif; }
  .font-dm        { font-family: 'DM Sans', sans-serif; }

  @keyframes fadeUp    { from { opacity:0; transform:translateY(32px) } to { opacity:1; transform:none } }
  @keyframes fadeIn    { from { opacity:0 } to { opacity:1 } }
  @keyframes scaleIn   { from { opacity:0; transform:scale(.92) } to { opacity:1; transform:scale(1) } }
  @keyframes slideRight{ from { opacity:0; transform:translateX(-28px) } to { opacity:1; transform:none } }
  @keyframes pulseDot  { 0%,100%{ opacity:1;transform:scale(1) } 50%{ opacity:.4;transform:scale(1.6) } }
  @keyframes shimmer   { 0%{ background-position:-200% center } 100%{ background-position:200% center } }
  @keyframes float     { 0%,100%{ transform:translateY(0) } 50%{ transform:translateY(-18px) } }
  @keyframes rotateSlow{ from{ transform:rotate(0deg) } to{ transform:rotate(360deg) } }
  @keyframes lineGrow  { from{ width:0 } to{ width:56px } }
  @keyframes cardSlide { from{ opacity:0;transform:translateY(24px) } to{ opacity:1;transform:none } }
  @keyframes glowPulse { 0%,100%{ box-shadow:0 0 40px rgba(52,211,153,.18) } 50%{ box-shadow:0 0 80px rgba(52,211,153,.38) } }

  .anim-fadeUp     { animation: fadeUp     .75s cubic-bezier(.22,1,.36,1) both }
  .anim-fadeIn     { animation: fadeIn     .9s  ease both }
  .anim-scaleIn    { animation: scaleIn    .85s cubic-bezier(.22,1,.36,1) both }
  .anim-slideRight { animation: slideRight .7s  cubic-bezier(.22,1,.36,1) both }

  .delay-100 { animation-delay:.1s }  .delay-200 { animation-delay:.2s }
  .delay-300 { animation-delay:.3s }  .delay-400 { animation-delay:.4s }
  .delay-500 { animation-delay:.5s }  .delay-600 { animation-delay:.6s }
  .delay-700 { animation-delay:.7s }  .delay-800 { animation-delay:.8s }

  .dot-pulse   { animation: pulseDot  2s   ease-in-out infinite }
  .float-blob  { animation: float     9s   ease-in-out infinite }
  .float-blob2 { animation: float     12s  ease-in-out infinite reverse }
  .spin-ring   { animation: rotateSlow 18s linear infinite }
  .photo-glow  { animation: glowPulse 3.5s ease-in-out infinite }
  .line-grow   { animation: lineGrow  .6s  .85s cubic-bezier(.22,1,.36,1) both }
  .sched-card  { animation: cardSlide .65s cubic-bezier(.22,1,.36,1) both }

  .shimmer-text {
    background: linear-gradient(90deg,#059669,#34d399,#6ee7b7,#34d399,#059669);
    background-size: 220% auto;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    animation: shimmer 4s linear infinite;
  }

  .hover-lift { transition: transform .3s cubic-bezier(.22,1,.36,1), box-shadow .3s ease }
  .hover-lift:hover { transform: translateY(-6px); box-shadow: 0 20px 50px rgba(0,0,0,.1) }

  .tag-pill { transition: all .22s ease }
  .tag-pill:hover { background:#059669; color:#fff; border-color:#059669; transform:translateY(-2px) }

  .btn-book { transition: all .28s cubic-bezier(.22,1,.36,1) }
  .btn-book:hover { transform:translateY(-3px); box-shadow:0 14px 40px rgba(5,150,105,.35) }
  .btn-msg  { transition: all .28s cubic-bezier(.22,1,.36,1) }
  .btn-msg:hover  { transform:translateY(-3px); border-color:#059669; color:#059669 }

  .reveal { opacity:0; transform:translateY(28px); transition: opacity .7s ease, transform .7s cubic-bezier(.22,1,.36,1) }
  .reveal.visible { opacity:1; transform:none }
</style>

<div class="font-dm text-gray-800 bg-[#f8fffe] overflow-x-hidden">

  {{-- ════════════════════════ HERO ════════════════════════ --}}
  {{-- pt-16 ensures content clears a 64px fixed navbar --}}
  <section class="relative min-h-screen pt-16 flex flex-col lg:flex-row">

    {{-- ambient blobs --}}
    <div class="float-blob  pointer-events-none absolute top-40 left-10 w-80 h-80 rounded-full bg-emerald-200 opacity-20 blur-3xl"></div>
    <div class="float-blob2 pointer-events-none absolute bottom-20 right-12 w-96 h-96 rounded-full bg-teal-200 opacity-15 blur-3xl"></div>

    {{-- ── LEFT dark panel ── --}}
    <div class="relative lg:w-5/12 bg-gray-900 flex flex-col justify-end overflow-hidden min-h-[560px] lg:min-h-[calc(100vh-4rem)]">

      {{-- radial glow --}}
      <div class="pointer-events-none absolute inset-0 bg-[radial-gradient(ellipse_80%_70%_at_55%_28%,rgba(52,211,153,.22)_0%,transparent_65%)]"></div>

      {{-- dot grid overlay --}}
      <div class="pointer-events-none absolute inset-0 opacity-[.035]"
           style="background-image:radial-gradient(rgba(255,255,255,.8) 1px,transparent 1px);background-size:28px 28px"></div>

      {{-- ── PROFILE IMAGE ── --}}
      <div class="absolute top-0 inset-x-0 flex justify-center pt-12 lg:pt-16">
        <div class="anim-scaleIn relative">

          {{-- spinning dashed ring --}}
          <div class="spin-ring absolute rounded-full border-2 border-dashed border-emerald-500/25"
               style="inset:-18px"></div>

          {{-- solid glow ring --}}
          <div class="photo-glow absolute rounded-full bg-gradient-to-br from-emerald-400 to-teal-600 opacity-50 blur-[6px]"
               style="inset:-6px"></div>

          {{-- photo --}}
          <div class="relative w-40 h-40 md:w-48 md:h-48 lg:w-52 lg:h-52 rounded-full overflow-hidden border-[3px] border-white/10 ring-2 ring-emerald-400/30">
            <img
              src="https://images.unsplash.com/photo-1612349317150-e413f6a5b16d?w=500&h=500&fit=crop&q=85"
              alt="Dr. Sophia Harrington"
              class="w-full h-full object-cover object-top"
            />
          </div>

          {{-- status chip --}}
          <div class="absolute -bottom-4 left-1/2 -translate-x-1/2 flex items-center gap-1.5 bg-gray-900/90 backdrop-blur border border-emerald-500/35 rounded-full px-3.5 py-1.5 whitespace-nowrap shadow-lg">
            <span class="dot-pulse inline-block w-2 h-2 rounded-full bg-emerald-400 flex-shrink-0"></span>
            <span class="text-emerald-400 text-[9px] font-medium tracking-[.16em] uppercase">Accepting Patients</span>
          </div>

        </div>
      </div>

      {{-- identity over gradient --}}
      <div class="relative z-10 px-8 pb-10 pt-56 md:pt-60 lg:pt-64
                  bg-gradient-to-t from-gray-900 via-gray-900/85 to-transparent">

        <p class="anim-slideRight delay-200 text-emerald-400 text-[10px] font-medium tracking-[.2em] uppercase mb-3">
          Senior Consultant Physician
        </p>

        <h1 class="anim-fadeUp delay-300 font-cormorant text-white font-light leading-[1.05]"
            style="font-size:clamp(2.4rem,4.5vw,3.8rem)">
          Dr.&nbsp;<em class="italic shimmer-text">Sophia Harrington</em>
        </h1>

        <p class="anim-fadeUp delay-400 mt-2 mb-8 text-white/45 text-xs tracking-[.18em] uppercase">
          Cardiologist &amp; Internal Medicine
        </p>

        {{-- stats --}}
        <div class="anim-fadeUp delay-500 flex gap-6 flex-wrap">
          <div>
            <p class="font-cormorant text-white font-semibold leading-none" style="font-size:2rem">14+</p>
            <p class="text-white/35 text-[9px] tracking-widest uppercase mt-1">Years exp.</p>
          </div>
          <div class="w-px bg-white/10 self-stretch"></div>
          <div>
            <p class="font-cormorant text-white font-semibold leading-none" style="font-size:2rem">4k+</p>
            <p class="text-white/35 text-[9px] tracking-widest uppercase mt-1">Patients</p>
          </div>
          <div class="w-px bg-white/10 self-stretch"></div>
          <div>
            <p class="font-cormorant text-white font-semibold leading-none" style="font-size:2rem">98%</p>
            <p class="text-white/35 text-[9px] tracking-widest uppercase mt-1">Satisfaction</p>
          </div>
        </div>

      </div>
    </div>

    {{-- ── RIGHT bio panel ── --}}
    <div class="relative lg:w-7/12 flex flex-col justify-center px-8 md:px-14 lg:px-20 py-16 lg:py-0">

      {{-- vertical rule --}}
      <div class="hidden lg:block absolute left-0 top-16 bottom-16 w-px bg-gradient-to-b from-transparent via-emerald-200/60 to-transparent"></div>

      <div class="anim-fadeIn delay-200 max-w-xl">

        <p class="text-emerald-600 text-[10px] font-medium tracking-[.2em] uppercase mb-4">
          About the Physician
        </p>

        <div class="mb-7">
          <h2 class="font-cormorant font-light text-gray-900 leading-[1.1]"
              style="font-size:clamp(2rem,3.5vw,2.8rem)">
            Precision care,<br>
            <span class="italic text-emerald-700">deeply personal.</span>
          </h2>
          <div class="line-grow h-[1.5px] bg-gradient-to-r from-emerald-500 to-teal-400 mt-3 rounded-full"></div>
        </div>

        <p class="anim-fadeUp delay-400 text-gray-500 leading-[1.9] text-[.93rem] mb-5">
          Dr. Sophia Harrington is a distinguished cardiologist with over 14 years of clinical excellence. She combines rigorous evidence-based medicine with an empathetic, patient-first philosophy — ensuring every individual feels heard, understood, and truly empowered in their own health journey.
        </p>

        <p class="anim-fadeUp delay-500 text-gray-500 leading-[1.9] text-[.93rem] mb-8">
          A fellow of the American College of Cardiology and recipient of the National Healthcare Innovation Award, Dr. Harrington is also an active researcher with over 40 published papers in peer-reviewed journals.
        </p>

        {{-- tags --}}
        <div class="anim-fadeUp delay-600 flex flex-wrap gap-2 mb-10">
          @foreach(['Cardiology','Internal Medicine','Hypertension','Board Certified','ECG & Echo','Heart Failure'] as $tag)
          <span class="tag-pill border border-emerald-200 text-emerald-700 bg-emerald-50 text-xs font-medium px-4 py-1.5 rounded-full cursor-default select-none">
            {{ $tag }}
          </span>
          @endforeach
        </div>

        {{-- CTAs --}}
        <div class="anim-fadeUp delay-700 flex flex-wrap gap-4">
          <a href="#schedule"
             class="btn-book inline-flex items-center gap-2.5 bg-emerald-600 text-white text-sm font-medium tracking-wide px-7 py-3.5 rounded-full">
            <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/>
            </svg>
            Book Appointment
          </a>
          <a href="#contact"
             class="btn-msg inline-flex items-center gap-2.5 border border-gray-200 text-gray-700 text-sm font-medium tracking-wide px-7 py-3.5 rounded-full">
            <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,12 2,6"/>
            </svg>
            Send Message
          </a>
        </div>

      </div>
    </div>

  </section>

  {{-- ════════════════════════ SCHEDULE ════════════════════════ --}}
  <section id="schedule" class="bg-white py-28">
    <div class="max-w-6xl mx-auto px-6 lg:px-10">

      <div class="reveal flex flex-col sm:flex-row sm:items-end justify-between gap-6 mb-14">
        <div>
          <p class="text-emerald-600 text-[10px] font-medium tracking-[.2em] uppercase mb-3">Availability</p>
          <h2 class="font-cormorant font-light text-gray-900 leading-tight" style="font-size:clamp(2rem,4vw,3rem)">
            Consultation <em class="italic text-emerald-700">Schedule</em>
          </h2>
        </div>
        <p class="text-gray-400 text-sm leading-relaxed sm:text-right max-w-[24ch]">
          All sessions are 30 minutes.<br>Times shown in local timezone.
        </p>
      </div>

      @php
        $days = [
          ['day'=>'Monday',    'start'=>'09:00 AM','end'=>'01:00 PM','slots'=>8],
          ['day'=>'Tuesday',   'start'=>'10:00 AM','end'=>'02:00 PM','slots'=>6],
          ['day'=>'Wednesday', 'start'=>'08:00 AM','end'=>'12:00 PM','slots'=>7],
          ['day'=>'Thursday',  'start'=>'11:00 AM','end'=>'03:00 PM','slots'=>5],
          ['day'=>'Friday',    'start'=>'09:00 AM','end'=>'01:00 PM','slots'=>8],
          ['day'=>'Saturday',  'start'=>'10:00 AM','end'=>'12:00 PM','slots'=>3],
        ];
      @endphp

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach($days as $i => $s)
        <div class="sched-card hover-lift group relative rounded-2xl border border-gray-100 bg-[#f8fffe] p-6 overflow-hidden cursor-pointer"
             style="animation-delay:{{ $i * 90 }}ms">

          {{-- hover accent --}}
          <div class="absolute bottom-0 left-0 right-0 h-[3px] bg-gradient-to-r from-emerald-500 to-teal-400 scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></div>

          <p class="text-emerald-600 text-[10px] font-medium tracking-[.14em] uppercase mb-3">{{ $s['day'] }}</p>

          <div class="font-cormorant text-gray-900 leading-snug mb-4" style="font-size:1.6rem">
            {{ $s['start'] }}
            <span class="text-gray-300 text-base mx-1">—</span>
            {{ $s['end'] }}
          </div>

          <div class="flex items-center gap-2 mb-5">
            <span class="w-2 h-2 rounded-full bg-emerald-400 flex-shrink-0 dot-pulse"></span>
            <span class="text-gray-400 text-xs">{{ $s['slots'] }} slots available</span>
          </div>

          <div class="pt-4 border-t border-gray-100 flex items-center justify-between
                      opacity-0 group-hover:opacity-100 -translate-y-1 group-hover:translate-y-0
                      transition-all duration-250">
            <span class="text-emerald-600 text-xs font-medium">Book this day</span>
            <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <path d="M5 12h14M12 5l7 7-7 7"/>
            </svg>
          </div>

        </div>
        @endforeach
      </div>

    </div>
  </section>

  {{-- ════════════════════════ CREDENTIALS ════════════════════════ --}}
  <section class="relative bg-gray-900 py-28 overflow-hidden">

    <div class="pointer-events-none absolute inset-0 bg-[radial-gradient(ellipse_55%_70%_at_85%_50%,rgba(52,211,153,.1)_0%,transparent_65%)]"></div>
    <div class="pointer-events-none absolute inset-0 opacity-[.03]"
         style="background-image:radial-gradient(rgba(255,255,255,.7) 1px,transparent 1px);background-size:28px 28px"></div>

    <div class="relative max-w-6xl mx-auto px-6 lg:px-10">

      <div class="reveal mb-14">
        <p class="text-emerald-400 text-[10px] font-medium tracking-[.2em] uppercase mb-3">Qualifications</p>
        <h2 class="font-cormorant font-light text-white leading-tight" style="font-size:clamp(2rem,4vw,3rem)">
          Built on a foundation of <em class="italic text-emerald-400">excellence</em>
        </h2>
      </div>

      @php
        $creds = [
          ['n'=>'01','title'=>'Medical Degree',          'sub'=>'MD — Kathmandu University School of Medical Sciences<br><span class="text-white/25">Graduated with First Class Distinction</span>'],
          ['n'=>'02','title'=>'Specialization',           'sub'=>'Cardiology &amp; Internal Medicine<br><span class="text-white/25">Fellowship — AIIMS New Delhi</span>'],
          ['n'=>'03','title'=>'Board Certification',      'sub'=>'Nepal Medical Council — License No. 12345<br><span class="text-white/25">Active certification since 2012</span>'],
          ['n'=>'04','title'=>'Research &amp; Awards',    'sub'=>'40+ peer-reviewed publications<br><span class="text-white/25">National Healthcare Innovation Award 2021</span>'],
        ];
      @endphp

      <div class="grid grid-cols-1 sm:grid-cols-2 gap-px bg-white/[.06] rounded-2xl overflow-hidden border border-white/[.06]">
        @foreach($creds as $i => $c)
        <div class="reveal group p-8 lg:p-10 bg-gray-900 hover:bg-white/[.04] transition-colors duration-200
                    {{ $i % 2 !== 0 ? 'border-l border-white/[.06]' : '' }}
                    {{ $i >= 2 ? 'border-t border-white/[.06]' : '' }}">
          <div class="font-cormorant text-5xl font-light leading-none text-white/[.08] mb-5 group-hover:text-white/[.13] transition-colors">
            {{ $c['n'] }}
          </div>
          <h3 class="text-white font-medium text-[.95rem] mb-2">{{ $c['title'] }}</h3>
          <p class="text-white/45 text-sm leading-relaxed">{!! $c['sub'] !!}</p>
        </div>
        @endforeach
      </div>

    </div>
  </section>

  {{-- ════════════════════════ BOOK CTA ════════════════════════ --}}
  <section id="contact" class="relative py-32 overflow-hidden">

    <div class="pointer-events-none absolute inset-0 bg-gradient-to-br from-emerald-50/80 via-[#f8fffe] to-teal-50/60"></div>
    <div class="pointer-events-none absolute inset-0 bg-[radial-gradient(circle_at_18%_50%,rgba(52,211,153,.09)_0%,transparent_55%),radial-gradient(circle_at_82%_28%,rgba(5,150,105,.07)_0%,transparent_45%)]"></div>

    <div class="relative max-w-2xl mx-auto px-6 text-center">
      <div class="reveal">
        <p class="text-emerald-600 text-[10px] font-medium tracking-[.2em] uppercase mb-5">Begin Your Journey</p>

        <h2 class="font-cormorant font-light text-gray-900 leading-[1.05] mb-6"
            style="font-size:clamp(2.8rem,7vw,5.5rem)">
          Your health,<br><em class="italic text-emerald-700">our priority.</em>
        </h2>

        <div class="w-14 h-[1.5px] bg-gradient-to-r from-emerald-500 to-teal-400 mx-auto mb-8 rounded-full"></div>

        <p class="text-gray-400 text-sm leading-relaxed max-w-[42ch] mx-auto mb-10">
          Schedule a consultation with Dr. Sophia Harrington and take the first meaningful step toward better health. Same-week appointments often available.
        </p>

        <div class="flex flex-wrap items-center justify-center gap-4">
          <a href="#"
             class="btn-book inline-flex items-center gap-2.5 bg-emerald-600 text-white text-sm font-medium tracking-wide px-8 py-4 rounded-full">
            <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/>
            </svg>
            Book an Appointment
          </a>
          <a href="tel:+977-1-4000000"
             class="btn-msg inline-flex items-center gap-2.5 border border-gray-200 text-gray-700 text-sm font-medium tracking-wide px-8 py-4 rounded-full">
            <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.65 3.38 2 2 0 0 1 3.62 1h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.69a16 16 0 0 0 6.29 6.29l1.06-.94a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
            </svg>
            Call the Clinic
          </a>
        </div>
      </div>
    </div>

  </section>

</div>

<script>
  // Scroll-reveal
  const io = new IntersectionObserver(entries => {
    entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('visible'); io.unobserve(e.target); } });
  }, { threshold: 0.12 });
  document.querySelectorAll('.reveal').forEach(el => io.observe(el));

  // Schedule cards: pause anim until in view
  const sio = new IntersectionObserver(entries => {
    entries.forEach(e => { if (e.isIntersecting) { e.target.style.animationPlayState='running'; sio.unobserve(e.target); } });
  }, { threshold: 0.08 });
  document.querySelectorAll('.sched-card').forEach(c => { c.style.animationPlayState='paused'; sio.observe(c); });
</script>

</x-layout.frontend>
