<?php

namespace App\Models\Surgery;

use App\Models\BaseModel;
use App\Models\Doctor;
use App\Models\Os;
use App\Models\Rooms;
use Illuminate\Database\Eloquent\Model;

class SurgeryEventData extends BaseModel
{
    public $table = 'surgery_event_data';

    public $fillable = [
        'surgery_event_id',
        'room_id',
        'os',
        'patient_document',
        'patient_name',
        'surgery_type_id',
        'service',
        'biopsy',
        'surgery_schema',
        'comments',
        'surgeon_id',
        'transitory_check_in',
        'local_anesthesia',
        'sedation',
        'x_ray_specialist_needed',
        'origin_room_id'
    ];

    public $casts = [
            'surgery_event_id' => 'integer',
            'room_id' => 'integer',
            'os' => 'integer',
            'patient_document' => 'string',
            'patient_name' => 'string',
            'surgery_type' => 'string',
            'service' => 'string',
            'biopsy' => 'boolean',
            'surgery_schema' => 'string',
            'comments' => 'string',
            'origin_room_id' => 'integer'
        ];


    public function SurgeryEvent()
    {
        return $this->belongsTo(SurgeryEvent::class);
    }

    public function room()
    {
        return $this->belongsTo(Rooms::class,'room_id','id');
    }

    public function surgeon()
    {
        return $this->belongsTo(Doctor::class, 'surgeon_id')->withTrashed();
    }

    public function surgeryType()
    {
        return $this->belongsTo(SurgeryType::class, 'surgery_type_id')->withTrashed();
    }

    public function Os()
    {
        return $this->belongsTo(Os::class, 'os');
    }

}
