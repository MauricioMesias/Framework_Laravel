<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EmpresaModel;

class EmpresaModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EmpresaModel::factory(30)->create();
    }
}
