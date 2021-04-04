<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DemoEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $demo;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($demo)
    {
        $this->demo = $demo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('grobovstax@mail.ru')
        ->view('emails/upload')
        ->subject('Document Upload')
        ->text('emails.demo_plain')
        ->with(
          [
                'testVarOne' => '1',
                'testVarTwo' => '2',
          ]);
          /*->attach($this->data['document']->getRealPath(),
          [
              'as' => $this->data['document']->getClientOriginalName(),
              'mime' => $this->data['document']->getClientMimeType(),
          ]);*/
    }
}
