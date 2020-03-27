<?php

namespace App\Models\Surgery;

use App\Models\BaseModel;
use App\Models\Doctor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;

class SurgeryEvent extends BaseModel
{
    use SoftDeletes;
    use Userstamps;

    protected $table = 'surgery_events';

    public $fillable = [
        'title',
        'start_date',
        'end_date',
        'resource_id',
        'status_id'
    ];

    public $casts = [
        'title' => 'string',
        'start_date' => 'datetime',
        'end_date' => 'datetime'
    ];

    public function EventData()
    {
        return $this->hasOne(SurgeryEventData::class,'surgery_event_id','id');
    }

    public function assistants()
    {
        return $this->belongsToMany(Doctor::class,'surgery_doctor_participation', 'surgery_event_id')->withTrashed();
    }

    public function anesthesists()
    {
        return $this->belongsToMany(Doctor::class,'surgery_event_anesthesist_participation', 'surgery_event_id')->withTrashed();
    }

    public function nurses()
    {
        return $this->belongsToMany(Doctor::class,'nurses_surgery_participation', 'surgery_event_id')->withTrashed();
    }

    public function instrumentists()
    {
        return $this->belongsToMany(Doctor::class,'instrumentists_surgery_participation', 'surgery_event_id')->withTrashed();
    }

    public function rxSpecialists()
    {
        return $this->belongsToMany(Doctor::class,'rx_specialists_surgery_participation', 'surgery_event_id')->withTrashed();
    }

    public function status()
    {
        return $this->belongsTo(EventStatus::class,'status_id');
    }

    public function surgeryRoom()
    {
        return $this->belongsTo(SurgeryRoom::class,'resource_id');
    }

    public function surgicalProtocol()
    {
        return $this->hasOne(SurgicalProtocol::class, 'surgery_event_id', 'id');
    }
}
