<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sph>
 */
class SphFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $project_id = Project::inRandomOrder()->first()->id;
        $no_sph = "SPH-" . fake()->randomNumber(6);
        $file = '/storage/sph/default.webp';

        return [
            'project_id' => $project_id,
            'no_sph' => $no_sph,
            'berita_acara_file' => $file,
            'acara_negosiasi_file' => $file,
        ];
    }
}
