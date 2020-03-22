<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trabajador extends Model
{
    protected $table = 'trabajador';
    protected $primaryKey = 'trab_id';
    public $timestamps = false;
    protected $fillable = [
        'trab_dni',
        'trab_apellidos',
        'trab_nombres',
        'trab_usuario'
    ];
    protected $guarded = [];
}