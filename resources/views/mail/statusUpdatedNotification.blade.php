<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Appointment {{ ucfirst($appointment->status) }}</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500&family=DM+Serif+Display&display=swap');

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            background-color: #F5F3EE;
            font-family: 'DM Sans', Arial, sans-serif;
            -webkit-font-smoothing: antialiased;
            padding: 32px 16px;
        }

        .email-wrapper {
            max-width: 560px;
            margin: 0 auto;
        }

        /* ── Header ── */
        .email-header {
            text-align: center;
            margin-bottom: 24px;
        }

        .brand {
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .brand-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: #2C2C2A;
            display: inline-block;
        }

        .brand-name {
            font-family: 'DM Serif Display', Georgia, serif;
            font-size: 18px;
            color: #2C2C2A;
            letter-spacing: -0.3px;
        }

        /* ── Card ── */
        .email-card {
            background: #FFFFFF;
            border-radius: 16px;
            overflow: hidden;
            border: 1px solid #E8E6DF;
        }

        /* ── Status Banner ── */
        .status-banner {
            padding: 32px 40px 28px;
            text-align: center;
            position: relative;
        }

        .status-banner.confirmed  { background: #E1F5EE; }
        .status-banner.completed  { background: #E6F1FB; }
        .status-banner.cancelled  { background: #FCEBEB; }
        .status-banner.pending    { background: #FAEEDA; }

        .status-icon {
            width: 56px;
            height: 56px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 14px;
        }

        .status-icon.confirmed { background: #9FE1CB; }
        .status-icon.completed { background: #B5D4F4; }
        .status-icon.cancelled { background: #F7C1C1; }
        .status-icon.pending   { background: #FAC775; }

        .status-icon svg { width: 24px; height: 24px; }

        .status-label {
            font-size: 11px;
            font-weight: 500;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            display: block;
            margin-bottom: 6px;
        }

        .status-label.confirmed { color: #0F6E56; }
        .status-label.completed { color: #185FA5; }
        .status-label.cancelled { color: #A32D2D; }
        .status-label.pending   { color: #854F0B; }

        .status-headline {
            font-family: 'DM Serif Display', Georgia, serif;
            font-size: 26px;
            line-height: 1.25;
            letter-spacing: -0.4px;
        }

        .status-headline.confirmed { color: #085041; }
        .status-headline.completed { color: #0C447C; }
        .status-headline.cancelled { color: #791F1F; }
        .status-headline.pending   { color: #633806; }

        /* ── Body ── */
        .email-body {
            padding: 32px 40px;
        }

        .greeting {
            font-size: 15px;
            color: #3d3d3a;
            margin-bottom: 10px;
        }

        .message {
            font-size: 15px;
            color: #5F5E5A;
            line-height: 1.7;
            margin-bottom: 28px;
        }

        /* ── Detail Table ── */
        .detail-box {
            background: #F5F3EE;
            border-radius: 10px;
            overflow: hidden;
            margin-bottom: 28px;
        }

        .detail-row {
            display: flex;
            align-items: center;
            padding: 12px 16px;
            border-bottom: 1px solid #E8E6DF;
        }

        .detail-row:last-child { border-bottom: none; }

        .detail-icon {
            width: 32px;
            height: 32px;
            border-radius: 8px;
            background: #FFFFFF;
            border: 1px solid #E8E6DF;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            margin-right: 12px;
        }

        .detail-icon svg { width: 15px; height: 15px; }

        .detail-label {
            font-size: 11px;
            font-weight: 500;
            color: #888780;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            display: block;
            margin-bottom: 1px;
        }

        .detail-value {
            font-size: 14px;
            font-weight: 500;
            color: #2C2C2A;
        }

        /* ── CTA Button ── */
        .cta-wrap { text-align: center; margin-bottom: 28px; }

        .cta-btn {
            display: inline-block;
            padding: 13px 32px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 500;
            text-decoration: none;
            letter-spacing: 0.2px;
        }

        .cta-btn.confirmed { background: #1D9E75; color: #ffffff; }
        .cta-btn.completed { background: #185FA5; color: #ffffff; }
        .cta-btn.cancelled { background: #2C2C2A; color: #ffffff; }
        .cta-btn.pending   { background: #BA7517; color: #ffffff; }

        /* ── Note ── */
        .note {
            font-size: 12px;
            color: #B4B2A9;
            line-height: 1.6;
            padding: 16px;
            background: #FAFAF8;
            border-radius: 8px;
            border-left: 3px solid #E8E6DF;
        }

        /* ── Footer ── */
        .email-footer {
            text-align: center;
            padding: 24px 40px 8px;
            border-top: 1px solid #F0EEE8;
        }

        .footer-text {
            font-size: 12px;
            color: #B4B2A9;
            line-height: 1.8;
        }

        .footer-link {
            color: #888780;
            text-decoration: underline;
        }

        /* ── Responsive ── */
        @media (max-width: 480px) {
            body { padding: 16px 10px; }
            .status-banner { padding: 24px 20px 20px; }
            .email-body { padding: 24px 20px; }
            .email-footer { padding: 20px 20px 8px; }
            .status-headline { font-size: 22px; }
            .detail-row { padding: 10px 12px; }
            .cta-btn { display: block; text-align: center; }
        }
    </style>
</head>
<body>

@php
    $status = $appointment->status;

    $headlines = [
        'confirmed' => 'Your appointment is confirmed',
        'completed' => 'Appointment completed',
        'cancelled' => 'Appointment cancelled',
        'pending'   => 'Awaiting confirmation',
    ];

    $messages = [
        'confirmed' => 'Great news! Dr. ' . $appointment->doctor->user->name . ' has confirmed your appointment. Please arrive 10 minutes before your scheduled time.',
        'completed' => 'Your appointment with Dr. ' . $appointment->doctor->user->name . ' has been marked as completed. We hope your visit went well.',
        'cancelled' => 'We\'re sorry to let you know that your appointment with Dr. ' . $appointment->doctor->user->name . ' has been cancelled. Please book a new appointment at your convenience.',
        'pending'   => 'Your appointment request has been received and is awaiting confirmation from Dr. ' . $appointment->doctor->user->name . '. We\'ll notify you once it\'s confirmed.',
    ];

    $notes = [
        'confirmed' => 'Please bring any relevant medical records or documents. If you need to reschedule, do so at least 24 hours in advance.',
        'completed' => 'If you were prescribed medication or given follow-up instructions, please ensure you follow them carefully.',
        'cancelled' => 'Cancellations made less than 24 hours before the appointment may be subject to a fee. Contact us for any questions.',
        'pending'   => 'You will receive another notification once the doctor confirms your appointment. This usually takes 1–2 hours.',
    ];

    $ctaLabels = [
        'confirmed' => 'View appointment',
        'completed' => 'Leave a review',
        'cancelled' => 'Book a new appointment',
        'pending'   => 'View appointment',
    ];

    $icons = [
        'confirmed' => '<svg viewBox="0 0 24 24" fill="none" stroke="#0F6E56" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>',
        'completed' => '<svg viewBox="0 0 24 24" fill="none" stroke="#185FA5" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 3"/></svg>',
        'cancelled' => '<svg viewBox="0 0 24 24" fill="none" stroke="#A32D2D" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6L6 18M6 6l12 12"/></svg>',
        'pending'   => '<svg viewBox="0 0 24 24" fill="none" stroke="#854F0B" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M12 8v4l2.5 2.5"/></svg>',
    ];
@endphp

<div class="email-wrapper">

    {{-- Brand header --}}
    <div class="email-header">
        <div class="brand">
            <span class="brand-dot"></span>
            <span class="brand-name">MediBook</span>
        </div>
    </div>

    <div class="email-card">

        {{-- Status banner --}}
        <div class="status-banner {{ $status }}">
            <div class="status-icon {{ $status }}">
                {!! $icons[$status] !!}
            </div>
            <span class="status-label {{ $status }}">{{ $status }}</span>
            <div class="status-headline {{ $status }}">{{ $headlines[$status] }}</div>
        </div>

        {{-- Body --}}
        <div class="email-body">
            <p class="greeting">Hi {{ $appointment->patient->name }},</p>
            <p class="message">{{ $messages[$status] }}</p>

            {{-- Appointment details --}}
            <div class="detail-box">

                <div class="detail-row">
                    <div class="detail-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="#5F5E5A" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 7H4a2 2 0 00-2 2v10a2 2 0 002 2h16a2 2 0 002-2V9a2 2 0 00-2-2z"/><path d="M16 3v4M8 3v4M2 11h20"/></svg>
                    </div>
                    <div>
                        <span class="detail-label">Date</span>
                        <span class="detail-value">{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('l, F j, Y') }}</span>
                    </div>
                </div>

                <div class="detail-row">
                    <div class="detail-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="#5F5E5A" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 3"/></svg>
                    </div>
                    <div>
                        <span class="detail-label">Time</span>
                        <span class="detail-value">{{ \Carbon\Carbon::parse($appointment->appointment_time)->format('g:i A') }}</span>
                    </div>
                </div>

                <div class="detail-row">
                    <div class="detail-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="#5F5E5A" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                    </div>
                    <div>
                        <span class="detail-label">Doctor</span>
                        <span class="detail-value">Dr. {{ $appointment->doctor->user->name }}</span>
                    </div>
                </div>

                <div class="detail-row">
                    <div class="detail-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="#5F5E5A" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s-8-4.5-8-11.8A8 8 0 0112 2a8 8 0 018 8.2c0 7.3-8 11.8-8 11.8z"/><circle cx="12" cy="10" r="3"/></svg>
                    </div>
                    <div>
                        <span class="detail-label">Appointment ID</span>
                        <span class="detail-value">#{{ str_pad($appointment->id, 5, '0', STR_PAD_LEFT) }}</span>
                    </div>
                </div>

            </div>

            {{-- CTA --}}
            <div class="cta-wrap">
                <a href="{{ url('/appointments/' . $appointment->id) }}" class="cta-btn {{ $status }}">
                    {{ $ctaLabels[$status] }} →
                </a>
            </div>

            {{-- Note --}}
            <div class="note">{{ $notes[$status] }}</div>
        </div>

        {{-- Footer --}}
        <div class="email-footer">
            <p class="footer-text">
                You received this because you have an account with MediBook.<br>
                <a href="#" class="footer-link">Manage notifications</a> &nbsp;·&nbsp;
                <a href="#" class="footer-link">Unsubscribe</a>
            </p>
            <p class="footer-text" style="margin-top:10px;color:#D3D1C7">
                © {{ date('Y') }} MediBook. All rights reserved.
            </p>
        </div>

    </div>

</div>
</body>
</html>
