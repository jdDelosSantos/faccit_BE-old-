<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::all();
        return response()->json($courses);
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
        $courses = new Course();
        $courses->course_code = $request->course_code;
        $courses->course_name = $request->course_name;
        $courses->course_description = $request->course_description;
        $courses->course_college = $request->course_college;

        // $members = new Member;    //Member is from App\Models\Member.php
        // $members-> member_lastname = $request-> member_lastname;
        // $members-> member_firstname = $request-> member_firstname;
        // $members-> member_address = $request-> member_address;
      
        
		$courses->save();

		$message= (object)[
			"status"=>"1",
			"message" => "You Successfully Added " . $request->course_name . "!"
		];
		return response()->json($message);
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
}
