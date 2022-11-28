<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Intervention\Image\Facades\Image;


class SettingsController extends Controller
{
    public function general(){
        $title = 'general settings';
        return view('admin.settings.general', compact('title'));
    }

    public function general_update(Request $request){
        $data = array(
            "app_url" => $request->app_url,
            "site_name" => $request->site_name,
            "site_title" => $request->site_title,
            "newslatter_text" => $request->newslatter_text,
            "about_text" => $request->about_text,
            "copyright_text" => $request->copyright_text,
            "address" => $request->address,
            "phone" => $request->phone,
            "email" => $request->email,
            "facebook" => $request->facebook,
            "twitter" => $request->twitter,
            "instagram" => $request->instagram,
            "youtube" => $request->youtube,
        );
        Settings::updateOrCreate(['key' => 'general'], ['value' => json_encode($data)]);

        // Update .env file
        Artisan::call("env:set APP_NAME=".$request->site_name);
        Artisan::call("env:set APP_URL=".$request->app_url);
        return redirect()->route('admin.settings.general')->with('success','data updated successfully');
    }

    public function logo_update(Request $request){
        if ($request->file('logo')) {
            $images_one = $request->file('logo');
            Image::make($images_one)->resize(200,60)->save(public_path('storage/logo.webp'));
            return redirect()->route('admin.settings.general')->with('success','data updated successfully');
        }
        if ($request->file('favicon')) {
            $images_one = $request->file('favicon');
            Image::make($images_one)->resize(96,96)->save(public_path('storage/favicon.webp'));
            return redirect()->route('admin.settings.general')->with('success','data updated successfully');
        }else{
            return redirect()->route('admin.settings.general')->with('error','data not updated');
        }
    }


    public function web_settings(){
        $title = 'website settings';
        return view('admin.settings.web_settings', compact('title'));
    }

    public function web_setting_update(Request $request){
        $data = array(
            "app_title" => $request->app_title,
            "play_store_url" => $request->play_store_url,
            "app_store_url" => $request->app_store_url,
            "app_sub_title" => $request->app_sub_title,
            "testi_title" => $request->testi_title,
            "testi_subtitle" => $request->testi_subtitle,
            "contact_title" => $request->contact_title,
            "contact_subtitle" => $request->contact_subtitle,
        );
        Settings::updateOrCreate(['key' => 'websettings'], ['value' => json_encode($data)]);
        return redirect()->route('admin.web-settings')->with('success','data updated successfully');
    }


    public function images_upload(Request $request){
        if ($request->hasFile('about')) {
            $images_one = $request->file('about');
            Image::make($images_one)->resize(750,750)->save(public_path('storage/images/about.webp'));
            return redirect()->route('admin.web-settings')->with('success','data updated successfully');
        }
        if ($request->hasFile('featured')) {
            $images_one = $request->file('featured');
            Image::make($images_one)->resize(750,500)->save(public_path('storage/images/featured.webp'));
            return redirect()->route('admin.web-settings')->with('success','data updated successfully');
        }
    }
}
