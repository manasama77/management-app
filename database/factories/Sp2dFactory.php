<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sp2d>
 */
class Sp2dFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $project_id = Project::inRandomOrder()->first()->id;
        $no_sp2d = "SP2D-" . fake()->randomNumber(6);

        return [
            'project_id' => $project_id,
            'no_sp2d' => $no_sp2d,
            'sp2d_file' => '/storage/sp2d/default.webp',
            'nilai_project_file' => '/storage/sp2d/default.webp',
        ];
    }
}
