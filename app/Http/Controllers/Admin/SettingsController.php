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
            "facebook" => $request->facebook,
            "twitter" => $request->twitter,
            "instagram" => $request->instagram,
            "youtube" => $request->youtube,
            "email" => $request->email,
            "phone" => $request->phone,
            "address" => $request->address,
            "site_title" => $request->site_title,
            "meta_description" => $request->meta_description,
            "newslatter_text" => $request->newslatter_text,
            "footer_text" => $request->footer_text,
            "analytics_code" => $request->analytics_code,
            "verification" => $request->verification,
        );
        Settings::updateOrCreate(['key' => 'general'], ['value' => json_encode($data)]);

        // Update .env file
        Artisan::call("env:set APP_NAME=".$request->site_name);
        Artisan::call("env:set APP_URL=".$request->app_url);
        return redirect()->route('admin.settings.general')->with('success','data updated successfully');
    }

    public function image_update(Request $request){
        if ($request->file('logo')) {
            $request->file('logo')->storeAs('', 'logo.png', 'public');
            return redirect()->route('admin.settings.general')->with('success','data updated successfully');
        }
        if ($request->hasFile('about')) {
            $request->file('about')->storeAs('', 'about.png', 'public');
            return redirect()->route('admin.settings.general')->with('success','data updated successfully');
        }
        if ($request->hasFile('featured')) {
            $request->file('featured')->storeAs('', 'featured.png', 'public');
            return redirect()->route('admin.settings.general')->with('success','data updated successfully');
        }
        if ($request->file('favicon')) {
            $request->file('favicon')->storeAs('', 'favicon.png', 'public');
            return redirect()->route('admin.settings.general')->with('success','data updated successfully');
        }else{
            return redirect()->route('admin.settings.general')->with('error','data not updated');
        }
    }
}
