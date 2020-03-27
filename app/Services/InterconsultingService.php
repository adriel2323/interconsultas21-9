<?php

namespace App\Services;

use App\Mail\interconsultings\CancelInterconsulting;
use App\Mail\interconsultings\CreateInterconsult;
use App\Notifications\Interconsults\InterconsultCreated;
use App\Notifications\Interconsults\InterconsultingCancelled;
use Carbon\Carbon;
use Telegram\Bot\Laravel\Facades\Telegram;

class InterconsultingService
{
    public function sendStoreNotification($interconsulting)
    {
        $this->sendStoreMail($interconsulting);

        $this->sendStoreTelegramMessage($interconsulting);

        $this->sendStoreWhatsappMessage($interconsulting);

    }

    public function sendCancelledInterconsultingNotification($interconsulting)
    {
        $this->sendInterconsultCancelledMail($interconsulting);

        $this->sendInterconsultCancelledTelegramMessage($interconsulting);

        $this->sendInterconsultCancelledWhatsappMessage($interconsulting);
    }

    public function sendInterconsultCancelledMail($interconsulting)
    {
        if($interconsulting->requested->email != null) {

            \Mail::to($interconsulting->requested->email)->send(new CancelInterconsulting($interconsulting));
        }
    }

    public function sendInterconsultCancelledTelegramMessage($interconsulting)
    {
        if($interconsulting->requested->telegram_id != null)
        {
            $text = "Estimado <b>".$interconsulting->requested->name."</b>\n";
            $text .= "<b>".$interconsulting->requester->name."</b> canceló la interconsulta solicitada con fecha ". Carbon::parse($interconsulting->created_at)->format('d/m/Y')." para la habitación <b>".$interconsulting->room->name."</b>.\n";
            $text .= "Muchas Gracias\nAdministración FNSR";

            Telegram::sendMessage([
                "chat_id" =>  $interconsulting->requested->telegram_id,
                "parse_mode" => "HTML",
                "text" => $text
            ]);
        }
    }

    public function sendInterconsultCancelledWhatsappMessage($interconsulting)
    {
        if($interconsulting->requested->phone != null) {

            $interconsulting->notify(new InterconsultingCancelled($interconsulting));

        }
    }

    private function sendStoreMail($interconsulting)
    {
        if($interconsulting->requested->email != null) {

            \Mail::to($interconsulting->requested->email)->send(new CreateInterconsult($interconsulting));

        }
    }

    private function sendStoreTelegramMessage($interconsulting)
    {
        if($interconsulting->requested->telegram_id != null)
        {
            $text = "Estimado <b>".$interconsulting->requested->name."</b>\n";
            $text .= "<b>".$interconsulting->requester->name."</b> lo ha solicitado para realizar una interconsulta.\n";
            $text .= "<b>Fecha: </b>". Carbon::parse($interconsulting->created_at)->format('d/m/Y')."\n";
            $text .= "<b>Solicitante: </b>". $interconsulting->requester->name."\n";
            $text .= "<b>Habitación: </b>". $interconsulting->room->name."\n";
            $text .= "<b>Observaciones: </b>\n". $interconsulting->observations."\n";
            $text .= "<b>Haga click en el siguiente enlace para marcar la interconsulta como vista: </b>\n";
            $text .= '<a href="http://interconsultas.fnsr.com.ar/Interconsultings/notifications/setViewedStatus/'.$interconsulting->id.'">Marcar como visto</a>';
            $text .= "\nMuchas Gracias\nAdministración FNSR";

            Telegram::sendMessage([
                "chat_id" =>  $interconsulting->requested->telegram_id,
                "parse_mode" => "HTML",
                "text" => $text
            ]);
        }
    }

    private function sendStoreWhatsappMessage($interconsulting)
    {
        if($interconsulting->requested->phone != null) {

            $interconsulting->notify(new InterconsultCreated($interconsulting));

        }
    }
}