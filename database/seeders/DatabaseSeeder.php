<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\EmpresaModel;
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
        User::factory(30)->create();
        EmpresaModel::factory(30)->create();
        ProductoModel::factory(30)->create();
        ClienteModel::factory(30)->create();
    }
}
