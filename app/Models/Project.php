<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /** @use HasFactory<\Database\Factories\ProjectFactory> */
    use HasFactory;

    protected $table = 'projects';

    protected $fillable = [
        'no_project',
        'project_name',
        'client',
        'year',
        'pic',
    ];

    protected $appends = ['progress'];

    public function getProgressAttribute()
    {
        $progress = 0;

        if($this->sph()->count() > 0) {
            $progress += (100 / 6);
        }

        if($this->spk()->count() > 0) {
            $progress += (100 / 6);
        }

        if($this->kak_rab()->count() > 0) {
            $progress += (100 / 6);
        }

        if($this->invoice()->count() > 0) {
            $progress += (100 / 6);
        }

        if($this->bast()->count() > 0) {
            $progress += (100 / 6);
        }

        if($this->sp2d()->count() > 0) {
            $progress += (100 / 6);
        }


        return round($progress, 0);
    }

    public function user_pic()
    {
        return $this->belongsTo(User::class, 'pic');
    }

    public function sph()
    {
        return $this->hasOne(Sph::class);
    }

    public function spk()
    {
        return $this->hasOne(Spk::class);
    }

    public function kak_rab()
    {
        return $this->hasOne(KakRab::class);
    }

    public function invoice()
    {
        return $this->hasOne(Invoice::class);
    }

    public function bast()
    {
        return $this->hasOne(Bast::class);
    }

    public function sp2d()
    {
        return $this->hasOne(Sp2d::class);
    }
}
