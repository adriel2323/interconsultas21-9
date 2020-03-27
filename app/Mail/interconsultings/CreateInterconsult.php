<?php

namespace App\Mail\interconsultings;

use App\Models\Interconsulting;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateInterconsult extends Mailable
{
    use Queueable, SerializesModels;

    protected $interconsult;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Interconsulting $interconsult)
    {
        $this->interconsult = $interconsult;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("Interconsulta solicitada")
                    ->markdown('emails.interconsulting.created')
                    ->with('interconsult',$this->interconsult);
    }
}
