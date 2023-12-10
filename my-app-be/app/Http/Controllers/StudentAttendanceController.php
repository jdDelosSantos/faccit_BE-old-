<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentAttendance;
use App\Models\Student;

class StudentAttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $attendances = StudentAttendance::all();

        return response()->json($attendances);
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

    public function storeAttendance(Request $request)
    {
        try {
            // Validate the request data
            $request->validate([
                'student_id' => 'required|string', // You can add more validation rules
            ]);
            // Find the corresponding student in the students table
            $student = Student::where('student_id', $request->input('student_id'))->first();

            $existingAttendance = StudentAttendance::where('student_id', $request->input('student_id'))->first();

             if ($existingAttendance) {
    // Handle duplicate entry (e.g., return an error response)
    $errorMessage = 'Duplicate ' . $request->input('student_id') . ' Entry';
    return response()->json(['error' => $errorMessage], 422);
}
            if ($student && !$existingAttendance) {
                // Create a new attendance record with additional student information
                $attendance = new StudentAttendance;
                $attendance->student_id = $student->student_id;
                $attendance->student_fname= $student->student_fname;
                $attendance->student_lname = $student->student_lname;
                $attendance->time_in=now();
                    // You can add more fields as needed
                // Save the attendance record
                $attendance->save();

                // You can add more logic or return a response as needed
                return response()->json(['message' => 'Attendance recorded successfully'], 200);
            } else {
                return response()->json(['error' => 'Student not found'], 404);
            }
        } catch (\Exception $e) {
            // Handle exceptions
            return response()->json(['error' => 'Error recording attendance'], 500);
        }
    }
}
