<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productnew;
use App\Models\Category;
use Yajra\DataTables\DataTables;

class ProductnewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categories = Category::all();
        $productnew_count = Productnew::count();
        if ($request->ajax()) {
            return DataTables::of(Productnew::select('id', 'date', 'category', 'product_name', 'specification', 'video_url', 'information', 'features', 'application', 'product_image', 'status'))
                ->filterColumn('id', function ($query, $keyword) {
                    $query->where('id', $keyword);
                })
                ->addColumn('category', function ($productnew) {
                    return $productnew->category;
                })
                ->addColumn('product_image', function ($productnew) {
                    return '<img src="' . asset($productnew->product_image) . '" alt="" height="50" width="50">';
                })
                ->addColumn('action', function ($productnew) {
                    return '
                <div class="d-flex gap-2">
                    <a class="btn btn-icon btn-sm btn-warning p-2 shadow edit-btn"
                       data-bs-toggle="offcanvas"
                       data-bs-target="#offcanvas_edit"
                       data-id="' . $productnew->id . '">
                        <i class="ti ti-pencil"></i>
                    </a>
                    <button type="button"
                            class="btn btn-sm btn-danger delete-btn p-2"
                            data-id="' . $productnew->id . '"
                            data-url="' . route('productnew.destroy', $productnew->id) . '">
                        <i class="ti ti-trash"></i>
                    </button>
                </div>';
                })
                ->rawColumns(['product_image', 'action'])
                ->make(true);
        }


        return view("admin.products.product", compact("categories", "productnew_count"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->except('product_image'); // exclude product_image for now
        $data['date'] = date('d-m-Y');

        if ($request->hasFile('product_image')) {
            $product_image = $request->file('product_image');

            // generate unique name
            $filename = time() . '.' . $product_image->getClientOriginalExtension();

            // move file to public/assets/productnew
            $product_image->move(public_path('assets/productnew'), $filename);

            // save relative path in DB
            $data['product_image'] = 'assets/productnew/' . $filename;
        } 

        Productnew::create($data);

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
        $productnew = Productnew::findOrFail($id);
        return response()->json($productnew);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $productnew = Productnew::findOrFail($id);

        $data = $request->except('product_image');
        $data['date'] = date('d-m-Y');

        if ($request->hasFile('product_image')) {
            // delete old product_image if exists
            if ($productnew->product_image && file_exists(public_path($productnew->product_image))) {
                unlink(public_path($productnew->product_image));
            }

            $product_image = $request->file('product_image');
            $filename = time() . '.' . $product_image->getClientOriginalExtension();
            $product_image->move(public_path('assets/productnew'), $filename);

            $data['product_image'] = 'assets/productnew/' . $filename;
        }

        $productnew->update($data);

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
        $productnew = Productnew::findOrFail($id);

        // Delete associated product_image if exists
        if ($productnew->product_image && file_exists(public_path($productnew->product_image))) {
            unlink(public_path($productnew->product_image));
        }

        $productnew->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Product deleted successfully!'
        ]);
    }
}
