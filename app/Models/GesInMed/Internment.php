<?php

namespace App\Models\GesInMed;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;

class Internment extends BaseModel
{
    protected $connection = 'Hospital';

    public $table = 'Internacion';

    public $casts = [
        'Id' => 'integer',
        'AfiliadoId' => 'integer',
        'Fecha' => 'date',
        'ServicioId' => 'integer',
        'SalaId' => 'integer',
        'CamaId' => 'integer',
        'Telefono' => 'string',
        'Diagnostico' => 'string',
        'HospPorId' => 'integer',
        'MotivoIngresoId' => 'integer',
        'Observaciones' => 'string',
        'EspecialidadId' => 'integer',
        'MedicoId' => 'integer',
        'state_id' => 'integer',
        'MotivoDeEgresoId' => 'integer',
        'ObservacionFinal' => 'string',
        'Operado' => 'boolean',
        'OperadoFecha' => 'date',
        'EgresoEspecialidadId' => 'integer',
        'EgresoMedicoId' => 'integer',
        'EgresoCancelado' => 'boolean',
        'EgresoFecha' => 'date',
        'NHC' => 'integer'
    ];

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
    public function hospitalizer()
    {
        return $this->belongsTo(Hospitalizers::class,'HospPorId','Id');
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function exitReason()
    {
        return $this->belongsTo(ExitReason::class,'MotivoDeEgresoId','Id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function dismissedBy()
    {
        return $this->belongsTo(Doctors::class,'EgresoMedicoId','Id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function movements()
    {
        return $this->hasMany(InternmentMovement::class,'InternacionId');
    }

}
