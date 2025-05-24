<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spk extends Model
{
    /** @use HasFactory<\Database\Factories\SpkFactory> */
    use HasFactory;

    protected $table = 'spk';

    protected $fillable = [
        'project_id',
        'no_spk',
        'spk_file',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
