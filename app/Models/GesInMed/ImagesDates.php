<?php

namespace App\Models\GesInMed;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;

class ImagesDates extends BaseModel
{
    public $connection = 'Hospital';

    public $table = 'IMG_TURNO';

    public $fillable = [
        'IMG_TURNO_ID',
        'IMG_TURNO_FECHA',
        'IMG_TURNO_PACIENTE_ID',
        'IMG_TURNO_HORA_INICIO',
        'IMG_TURNO_HORA_FIN',
        'IMG_TURNO_ESPECIALIDAD',
        'IMG_TURNO_MEDICO',
        'IMG_TURNO_SOBRETURNO',
        'IMG_TURNO_ESTADO',
        'IMG_TURNO_BONO_ID',
        'IMG_TURNO_FECHA_HORA_GUARDADO',
        'IMG_TURNO_FORZADO',
        'IMG_TURNO_ELIMINADO',
        'IMG_TURNO_VENCIDO',
        'IMG_TURNO_MINUTOS',
        'IMG_TURNO_MINUTOSFIJOS',
        'IMG_TURNO_FECHA_FIN',
        'IMG_TURNO_USUARIO',
        'IMG_TURNO_X_EMAIL',
        'IMG_TURNO_ELIMINADO_FECHA',
        'IMG_TURNO_ELIMINADO_USUARIO',
        'IMG_TURNO_RECEPCION_ARRIBO',
        'IMG_TURNO_RECEPCION_ARRIBO_USUARIO',
        'IMG_TURNO_RECEPCION_INICIO_FECHA',
        'IMG_TURNO_RECEPCION_INICIO_USUARIO',
        'IMG_TURNO_USUARIO_RECEPCION_FIN_FECHA',
        'IMG_TURNO_USUARIO_RECEPCION_FIN_USUARIO',
        'IMG_TURNO_TIPO',
        'IMG_TURNO_HORA_VISIBLE',
        'ID_TEMP' => 'integer',
        'IMG_TURNO_COMENTARIO',
        'IMG_TURNO_FECHA_ENTREGA',
        'IMG_TURNO_MEDICODERIVANTEID',
        'IMG_CLAVE_WEB',
        'UNICO_REGISTRO',
        'IMG_TURNO_OBRASOCIAL'
    ];

    public $casts = [
        'IMG_TURNO_ID' => 'integer',
        'IMG_TURNO_FECHA' => 'datetime',
        'IMG_TURNO_PACIENTE_ID' => 'integer',
        'IMG_TURNO_HORA_INICIO' => 'integer',
        'IMG_TURNO_HORA_FIN' => 'string',
        'IMG_TURNO_ESPECIALIDAD' => 'string',
        'IMG_TURNO_MEDICO' => 'integer',
        'IMG_TURNO_SOBRETURNO' => 'integer',
        'IMG_TURNO_ESTADO' => 'boolean',
        'IMG_TURNO_BONO_ID' => 'integer',
        'IMG_TURNO_FECHA_HORA_GUARDADO' => 'datetime',
        'IMG_TURNO_FORZADO' => 'boolean',
        'IMG_TURNO_ELIMINADO' => 'boolean',
        'IMG_TURNO_VENCIDO' => 'boolean',
        'IMG_TURNO_MINUTOS' => 'integer',
        'IMG_TURNO_MINUTOSFIJOS' => 'boolean',
        'IMG_TURNO_FECHA_FIN' => 'datetime',
        'IMG_TURNO_USUARIO' => 'integer',
        'IMG_TURNO_X_EMAIL' => 'boolean',
        'IMG_TURNO_ELIMINADO_FECHA' => 'datetime',
        'IMG_TURNO_ELIMINADO_USUARIO' => 'integer',
        'IMG_TURNO_RECEPCION_ARRIBO' => 'datetime',
        'IMG_TURNO_RECEPCION_ARRIBO_USUARIO' => 'integer',
        'IMG_TURNO_RECEPCION_INICIO_FECHA' => 'integer',
        'IMG_TURNO_RECEPCION_INICIO_USUARIO' => 'datetime',
        'IMG_TURNO_USUARIO_RECEPCION_FIN_FECHA' => 'integer',
        'IMG_TURNO_USUARIO_RECEPCION_FIN_USUARIO' => 'datetime',
        'IMG_TURNO_TIPO' => 'integer',
        'IMG_TURNO_HORA_VISIBLE' => 'boolean',
        'ID_TEMP' => 'integer',
        'IMG_TURNO_COMENTARIO' => 'string',
        'IMG_TURNO_FECHA_ENTREGA' => 'datetime',
        'IMG_TURNO_MEDICODERIVANTEID' => 'integer',
        'IMG_CLAVE_WEB' => 'string',
        'UNICO_REGISTRO' => 'boolean',
        'IMG_TURNO_OBRASOCIAL' => 'integer',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function derivativeDoctor()
    {
        return $this->belongsTo(DerivativeDoctors::class,'IMG_TURNO_MEDICODERIVANTEID','MD_ID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function os()
    {
        return $this->belongsTo(Os::class,'IMG_TURNO_OBRASOCIAL','Id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function patient()
    {
        return $this->belongsTo(Patients::class,'IMG_TURNO_PACIENTE_ID','cuil');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function speciality()
    {
        return $this->belongsTo(Speciality::class,'IMG_TURNO_ESPECIALIDAD','Id');
    }

    public function doctor()
    {
        return $this->belongsTo(Doctors::class, 'IMG_TURNO_MEDICO', 'Id');
    }




}
