<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\ProveedorModel;
use App\Models\ProductoModel;
use App\Models\ClienteModel;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(5)->create();
        ProveedorModel::factory(30)->create(); 
        ProductoModel::factory(30)->create();
        ClienteModel::factory(30)->create();  
    }
    //FUNCION PARA CREAR LOS REGISTROS EN ESTE CASO SON 30 Y SE EJECUTA CON php artisan migrate:seed
}
