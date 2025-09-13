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
        $blogs_count = BlogReport::count();
        if ($request->ajax()) {
            return DataTables::of(BlogReport::query())
                ->filterColumn('id', function ($query, $keyword) {
                    $query->where('id', $keyword);
                })
                ->addColumn('image', function ($blogs) {
                    return '<img src="' . asset($blogs->image) . '" alt="" height="50" width="50">';
                })
                ->addColumn('action', function ($blogs) {
                    return '
                    <div class="d-flex gap-2">
                        <a class="btn btn-icon btn-sm btn-warning p-2 shadow edit-btn" 
                           data-bs-toggle="offcanvas" 
                           data-bs-target="#offcanvas_edit" 
                           data-id="' . $blogs->id . '">
                            <i class="ti ti-pencil"></i>
                        </a>
                            
                        <button type="button" 
                                class="btn btn-sm btn-danger delete-btn p-2" 
                                data-id="' . $blogs->id . '" 
                                data-url="' . route('blogs.destroy', $blogs->id) . '">
                            <i class="ti ti-trash"></i>
                        </button>
                    </div>';
                })

                ->rawColumns(['image', 'action'])
                ->make(true);
        }

        return view("admin.blogs.index", compact("blogs_count"));
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

            // move file to public/assets/blogs
            $image->move(public_path('assets/blogs'), $filename);

            // save relative path in DB
            $data['image'] = 'assets/blogs/' . $filename;
        } 

        BlogReport::create($data);

        if ($request->ajax()) {
            return response()->json(['success' => 'Blog created successfully.']);
        } else {
            return response()->json(['error' => 'Something went wrong.']);
        }
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
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
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

        if ($request->ajax()) {
            return response()->json(['success' => 'Blog updated successfully.']);
        } 
        else {
            return response()->json(['error'=> 'Something went wrong.']);
        }
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
        return response()->json([
        'status' => 'success',
        'message' => 'Blog deleted successfully!'
    ]);
    }
}
