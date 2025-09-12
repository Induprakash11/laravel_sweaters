<?php

namespace App\Http\Controllers;

use App\Models\BlogReport;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\Product;
use App\Models\SocialMedia;
use App\Models\Banner;
use App\Models\Contact;
use App\Models\EventReport;
use App\Models\Profile;
use App\Models\SocialMediaUrl;
use App\Models\TestimonialReport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

use function decodeId;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = Auth::user();
        $banner = Banner::all();
        $profile = Profile::first();
        $category = Category::all();
        $blogs = BlogReport::all();
        $products = Product::all();
        $socialMedia = SocialMedia::all();
        $socialMediaUrl = SocialMediaUrl::all();
        return view("index", compact("socialMedia", "socialMediaUrl", "users", 'profile', "products", "category", "blogs", "banner"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function about()
    {
        $users = Auth::user();
        $banner = Banner::all();
        $profile = Profile::first();
        $category = Category::all();
        $blogs = BlogReport::all();
        $products = Product::all();
        $socialMedia = SocialMedia::all();
        $socialMediaUrl = SocialMediaUrl::all();
        return view("about", compact("socialMedia", "socialMediaUrl", "users", "profile", "products", "category", "blogs", "banner"));
    }
    
    /**
     * Store a newly created resource in storage.
     */

    public function contact()
    {   
        $users = Auth::user();
        $banner = Banner::all();
        $profile = Profile::first();
        $category = Category::all();
        $blogs = BlogReport::all();
        $products = Product::all();
        $socialMedia = SocialMedia::all();
        $socialMediaUrl = SocialMediaUrl::all();
        
        return view("contact", compact("socialMedia", "socialMediaUrl", "users", "profile", "products", "category", "blogs", "banner"));
    }
    public function contactstore(Request $request)
    {
        // Save to DB
        Contact::create([
            'name'    => $request->name,
            'phone'   => $request->phone,
            'email'   => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        return response()->json(['success' => 'Thank you, your message has been saved!']);
    }

    /**
     * Display the specified resource.
     */
    public function product(string $id) 
    {
        $users = Auth::user();
        $banner = Banner::all();
        $profile = Profile::first();
        $category = Category::all();
        $blogs = BlogReport::all();
        $products = Product::all();
        $socialMedia = SocialMedia::all();
        $socialMediaUrl = SocialMediaUrl::all();

        $decode = decodeId($id);
        $getProducts = Product::where('category', $decode)->get();
        return view('product', compact('getProducts',  "socialMedia", "socialMediaUrl", "users", "profile", "products", "category", "blogs", "banner"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function productDetails(string $id)
    {
        $users = Auth::user();
        $banner = Banner::all();
        $profile = Profile::first();
        $category = Category::all();
        $blogs = BlogReport::all();
        $products = Product::all();
        $socialMedia = SocialMedia::all();
        $socialMediaUrl = SocialMediaUrl::all();

        $decode = decodeId($id);
        $getProductDetails = Product::where('id', $decode)->first();
        return view('productDetails', compact('getProductDetails', "socialMedia", "socialMediaUrl", "users", "profile", "products", "category", "blogs", "banner"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function blog()
    {
        $users = Auth::user();
        $banner = Banner::all();
        $profile = Profile::first();
        $category = Category::all();
        $blogs = BlogReport::all();
        $products = Product::all();
        $socialMedia = SocialMedia::all();
        $socialMediaUrl = SocialMediaUrl::all();
        return view("blog", compact("socialMedia", "socialMediaUrl", "users", 'profile', "products", "category", "blogs", "banner"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function blogDetails(string $id)
    {
        $users = Auth::user();
        $banner = Banner::all();
        $profile = Profile::first();
        $category = Category::all();
        $blogs = BlogReport::all();
        $products = Product::all();
        $socialMedia = SocialMedia::all();
        $socialMediaUrl = SocialMediaUrl::all();

        $decode = decodeId($id);
        $getblogDetails = BlogReport::where('id', $decode)->first();
        return view('blogDetails', compact('getblogDetails', "socialMedia", "socialMediaUrl", "users", "profile", "products", "category", "blogs", "banner"));
    }

    public function service()
    {
        $users = Auth::user();
        $banner = Banner::all();
        $profile = Profile::first();
        $category = Category::all();
        $blogs = BlogReport::all();
        $events = EventReport::all();
        $products = Product::all();
        $socialMedia = SocialMedia::all();
        $socialMediaUrl = SocialMediaUrl::all();

        return view('service', compact('socialMedia', 'events', 'socialMediaUrl', 'users', 'profile', 'products', 'category', 'blogs', 'banner'));

    }

    public function testimonial()
    {
        $users = Auth::user();
        $banner = Banner::all();
        $profile = Profile::first();
        $category = Category::all();
        $blogs = BlogReport::all();
        $events = EventReport::all();
        $products = Product::all();
        $testimonials = TestimonialReport::all();
        $socialMedia = SocialMedia::all();
        $socialMediaUrl = SocialMediaUrl::all();

        return view('testimonial', compact('socialMedia', 'testimonials', 'events', 'socialMediaUrl', 'users', 'profile', 'products', 'category', 'blogs', 'banner'));

    }

}