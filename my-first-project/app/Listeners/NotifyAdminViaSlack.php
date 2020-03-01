<?php

namespace App\Listeners;

use App\Events\NewCustomerHasRegisteredEvent;
use Illuminate\Queue\InteractsWithQueue;

class NotifyAdminViaSlack
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
     * @param  NewCustomerHasRegisteredEvent  $event
     * @return void
     */
    public function handle(NewCustomerHasRegisteredEvent $event)
    {
      //Slack notification to Admin
      dump('Slack message here');
      
    }
}
