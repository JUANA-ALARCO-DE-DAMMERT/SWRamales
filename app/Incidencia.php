<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incidencia extends Model
{
    protected $table = 'incidencia';
    protected $primaryKey = 'inc_id';
    public $timestamps = false;
    protected $fillable = [
        'inc_codanydesk',
        'inc_passanydesk',
        'inc_observacion',
        'inc_estado',
        'inc_tecnico'
    ];
    protected $guarded = [];
}