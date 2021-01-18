<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    public function users() {
        return $this->belongsToMany(User::class);
    }
    public function website() {
        return $this->hasOne(Website::class);
    }
    public function menu() {
        return $this->hasMany(Menu::class);
    }
    public function post() {
        return $this->hasMany(Post::class);
    }
    public function galleries() {
        return $this->hasMany(Galleries::class);
    }
    use HasFactory;
}
