<?php

namespace App\Jobs;

use App\Reminder;
use GuzzleHttp\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendReminder
{
    protected $client;
    protected $reminder;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Reminder $reminder)
    {
        $this->reminder = $reminder;
        $this->client = new Client;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->client->request('GET', $this->buildRequestURL());

        if ($this->reminder->shouldOnlyRunOnce()) {
            $this->reminder->delete();
        }
    }

    protected function buildRequestURL()
    {
        $secret  = env('TELEGRAM_SECRET');
        $chat    = env('TELEGRAM_CHAT_ID');
        $message = "Reminder: {$this->reminder->body}";

        return "https://api.telegram.org/bot{$secret}/sendMessage?chat_id={$chat}&text={$message}";
    }
}
