<?php

namespace App\Models\Surgery;

use App\Models\BaseModel;
use App\Models\Doctor;
use App\Models\SurgeryEvent;
use Illuminate\Database\Eloquent\Model;

class SurgeryDoctorParticipation extends BaseModel
{
    protected $table = "surgery_doctor_participation";

    protected $fillable = [
        "surgery_event_id",
        "doctor_id"
    ];

    protected $casts = [
            "surgery_event_id" => 'integer',
            "doctor_id" => 'integer',
        ];

    public static $rules = [
        "surgery_event_id" => 'required',
        "head_surgeon" => 'required',
    ];

    public static $messages = [
        "head_surgeon.required" => "Debe ingresar AL MENOS el cirujano que realizará la cirugía.",
    ];

    public function surgery()
    {
        return $this->belongsTo(SurgeryEvent::class, 'surgery_event_id');
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }
}
