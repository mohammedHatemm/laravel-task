<?php


namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use App\Models\Track;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tracks = Track::all();
        $courses = Course::all();
        return view('students.create' , compact('tracks')  , compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png,gif',
            'gender' => 'required'
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'image' => $imageName,
            'gender' => $request->gender
        ]);

        return redirect()->route('students.index')->with('success', 'Student created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
{
    $student = Student::findOrFail($id);

    return view('students.show', compact('student'));
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'gender' => 'required'
        ]);

        if ($request->hasFile('image')) {
            if (file_exists(public_path('images/' . $student->image))) {
                unlink(public_path('images/' . $student->image));
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $student->image = $imageName;
        }

        $student->name = $request->name;
        $student->email = $request->email;
        $student->gender = $request->gender;
        $student->save();

        return redirect()->route('students.index')->with('success', 'Student updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        // if (file_exists(public_path('images/' . $student->image))) {
        //     unlink(public_path('images/' . $student->image));
        // }

        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully');
    }
}
