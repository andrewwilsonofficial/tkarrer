<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Report>
 */
class ReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => $this->faker->numberBetween(1, 10),
            'name' => $this->faker->realText(60),
            'source' => $this->faker->company(),
            'url' => $this->faker->url(),
            'published_at' => $this->faker->date(),
            'description' => $this->faker->realText(1000),
            'report_type' => $this->faker->randomElement(['report', 'proof']),
            'file_path' => 'example.pdf'
        ];
    }
}
