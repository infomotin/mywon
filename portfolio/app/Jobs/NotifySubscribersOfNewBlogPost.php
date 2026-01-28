<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Models\Subscriber;
use App\Mail\NewBlogPostMail;

class NotifySubscribersOfNewBlogPost implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $blog;

    /**
     * Create a new job instance.
     */
    public function __construct($blog)
    {
        $this->blog = $blog;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $subscribers = Subscriber::where('is_active', true)->get();
        foreach ($subscribers as $subscriber) {
            Mail::to($subscriber->email)->send(new NewBlogPostMail($this->blog, $subscriber));
        }
    }
}
