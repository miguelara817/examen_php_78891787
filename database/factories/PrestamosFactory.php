<?php

namespace Database\Factories;

use App\Models\Prestamos;
Use App\Models\Libro;
Use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;

class PrestamosFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     * 
     * @var string
     */
    protected $model = Prestamos::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // 'libro_id' => $this->faker->numberBetween(1, 500),
            'libro_id' => $this->faker->numberBetween(1, Libro::count()),
            // 'cliente_id' => $this->faker->numberBetween(1, 6),
            'cliente_id' => $this->faker->numberBetween(1, Cliente::count()),
            'fecha_prestamo' => $this->faker->dateTimeBetween('-3 years', '-1 week'),
            'dias_prestamo' => $this->faker->numberBetween(1, 30),
            'estado' => $this->faker->randomElement(['En Prestamo', 'Devuelto']),
        ];
    }
}
