<?php

namespace App\Http\Controllers;

use App\Models\BlogReport;
use App\Models\Category;
use App\Models\Product;
use App\Models\Banner;
use App\Models\Contact;
use App\Models\EventReport;
use App\Models\Profile;
use App\Models\SocialMediaUrl;
use App\Models\TestimonialReport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

use function decodeId;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $users = Auth::user();

        $banner = Cache::remember('banner', 3600, function () {
            return Banner::all();
        });

        $profile = Cache::remember('profile', 3600, function () {
            return Profile::first();
        });

        $category = Cache::remember('category', 3600, function () {
            return Category::all();
        });

        $blogs = Cache::remember('blogs', 3600, function () {
            return BlogReport::limit(10)->get();
        });

        $products = Cache::remember('products', 3600, function () {
            return Product::limit(10)->get();
        });

        $socialMediaUrl = Cache::remember('socialMediaUrl', 3600, function () {
            return SocialMediaUrl::all();
        });

        return view("index", compact( "socialMediaUrl", "users", 'profile', "products", "category", "blogs", "banner"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function about()
    {
        $users = Auth::user();

        $profile = Cache::remember('profile', 3600, function () {
            return Profile::first();
        });

        $category = Cache::remember('category', 3600, function () {
            return Category::all();
        });

        $socialMediaUrl = Cache::remember('socialMediaUrl', 3600, function () {
            return SocialMediaUrl::all();
        });

        return view("about", compact("socialMediaUrl", "users", "profile", "category"));
    }
    
    /**
     * Store a newly created resource in storage.
     */

    public function contact()
    {
        $users = Auth::user();

        $profile = Cache::remember('profile', 3600, function () {
            return Profile::first();
        });

        $category = Cache::remember('category', 3600, function () {
            return Category::all();
        });

        $socialMediaUrl = Cache::remember('socialMediaUrl', 3600, function () {
            return SocialMediaUrl::all();
        });

        return view("contact", compact( "socialMediaUrl", "users", "profile", "category"));
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

        $profile = Cache::remember('profile', 3600, function () {
            return Profile::first();
        });

        $category = Cache::remember('category', 3600, function () {
            return Category::all();
        });

        $products = Cache::remember('products', 3600, function () {
            return Product::limit(50)->get();
        });

        $socialMediaUrl = Cache::remember('socialMediaUrl', 3600, function () {
            return SocialMediaUrl::all();
        });

        $decode = decodeId($id);
        $getProducts = Product::where('category', $decode)->get();
        return view('product', compact('getProducts',   "socialMediaUrl", "users", "profile", "products", "category"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function productDetails(string $id)
    {
        $users = Auth::user();

        $profile = Cache::remember('profile', 3600, function () {
            return Profile::first();
        });

        $category = Cache::remember('category', 3600, function () {
            return Category::all();
        });

        $products = Cache::remember('products', 3600, function () {
            return Product::limit(50)->get();
        });

        $socialMediaUrl = Cache::remember('socialMediaUrl', 3600, function () {
            return SocialMediaUrl::all();
        });

        $decode = decodeId($id);
        $getProductDetails = Product::where('id', $decode)->first();
        return view('productDetails', compact('getProductDetails',  "socialMediaUrl", "users", "profile", "products", "category"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function blog()
    {
        $users = Auth::user();

        $profile = Cache::remember('profile', 3600, function () {
            return Profile::first();
        });

        $category = Cache::remember('category', 3600, function () {
            return Category::all();
        });

        $blogs = Cache::remember('blogs', 3600, function () {
            return BlogReport::limit(10)->get();
        });

        $socialMediaUrl = Cache::remember('socialMediaUrl', 3600, function () {
            return SocialMediaUrl::all();
        });

        return view("blog", compact( "socialMediaUrl", "users", 'profile', "category", "blogs"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function blogDetails(string $id)
    {
        $users = Auth::user();

        $profile = Cache::remember('profile', 3600, function () {
            return Profile::first();
        });

        $category = Cache::remember('category', 3600, function () {
            return Category::all();
        });

        $blogs = Cache::remember('blogs', 3600, function () {
            return BlogReport::limit(50)->get();
        });

        $socialMediaUrl = Cache::remember('socialMediaUrl', 3600, function () {
            return SocialMediaUrl::all();
        });

        $decode = decodeId($id);
        $getblogDetails = BlogReport::where('id', $decode)->first();
        return view('blogDetails', compact('getblogDetails',  "socialMediaUrl", "users", "profile", "category", "blogs"));
    }

    public function service()
    {
        $users = Auth::user();

        $profile = Cache::remember('profile', 3600, function () {
            return Profile::first();
        });

        $category = Cache::remember('category', 3600, function () {
            return Category::all();
        });

        $events = Cache::remember('events', 3600, function () {
            return EventReport::all();
        });

        $socialMediaUrl = Cache::remember('socialMediaUrl', 3600, function () {
            return SocialMediaUrl::all();
        });

        return view('service', compact( 'events', 'socialMediaUrl', 'users', 'profile', 'category'));

    }

    public function testimonial()
    {
        $users = Auth::user();

        $profile = Cache::remember('profile', 3600, function () {
            return Profile::first();
        });

        $category = Cache::remember('category', 3600, function () {
            return Category::all();
        });

        $testimonials = Cache::remember('testimonials', 3600, function () {
            return TestimonialReport::all();
        });

        $socialMediaUrl = Cache::remember('socialMediaUrl', 3600, function () {
            return SocialMediaUrl::all();
        });

        return view('testimonial', compact( 'testimonials',  'socialMediaUrl', 'users', 'profile',  'category'));

    }

}