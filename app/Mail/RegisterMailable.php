<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegisterMailable extends Mailable
{
   use Queueable, SerializesModels;

   public $details;
   public $fromAddress;
   public $fromName;

   /**
    * Create a new message instance.
    *
    * @return void
    */
   public function __construct($details)
   {
      $this->details = $details;
      $this->fromAddress = $details['fromAddress'];
      $this->fromName = $details['fromName'];
   }

   /**
    * Build the message.
    *
    * @return $this
    */
   public function build()
   {
      return $this
         ->from($this->fromAddress, $this->fromName)
         ->subject('Validar Cuenta - Note Beer')
         ->view('template.email');
   }
}
