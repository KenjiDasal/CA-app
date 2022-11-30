<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;

    // protected $fillable = [

    //     'artist'

    // ];

    // protected $guarded = [];

    public function art()
    {
        return $this->belongstoMany(Art::class)->withTimestamps();
    }
}