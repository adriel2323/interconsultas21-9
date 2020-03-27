<?php

namespace App\Mail\interconsultings;

use App\Models\Interconsulting;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CancelInterconsulting extends Mailable
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
        return $this->subject("Interconsulta Cancelada")
            ->markdown('emails.interconsulting.cancelled')
            ->with('interconsult',$this->interconsult);
    }
}
