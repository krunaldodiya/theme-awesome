<?php

namespace App\Listeners;

use App\Events\UserWasCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegisterApp
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
     * @param  UserWasCreated  $event
     * @return void
     */
    public function handle(UserWasCreated $event)
    {
        $user = $event->user;
        $name = $user->name;

        $project = $user->projects()->create(['name' => "${name}'s project", 'default' => true]);
        $theme = $project->themes()->create(['name' => 'default']);
        
        $project->update(['default_theme_id' => $theme->id]);
    }
}
