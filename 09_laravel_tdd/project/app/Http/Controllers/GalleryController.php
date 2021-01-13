<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;

class GalleryController extends Controller
{
    public function create()
    {
        return view('gallery.create');
    }

    public function index()
    {
        $images = Gallery::get();
        return view('gallery', compact('images'));
    }

    public function upload(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input['image'] = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $input['image']);


        $input['title'] = $request->title;
        Gallery::create($input);


    	return back()->with('success', 'Image uploaded successfully.');
    }

    public function destroy($id)
    {
        $image = Gallery::find($id);
        if ($image != NULL)
        {
            $image->delete();
            return back()->with('success', 'Image removed successfully.');
        }
        return back()->with('fail', 'Image does not exist.');
    }
}
