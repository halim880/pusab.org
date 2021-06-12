<?php

namespace App\Listeners;

use App\Models\Application;
use App\Models\User;
use App\Notifications\ApplicationReceivedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;
use Spatie\Permission\Models\Role;

class NewApplicantCreatedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $admins = Role::where('name', 'admin')->first();
        // dd($admins->users[0]->email);
        Application::create(['applicant_id'=> $event->applicant->id]);
        Notification::send($admins->users[0], new ApplicationReceivedNotification($event->applicant));
    }
}
