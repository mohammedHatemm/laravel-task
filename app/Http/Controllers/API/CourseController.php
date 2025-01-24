<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CoursekResource;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $courses = Course::all();
        return $courses;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $coursedata = $request ->all();
        $course = Course::create($coursedata);
        return $course;

    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
        // return $course;
        $courseResourceDate= new CoursekResource($course);
        return $courseResourceDate;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        //
        $coursedata = $request ->all();
        $course->update($coursedata);
        return $course;


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        //
        $course ->delete();
        return "delete cours sucee";
    }
}
