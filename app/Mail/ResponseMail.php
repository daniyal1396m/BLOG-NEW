<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResponseMail extends Mailable
{
    use Queueable, SerializesModels;

     private $details;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->$details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): static
    {
//        return $this->view('view.name');
        return $this->subject('این تست است ')->view('admin.adminTemp.singleMsgFormShow');
    }
}
