<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function index()
    {
        $images = Image::orderByDesc('created_at')->get();

        return view('welcome', compact('images'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'images' => 'required|array',
            'images.*' => 'image',
        ]);

        foreach ($request->file('images') as $image) {
            Image::saveImage($image);
        }

        return back()->with(['success' => 'Images optimized successfully!']);
    }
}
