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
        Schema::create('kak_rab', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Project::class, 'project_id')->constrained()->onDelete('cascade');
            $table->string('no_kak');
            $table->string('no_rab');
            $table->string('kak_file');
            $table->string('rab_file');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kak_rabs');
    }
};
