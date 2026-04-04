<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Doctor Appointment</title>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --teal-dark:   #0a3d3a;
            --teal-mid:    #0e5c56;
            --teal-accent: #14b8a6;
            --teal-light:  #ccfbf1;
            --gold:        #d4a853;
            --gold-light:  #fef3c7;
            --ink:         #0f1c1b;
            --mist:        #f0faf9;
            --white:       #ffffff;
        }

        body {
            background-color: #e8f4f3;
            font-family: 'DM Sans', sans-serif;
            color: var(--ink);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 16px;
        }

        .email-wrapper {
            max-width: 600px;
            width: 100%;
            animation: fadeUp 0.6s ease both;
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(24px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        /* ── Header ── */
        .header {
            background: var(--teal-dark);
            border-radius: 20px 20px 0 0;
            padding: 44px 48px 36px;
            position: relative;
            overflow: hidden;
        }

        .header::before {
            content: '';
            position: absolute;
            inset: 0;
            background:
                radial-gradient(ellipse 60% 80% at 90% -10%, rgba(20,184,166,.35) 0%, transparent 60%),
                radial-gradient(ellipse 40% 50% at -10% 110%, rgba(212,168,83,.18) 0%, transparent 55%);
            pointer-events: none;
        }

        .header-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(20,184,166,.15);
            border: 1px solid rgba(20,184,166,.3);
            border-radius: 100px;
            padding: 6px 14px;
            margin-bottom: 28px;
        }

        .badge-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: var(--teal-accent);
            box-shadow: 0 0 8px var(--teal-accent);
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; transform: scale(1); }
            50%       { opacity: .6; transform: scale(.85); }
        }

        .badge-text {
            font-size: 11px;
            font-weight: 600;
            letter-spacing: .08em;
            text-transform: uppercase;
            color: var(--teal-accent);
        }

        .header-title {
            font-family: 'DM Serif Display', serif;
            font-size: 34px;
            line-height: 1.15;
            color: var(--white);
            margin-bottom: 10px;
        }

        .header-title em {
            color: var(--teal-accent);
            font-style: italic;
        }

        .header-subtitle {
            font-size: 14px;
            color: rgba(255,255,255,.55);
            font-weight: 300;
        }

        /* ── Divider strip ── */
        .strip {
            height: 4px;
            background: linear-gradient(90deg, var(--gold) 0%, var(--teal-accent) 100%);
        }

        /* ── Body card ── */
        .body-card {
            background: var(--white);
            padding: 44px 48px;
        }

        .greeting {
            font-size: 18px;
            font-weight: 500;
            color: var(--teal-dark);
            margin-bottom: 12px;
        }

        .intro-text {
            font-size: 14.5px;
            line-height: 1.75;
            color: #4a6462;
            margin-bottom: 36px;
        }

        /* ── Appointment card ── */
        .appt-card {
            background: var(--mist);
            border: 1px solid #c9e8e5;
            border-radius: 16px;
            padding: 28px 32px;
            position: relative;
            margin-bottom: 36px;
            overflow: hidden;
        }

        .appt-card::after {
            content: '';
            position: absolute;
            top: 0; left: 0;
            width: 4px;
            height: 100%;
            background: linear-gradient(180deg, var(--teal-accent), var(--gold));
            border-radius: 4px 0 0 4px;
        }

        .appt-label {
            font-size: 10px;
            font-weight: 700;
            letter-spacing: .12em;
            text-transform: uppercase;
            color: var(--teal-accent);
            margin-bottom: 20px;
        }

        /* ── Detail rows ── */
        .detail-row {
            display: flex;
            align-items: flex-start;
            gap: 16px;
            padding: 14px 0;
            border-bottom: 1px solid #d8eeeb;
        }

        .detail-row:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .detail-row:first-of-type {
            padding-top: 0;
        }

        .detail-icon {
            flex-shrink: 0;
            width: 38px;
            height: 38px;
            border-radius: 10px;
            background: var(--white);
            border: 1px solid #c9e8e5;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--teal-mid);
            margin-top: 1px;
        }

        .detail-meta {
            flex: 1;
            min-width: 0;
        }

        .detail-meta-label {
            font-size: 11px;
            font-weight: 600;
            letter-spacing: .07em;
            text-transform: uppercase;
            color: #7aada8;
            margin-bottom: 4px;
        }

        .detail-meta-value {
            font-size: 15px;
            font-weight: 600;
            color: var(--teal-dark);
            word-break: break-word;
        }

        .detail-meta-value.accent {
            color: var(--teal-mid);
        }

        /* ── Icon chips ── */
        .icon-chip {
            flex-shrink: 0;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            background: var(--gold-light);
            border: 1px solid #f6d984;
            border-radius: 100px;
            padding: 4px 11px;
            font-size: 11.5px;
            font-weight: 600;
            color: #7c5a0a;
            white-space: nowrap;
            align-self: center;
        }

        /* ── Note box ── */
        .note-box {
            border-left: 3px solid var(--gold);
            background: var(--gold-light);
            border-radius: 0 10px 10px 0;
            padding: 16px 20px;
            margin-bottom: 36px;
            font-size: 13.5px;
            line-height: 1.65;
            color: #6b4c08;
        }

        .note-box strong {
            display: block;
            margin-bottom: 4px;
            font-weight: 600;
            color: #7c5a0a;
        }

        /* ── CTA button ── */
        .cta-wrap {
            text-align: center;
            margin-bottom: 36px;
        }

        .cta-btn {
            display: inline-block;
            background: var(--teal-dark);
            color: var(--white);
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            letter-spacing: .04em;
            padding: 15px 40px;
            border-radius: 100px;
            transition: background .2s, transform .15s, box-shadow .2s;
            box-shadow: 0 6px 24px rgba(10,61,58,.25);
        }

        .cta-btn:hover {
            background: var(--teal-mid);
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(10,61,58,.35);
        }

        /* ── Footer ── */
        .footer {
            background: var(--teal-dark);
            border-radius: 0 0 20px 20px;
            padding: 28px 48px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            flex-wrap: wrap;
        }

        .footer-brand {
            font-family: 'DM Serif Display', serif;
            font-size: 15px;
            color: var(--white);
            opacity: .7;
        }

        .footer-note {
            font-size: 12px;
            color: rgba(255,255,255,.35);
        }

        /* ── Responsive ── */
        @media (max-width: 520px) {
            .header, .body-card, .footer {
                padding-left: 20px;
                padding-right: 20px;
            }

            .header { padding-top: 32px; padding-bottom: 28px; }
            .body-card { padding-top: 32px; padding-bottom: 32px; }
            .appt-card { padding: 20px 20px; }

            .header-title { font-size: 26px; }

            .detail-row { gap: 12px; }

            .detail-icon {
                width: 32px;
                height: 32px;
                border-radius: 8px;
            }

            .detail-meta-value { font-size: 14px; }

            .icon-chip { display: none; }

            .footer {
                flex-direction: column;
                text-align: center;
                padding: 24px 20px;
            }
        }
    </style>
