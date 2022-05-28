<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;
    protected $table = 'empleados';
    public $timestamps = true;
    protected $fillable = [
        'primer_nombre',
        'apellido',
        'compania_id',
        'correo',
        'telefono'
    ];
    
    public function compañia(){

            return $this->belongsTo(Compañia::class, 'compania_id', 'id');
    }
    
}
