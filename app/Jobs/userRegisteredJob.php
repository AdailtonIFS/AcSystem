<?php

namespace App\Jobs;

use App\Mail\userRegisteredMail;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class userRegisteredJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable;
    private $user;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this-> user = $user;
    }
    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::send(new userRegisteredMail($this->user));
    }
}
