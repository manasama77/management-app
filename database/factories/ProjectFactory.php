<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $no_project = "PRJ-" . fake()->randomNumber(6);
        $client = fake()->company();
        $pic = User::where('id', '>', 1)->inRandomOrder()->first();

        return [
            'no_project' => $no_project,
            'project_name' => "Project " . $client,
            'client' => $client,
            'year' => 2025,
            'pic' => $pic,
        ];
    }
}
