<?php

namespace App\Listeners;

use App\Events\CommentCreated;
use App\Mail\SendCommentCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
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
        Mail::to($event->user)->send(new SendCommentCreated($event->comment,$event->user));

    }
}
