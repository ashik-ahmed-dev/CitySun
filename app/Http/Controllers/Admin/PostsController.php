<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Manage posts';
        $posts = Post::latest()->paginate();
        return  view('admin.posts.index', compact('title', 'posts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create Posts';
        return  view('admin.posts.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the request
        $this->validate($request, [
            'title' => ['required', 'string', 'unique:posts,title'],
            'image' => ['required', 'mimes:jpeg,gif,bmp,png', 'max:2048'],
        ]);

        $data = new Post();
        $data->title = $request->title;
        $data->slug = Str::slug($request->title);
        $data->meta_title = $request->meta_title;
        $data->meta_description = $request->meta_description;
        $data->description = $request->description;
        if ($request->hasFile('image')){
            $image = $request->file('image')->store('posts', 'public');
            Image::make(Storage::disk('public')->path($image))->resize(750, 500)->save();
            $data->image = $image;
        }
        $data->save();
        return redirect()->back()->with('success','Posts created successfully!');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Update Posts';
        $post = Post::findOrFail($id);
        return view('admin.posts.update', compact('title', 'post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => ['required', 'string'],
            'image' => ['required', 'mimes:jpeg,gif,bmp,png', 'max:2048'],
        ]);

        $data = Post::findOrFail($id);
        $data->title = $request->title;
        $data->slug = Str::slug($request->title);
        $data->meta_title = $request->meta_title;
        $data->meta_description = $request->meta_description;
        $data->description = $request->description;
        if ($request->hasFile('image')){
            $image = $request->file('image')->store('posts', 'public');
            Image::make(Storage::disk('public')->path($image))->resize(750, 500)->save();
            $data->image = $image;

            if (Storage::disk('public')->exists($data->image)) {
                Storage::disk('public')->delete($data->image);
            }
        }
        $data->update();
        return redirect()->back()->with('success','Posts updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        if(Storage::disk('public')->exists($post->image)){
            Storage::disk('public')->delete($post->image);
        }
        $post->delete();
        return redirect()->back()->with('success','Posts deleted successfully!');
    }
}
