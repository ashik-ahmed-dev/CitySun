<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class ServicesController extends Controller
{
    public function index(){
        $title = 'all services';
        $services = Service::latest()->get();
        return view('admin.services.index', compact('services', 'title'));
    }

    public function add_form(){
        $title = 'add service';
        $categories = Category::orderBy('name','ASC')->get();
        return view('admin.services.create', compact('title', 'categories'));
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'thumbnail' => 'required',
        ]);

        if($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');
            $name_gen = hexdec(uniqid());
            Image::make($image)->resize(750, 500)->save(public_path('storage/services/'.$name_gen .'.webp'), 60);
            $images_path = 'storage/services/'.$name_gen .'.webp';
        }
        Service::insert([
            'name' => $request->name,
            'slug' => str_slug($request->name),
            'category_id' => $request->category_id,
            'short_text' => $request->short_text,
            'description' => $request->description,
            'price' => $request->price,
            'discount_price' => $request->discount_price,
            'thumbnail' => $images_path,
            'created_at' => Carbon::now()
        ]);
        return redirect()->route('admin.service')->with('success','data saved successfully');
    }


    public function edit($id){
        $title = 'edit service';
        $edit_data = Service::findOrFail($id);
        $categories = Category::orderBy('name','ASC')->get();
        return view('admin.services.update', compact('edit_data','title', 'categories'));
    }

    public function update(Request $request, $id){
        $old_thumbnail = Service::findOrFail($id);
        if ($request->hasFile('thumbnail')) {
            $old_thumbnail = $old_thumbnail->old_thumbnail;
            if (File::exists($old_thumbnail)) {
                unlink($old_thumbnail);
            }
            $image = $request->file('thumbnail');
            $name_gen = hexdec(uniqid());
            Image::make($image)->resize(750, 500)->save(public_path('storage/services/'.$name_gen .'.webp'), 60);
            $old_thumbnail = 'storage/services/'.$name_gen .'.webp';

            Service::findOrFail($id)->update([
                'thumbnail' => $old_thumbnail,
            ]);
            return redirect()->route('admin.service')->with('success','data saved successfully');
        }else{
            Service::findOrFail($id)->update([
                'name' => $request->name,
                'slug' => str_slug($request->name),
                'category_id' => $request->category_id,
                'short_text' => $request->short_text,
                'description' => $request->description,
                'price' => $request->price,
                'discount_price' => $request->discount_price,
            ]);
            return redirect()->route('admin.service')->with('success','data saved successfully');
        } // end else
    }

    public function delete($id){
        Service::findOrFail($id)->delete();
        return redirect()->back()->with('success','Data deleted Successfully');
    }







}
