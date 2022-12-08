<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProveedorModel;

class ProveedorModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProveedorModel::factory(30)->create();
    }
}
