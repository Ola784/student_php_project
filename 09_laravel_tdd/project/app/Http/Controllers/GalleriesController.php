<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galleries;

class GalleriesController extends Controller
{
    public function index()
    {
        $galleries = Galleries::all();
        return view('galleries.index')->withMenus($menus);
    }
}
