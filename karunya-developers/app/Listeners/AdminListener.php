<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminListener
{
    protected $request;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        if ($event->user->isAdmin()) {
            DB::table('admin_logs')->insert([
                'admin_email' => $event->user->email,
                'ip_address' => $this->request->ip(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    
    }
}
