<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class HelpDeskTicketReply extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $subjects, $message, $ticket)
    {
         $this->name = $name;
        $this->subjects = $subjects;
        $this->message = $message;
        $this->ticket = $ticket;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('support@katsinastatenysc.com','KatsinaStateNysc')->subject('Katsina State Nysc HelpDesk '.'|'.$this->ticket)->markdown('helpdeskticketreply')->with(['name'=>$this->name, 'subjects'=>$this->subjects, 'message' => $this->message, 'ticket' => $this->ticket]);
    }
}
