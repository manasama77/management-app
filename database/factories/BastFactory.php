<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bast>
 */
class BastFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $project_id = Project::inRandomOrder()->first()->id;

        return [
            'project_id' => $project_id,
            'bast_file' => '/storage/bast/default.webp',
        ];
    }
}
