<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\StudentResource;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    //     $students = Student::all();
    //     return $students;

    $students = Student::all();
    return StudentResource::collection($students);
    // }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // $studentdata= $request ->all();
        // $student = Student::create($studentdata);
        // return $student;
        $requestData = $request->validate([
            'name'=>'required',
            'email'=>'required|unique:students',
            'gender' => 'required|in:male,female',
            'track_id' => 'required',
            'image'=>'nullable|image|mimes:jpg,jpeg,gif,png'
],[
            'name.required'=>'you should enter a name',
            'email,required'=>'you should enter an email',
            'email.unique'=>'this email was taken before'
]);



if ($request->hasFile('image')) {
    $imageName = time().'.'.$request->image->extension();
    $request->image->move(public_path('images'), $imageName);
    $requestData['image'] = $imageName;
}

$student = Student::create($requestData);
$studentResourceData = new StudentResource($student);
return $studentResourceData;


    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
        // return $student;
        $studentResourceData = new StudentResource($student);
        return $studentResourceData;


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
        $studentdata= $request ->all();
        $student->update($studentdata);
        $studentResourceData = new StudentResource($student);
        return $studentResourceData;
        // return $student;


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
        $student ->delete();
        return "student delete sucsse";
    }
}
