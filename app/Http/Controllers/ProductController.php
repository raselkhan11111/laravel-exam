<?php

namespace App\Http\Controllers;

use App\Exports\ProductExport;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Image;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    //

    public function index()
     {     $Products = Product::with('category')->latest()->paginate(5);
       
        $categories = Category::pluck('title', 'id')->toArray();
        $Allcates = Category::all();
        // return view('Products.index', [
        //     'Products' => $Products
        // ]);

        return view('Products.index', compact('Products', 'categories', 'Allcates'));
    }

    public function create()
    {
        $categories = Category::pluck('title', 'id')->toArray();

        // return view('Products.index', [
        //     'Products' => $Products
        // ]);

        return view('Products.create', compact('categories'));
    }
    public function show(Product $Product)
    {
        //$Product = Product::find($id);
        $Allcates = Category::all();
        return view('Products.show', compact('Product', 'Allcates'));
    }

    public function store(ProductRequest $request)

    // public function store()
    {

        //    dd($request->all());
        // return view('Products.index', [
        //     'Products' => $Products
        // ]);
        // dd($request);
        $data = [
            'title' => $request->title,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'description' => $request->description,
            'is_active' => $request->is_active ? true : false,
            'image' => $this->uploadimage($request->file('image'))


        ];
        // dd($data);
        Product::create($data);
        return redirect()
            ->route('Products.index')
            ->withMessage('Created Successfully!');
    }





    public function edit(Product $Product)
    {
        // $Product = Product::find($id);
        $categories = Category::pluck('title', 'id')->toArray();
        return view('Products.edit', compact('Product', 'categories'));
    }
    public function update(ProductRequest $request, Product $Product)

    {

        // $Product = Product::find($id);


        $requestData = [
            'title' => $request->title,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'description' => $request->description,
            'is_active' => $request->is_active ? true : false



        ];
        if ($request->hasFile('image')) {
            $requestData['image'] = $this->uploadImage($request->file('image'));

            // dd($requestData['image']);
        }
        // dd($data);
        $Product->update($requestData);
        return redirect()
            ->route('Products.index')
            ->withMessage('Upadated Successfully!');
    }

    public function downloadPdf()
    {   $Allcates = Category::all();
        $Products = Product::all();
        $pdf = Pdf::loadView('Products.pdf', compact('Products','Allcates'));
        return $pdf->download('Products-list.pdf');
    }

    public function exportXl()
    {
        // $Courses = Course::all();
        // $xl = Excel::loadView('Courses.xl', compact('Courses'));
        return Excel::download(new ProductExport, 'Products-list.xlsx');
    }


    public function destroy(Product $Product)
    {
        // $Product = Product::find($id);
        $Product->delete();
        return redirect()
            ->route('Products.index')
            ->withMessage('Deleted Successfully!');
        // Session::flash('message', 'Deleted Successfully!');

        // return redirect()
        //       ->route('Products.index')
        //       ->with('message', 'Deleted Successfully!');
    }


    public function trash()
    {
        $Allcates = Category::all();
        $Products = Product::onlyTrashed()->get();
        return view('Products.trash', compact('Products', 'Allcates'));
    }
    public function restore($id)
    {
        $Product = Product::onlyTrashed()->find($id);
        $Product->restore();
        return redirect()
            ->route('Products.trash')
            ->withMessage(' Restored!');
    }
    public function delete($id)
    {
        $Product = Product::onlyTrashed()->find($id);
        $Product->forceDelete();
        return redirect()
            ->route('Products.trash')
            ->withMessage('Permanently Deleted Successfully!');
    }

    public function uploadImage($image)
    {
        $originalName = $image->getClientOriginalName();
        $fileName = date('YmdHi') . time() . $originalName;
        // $image->move(storage_path ('/app/public/Products'),
        //  $filename);
        Image::make($image)
            ->resize(200, 200)
            ->save(storage_path() . '/app/public/products/' . $fileName);

        return $fileName;
    }
}
