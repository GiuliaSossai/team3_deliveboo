<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConfirmGuestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $new_order;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($new_order)
    {
        $this->new_order = $new_order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.mail-guest');
    }
}
