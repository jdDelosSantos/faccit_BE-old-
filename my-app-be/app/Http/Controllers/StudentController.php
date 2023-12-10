<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        return response()-> json($students);
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
        $existingStudent = Student::where('student_id', $request->student_id)->orWhere('student_email', $request->student_email)->first();

        if($existingStudent){
            return response()->json(['message' => 'Student already exists'], 409);
        }
        else{
            $students = new Student;
            $students->student_id = $request->student_id;
            $students->student_email = $request->student_email;
            $students->student_lname = $request->student_lname;
            $students->student_fname = $request->student_fname;
            $students->student_course = $request->student_course;
            $students->student_yr = $request->student_yr;
            $students->student_section = $request->student_section;
            $students->save();

            $message= (object)[
                "status"=>"1",
                "message" => "You Successfully Added " . $request->student_id . "!"
            ];
            return response()->json($message);
        }
    }


    // $students->student_blob1 = $request->student_blob1;
    //         $students->student_blob2 = $request->student_blob2;
    //         $students->student_blob3 = $request->student_blob3;
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

    public function storeImages(Request $request)
{
    // Retrieve student data
    $students = Student::where('student_id', $request->student_id)->first();

    if (!$students) {
        return response()->json(['message' => 'Student not found'], 404);
    }

    // Retrieve and save the image as a BLOB in the database
    $image = $request->file("image");

    // Save BLOB data to the student model
    $student->student_blob = file_get_contents($image->path());

    // Save the student model with updated BLOB data
    $student->save();

    return response()->json(['message' => 'Image stored successfully']);
}
}
