<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Yajra\DataTables\DataTables;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {   
        $categories = Category::all();
        if ($request->ajax()) {
            return DataTables::of(Category::query())
                ->addColumn('id', function ($categories) {
                    return $categories->id;
                })
                ->addColumn('action', function ($categories) {
                    return '<div class="d-flex gap-2">
                        <a href="' . route('category.edit', $categories->id) . '" class="btn btn-icon btn-sm btn-warning shadow edit-btn" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_edit" data-id="' . $categories->id . '"><i class="ti ti-pencil"></i></a>
                        <a class="delete-btn text-white bg-danger p-1 rounded-1" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#delete_catgory" data-id="' . $categories->id . '"><i class="ti ti-trash"></i></a>
                        </div>';
                    })
                ->rawColumns(['id', 'action'])
                ->make(true);
        }
        $categories = Category::all();
        return view("admin.category.index", compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     return view("admin.category.add");
    // }

    /**
     * Store a newly created resource in storage.
     */
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'status' => 'required|integer|in:0,1',
        ]);

        $data = $request->all();
        $data['date'] = date('d-m-Y');
        Category::create($data);
        return redirect()->route("category.index")->with("success","Category created successfully.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categories = Category::findOrFail($id);
        return response()->json($categories);
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(string $id)
    // {
    //     $category = Category::findOrFail($id);
    //     return view("admin.category.edit", compact("category"));
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'status' => 'required|integer|in:0,1',
        ]);

        $category = Category::findOrFail($id);
        $data = $request->only(['name','status']);
        $data['date'] = date('d-m-Y');
        $category->update($data);
        return redirect()->route("category.index")->with("success","Category updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categories = Category::findOrFail($id);
        $categories->delete();
        return redirect()->route("category.index")->with("success", "Catgory deleted successfully.");
    }
}
