<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class TestimonialController extends Controller
{
    public function index(){
        $title = 'All Testimonial';
        $testi = Testimonial::latest()->get();
        return view('admin.testimonial.index', compact('testi', 'title'));
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'photo_link' => 'required',
            'comments' => 'required',
        ]);

        $data = new Testimonial();
        $data->name = $request->name;
        $data->title = $request->title;
        $data->comments = $request->comments;
        if ($request->hasFile('photo_link')){
            $image = $request->file('photo_link')->store('testi', 'public');
            Image::make(Storage::disk('public')->path($image))->resize(80, 80)->save();
            $data->photo_link = $image;
        }
        $data->save();
        return redirect()->back()->with('success','data saved successfully');
    }

    public function edit($id){
        $testi = Testimonial::findOrFail($id);
        return view('admin.testimonial.update', compact('testi'));
    }

    public function update(Request $request, $id){

        $data = Testimonial::findOrFail($id);
        $data->name = $request->name;
        $data->title = $request->title;
        $data->comments = $request->comments;
        if ($request->hasFile('photo_link')){
            if (Storage::disk('public')->exists($data->photo_link)) {
                Storage::disk('public')->delete($data->photo_link);
            }
            $image = $request->file('photo_link')->store('testi', 'public');
            Image::make(Storage::disk('public')->path($image))->resize(80, 80)->save();
            $data->photo_link = $image;
        }
        $data->update();

        return redirect()->route('admin.testimonial')->with('success','data updated successfully');
    }

    public function delete($id){
        $data = Testimonial::findOrFail($id);
        $data->delete();
        if (Storage::disk('public')->exists($data->photo_link)) {
            Storage::disk('public')->delete($data->photo_link);
        }
        return redirect()->back()->with('success','Data deleted Successfully');
    }
}
