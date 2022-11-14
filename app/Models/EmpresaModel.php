<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpresaModel extends Model
{
    use HasFactory;

    protected $primaryKey = 'idEmpresa';
    protected $table = 'empresas';
    protected $fillable = [
        'razonSocial',
        'nombreCompleto',
        'direccion',
        'telefono',
        'correo',
    ];
}
