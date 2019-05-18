<?php

namespace App\Jobs;

use App\Comment;
use App\Http\Requests\UserStoreRequest;
use App\Mail\SendCommentCreated;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;

class verificationEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $tries = 5;
    public $comment;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($comment)
    {
        $this->comment = $comment;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $users = User::where('role','admin')->get(['email' , 'name'])->toArray();

        foreach ($users as  $user )
        {
            Mail::to($user['email'])->send(new SendCommentCreated($this->comment,$user['name']));
        };
    }
}
