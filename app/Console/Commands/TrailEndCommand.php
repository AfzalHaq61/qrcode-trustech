<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Mail;
use App\Mail\TrailEnd;
use App\Models\User;
use Carbon\Carbon;

class TrailEndCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'auto:trailendreminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send mail to the user whose trail period is over';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = User::get();
        $current_time = Carbon::now();

        if ($users->count() > 0) {
            foreach ($users as $user) {
                if($current_time > $user->plan_validity) {
                    Mail::to($user)->send(new TrailEnd($user));
                }
            }
        }
        return 0;
    }
}
