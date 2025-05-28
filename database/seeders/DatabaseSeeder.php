<?php

namespace Database\Seeders;

use App\Models\Bast;
use App\Models\Invoice;
use App\Models\KakRab;
use App\Models\Project;
use App\Models\Sp2d;
use App\Models\Sph;
use App\Models\Spk;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Super Admin',
            'username' => 'admin',
            'email' => 'test@example.com',
            'password' => 'password123)',
        ]);

        User::factory(10)->create();
        // Project::factory()->count(10)->create()->each(function ($project) {
        //     $project_id = $project->id;

        //     Sph::factory()->create(['project_id' => $project_id]);
        //     Spk::factory()->create(['project_id' => $project_id]);
        //     KakRab::factory()->create(['project_id' => $project_id]);
        //     Invoice::factory()->create(['project_id' => $project_id]);
        //     Bast::factory()->create(['project_id' => $project_id]);
        //     Sp2d::factory()->create(['project_id' => $project_id]);
        // });
    }
}
