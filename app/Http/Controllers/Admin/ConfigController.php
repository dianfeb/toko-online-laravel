<?php

namespace App\Http\Controllers\Admin;

use App\Models\Config;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $data = Config::where('status', 'on')->get();
        return view('admin.config.index', compact('data'));
    }

   
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $data = $request->validate([
            'name'          => 'required',
            'value'           => 'nullable',
            'img'            => 'nullable|image|file|mimes:png,jpg,jpeg,webp|max:2024','nullable'
        ]); 

        if ($request->file('img')) {
            $file = $request->file('img'); //ambil nama gambar (foto)
            $fileName =  uniqid().'.'.$file->getClientOriginalExtension(); //ambil format gambar
            $file->storeAs('public/config/', $fileName); //folder simpan
    
            // unlink storage// Delete old image
            Storage::delete('public/config/'.$request->oldImg);

            $data['img'] = $fileName;
        } else {
            $data['img'] = $request->oldImg;
        }
    

        Config::find($id)->update($data);

        return back()->with('success', 'Config Has Been Update');
    }

  
}
