<?php

namespace App\Http\Controllers;

use App\DataTables\kairosDataTable;
use App\Imports\AccountingVendorImports;
use App\Models\GesInMed\Internment;
use App\Models\GesInMed\InternmentMovement;
use App\Models\GesInMed\Patients;
use App\Models\kairos\Products;
use App\Models\Users;
use Barryvdh\Snappy\Facades\SnappyPdf;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Knp\Snappy\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use NotificationChannels\ChatAPI\ChatAPIMessage;
use Telegram\Bot\Laravel\Facades\Telegram;
use Telegram\Bot\FileUpload\InputFile;
use NumerosEnLetras;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

}
