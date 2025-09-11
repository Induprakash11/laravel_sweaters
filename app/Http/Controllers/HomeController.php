<?php

namespace App\Http\Controllers;

use App\Models\BlogReport;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\Product;
use App\Models\SocialMedia;
use App\Models\Banner;
use App\Models\SocialMediaUrl;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $users = Auth::user();
        $banner = Banner::all();
        $category = Category::all();
        $blogs = BlogReport::all();
        $gallery = Gallery::all();
        $products = Product::all();
        $socialMedia = SocialMedia::all();
        $socialMediaUrl = SocialMediaUrl::all();
        return view("index", compact("socialMedia","socialMediaUrl", "users", "products", "category", "blogs", "gallery", "banner"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function about()
    {   
        $users = Auth::user();
        $banner = Banner::all();
        $category = Category::all();
        $blogs = BlogReport::all();
        $gallery = Gallery::all();
        $products = Product::all();
        $socialMedia = SocialMedia::all();
        $socialMediaUrl = SocialMediaUrl::all();
        return view("about", compact("socialMedia","socialMediaUrl", "users", "products", "category", "blogs", "gallery", "banner"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function contact()
    {
        $users = Auth::user();
        $banner = Banner::all();
        $category = Category::all();
        $blogs = BlogReport::all();
        $gallery = Gallery::all();
        $products = Product::all();
        $socialMedia = SocialMedia::all();
        $socialMediaUrl = SocialMediaUrl::all();
        return view("contact", compact("socialMedia","socialMediaUrl", "users", "products", "category", "blogs", "gallery", "banner"));
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
