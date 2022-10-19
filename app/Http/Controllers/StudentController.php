<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //


    public function index()
    {
        $students = Student::all();

        // return view('students.index', [
        //     'students' => $students
        // ]);

        return view('students.index', compact('students'));
    }

    public function create()
    {


        // return view('students.index', [
        //     'students' => $students
        // ]);

        return view('students.create');
    }

    public function store(Request $request)
    // public function store()
    {

        //    dd($request->all());
        // return view('students.index', [
        //     'students' => $students
        // ]);
        $data = [
            'name' => $request->name,
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
            'hobbies1' => $request->hobbies1 ? true : false,
            'hobbies2' => $request->hobbies2 ? true : false,
            'hobbies3' => $request->hobbies3 ? true : false,
            'nationality' => $request->nationality

        ];
        // dd($data);
        Student::create($data);
        return redirect()
            ->route('students.index')
            ->withMessage('Created Successfully!');
    }
    public function update(Request $request, $id)

    {

        $Student = Student::find($id);

        //    dd($request->all());
        // return view('students.index', [
        //     'students' => $students
        // ]);
        if (empty($request->date_of_birth)) {
            $data = [
                'name' => $request->name,
                'date_of_birth' => $Student->date_of_birth,
                'gender' => $request->gender,
                'hobbies1' => $request->hobbies1 ? true : false,
                'hobbies2' => $request->hobbies2 ? true : false,
                'hobbies3' => $request->hobbies3 ? true : false,
                'nationality' => $request->nationality

            ];
            $Student->update($data);
        }
        $data = [
            'name' => $request->name,
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
            'hobbies1' => $request->hobbies1 ? true : false,
            'hobbies2' => $request->hobbies2 ? true : false,
            'hobbies3' => $request->hobbies3 ? true : false,
            'nationality' => $request->nationality

        ];
        // dd($data);
        $Student->update($data);
        return redirect()
            ->route('students.index')
            ->withMessage('Upadated Successfully!');
    }
    // @if(session('message'))
    // <p class="text-success">
    //     {{ session('message') }}
    // </p>
    // @endif



    public function edit($id)
    {
        $student = Student::find($id);

        return view('students.edit', compact('student'));
    }



    public function show($id)
    {
        $student = Student::find($id);

        return view('students.show', compact('student'));
    }

    public function destroy($id)
    {
        $Student = Student::find($id);
        $Student->delete();

        // Session::flash('message', 'Deleted Successfully!');

        // return redirect()
        //       ->route('students.index')
        //       ->with('message', 'Deleted Successfully!');

        return redirect()
            ->route('students.index')
            ->withMessage('Deleted Successfully!');
    }
}
