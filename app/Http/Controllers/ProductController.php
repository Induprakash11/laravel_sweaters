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
        $products_count = Product::count();
        if ($request->ajax()) {
            return DataTables::of(Product::query())
                ->filterColumn('id', function ($query, $keyword) {
                    $query->where('id', $keyword);
                })
                ->addColumn('category', function ($product) {
                    return $product->category;
                })
                ->addColumn('image', function ($product) {
                    return '<img src="' . asset($product->image) . '" alt="" height="50" width="50">';
                })
                ->addColumn('action', function ($product) {
                    return '
                <div class="d-flex gap-2">
                    <a class="btn btn-icon btn-sm btn-warning p-2 shadow edit-btn" 
                       data-bs-toggle="offcanvas" 
                       data-bs-target="#offcanvas_edit" 
                       data-id="' . $product->id . '">
                        <i class="ti ti-pencil"></i>
                    </a>
                    <button type="button" 
                            class="btn btn-sm btn-danger delete-btn p-2" 
                            data-id="' . $product->id . '" 
                            data-url="' . route('products.destroy', $product->id) . '">
                        <i class="ti ti-trash"></i>
                    </button>
                </div>';
                })
                ->rawColumns(['image', 'action'])
                ->make(true);
        }


        return view("admin.products.index", compact("categories", "products_count"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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
        } 

        Product::create($data);

        if ($request->ajax()) {
            return response()->json(['success' => 'Product created successfully.']);
        } else {
            return response()->json(['error' => 'Something went wrong.']);
        }
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
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);

        $data = $request->except('image');
        $data['date'] = date('d-m-Y');

        if ($request->hasFile('image')) {
            // delete old image if exists
            if ($product->image && file_exists(public_path($product->image))) {
                unlink(public_path($product->image));
            }

            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/products'), $filename);

            $data['image'] = 'assets/products/' . $filename;
        }

        $product->update($data);

        if ($request->ajax()) {
            return response()->json(['success' => 'Product updated successfully.']);
        } else {
            return response()->json(['error' => 'Something went wrong.']);
        }
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
        return response()->json([
            'status' => 'success',
            'message' => 'Product deleted successfully!'
        ]);
    }
}
