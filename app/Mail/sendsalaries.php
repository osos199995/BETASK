<?php

namespace App\Mail;

use App\salaries;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class sendsalaries extends Mailable
{
    use Queueable, SerializesModels;
    public $request;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($request)
    {

        $this->request = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->from('mohamed95sobh@gmail.com','BETASK app ')
            ->view('emails.salaries')->with([
                'salary' => $this->request->salary,
                'bonous' => $this->request->bonous,
            ]);


    }
}
