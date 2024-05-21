<?php

namespace App\Jobs;

use App\Mail\mailActiveAccountMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class sendMailActiveAccountJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $account;

    public function __construct($account)
    {
        $this->account = $account;
    }

    public function handle()
    {
        Mail::to($this->account['email'])->send(new mailActiveAccountMail($this->account));

    }
}
