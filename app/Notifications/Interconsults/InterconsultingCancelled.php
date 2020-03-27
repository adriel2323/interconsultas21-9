<?php

namespace App\Notifications\Interconsults;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use NotificationChannels\ChatAPI\ChatAPIChannel;
use NotificationChannels\ChatAPI\ChatAPIMessage;

class InterconsultingCancelled extends Notification
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
     * Get the Whatsapp representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return ChatAPIMessage
     */
    public function toChatAPI($notifiable)
    {
        $text = "Estimado *".$this->interconsulting->requested->name."*\n";

        $text .= "*".$this->interconsulting->requester->name."* canceló la interconsulta solicitada con fecha ". Carbon::parse($this->interconsulting->created_at)->format('d/m/Y')." para la habitación *".$this->interconsulting->room->name."*.\n";

        $text .= "Muchas Gracias\nAdministración FNSR";

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
