<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UploadURL;

class UploadController extends Controller
{
    public function uploadImage(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Get the image file from the request
        $imageFile = $request->file('image');

        // Convert the image file to a data URL
        $dataUrl = $this->convertImageToDataUrl($imageFile);

        // Save the data URL to the database
        $image = new UploadURL;
        $image->data_url = $dataUrl;
        $image->save();

        return response()->json(['message' => 'Image data URL saved successfully']);
    }

    private function convertImageToDataUrl($imageFile)
    {
        // Read the image file and convert it to a data URL
        $dataUrl = 'data:' . $imageFile->getClientMimeType() . ';base64,' . base64_encode(file_get_contents($imageFile));

        return $dataUrl;
    }


    public function getAllDataUrls()
    {
    try {
        // Fetch all records and use pluck on the Collection
        $dataUrls = UploadURL::all()->pluck('data_url')->all();

        return response()->json($dataUrls);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Error fetching data URLs'], 500);
    }
    }


}
