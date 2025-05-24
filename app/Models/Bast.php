<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bast extends Model
{
    /** @use HasFactory<\Database\Factories\BastFactory> */
    use HasFactory;

    protected $table = 'bast';

    protected $fillable = [
        'project_id',
        'bast_file',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
