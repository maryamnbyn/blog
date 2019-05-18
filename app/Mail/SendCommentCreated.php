<?php

namespace App\Mail;

use App\Comment;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendCommentCreated extends Mailable
{
    use Queueable, SerializesModels;
    public $comment;
    public $userName;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Comment $comment,$userName)
    {
        $this->comment = $comment;
        $this->userName = $userName;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.comments.created');
    }
}
