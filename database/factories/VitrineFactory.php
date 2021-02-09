<?php

namespace Database\Factories;

use App\Models\Vitrine;
use App\Models\Farmacia;
use Illuminate\Database\Eloquent\Factories\Factory;

class VitrineFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Vitrine::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
          'farmacia_id' => Farmacia::factory()->create()->id,
        ];
    }
}
