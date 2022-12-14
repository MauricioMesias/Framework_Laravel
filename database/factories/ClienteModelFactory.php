<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClienteModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre'            =>$this->faker->name,
            'apellidoPaterno'   =>$this->faker->firstName,
            'apellidoMaterno'   =>$this->faker->lastName,
            'telefono'          =>$this->faker->phoneNumber,
            'correo'            =>$this->faker->unique()->safeEmail(),
            'direccion'         =>$this->faker->address,
            'idProducto'        =>$this->faker->numberBetween(1,30),
        ];
    }
}
