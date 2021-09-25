<?php

namespace App\Console\Commands;

use App\Mail\emailNotification;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class Notify extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send emails to all users ';

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
     * @return mixed
     */
    public function handle()
    {
       //  $users = User::select('email')->get();
        $emails = User::pluck('email')->toArray();
        $data = ['Title'=>'programming', 'body'=>'php'];

        foreach ($emails as $email){

            Mail::to($email)->send(new EmailNotification($data));

        }
    }
}
