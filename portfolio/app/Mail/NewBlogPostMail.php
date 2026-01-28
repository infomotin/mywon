<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewBlogPostMail extends Mailable
{
    use Queueable, SerializesModels;

    public $blog;
    public $subscriber;

    /**
     * Create a new message instance.
     */
    public function __construct($blog, $subscriber)
    {
        $this->blog = $blog;
        $this->subscriber = $subscriber;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Blog Post: ' . $this->blog->title,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.new_blog_post',
        );
    }
}
