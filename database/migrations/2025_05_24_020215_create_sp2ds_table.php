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
        Schema::create('sp2d', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Project::class, 'project_id')->constrained()->onDelete('cascade');
            $table->string('no_sp2d');
            $table->string('sp2d_file');
            $table->string('nilai_project_file');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sp2ds');
    }
};
