<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
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

    public function update(Request $request, $id){
        $data = Category::findOrFail($id);
        $data->name = $request->input('name');
        $data->slug = Str::slug($request->input('name'));

        if ($request->hasFile('icon')){
            if (Storage::disk('public')->exists($data->thumbnail)) {
                Storage::disk('public')->delete($data->thumbnail);
            }
            $image = $request->file('icon')->store('icon', 'public');
            Image::make(Storage::disk('public')->path($image))->resize(512, 512)->save();
            $data->icon = $image;
        }
        $data->update();
        return redirect()->route('admin.category')->with('success','data updated successfully');
    }

    public function dalete($id){
        Category::findOrFail($id)->delete();
        return redirect()->back()->with('success','Data deleted Successfully');
    }
}
