<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    public function page() {
        return $this->belongsTo(Page::class);
    }

    public function images() {
        return $this->hasMany(Image::class);
    }

    protected $fillable = [
       'title'
    ];
    use HasFactory;
}
