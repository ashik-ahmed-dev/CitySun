<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
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

        $service = new Service();
        $service->name = $request->name;
        $service->slug = Str::slug($request->name);
        $service->category_id  = $request->category_id;
        $service->short_text = $request->short_text;
        $service->description = $request->description;
        $service->price = $request->price;
        $service->discount_price = $request->discount_price;

        if($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail')->store('services', 'public');
            Image::make(Storage::disk('public')->path($image))->resize(750, 500)->save();
            $service->thumbnail = $image;
        }
        $service->save();
        return redirect()->route('admin.service')->with('success','data saved successfully');
    }


    public function edit($id){
        $title = 'edit service';
        $edit_data = Service::findOrFail($id);
        $categories = Category::orderBy('name','ASC')->get();
        return view('admin.services.update', compact('edit_data','title', 'categories'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'category_id' => 'required',
        ]);
        $data = Service::findOrFail($id);
        $data->name = $request->name;
        $data->slug = Str::slug($request->name);
        $data->category_id  = $request->category_id;
        $data->short_text = $request->short_text;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->discount_price = $request->discount_price;

        if ($request->hasFile('thumbnail')){
            if (Storage::disk('public')->exists($data->thumbnail)) {
                Storage::disk('public')->delete($data->thumbnail);
            }
            $image = $request->file('thumbnail')->store('services', 'public');
            Image::make(Storage::disk('public')->path($image))->resize(750, 590)->save();
            $data->thumbnail = $image;
        }
        $data->update();
        return redirect()->route('admin.service')->with('success','data saved successfully');
    }

    public function delete($id){
        $data = Service::findOrFail($id);
        if (Storage::disk('public')->exists($data->thumbnail)) {
            Storage::disk('public')->delete($data->thumbnail);
        }
        return redirect()->back()->with('success','Data deleted Successfully');
    }

}
