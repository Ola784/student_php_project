<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }

    protected $table = 'images';

    protected $fillable = ['title', 'file', 'description', 'gallery_id'];
}
