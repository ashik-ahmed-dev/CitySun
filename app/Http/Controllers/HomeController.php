<?php

namespace App\Http\Controllers;
use App\Mail\OrderSend;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Order;
use App\Models\Service;
use App\Models\Subscriber;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;


class HomeController extends Controller
{
    public function index(){
        $categories = Category::latest()->orderBy('created_at','desc')->get();
        $testi = Testimonial::latest()->orderBy('created_at','desc')->get();
        return view('home', compact('categories', 'testi'));
    }


    public function serviceByCategory($slug){
        $category = Category::where('slug',$slug)->first();
        $services = $category->services()->paginate(6);
        return view('category_services', compact('services', 'category'));
    }

    public function serviceDetails($slug){
        $service = Service::with('category')->where('slug',$slug)->first();
        return view('services.details', compact('service'));
    }

    public function booking_detail($id) {
        return Service::findOrFail($id);
    }

    public function order_store(Request $request){
        $request->validate([
            'phone' => 'required',
        ]);

        $order = Order::create([
            'user_id' => Auth::user()->id,
            'service_id' => $request->service_id,
            'service_price' => $request->service_price,
            'type' => $request->type,
            'payment_number' => $request->payment_number,
            'TrxID' => $request->TrxID,
            'name' => Auth::user()->name,
            'email' => Auth::user()->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'note' => $request->note,
            'created_at' => Carbon::now(),
        ]);

        Mail::to($order->email)->queue(new OrderSend($order));

        return redirect()->back()->with('success','your Order has been send successfully');
    }

    public function contact(){
        return view('contact');
    }

    public function contactStore(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        Contact::insert([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->back()->with('success','your message send successfully');
    }

    public function about(){
        return view('about');
    }

    public function faq(){
        return view('faq');
    }

    public function terms(){
        return view('terms');
    }

    public function privacy_policy(){
        return view('privacy-policy');
    }


    public function subscribeStore(Request $request){
        $request->validate([
            'email' => 'required',
        ]);
        // Get the value from the form
        $input['email'] = $request->email;
        // Must not already exist in the `email` column of `users` table
        $rules = array('email' => 'unique:subscribers,email');
        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return redirect()->back()->with('error','Sorry! You have already subscribed');
        }
        else {
            Subscriber::insert([
                'email' => $request->email,
                'created_at' => Carbon::now(),
            ]);
            return redirect()->back()->with('success','Thanks For Subscribe');
        }
    }




}
