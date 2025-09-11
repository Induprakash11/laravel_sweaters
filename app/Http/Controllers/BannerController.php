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
                ->addColumn('id', function ($banner) {
                    return $banner->id;
                })
                ->addColumn('image', function ($banner) {
                    return '<img src="' . asset($banner->image) . '" alt="" height="50" width="50">';
                })
                ->addColumn('action', function ($banner) {
                    return '<div class="d-flex gap-2">
                        <a href="' . route('banner.edit', $banner->id) . '" class="btn btn-icon btn-sm btn-warning shadow edit-btn" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_edit" data-id="' . $banner->id . '"><i class="ti ti-pencil"></i></a>
                        <a class="delete-btn text-white bg-danger p-1 rounded-1" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#delete_banner" data-id="' . $banner->id . '"><i class="ti ti-trash"></i></a>
                        </div>';
                    })
                ->rawColumns(['id', 'image', 'action'])
                ->make(true);
        }

        return view("admin.banner.index", compact("banner"));
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     return view("admin.banner.add");
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|integer|in:0,1',
        ]);

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

        return redirect()->route("banner.index")
            ->with("success", "Banner created successfully.");
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
     * Show the form for editing the specified resource.
     */
    // public function edit(string $id)
    // {
    //     $banner = Banner::findOrFail($id);
    //     return view("admin.banner.edit", compact("banner"));
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'integer|in:0,1',
        ]);

        $banner = Banner::findOrFail($id);

        $data = $request->except('image');
        $data['date'] = date('d-m-Y');

        if ($request->hasFile('image')) {
            // delete old image if exists
            if ($banner->image && file_exists(public_path($banner->image))) {
                unlink(public_path($banner->image));
            }

            $image = $request->file('image');
            $filename = time(). '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/banner'), $filename);

            $data['image'] = 'assets/banner/' . $filename;
        }

        $banner->update($data);

        return redirect()->route("banner.index")
            ->with("success", "Banner updated successfully.");
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
        return redirect()->route("banner.index")->with("success","Banner deleted successfully");
    }
}
