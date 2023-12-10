<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blob;

class BlobController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png|max:2048', // Adjust max size as needed
        ]);

        if ($request->hasFile('image')) {
            $imageBlob = $request->file('image')->store('images', 'public');
            $newImage = new Blob();
            $newImage->image_blob = $imageBlob;
            $newImage->save();
        
            return response()->json(['message' => 'Image uploaded successfully']);
        }

        return response()->json(['message' => 'Image not provided'], 400);
    }


    public function index() {
        $images = Blob::all();
        return response()->json(['blobs' => $images]);
    }
}
