<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compañia extends Model
{
    protected $table = 'compañias';
    public $timestamps = true;
    protected $fillable = [
        'nombre',
        'correo',
        'logo',
        'pagina_web'
    ];
    use HasFactory;
}
