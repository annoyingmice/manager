<?php

namespace App\Console\Commands;

use App\Models\Subscription;
use Illuminate\Console\Command;

class SubscriptionCheck extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'subscription:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $subscriptions = Subscription::where('status_id', 2)->get();

        foreach($subscriptions as $sub)
        {
            if(now()->greaterThan($sub->expires_at))
            {
                $sub->status_id = 1; // set expired
                $sub->save();
            }
        }
    }
}
