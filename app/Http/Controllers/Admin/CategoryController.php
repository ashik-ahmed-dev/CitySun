<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    public function index(){
        $title = 'All Categories';
        $categories = Category::latest()->get();
        return view('admin.category.index', compact('categories', 'title'));
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
        ]);

        if ($request->hasFile('icon')){
            $image = $request->file('icon')->store('icon', 'public');
            Image::make(Storage::disk('public')->path($image))->resize(512, 512)->save();
            $icon_path = $image;
        }

        Category::insert([
            'name' => $request->name,
            'slug' => str_slug($request->name),
            'icon' => $icon_path,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->back()->with('success','data saved successfully');
    }

    public function edit($id){
        $category = Category::findOrFail($id);
        return view('admin.category.update', compact('category'));
    }

    public function update(Request $request){
        $id = $request->id;
        if($request->hasFile('icon')) {
            $image = $request->file('icon');
            $name_gen = hexdec(uniqid());
            Image::make($image)->resize(512, 512)->save(public_path('storage/icon/'.$name_gen .'.webp'), 60);
            $icon_path = 'storage/icon/'.$name_gen .'.webp';
            Category::findOrFail($id)->update([
                'name' => $request->name,
                'slug' => str_slug($request->name),
                'icon' => $icon_path,
            ]);

        }else{
            Category::findOrFail($id)->update([
                'name' => $request->name,
                'slug' => str_slug($request->name),
            ]);
        }
        return redirect()->route('admin.category')->with('success','data updated successfully');
    }

    public function dalete($id){
        Category::findOrFail($id)->delete();
        return redirect()->back()->with('success','Data deleted Successfully');
    }
}
