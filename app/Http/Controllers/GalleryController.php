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
        $gallery = Gallery::all();
        if ($request->ajax()) {
            return DataTables::of(Gallery::query())
                ->filterColumn('id', function ($query, $keyword) {
                    $query->where('id', $keyword);
                })
                ->addColumn('image', function ($gallery) {
                    return '<img src="' . asset($gallery->image) . '" alt="" height="50" width="50">';
                })
                ->addColumn('action', function ($gallery) {
                    return '
                    <div class="d-flex gap-2">
                        <a class="btn btn-icon btn-sm btn-warning p-2 shadow edit-btn" 
                           data-bs-toggle="offcanvas" 
                           data-bs-target="#offcanvas_edit" 
                           data-id="' . $gallery->id . '">
                            <i class="ti ti-pencil"></i>
                        </a>
                            
                        <button type="button" 
                                class="btn btn-sm btn-danger delete-btn p-2" 
                                data-id="' . $gallery->id . '" 
                                data-url="' . route('gallery.destroy', $gallery->id) . '">
                            <i class="ti ti-trash"></i>
                        </button>
                    </div>';
                })

                ->rawColumns(['image', 'action'])
                ->make(true);
        }

        return view("admin.gallery.index", compact("gallery"));
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

            // move file to public/assets/gallery
            $image->move(public_path('assets/gallery'), $filename);

            // save relative path in DB
            $data['image'] = 'assets/gallery/' . $filename;
        } else {
            $data['image'] = null;
        }

        Gallery::create($data);

        if ($request->ajax()) {
            return response()->json(['success' => 'Gallery created successfully.']);
        } else {
            return response()->json(['error' => 'Something went wrong.']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $gallery = Gallery::findOrFail($id);
        return response()->json($gallery);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
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

        if ($request->ajax()) {
            return response()->json(['success' => 'Gallery updated successfully.']);
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
        $gallery = Gallery::findOrFail($id);
        // Delete associated image if exists
        if ($gallery->image && file_exists(public_path($gallery->image))) {
            unlink(public_path($gallery->image));
        }

        $gallery->delete();
        return response()->json([
        'status' => 'success',
        'message' => 'Gallery deleted successfully!'
    ]);
    }
}
