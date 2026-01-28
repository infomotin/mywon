<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewsletterMail;

class SendNewsletterJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $subscribers;
    protected $subject;
    protected $message;

    /**
     * Create a new job instance.
     */
    public function __construct($subscribers, $subject, $message)
    {
        $this->subscribers = $subscribers;
        $this->subject = $subject;
        $this->message = $message;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        foreach ($this->subscribers as $subscriber) {
            Mail::to($subscriber->email)->send(new NewsletterMail($this->subject, $this->message));
        }
    }
}
