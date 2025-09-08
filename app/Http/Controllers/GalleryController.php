<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Gallery;
use Yajra\DataTables\DataTables;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {   
        if ($request->ajax()) {
            return DataTables::of(Gallery::query())
                ->addColumn('image', function ($gallery) {
                    return '<img src="' . asset($gallery->image) . '" alt="" height="50" width="50">';
                })
                ->addColumn('action', function ($gallery) {
                    return '<div class="d-flex gap-2">
                        <a class="btn btn-sm btn-warning" href="' . route('gallery.edit', $gallery->id) . '" title="Edit"><i class="ti ti-pencil"></i></a>
                        <form action="' . route('gallery.destroy', $gallery->id) . '" method="POST" style="display:inline;">
                            ' . csrf_field() . '
                            ' . method_field('DELETE') . '
                            <button type="submit" class="btn btn-sm btn-danger" title="Delete"><i class="ti ti-trash"></i></button>
                        </form>
                    </div>';
                })
                ->rawColumns(['image', 'action'])
                ->make(true);
        }

        return view("admin.gallery.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.gallery.add");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required|string|max:255',
            'status' => 'required|integer|in:0,1',
        ]);

        $data = $request->except('image'); // exclude image for now
        $data['date'] = date('d-m-Y');

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            // generate unique name
            $filename = time() . '.' . $image->getClientOriginalExtension();

            // move file to public/assets/gallery
            $image->move(public_path('assets/gallery'), $filename);

            // save relative path in DB
            $data['image'] = 'assets/gallery/' . $filename;
        } else {
            $data['image'] = null;
        }

        Gallery::create($data);

        return redirect()->route("gallery.index")
            ->with("success", "Gallery created successfully.");
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
        
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $gallery = Gallery::findOrFail($id);
        return view("admin.gallery.edit", compact("gallery"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'string|max:255',
            'status' => 'integer|in:0,1',
        ]);

        $gallery = Gallery::findOrFail($id);

        $data = $request->except('image');
        $data['date'] = date('d-m-Y');

        if ($request->hasFile('image')) {
            // delete old image if exists
            if ($gallery->image && file_exists(public_path($gallery->image))) {
                unlink(public_path($gallery->image));
            }

            $image = $request->file('image');
            $filename = time(). '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/gallery'), $filename);

            $data['image'] = 'assets/gallery/' . $filename;
        }

        $gallery->update($data);

        return redirect()->route("gallery.index")
            ->with("success", "Gallery updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $gallery = Gallery::findOrFail($id);
        $gallery->delete();
        return redirect()->route("gallery.index")->with("success","Gallery deleted successfully");
    }
}
