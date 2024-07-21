<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EmailVerifyRegister extends Mailable
{
    use Queueable, SerializesModels;
    public $data;

    /**
     * Create a new message instance.
     *
     * @param $data
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = !empty($this->data['titleEmail']) ? $this->data['titleEmail'] : 'Thủ tục đăng ký tài khoản của VitaTech_Axis';
        if (view()->exists('email.common_template')) {
            return $this->from(env('MAIL_USERNAME', 'laravel@gmail.com'))
                ->subject($subject)
                ->view('email.common_template');
        }
    }
}
