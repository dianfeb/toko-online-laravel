<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $totalProduct = Product::count();
        $newProduct = Product::whereDate('created_at', now()->toDateString())->count();
        $data = Product::with('Category')->latest()->get();
        return view('admin.product.index', compact('data', 'totalProduct', 'newProduct'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $category = Category::get();
        return view('admin.product.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'category_id' => 'required',
            'name'        => 'required',
            'description' => 'required',
            'stock'       => 'required',
            'price'       => 'required',
            'img'         => 'required|image|file|mimes:png,jpg,jpeg,webp|max:2024'
        ]);

        $file = $request->file('img'); //ambil nama gambar (foto)
        $fileName =  uniqid().'.'.$file->getClientOriginalExtension(); //ambil format gambar
        $file->storeAs('public/product/', $fileName); //folder simpan

        $data['img'] = $fileName;
        $data['slug'] = Str::slug($data['name']);

        Product::create($data);

        return redirect(url('admin/product'))->with('success', 'Data Has Been Created');
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
        $categories = Category::get();
        $data = Product::with('Category')->find($id);
        return view('admin.product.edit', compact('data', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $data = $request->validate([
            'category_id' => 'required',
            'name'        => 'required',
            'description' => 'required',
            'stock'       => 'required',
            'price'       => 'required',
            'img'         => 'nullable|image|file|mimes:png,jpg,jpeg,webp|max:2024'
        ]);
        if ($request->file('img')) {
            $file = $request->file('img'); //ambil nama gambar (foto)
            $fileName =  uniqid().'.'.$file->getClientOriginalExtension(); //ambil format gambar
            $file->storeAs('public/product/', $fileName); //folder simpan
    
            // unlink storage// Delete old image
            Storage::delete('public/product/'.$request->oldImg);

            $data['img'] = $fileName;
        } else {
            $data['img'] = $request->oldImg;
        }
        

        $data['slug'] = Str::slug($data['name']);

        Product::find($id)->update($data);

        return redirect(url('admin/product'))->with('success', 'Data Has Been Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $data = Product::find($id)->delete();
        return back()->with('success', 'data has been deleted');
    }
}
