<?php

use App\Models\Project;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sph', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Project::class, 'project_id')->constrained()->onDelete('cascade');
            $table->string('no_sph');
            $table->string('berita_acara_file');
            $table->string('acara_negosiasi_file');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sphs');
    }
};
