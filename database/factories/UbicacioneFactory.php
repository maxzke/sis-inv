<?php

namespace Database\Factories;

use App\Models\Ubicacione;
use Illuminate\Database\Eloquent\Factories\Factory;

class UbicacioneFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ubicacione::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->state,
        ];
    }
}
