<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function temporadas()
    {
        return $this->hasMany(Season::class, 'series_id');
    }
    public function episodioas()
    {
        return $this->hasMany(Episode::class);
    }
}
