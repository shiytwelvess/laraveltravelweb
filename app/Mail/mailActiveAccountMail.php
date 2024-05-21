<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class mailActiveAccountMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $account;

    public function __construct($account)
    {
        $this->account = $account;
    }

    public function build()
    {
        return $this->subject('Kích hoạt tài khoản...')
                    ->view('client.kich_hoat_tai_khoan', ['account' => $this->account]);
    }
}
