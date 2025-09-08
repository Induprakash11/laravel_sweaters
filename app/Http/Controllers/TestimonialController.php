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
        if ($request->ajax()) {
            return DataTables::of(TestimonialReport::query())
                ->addColumn('image', function ($testimonial) {
                    return '<img src="' . asset($testimonial->image) . '" alt="" height="50" width="50">';
                })
                ->addColumn('action', function ($testimonial) {
                    return '<div class="d-flex gap-2">
                        <a class="btn btn-sm btn-warning" href="' . route('testimonial.edit', $testimonial->id) . '" title="Edit"><i class="ti ti-pencil"></i></a>
                        <form action="' . route('testimonial.destroy', $testimonial->id) . '" method="POST" style="display:inline;">
                            ' . csrf_field() . '
                            ' . method_field('DELETE') . '
                            <button type="submit" class="btn btn-sm btn-danger" title="Delete"><i class="ti ti-trash"></i></button>
                        </form>
                    </div>';
                })
                ->rawColumns(['image', 'action'])
                ->make(true);
        }

        return view("admin.testimonial.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $testimonial = new TestimonialReport();
        return view("admin.testimonial.add", compact("testimonial"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string|max:255',
            'message' => 'required|text|max:500',
            'rating' => 'required|integer|in:0,1,2,3,4,5',
            'status' => 'required|integer|in:0,1',
        ]);

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

        return redirect()->route("testimonial.index")
            ->with("success", "Testimonial created successfully.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $testimonial = TestimonialReport::findOrFail($id);
        return view("admin.testimonial.edit", compact("testimonial"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'string|max:255',
            'message' => 'text|max:500',
            'rating' => 'integer|in:0,1,2,3,4,5',
            'status' => 'integer|in:0,1',
        ]);

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

        return redirect()->route("testimonial.index")
            ->with("success", "Testimonial updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $testimonial = TestimonialReport::findOrFail($id);
        $testimonial->delete();
        return redirect()->route("testimonial.index")->with("success","Testimonial deleted successfully");
    }
}
