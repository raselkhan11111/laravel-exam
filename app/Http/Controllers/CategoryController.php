<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\Product;
use Image;
use Barryvdh\DomPDF\Facade\Pdf;
use GuzzleHttp\Handler\Proxy;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function show(Category $category)

    
    {
        // $Category=Category::where('id')->first();
        
      
    //   dd($category->id);
        // $products = Product::where('category_id',$category)->get();
         $products =$category->product()->get();
        
        // $category = Category::find($id);
        return view('categories.show', compact('category','products'));
    }

    public function store(CategoryRequest $request)
    {
        $requestData = [
            'title' => $request->title,
            'is_active' => $request->is_active ? true : false,
            'image' => $this->uploadImage($request->file('image'))
        ];

        Category::create($requestData);

        return redirect()
            ->route('categories.index')
            ->withMessage('Successfully Created');
    }

    public function edit(Category $category)
    {
        // $category = Category::find($id);
        return view('categories.edit', compact('category'));
    }

    public function update(CategoryRequest $request, Category $category)
    {
        // $category = Category::find($id);
        
        $requestData = [
            'title' => $request->title,
            
            'is_active' => $request->is_active ? true : false,
        ];

        if ($request->hasFile('image')) {
            $requestData['image'] = $this->uploadImage($request->file('image'));
        }

        $category->update($requestData);

        return redirect()
            ->route('categories.index')
            ->withMessage('Successfully Updated');
    }

    public function downloadPdf()
    {
        $categories = Category::all();
        $pdf = Pdf::loadView('categories.pdf', compact('categories'));
        return $pdf->download('category-list.pdf');
    }

    public function destroy(Category $category)
    {
        // $category = Category::find($id);
        $category->delete();

        // Session::flash('message', 'Successfully deleted');
        // return redirect()
        //         ->route('categories.index')
        //         ->with('message', 'Successfully deleted');

        return redirect()
            ->route('categories.index')
            ->withMessage('Successfully deleted');
    }

    public function trash()
    {
        $categories = Category::onlyTrashed()->get();
        return view('categories.trash', compact('categories'));
    }

    public function restore($id)
    {
        $category = Category::onlyTrashed()->find($id);
        $category->restore();

        return redirect()
            ->route('categories.trash')
            ->withMessage('Successfully restored');
    }

    public function delete($id)
    {
        $category = Category::onlyTrashed()->find($id);
        $category->forceDelete();

        return redirect()
            ->route('categories.trash')
            ->withMessage('Successfully deleted');
    }

    public function uploadImage($image)
    {
        $originalName = $image->getClientOriginalName();
        $fileName = date('Y-m-d') . time() . $originalName;

        // $image->move(storage_path('/app/public/categories'), $fileName); 

        Image::make($image)
            ->resize(200, 200)
            ->save(storage_path() . '/app/public/categories/' . $fileName);

        return $fileName;
    }
}
