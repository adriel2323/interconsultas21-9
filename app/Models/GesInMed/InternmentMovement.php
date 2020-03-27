<?php

namespace App\Models\GesInMed;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;

class InternmentMovement extends BaseModel
{
    protected $connection = 'Hospital';

    public $table = 'InternacionMovimiento';

    public $casts = [
        'InternacionId' => 'integer',
        'Fecha' => 'date',
        'ServicioId' => 'integer',
        'SalaId' => 'integer',
        'CamaId' => 'integer',
        'Diagnostico' => 'string',
        'HospPorId' => 'integer',
        'MotivoIngresoId' => 'integer',
        'Observaciones' => 'integer',
        'EspecialidadId' => 'integer',
        'MedicoId' => 'integer'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function internment()
    {
        return $this->belongsTo(Internment::class,'InternacionId','Id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function service()
    {
        return $this->belongsTo(Service::class,'ServicioId','SERV_ID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function room()
    {
        return $this->belongsTo(Room::class,'SalaId','Id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function bed()
    {
        return $this->belongsTo(Bed::class,'CamaId','Id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function entryReason()
    {
        return $this->belongsTo(EntryReason::class,'MotivoIngresoId','Id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function speciality()
    {
        return $this->belongsTo(Speciality::class,'EspecialidadId','Id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function doctor()
    {
        return $this->belongsTo(Doctors::class,'MedicoId','Id');
    }
}
