<?php

namespace App\Http\Controllers;

use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use App\Models\Color;
use Illuminate\Http\Request;
use Image;

class BrandController extends Controller
{
    //

    public function index()
    {
        $brands = Brand::with('Color')->latest()->paginate(5);

        $colors = Color::pluck('name', 'id')->toArray();

        // return view('Brands.index', [
        //     'Brands' => $Brands
        // ]);

        return view('Brands.index', compact('brands', 'colors'));
    }

    public function create()
    {
        $colors = Color::pluck('name', 'id')->toArray();

        // return view('Brands.index', [
        //     'Brands' => $Brands
        // ]);

        return view('Brands.create', compact('colors'));
    }
    public function show(Brand $Brand)
    {
        //$Brand = Brand::find($id);
        $Allcates = Color::all();
        return view('Brands.show', compact('Brand', 'Allcates'));
    }

    public function store(BrandRequest $request)

    // public function store()
    {

        //    dd($request->all());
        // return view('Brands.index', [
        //     'Brands' => $Brands
        // ]);
        // dd($request);
        $data = [
            'name' => $request->name,
            'color_id' => $request->color_id,

            'description' => $request->description,
            'is_active' => $request->is_active ? true : false,
            'image' => $this->uploadimage($request->file('image'))


        ];
        // dd($data);
        Brand::create($data);
        return redirect()
            ->route('Brands.index')
            ->withMessage('Created Successfully!');
    }





    public function edit(Brand $Brand)
    {
        // $Brand = Brand::find($id);
        $colors = Color::pluck('name', 'id')->toArray();
        return view('Brands.edit', compact('Brand', 'colors'));
    }
    public function update(BrandRequest $request, Brand $Brand)

    {

        // $Brand = Brand::find($id);


        $requestData = [
            'name' => $request->name,
            'color_id' => $request->color_id,

            'description' => $request->description,
            'is_active' => $request->is_active ? true : false,




        ];
        if ($request->hasFile('image')) {
            $requestData['image'] = $this->uploadImage($request->file('image'));

            // dd($requestData['image']);
        }
        // dd($data);
        $Brand->update($requestData);
        return redirect()
            ->route('Brands.index')
            ->withMessage('Upadated Successfully!');
    }

    public function downloadPdf()
    {
        $Allcates = Color::all();
        $Brands = Brand::all();
        $pdf = Pdf::loadView('Brands.pdf', compact('Brands', 'Allcates'));
        return $pdf->download('Brands-list.pdf');
    }

    public function exportXl()
    {
        // $Courses = Course::all();
        // $xl = Excel::loadView('Courses.xl', compact('Courses'));
        return Excel::download(new BrandExport, 'Brands-list.xlsx');
    }


    public function destroy(Brand $Brand)
    {
        // $Brand = Brand::find($id);
        $Brand->delete();
        return redirect()
            ->route('Brands.index')
            ->withMessage('Deleted Successfully!');
        // Session::flash('message', 'Deleted Successfully!');

        // return redirect()
        //       ->route('Brands.index')
        //       ->with('message', 'Deleted Successfully!');
    }


    public function trash()
    {
        $Allcates = Color::all();
        $Brands = Brand::onlyTrashed()->get();
        return view('Brands.trash', compact('Brands', 'Allcates'));
    }
    public function restore($id)
    {
        $Brand = Brand::onlyTrashed()->find($id);
        $Brand->restore();
        return redirect()
            ->route('Brands.trash')
            ->withMessage(' Restored!');
    }
    public function delete($id)
    {
        $Brand = Brand::onlyTrashed()->find($id);
        $Brand->forceDelete();
        return redirect()
            ->route('Brands.trash')
            ->withMessage('Permanently Deleted Successfully!');
    }

    public function uploadImage($image)
    {
        $originalName = $image->getClientOriginalName();
        $fileName = date('YmdHi') . time() . $originalName;
        // $image->move(storage_path ('/app/public/Brands'),
        //  $filename);
        Image::make($image)
            ->resize(200, 200)
            ->save(storage_path() . '/app/public/brands/' . $fileName);

        return $fileName;
    }
}
