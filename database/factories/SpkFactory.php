<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Spk>
 */
class SpkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $project_id = Project::inRandomOrder()->first()->id;
        $no_spk = "SPK-" . fake()->randomNumber(6);

        return [
            'project_id' => $project_id,
            'no_spk' => $no_spk,
            'spk_file' => '/storage/spk/default.webp',
        ];
    }
}
