<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelpersController extends Controller
{
    public function betweenDates()
    {
        return view('helpers.betweenDates');
    }

    public function SurgeryEventsByDoctorBetweenDates()
    {
        return view('helpers.surgeryEvents.byDoctorBetweenDates');
    }

    public function formatDate($value)
    {
        $date = \Carbon\Carbon::parse($value)->format('Y-m-d');

        $date .= "T";

        $date .= \Carbon\Carbon::parse($value)->format('H:i:s');

        return $date;
    }
}
