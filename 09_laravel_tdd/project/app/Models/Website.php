<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Page;
use App\Models\User;

class Website extends Model
{
    public function pages() {
        return $this->hasMany(Page::class);
    }
    public function users() {
        return $this->belongsToMany(User::class);
    }
    use HasFactory;

    protected $fillable = ['url'];
}
