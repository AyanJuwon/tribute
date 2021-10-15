<?php

namespace App\Console\Commands;

use App\Mail\ReminderEmail;
use App\Memorial;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;

class SendReminderEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminder:emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Mail notification to user about memorials';

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
        $memorials = Memorial::whereBetween('expiry_date', [Carbon::now(), Carbon::now()->addDays(10)])->get();

        $data = [];
        foreach ($memorials as $memorial){
            $data[$memorial->created_by][] = $memorials->toArray();

            Mail::send(new ReminderEmail($memorial));
        }



    }
}
