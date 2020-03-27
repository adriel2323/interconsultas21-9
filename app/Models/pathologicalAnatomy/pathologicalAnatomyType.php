<?php

namespace App\Models\pathologicalAnatomy;

use Illuminate\Database\Eloquent\Model;

class pathologicalAnatomyType extends Model
{
    public $table = 'pathological_anatomy_types';

    public $timestamps = false;

    public $fillable = [
        'name'
    ];

    protected $casts = [
        'id' => 'int',
        'name' => 'string'
    ];

    public static $rules = [
        'name' => 'required|unique:pathological_anatomy_types, name'
    ];

    public static $messages = [
        'name.required' => 'Debe completar el campo NOMBRE.',
        'name.unique' => 'El nombre ingresado ya existe en la base de datos.'
    ];
}