</head>
<body>

<div class="email-wrapper">

    {{-- ── Header ── --}}
    <div class="header">
        <div class="header-badge">
            <span class="badge-dot"></span>
            <span class="badge-text">Appointment Confirmed</span>
        </div>
        <h1 class="header-title">Booking<br><em>Notification</em></h1>
        <p class="header-subtitle">MediCare Patient Management System</p>
    </div>

    <div class="strip"></div>

    {{-- ── Body ── --}}
    <div class="body-card">

        <p class="greeting">Hello, Dr. {{ $doctor->user->name }} 👋</p>
        <p class="intro-text">
            A new appointment has been successfully scheduled for you. Please review the details below and make sure your schedule is updated accordingly.
        </p>

        {{-- Appointment Details Card --}}
        <div class="appt-card">
            <p class="appt-label">Appointment Details</p>

            <div class="detail-row">
                <div class="detail-icon">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                </div>
                <div class="detail-meta">
                    <div class="detail-meta-label">Patient</div>
                    <div class="detail-meta-value">{{ $patient->name }}</div>
                </div>
            </div>

            <div class="detail-row">
                <div class="detail-icon">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                </div>
                <div class="detail-meta">
                    <div class="detail-meta-label">Attending Doctor</div>
                    <div class="detail-meta-value accent">Dr. {{ $doctor->user->name }}</div>
                </div>
            </div>

            <div class="detail-row">
                <div class="detail-icon">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                </div>
                <div class="detail-meta">
                    <div class="detail-meta-label">Date</div>
                    <div class="detail-meta-value">{{ $appointment->appointment_date }}</div>
                </div>
                <span class="icon-chip">
                    <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                    Scheduled
                </span>
            </div>

            <div class="detail-row">
                <div class="detail-icon">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                </div>
                <div class="detail-meta">
                    <div class="detail-meta-label">Time</div>
                    <div class="detail-meta-value">{{ $appointment->appointment_time }}</div>
                </div>
                <span class="icon-chip">
                    <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                    On time
                </span>
            </div>

        </div>

        {{-- Note --}}
        <div class="note-box">
            <strong>📋 Reminder</strong>
            Please ensure your patient's file is reviewed prior to the appointment. If you need to reschedule, kindly do so at least 24 hours in advance.
        </div>

        {{-- CTA --}}
        <div class="cta-wrap">
            <a href="#" class="cta-btn">View Full Appointment</a>
        </div>

    </div>

    {{-- ── Footer ── --}}
    <div class="footer">
        <span class="footer-brand">MediCare &mdash; Care You Can Trust</span>
        <span class="footer-note">This is an automated notification. Please do not reply.</span>
    </div>

</div>

</body>
</html>
