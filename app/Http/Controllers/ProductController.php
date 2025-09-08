<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categories = Category::all();
        $products = Product::all();
        if ($request->ajax()) {
            return DataTables::of(Product::query())
                ->addColumn('id', function ($product) {
                    return $product->id;
                })
                ->addColumn('image', function ($product) {
                    return '<img src="' . asset($product->image) . '" alt="" height="50" width="50">';
                })
                ->addColumn('action', function ($product) {
                    return '<div class="d-flex gap-2">
                        <a href="' . route('products.edit', $product->id) . '" class="btn btn-icon btn-sm btn-warning shadow edit-btn" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_edit" data-id="' . $product->id . '"><i class="ti ti-pencil"></i></a>
                        <a class="delete-btn text-white bg-danger p-1 rounded-1" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#delete_product" data-id="' . $product->id . '"><i class="ti ti-trash"></i></a>
                        </div>';
                    })
                ->rawColumns(['id', 'image', 'action'])
                ->make(true);
        }

        return view("admin.products.index", compact("categories", "products"));
    }

    /**
     * Show the form for creating a new resource.
                    
     */
    // public function create()
    // {
    //     return view("admin.products.add", compact("categories"));
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|string|max:100',
            'brand' => 'required|string|max:255',
            'gauge' => 'required|string|max:255',
            'construction' => 'required|string|max:255',
            'fabric' => 'required|string|max:255',
            'moq' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|integer|in:0,1',
        ]);

        $data = $request->except('image'); // exclude image for now
        $data['date'] = date('d-m-Y');

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            // generate unique name
            $filename = time() . '.' . $image->getClientOriginalExtension();

            // move file to public/assets/products
            $image->move(public_path('assets/products'), $filename);

            // save relative path in DB
            $data['image'] = 'assets/products/' . $filename;
        } else {
            $data['image'] = null;
        }

        Product::create($data);

        return redirect()->route("products.index")
            ->with("success", "Product created successfully.");
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        return response()->json($product);
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(string $id)
    // {
    //     $categories = Category::all();
    //     $product = Product::findOrFail($id);
    //     return view("admin.products.edit", compact("product", "categories"));
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'category' => 'string|max:100',
            'brand' => 'string|max:255',
            'gauge' => 'string|max:255',
            'construction' => 'string|max:255',
            'fabric' => 'string|max:255',
            'moq' => 'string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'integer|in:0,1',
        ]);

        $product = Product::findOrFail($id);

        $data = $request->except('image');
        $data['date'] = date('d-m-Y');

        if ($request->hasFile('image')) {
            // delete old image if exists
            if ($product->image && file_exists(public_path($product->image))) {
                unlink(public_path($product->image));
            }

            $image = $request->file('image');
            $filename = time(). '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/products'), $filename);

            $data['image'] = 'assets/products/' . $filename;
        }

        $product->update($data);

        return redirect()->route("products.index")
            ->with("success", "Product updated successfully.");
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);

        // Delete associated image if exists
        if ($product->image && file_exists(public_path($product->image))) {
            unlink(public_path($product->image));
        }

        $product->delete();
        return redirect()->route("products.index")->with("success", "Product deleted successfully.");
    }
}
