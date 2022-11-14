<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoModel extends Model
{
    use HasFactory;
    protected $primarykey = 'idProducto';
    protected $foreignKey = 'idEmpresa';
    protected $table = 'productos';
    protected $fillable = [
            'nombre',
            'descripcion',
            'precio',
            'expiracion',
            'stock',
            'idEmpresa',
    ];

    public function empresa(){
        return $this->belognsTo('App\Models\EmpresaModel', 'idEmpresa', 'idEmpresa');
    }
}
