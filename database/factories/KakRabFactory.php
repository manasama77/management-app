<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\KakRab>
 */
class KakRabFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $project_id = Project::inRandomOrder()->first()->id;
        $no_kak = "KAK-" . fake()->randomNumber(6);
        $no_rab = "RAB-" . fake()->randomNumber(6);

        return [
            'project_id' => $project_id,
            'no_kak' => $no_kak,
            'no_rab' => $no_rab,
            'kak_file' => '/storage/kak/default.webp',
            'rab_file' => '/storage/rab/default.webp',
        ];
    }
}
