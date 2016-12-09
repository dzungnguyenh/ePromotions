<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ConfirmationAccount extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    /**
     * [__construct description]
     *
     * @param User $user [description]
     */
    public function __construct(User $user)
    {
        $this->use = $user;
    }
   
   /**
    * Buid the message
    *
    * @return view
    */
    public function build()
    {
        return $this->view('emails.confirmation');
    }
}
