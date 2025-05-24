<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KakRab extends Model
{
    /** @use HasFactory<\Database\Factories\KakRabFactory> */
    use HasFactory;

    protected $table = 'kak_rab';

    protected $fillable = [
        'project_id',
        'no_kak',
        'no_rab',
        'kak_file',
        'rab_file',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
