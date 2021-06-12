<?php

namespace App\Listeners;

use App\Notifications\MemberRequestNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;
use Spatie\Permission\Models\Role;

class MemberRequestListener
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
        dd('hello');
        $admins = Role::where('name', 'admin')->first();
        dd($admins);
        // dd($admins->users[0]->email);
        // Notification::send($admins->users[0], new MemberRequestNotification($event->member));
    }
}
