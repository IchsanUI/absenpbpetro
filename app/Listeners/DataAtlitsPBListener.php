<?php

namespace App\Listeners;

use App\Events\DataAtlitsPBEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class DataAtlitsPBListener
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
     * @param  \App\Events\DataAtlitsPBEvent  $event
     * @return void
     */
    public function handle(DataAtlitsPBEvent $event)
    {
        //
    }
}
