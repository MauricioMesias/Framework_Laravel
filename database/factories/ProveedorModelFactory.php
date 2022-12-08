<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProveedorModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'razonSocial'       =>$this->faker->word,
            'nombreCompleto'    =>$this->faker->name,
            'direccion'         =>$this->faker->address,
            'telefono'          =>$this->faker->phoneNumber,
            'correo'            =>$this->faker->unique()->safeEmail(),
        ];
    }
}
