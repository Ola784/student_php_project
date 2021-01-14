<?php

namespace App\Http\Controllers;
use App\Models\Gallery;

use Illuminate\Http\Request;

class FinalGalleryController extends Controller
{
    public function create()
    {
        return view('gallery.create');
    }

    public function index()
    {
        $images = Gallery::get();
        return view('finalgallery.index', compact('images'));
    }
}
