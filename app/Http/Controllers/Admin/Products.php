<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Gender;
use App\Models\Color;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Made;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Products extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $products = Product::paginate(50);
       $sizes = Size::all();
       return view('admin.products.products', compact('products', 'sizes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genders = Gender::all();
        $categories = Category::all();
        $colors = Color::all();
        $brands = Brand::all();
        $mades = Made::all();
        $sizes = Size::all();

        return view('admin.products.store', compact('genders', 'categories', 'colors', 'brands', 'mades', 'sizes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'gender_id' => 'required',
        'category_id' => 'required',
        'brand_id' => 'required',
        'description' => 'required',
        'color_id' => 'required',
        'made_id' => 'required',
        'price' => 'required|numeric',
        'files.*' => 'mimes:jpeg,png|max:2048',
        'sizes' => 'required|array',
    ]);

    $product = new Product();
    $product->name = $request->input('name');
    $product->gender_id = $request->input('gender_id');
    $product->category_id = $request->input('category_id');
    $product->brand_id = $request->input('brand_id');
    $product->description = $request->input('description');
    $product->color_id = $request->input('color_id');
    $product->made_id = $request->input('made_id');
    $product->price = $request->input('price');

    if ($request->hasFile('files')) {
        $uploadedFiles = $request->file('files');
        $fileNames = [];
        foreach ($uploadedFiles as $file) {
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/products', $fileName);
            $fileNames[] = $fileName;
        }
        $product->pic1 = $fileNames[0] ?? null;
        $product->pic2 = $fileNames[1] ?? null;
        $product->pic3 = $fileNames[2] ?? null;
        $product->pic4 = $fileNames[3] ?? null;
    }

    $res = $product->save();

    if ($res) {
        $product->sizes()->sync($request->input('sizes'));

        return back()->with('success', 'You add new product successfully.');
    } else {
        return back()->with('fail', 'Something went wrong.');
    }
}



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $product = Product::find($id);
        $sizes = Size::all();
        return view('admin.products.preview', compact('product', 'sizes'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $genders = Gender::all();
        $categories = Category::all();
        $colors = Color::all();
        $brands = Brand::all();
        $mades = Made::all();
        $product = Product::findOrFail($id);
        $sizes = Size::all();
        return view('admin.products.edit', compact('product','genders','colors','brands','mades','categories', 'sizes'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'gender_id' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required',
            'description' => 'required',
            'color_id' => 'required',
            'made_id' => 'required',
            'price' => 'required|numeric',
            'files.*' => 'sometimes|mimes:jpeg,png|max:2048',
            'sizes' => 'required|array',
        ]);


        $product = Product::findOrFail($id);
        $product->name = $request->input('name');
        $product->gender_id = $request->input('gender_id');
        $product->category_id = $request->input('category_id');
        $product->brand_id = $request->input('brand_id');
        $product->description = $request->input('description');
        $product->color_id = $request->input('color_id');
        $product->made_id = $request->input('made_id');
        $product->price = $request->input('price');

        if ($request->hasFile('files')) {
            $uploadedFiles = $request->file('files');
            $fileNames = [];
            foreach ($uploadedFiles as $file) {
                $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/products', $fileName);
                $fileNames[] = $fileName;
            }
            $product->pic1 = $fileNames[0] ?? null;
            $product->pic2 = $fileNames[1] ?? null;
            $product->pic3 = $fileNames[2] ?? null;
            $product->pic4 = $fileNames[3] ?? null;
        }

        $res = $product->save();

        if ($res) {
            $product->sizes()->sync($request->input('sizes'));
            return back()->with('success', 'You update new product successfully.');
        } else {
            return back()->with('fail', 'Something wrong.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return back()->with('fail', 'Product not found.');
        }

        $isDeleted = $product->delete();

        if ($isDeleted) {
            return back()->with('success', 'Product has been deleted successfully.');
        } else {
            return back()->with('fail', 'Failed to delete product.');
        }
    }
}
