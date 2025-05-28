<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sph extends Model
{
    /** @use HasFactory<\Database\Factories\SphFactory> */
    use HasFactory;

    protected $table = 'sph';

    protected $fillable = [
        'project_id',
        'no_sph',
        'berita_acara_file',
        'acara_negosiasi_file',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
