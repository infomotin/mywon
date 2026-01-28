<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewPortfolioMail extends Mailable
{
    use Queueable, SerializesModels;

    public $portfolio;
    public $subscriber;

    /**
     * Create a new message instance.
     */
    public function __construct($portfolio, $subscriber)
    {
        $this->portfolio = $portfolio;
        $this->subscriber = $subscriber;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Project Showcase: ' . $this->portfolio->title,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.new_portfolio',
        );
    }
}
