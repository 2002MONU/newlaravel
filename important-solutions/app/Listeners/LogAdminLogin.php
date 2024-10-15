<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class LogAdminLogin
{
    /**
     * @var \Illuminate\Http\Request
     */
    protected $request;

    /**
     * Create the event listener.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Handle the event.
     *
     * @param \Illuminate\Auth\Events\Login $event
     * @return void
     */
    public function handle(Login $event)
    {
        if ($event->user->isAdmin()) {
            DB::table('admin_login')->insert([
                'admin_email' => $event->user->email,
                'ip_address' => $this->request->ip(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
