<?php

namespace App\Http\Controllers;

use App\Http\Requests\CoruseRequest;
use App\Models\Course;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\CouresExport;
use Image;
use Maatwebsite\Excel\Facades\Excel;

class CourseController extends Controller
{

    public function index()
    {
        $Courses = Course::all();
        return view('Courses.index', compact('Courses'));
    }

    public function create()
    {
        return view('Courses.create');
    }



    public function show(Course $Course)
    {
        //$Course = Course::find($id);

        return view('Courses.show', compact('Course'));
    }

    public function store(CoruseRequest $request)

    {
        //    dd($request->all());
        $data = [
            'title' => $request->title,
            'category' => $request->category,
            'type' => $request->type,
            'technology' => json_encode($request->technology),
            'duration' => $request->duration,

            'startdate' => $request->startdate,
            'image' => $this->uploadimage($request->file('image'))

        ];
        // dd($data);
        Course::create($data);
        return redirect()
            ->route('Courses.index')
            ->withMessage('Created Successfully!');
    }
    public function edit(Course $Course)
    {
        //$Course = Course::find($id);
        return view('Courses.edit', compact('Course'));
    }
    public function update(CoruseRequest $request, Course $Course)
    // public function update(CoruseRequest $request)

    {
        // dd($request);
        $id = $request->id;
        // $Course = Course::find($id);

        //    dd($request->all());

        $requestData = [
            'title' => $request->title,
            'category' => $request->category,
            'type' => $request->type,
            'technology' => json_encode($request->technology),
            'duration' => $request->duration,

            'startdate' => $request->startdate

        ];
        if ($request->hasFile('image')) {
            $requestData['image'] = $this->uploadimage($request->file('image'));
            // Product::where('id'.$id)->update(
            // );
            // $Course->update($data);
        }


        // dd($data);
        $Course->update($requestData);
        return redirect()
            ->route('Courses.index')
            ->withMessage('Upadated Successfully!');
    }
    public function downloadPdf()
    {
        $Courses = Course::all();
        $pdf = Pdf::loadView('Courses.pdf', compact('Courses'));
        return $pdf->download('Courses-list.pdf');
    }

    public function exportXl()
    {
        // $Courses = Course::all();
        // $xl = Excel::loadView('Courses.xl', compact('Courses'));
        return Excel::download(new CouresExport, 'Courses-list.xlsx');
    }

    public function destroy(Course $Course) //ROUTE MODEL BINDING
    {
        // $Course = Course::find($id);
        $Course->delete();

        // Session::flash('message', 'Deleted Successfully!');

        // return redirect()
        //       ->route('Courses.index')
        //       ->with('message', 'Deleted Successfully!');

        return redirect()
            ->route('Courses.index')
            ->withMessage('Deleted Successfully!');
    }

    public function trash()
    {
        $Courses = Course::onlyTrashed()->get();
        return view('Courses.trash', compact('Courses'));
    }
    public function restore($id)
    {
        $Course = Course::onlyTrashed()->find($id);
        $Course->restore();
        return redirect()
            ->route('Courses.trash')
            ->withMessage(' Restored!');
    }
    public function delete($id)
    {
        $Course = Course::onlyTrashed()->find($id);
        $Course->forceDelete();
        return redirect()
            ->route('Courses.trash')
            ->withMessage('Permanently Deleted Successfully!');
    }

    public function uploadimage($image)
    {
        $originalName = $image->getClientOriginalName();
        $fileName = date('YmdHi') . time() . $originalName;
        // $image->move(storage_path ('/app/public/courses'),
        //  $filename);
        Image::make($image)
            ->resize(200, 200)
            ->save(storage_path() . '/app/public/courses/' . $fileName);

        return $fileName;
    }
}
