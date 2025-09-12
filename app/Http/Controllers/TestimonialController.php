<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\TestimonialReport;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {   
        $testimonial = TestimonialReport::all();
        if ($request->ajax()) {
            return DataTables::of(TestimonialReport::query())
                ->filterColumn('id', function ($query, $keyword) {
                    $query->where('id', $keyword);
                })
                ->addColumn('image', function ($testimonial) {
                    return '<img src="' . asset($testimonial->image) . '" alt="" height="50" width="50">';
                })
                ->addColumn('action', function ($testimonial) {
                    return '
                    <div class="d-flex gap-2">
                        <a class="btn btn-icon btn-sm btn-warning p-2 shadow edit-btn" 
                           data-bs-toggle="offcanvas" 
                           data-bs-target="#offcanvas_edit" 
                           data-id="' . $testimonial->id . '">
                            <i class="ti ti-pencil"></i>
                        </a>
                            
                        <button type="button" 
                                class="btn btn-sm btn-danger delete-btn p-2" 
                                data-id="' . $testimonial->id . '" 
                                data-url="' . route('testimonial.destroy', $testimonial->id) . '">
                            <i class="ti ti-trash"></i>
                        </button>
                    </div>';
                })

                ->rawColumns(['image', 'action'])
                ->make(true);
        }

        return view("admin.testimonial.index", compact("testimonial"));
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

            // move file to public/assets/testimonial
            $image->move(public_path('assets/testimonial'), $filename);

            // save relative path in DB
            $data['image'] = 'assets/testimonial/' . $filename;
        } else {
            $data['image'] = null;
        }

        TestimonialReport::create($data);

        if ($request->ajax()) {
            return response()->json(['success' => 'Testimonial created successfully.']);
        } else {
            return response()->json(['error' => 'Something went wrong.']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $testimonial = TestimonialReport::findOrFail($id);
        return response()->json($testimonial);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $testimonial = TestimonialReport::findOrFail($id);

        $data = $request->except('image');
        $data['date'] = date('d-m-Y');

        if ($request->hasFile('image')) {
            // delete old image if exists
            if ($testimonial->image && file_exists(public_path($testimonial->image))) {
                unlink(public_path($testimonial->image));
            }

            $image = $request->file('image');
            $filename = time(). '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/testimonial'), $filename);

            $data['image'] = 'assets/testimonial/' . $filename;
        }

        $testimonial->update($data);

        if ($request->ajax()) {
            return response()->json(['success' => 'Testimonial updated successfully.']);
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
        $testimonial = TestimonialReport::findOrFail($id);
        // Delete associated image if exists
        if ($testimonial->image && file_exists(public_path($testimonial->image))) {
            unlink(public_path($testimonial->image));
        }

        $testimonial->delete();
        return response()->json([
        'status' => 'success',
        'message' => 'Testimonial deleted successfully!'
    ]);
    }
}
