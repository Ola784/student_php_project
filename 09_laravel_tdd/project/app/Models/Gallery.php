<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    // public function page()
    // {
    //     return $this->belongsTo(Page::class);
    // }

    protected $table = 'gallery';

    protected $fillable = ['title', 'image'];
}
