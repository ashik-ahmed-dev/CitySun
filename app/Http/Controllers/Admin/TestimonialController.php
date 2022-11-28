<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
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

        $image = $request->file('photo_link');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(80,80)->save(public_path('storage/testi/'.$name_gen));
        $save_url = 'storage/testi/'.$name_gen;

        Testimonial::insert([
            'name' => $request->name,
            'title' => $request->title,
            'photo_link' => $save_url,
            'comments' => $request->comments,
        ]);
        return redirect()->back()->with('success','data saved successfully');
    }

    public function edit($id){
        $testi = Testimonial::findOrFail($id);
        return view('admin.testimonial.update', compact('testi'));
    }

    public function update(Request $request){
        $id = $request->id;
        $old_img = $request->old_image;

        if ($request->file('photo_link')) {
            $image = $request->file('photo_link');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(80,80)->save(public_path('storage/testi/'.$name_gen));
            $save_url = 'storage/testi/'.$name_gen;
            if (File::exists($old_img)) {
                unlink($old_img);
            }
            Testimonial::findOrFail($id)->update([
                'name' => $request->name,
                'title' => $request->title,
                'photo_link' => $save_url,
                'comments' => $request->comments,
            ]);
            return redirect()->route('admin.testimonial')->with('success','data updated successfully');
        }else{
            Testimonial::findOrFail($id)->update([
                'name' => $request->name,
                'title' => $request->title,
                'comments' => $request->comments,
            ]);
            return redirect()->route('admin.testimonial')->with('success','data updated successfully');
        } // end else
    }

    public function delete($id){
        $testi = Testimonial::findOrFail($id);
        $old_img = $testi->photo_link;
        if (File::exists($old_img)) {
            unlink($old_img);
        }
        Testimonial::findOrFail($id)->delete();
        return redirect()->back()->with('success','Data deleted Successfully');
    }
}
