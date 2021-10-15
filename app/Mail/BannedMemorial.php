<?php

namespace App\Mail;

use App\Memorial;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BannedMemorial extends Mailable
{
    use Queueable, SerializesModels;
    public $memorial;

    /**
     * Create a new message instance.
     *
     * @param Memorial $memorial
     */
    public function __construct(Memorial $memorial)
    {
        $this->memorial = $memorial;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('no_reply@tributetoaloveone.com', 'Tribute To A Love One')
            ->subject('Your Memorial has been Suspended')
            ->markdown('emails.deactivateMemorial');
    }
}
