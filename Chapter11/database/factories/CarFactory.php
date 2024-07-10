<?php

namespace Database\Factories;

use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Car::class;
    
    public function definition(): array
    {
        
        return [
            'user_id' => \App\Models\User::factory(),
            'make' => $this->faker->randomElement(['Toyota', 'Honda', 'Ford', 'BMW', 'Mercedes', 'Audi', 'Volkswagen', 'Subaru', 'Nissan', 'Mazda']),
            'model' => $this->faker->word,
            'year' => $this->faker->numberBetween(2000, 2024),
            'mileage' => $this->faker->numberBetween(0, 100000),
            'transmission' => $this->faker->randomElement(['Manual', 'Auto']),
            'daily_hire_cost' => $this->faker->randomFloat(2, 50, 500),
            'features' => $this->faker->sentence,
            'image_url' => 'https://png.pngtree.com/png-clipart/20220110/ourmid/pngtree-hand-drawn-hd-sports-car-model-material-png-image_4126721.png',
            'available' => $this->faker->boolean(90),
            'is_featured' => $this->faker->boolean(10),
            'views' => $this->faker->numberBetween(0, 1000),
            'is_approved' => $this->faker->boolean(80),
        ];
    }
}
