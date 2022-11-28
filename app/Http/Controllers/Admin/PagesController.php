<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function about(){
        $title = 'about settings';
        return view('admin.pages.about', compact('title'));
    }

    public function about_store(Request $request){
        $about_text = $request->about_text;
        Settings::updateOrCreate(['key' => 'about_text'], ['value' => $about_text]);
        return redirect()->route('admin.web-setting.about')->with('success','data updated successfully');
    }

    public function terms(){
        $title = 'terms & conditions';
        return view('admin.pages.terms', compact('title'));
    }

    public function terms_store(Request $request){
        $terms_text = $request->terms;
        Settings::updateOrCreate(['key' => 'terms'], ['value' => $terms_text]);
        return redirect()->route('admin.web-setting.terms')->with('success','data updated successfully');
    }

    public function privacy(){
        $title = 'privacy & policy';
        return view('admin.pages.privacy-policy', compact('title'));
    }

    public function privacy_store(Request $request){
        $privacy_text = $request->privacy;
        Settings::updateOrCreate(['key' => 'privacy'], ['value' => $privacy_text]);
        return redirect()->route('admin.web-setting.privacy')->with('success','data updated successfully');
    }
}
