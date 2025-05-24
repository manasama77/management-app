<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sp2d extends Model
{
    /** @use HasFactory<\Database\Factories\Sp2dFactory> */
    use HasFactory;

    protected $table = 'sp2d';

    protected $fillable = [
        'project_id',
        'no_sp2d',
        'sp2d_file',
        'nilai_project_file',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
