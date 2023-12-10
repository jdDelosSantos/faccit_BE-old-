<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentImage;

class StudentImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getAllStudentImages()
    {
        try {
        // Retrieve only 'student_id' and 'data_url' columns from the database
        $studentImages = StudentImage::select('student_id', 'data_url')->get();
        // Return the specific data to the frontend
        return response()->json($studentImages);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error fetching data URLs'], 500);
        }
    }

    public function saveStudentImage(Request $request)
    {

    $this->validate($request, [
        'student_id' => 'required|exists:students,student_id',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Get the student ID from the request
    $studentId = $request->input('student_id');

    // Get the image file from the request
    $imageFile = $request->file('image');

    // Convert the image file to a data URL
    $dataUrl = $this->convertImageToDataUrl($imageFile);

    // Save the data URL to the database
    $studentImage = new StudentImage;
    $studentImage->student_id = $studentId;
    $studentImage->data_url = $dataUrl;
    $studentImage->save();

    return response()->json(['message' => 'Student image data URL saved successfully']);
    }

    private function convertImageToDataUrl($imageFile)
    {
    // Read the image file and convert it to a data URL
    $dataUrl = 'data:' . $imageFile->getClientMimeType() . ';base64,' . base64_encode(file_get_contents($imageFile));

    return $dataUrl;
    }
}
