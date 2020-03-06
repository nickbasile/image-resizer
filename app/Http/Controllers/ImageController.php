<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function optimize(Request $request)
    {
        $data = $request->validate([
            'images' => 'required|array',
            'images.*' => 'image',
        ]);

        dd($request->all());
    }
}
