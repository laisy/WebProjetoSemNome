<?php

namespace Database\Factories;

use App\Models\Farmacia;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cnpj' => $faker->unique()->randomElement(['123456789101254', '223456789105847', '222456789104845', '323456789108526', '423456789104011', '523456789108578', '623456789107897', '723456789109674', '923456789104532', '293456789103366', '223456789112244']),
            'user_id' => $faker->unique()->numberBetween(1, 10),
        ];
    }
}
