<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Models\Subscriber;
use App\Mail\NewPortfolioMail;

class NotifySubscribersOfNewPortfolio implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $portfolio;

    /**
     * Create a new job instance.
     */
    public function __construct($portfolio)
    {
        $this->portfolio = $portfolio;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $subscribers = Subscriber::where('is_active', true)->get();
        foreach ($subscribers as $subscriber) {
            Mail::to($subscriber->email)->send(new NewPortfolioMail($this->portfolio, $subscriber));
        }
    }
}
