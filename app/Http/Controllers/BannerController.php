<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Banner;
use Yajra\DataTables\DataTables;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $banner = Banner::all();
        if ($request->ajax()) {
            return DataTables::of(Banner::query())
                ->filterColumn('id', function ($query, $keyword) {
                    $query->where('id', $keyword);
                })
                ->addColumn('image', function ($banner) {
                    return '<img src="' . asset($banner->image) . '" alt="" height="50" width="50">';
                })
                ->addColumn('action', function ($banner) {
                    return '
                    <div class="d-flex gap-2">
                        <a class="btn btn-icon btn-sm btn-warning p-2 shadow edit-btn" 
                           data-bs-toggle="offcanvas" 
                           data-bs-target="#offcanvas_edit" 
                           data-id="' . $banner->id . '">
                            <i class="ti ti-pencil"></i>
                        </a>
                            
                        <button type="button" 
                                class="btn btn-sm btn-danger delete-btn p-2" 
                                data-id="' . $banner->id . '" 
                                data-url="' . route('banner.destroy', $banner->id) . '">
                            <i class="ti ti-trash"></i>
                        </button>
                    </div>';
                })

                ->rawColumns(['image', 'action'])
                ->make(true);
        }

        return view("admin.banner.index", compact("banner"));
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

            // move file to public/assets/banner
            $image->move(public_path('assets/banner'), $filename);

            // save relative path in DB
            $data['image'] = 'assets/banner/' . $filename;
        } else {
            $data['image'] = null;
        }

        Banner::create($data);

        if ($request->ajax()) {
            return response()->json(['success' => 'Banner created successfully.']);
        } else {
            return response()->json(['error' => 'Something went wrong.']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $banner = Banner::findOrFail($id);
        return response()->json($banner);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $banner = Banner::findOrFail($id);

        $data = $request->except('image');
        $data['date'] = date('d-m-Y');

        if ($request->hasFile('image')) {
            // delete old image if exists
            if ($banner->image && file_exists(public_path($banner->image))) {
                unlink(public_path($banner->image));
            }

            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/banner'), $filename);

            $data['image'] = 'assets/banner/' . $filename;
        }

        $banner->update($data);

        if ($request->ajax()) {
            return response()->json(['success' => 'Banner updated successfully.']);
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
        $banner = Banner::findOrFail($id);
        // Delete associated image if exists
        if ($banner->image && file_exists(public_path($banner->image))) {
            unlink(public_path($banner->image));
        }

        $banner->delete();
        return response()->json([
        'status' => 'success',
        'message' => 'Banner deleted successfully!'
    ]);
    }
}
