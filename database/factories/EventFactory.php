<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(mt_rand(2, 4)),
            'slug' => fake()->slug(),
            'body' => collect(fake()->paragraph(mt_rand(5, 10)))->map(fn ($p) => "<p>$p</p>")->implode(''),
            'user_id' => 2,
        ];
    }
}
