<?php

namespace Database\Factories;

use App\Models\Report;
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
        $current_sources = Report::select('source')->distinct()->get()->pluck('source')->toArray();

        if (count($current_sources) > 20) {
            $source = $this->faker->randomElement($current_sources);
        } else {
            $source = $this->faker->company();
        }

        return [
            'category_id' => $this->faker->numberBetween(1, 9),
            'name' => $this->faker->realText(60),
            'source' => $source,
            'url' => $this->faker->url(),
            'published_at' => $this->faker->date(),
            'description' => $this->faker->realText(1000),
            'report_type' => $this->faker->randomElement(['report', 'proof']),
            'file_path' => 'example.pdf'
        ];
    }
}
