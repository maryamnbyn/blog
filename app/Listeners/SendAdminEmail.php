<?php

namespace App\Listeners;

use App\Events\CommentCreated;
use App\Mail\SendCommentCreated;
use App\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class SendAdminEmail implements shouldQueue
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
     * @param  CommentCreated  $event
     * @return void
     */
    public function handle(CommentCreated $event)
    {
        $users = User::where('role','admin')->pluck('email')->toArray();
        foreach ($users as $user)
        {
            Mail::to($user)->send(new SendCommentCreated($event->comment,$event->user));
        };


    }
}
