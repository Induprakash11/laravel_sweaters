<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogReport;
use Yajra\DataTables\DataTables;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {   
        $blogs = BlogReport::all();
        if ($request->ajax()) {
            return DataTables::of(BlogReport::query())
                ->addColumn('id', function ($blogs) {
                    return $blogs->id;
                })
                ->addColumn('image', function ($blog) {
                    return '<img src="' . asset($blog->image) . '" alt="" height="50" width="50">';
                })
                ->addColumn('action', function ($blog) {
                    return '<div class="d-flex gap-2">
                        <a href="' . route('blogs.edit', $blog->id) . '" class="btn btn-icon btn-sm btn-warning shadow edit-btn" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_edit" data-id="' . $blog->id . '"><i class="ti ti-pencil"></i></a>
                        <a class="delete-btn text-white bg-danger p-1 rounded-1" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#delete_blog" data-id="' . $blog->id . '"><i class="ti ti-trash"></i></a>
                        </div>';
                    })
                ->rawColumns(['id', 'image', 'action'])
                ->make(true);
        }

        return view("admin.blogs.index", compact("blogs"));
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     return view("admin.blogs.add");
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'message' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|integer|in:0,1',
        ]);

        $data = $request->except('image'); // exclude image for now
        $data['date'] = date('d-m-Y');

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            // generate unique name
            $filename = time() . '.' . $image->getClientOriginalExtension();

            // move file to public/assets/blogs
            $image->move(public_path('assets/blogs'), $filename);

            // save relative path in DB
            $data['image'] = 'assets/blogs/' . $filename;
        } else {
            $data['image'] = null;
        }

        BlogReport::create($data);

        return redirect()->route("blogs.index")
            ->with("success", "Blog created successfully.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $blogs = BlogReport::findOrFail($id);
        return response()->json($blogs);
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(string $id)
    // {
    //     $blogs = BlogReport::findOrFail($id);
    //     return view("admin.blogs.edit", compact("blogs"));
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'string|max:255',
            'message' => 'string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'integer|in:0,1',
        ]);

        $blogs = BlogReport::findOrFail($id);

        $data = $request->except('image');
        $data['date'] = date('d-m-Y');

        if ($request->hasFile('image')) {
            // delete old image if exists
            if ($blogs->image && file_exists(public_path($blogs->image))) {
                unlink(public_path($blogs->image));
            }

            $image = $request->file('image');
            $filename = time(). '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/blogs'), $filename);

            $data['image'] = 'assets/blogs/' . $filename;
        }

        $blogs->update($data);

        return redirect()->route("blogs.index")
            ->with("success", "Blog updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blogs = BlogReport::findOrFail($id);
        // Delete associated image if exists
        if ($blogs->image && file_exists(public_path($blogs->image))) {
            unlink(public_path($blogs->image));
        }

        $blogs->delete();
        return redirect()->route("blogs.index")->with("success", "Blog deleted successfully.");
    }
}
