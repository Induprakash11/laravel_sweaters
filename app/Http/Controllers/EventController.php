<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\EventReport;
use Yajra\DataTables\DataTables;



class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {   
        $events = EventReport::all();
        if ($request->ajax()) {
            return DataTables::of(EventReport::query())
                ->addColumn('id', function ($events) {
                    return $events->id;
                })
                ->addColumn('image', function ($event) {
                    return '<img src="' . asset($event->image) . '" alt="" height="50" width="50">';
                })
                ->addColumn('action', function ($event) {
                    return '<div class="d-flex gap-2">
                        <a href="' . route('events.edit', $event->id) . '" class="btn btn-icon btn-sm btn-warning shadow edit-btn" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_edit" data-id="' . $event->id . '"><i class="ti ti-pencil"></i></a>
                        <a class="delete-btn text-white bg-danger p-1 rounded-1" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#delete_event" data-id="' . $event->id . '"><i class="ti ti-trash"></i></a>
                        </div>';
                    })
                ->rawColumns(['id', 'image', 'action'])
                ->make(true);
        }

        return view("admin.events.index", compact("events"));
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     return view("admin.events.add");
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|integer|in:0,1',
        ]);

        $data = $request->except('image'); // exclude image for now
        $data['date'] = date('d-m-Y');

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            // generate unique name
            $filename = time() . '.' . $image->getClientOriginalExtension();

            // move file to public/assets/events
            $image->move(public_path('assets/events'), $filename);

            // save relative path in DB
            $data['image'] = 'assets/events/' . $filename;
        } else {
            $data['image'] = null;
        }

        EventReport::create($data);

        return redirect()->route("events.index")
            ->with("success", "Event created successfully.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $events = EventReport::findOrFail($id);
        return response()->json($events);
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(string $id)
    // {
    //     $events = EventReport::findOrFail($id);
    //     return view("admin.events.edit", compact("events"));
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'string|max:255',
            'description' => 'string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'integer|in:0,1',
        ]);

        $events = EventReport::findOrFail($id);

        $data = $request->except('image');
        $data['date'] = date('d-m-Y');

        if ($request->hasFile('image')) {
            // delete old image if exists
            if ($events->image && file_exists(public_path($events->image))) {
                unlink(public_path($events->image));
            }

            $image = $request->file('image');
            $filename = time(). '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/events'), $filename);

            $data['image'] = 'assets/events/' . $filename;
        }

        $events->update($data);

        return redirect()->route("events.index")
            ->with("success", "Event updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = EventReport::findOrFail($id);
         // Delete associated image if exists
        if ($event->image && file_exists(public_path($event->image))) {
            unlink(public_path($event->image));
        }

        $event->delete();
        return redirect()->route("events.index")->with("success","Event deleted successfully");
    }
}
