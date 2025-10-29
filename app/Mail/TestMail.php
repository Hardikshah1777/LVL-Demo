<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;
    protected $name;
    public function __construct($name)
    {
        $this->name = $name;
    }

    public function build()
    {
        return $this
            ->subject('Test Email')
            ->view('emails.test')
            ->with([
                'name' => $this->name,
            ]);
    }
}
