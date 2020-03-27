<?php

namespace App\Http\Controllers\employeesModule;

use App\Http\Requests\employeesModule\StoreExtraHourRequest;
use App\Mail\ExtraHoursRequests\ExtraHoursRequestMailNotification;
use App\Models\employeesModule\ExtraHourRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExtraHoursController extends Controller
{
    public function create()
    {
        return view('employeesModule.ExtraHourRequest.create');
    }

    public function storeRequest(StoreExtraHourRequest $request)
    {
        $extraHoursRequest = ExtraHourRequest::create($request->all());

        \Mail::to('personal@fnsr.com.ar')->send(new ExtraHoursRequestMailNotification($extraHoursRequest));

        \Flash::success('Pedido de horas extras envíado. Será notificado por whatsapp si el pedido es aprobado o no.');

        return redirect('/ExtraHourRequest');
    }
}
