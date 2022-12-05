<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Order;
use App\Models\Post;
use App\Models\Service;
use App\Models\Subscriber;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class HomeController extends Controller
{
    public function index(){
        $general = json_decode(settings('general'), true);
        $categories = Category::latest()->orderBy('created_at','desc')->get();
        $testi = Testimonial::latest()->orderBy('created_at','desc')->get();seo()
            ->title($general['site_title'])
            ->description($general['meta_description'])
            ->image(get_path('favicon.png'));
        return view('home', compact('categories', 'testi'));
    }


    public function serviceByCategory($slug){
        $category = Category::where('slug',$slug)->first();
        $services = $category->services()->paginate(6);
        seo()
            ->title($category->name)
            ->description('')
            ->image('');
        return view('category_services', compact('services', 'category'));
    }

    public function serviceDetails($slug){
        $service = Service::with('category')->where('slug',$slug)->first();
        seo()
            ->title($service->name)
            ->description(Str::limit($service->short_text, 140))
            ->image('');
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

        //Mail::to($order->email)->queue(new OrderSend($order));

        return redirect()->back()->with('success','your Order has been send successfully');
    }

    public function contact(){
        seo()
            ->title('Our Contact')
            ->description('')
            ->image('');
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
        seo()
            ->title('About Us')
            ->description('')
            ->image('');
        return view('about');
    }

    public function faq(){
        seo()
            ->title('FAQ')
            ->description('')
            ->image('');
        return view('faq');
    }

    public function terms(){
        seo()
            ->title('Terms & Conditions')
            ->description('')
            ->image('');
        return view('terms');
    }

    public function privacy_policy(){
        seo()
            ->title('Privacy Policy')
            ->description('')
            ->image('');
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


    public function posts(){
        seo()
            ->title('Our Latest blog')
            ->description('')
            ->image('');
        $posts = Post::latest()->paginate(6);
        return view('posts', compact( 'posts'));
    }

    public function single_post($slug){

        $post = Post::where('slug',$slug)->first();
        seo()
            ->title($post->title)
            ->description(Str::limit($post->meta_description, 140))
            ->image($post->image);
        return view('single_post', compact('post'));
    }

}
