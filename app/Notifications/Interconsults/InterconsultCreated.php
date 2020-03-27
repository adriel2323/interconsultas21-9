<?php

namespace App\Notifications\Interconsults;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use NotificationChannels\ChatAPI\ChatAPIChannel;
use NotificationChannels\ChatAPI\ChatAPIMessage;


class InterconsultCreated extends Notification
{
    use Queueable;
    protected $interconsulting;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($interconsult)
    {
        $this->interconsulting = $interconsult;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [ChatAPIChannel::class];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return ChatAPIMessage
     */
    public function toChatAPI($notifiable)
    {
        $text = "Estimado *".$this->interconsulting->requested->name."*\n";
        $text .= "*".$this->interconsulting->requester->name."* lo ha solicitado para realizar una interconsulta.\n";
        $text .= "*Fecha:* ". Carbon::parse($this->interconsulting->created_at)->format('d/m/Y')."\n";
        $text .= "*Solicitante:* ". $this->interconsulting->requester->name."\n";
        $text .= "*Habitación:* ". $this->interconsulting->room->name."\n";
        $text .= "*Observaciones:* \n". $this->interconsulting->observations."\n";
        $text .= "*Haga click en el siguiente enlace para marcar la interconsulta como vista:* \n";
        $text .= 'http://interconsultas.fnsr.com.ar/Interconsultings/notifications/setViewedStatus/'.$this->interconsulting->id;
        $text .= "\nMuchas Gracias\nAdministración FNSR";

        return ChatAPIMessage::create()
            ->to($this->interconsulting->requested->phone)
            ->content($text);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
