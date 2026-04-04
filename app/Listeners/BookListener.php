<?php

namespace App\Listeners;

use App\Events\BookEvent;
use App\Mail\BookingNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class BookListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(BookEvent $event): void
    {
        $appointment=$event->appointment;
        $doctor=$event->doctor;
        $patient=$event->patient;
        
        // Send notification to doctor

        Mail::to($doctor->user->email)->send(new BookingNotification($appointment,$doctor,$patient));

    }
}
