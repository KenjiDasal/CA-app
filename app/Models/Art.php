<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Art extends Model
{
    use HasFactory;
    protected $fillable = [

        'title',
        'artist',
        'category',
        'description',
        'likes',
        'gallery_id'

    ];

    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }

}