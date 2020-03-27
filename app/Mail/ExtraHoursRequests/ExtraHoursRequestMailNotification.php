<?php

namespace App\Mail\ExtraHoursRequests;

use App\Models\employeesModule\ExtraHourRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ExtraHoursRequestMailNotification extends Mailable
{
    use Queueable, SerializesModels;

    protected $extraHoursRequest;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ExtraHourRequest $extraHourRequest)
    {
        $this->extraHoursRequest = $extraHourRequest;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("Solicitud de horas extras.")
            ->markdown('emails.ExtraHoursRequest.created')
            ->with('extraHourRequest', $this->extraHoursRequest);
    }
}
