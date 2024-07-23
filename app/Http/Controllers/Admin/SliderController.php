<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $data = Slider::latest()->get();
        return view('admin.slider.index', compact('data'));
    }

   
    public function store(Request $request)
    {
        //

        $data = $request->validate([
            'name' => 'required',
            'desc' => 'required',
            'img'         => 'required|image|file|mimes:png,jpg,jpeg,webp|max:2024'
        ]);

        $file = $request->file('img');
        $fileName = uniqid().'.'.$file->getClientOriginalExtension();
        $file->storeAs('public/slider', $fileName);

        $data['img'] = $fileName;
        $data['slug'] = Str::slug($data['name']);

        Slider::create($data);
        return back()->with('success', 'Data Has Been Created');
    }


    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
