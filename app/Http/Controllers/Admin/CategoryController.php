<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Category::latest()->get();
        return view('admin.category.index', compact('data'));
    }

   
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $data = $request->validate([
            'name' => 'required'
        ]);
        $data['slug'] = Str::slug($data['name']);
        Category::create($data);
        return back()->with('success', 'data has been created');
        
    }

  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $data = $request->validate([
            'name' => 'required'
        ]);
        $data['slug'] = Str::slug($data['name']);
        Category::find($id)->update($data);
        return back()->with('success', 'data has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Category::find($id)->delete();
        return back()->with('success', 'data has been deleted');
    }
}
