<?php

namespace App\Listeners;

use App\Models\User;
use App\Events\ProviderCreated;
use App\Notifications\NewProvider;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;

class SendProviderCreatedNotifications
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
    public function handle(ProviderCreated $event): void
    {
        $admins = User::whereHas('roles', function ($query) {
            $query->where('nom', 'admin');
        })->get();

         Notification::send($admins, new NewProvider($event->provider));
    }
}
