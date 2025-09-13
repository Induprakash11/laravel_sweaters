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
        $events_count = EventReport::count();
        if ($request->ajax()) {
            return DataTables::of(EventReport::query())
                ->filterColumn('id', function ($query, $keyword) {
                    $query->where('id', $keyword);
                })
                ->addColumn('image', function ($events) {
                    return '<img src="' . asset($events->image) . '" alt="" height="50" width="50">';
                })
                ->addColumn('action', function ($events) {
                    return '
                    <div class="d-flex gap-2">
                        <a class="btn btn-icon btn-sm btn-warning p-2 shadow edit-btn" 
                           data-bs-toggle="offcanvas" 
                           data-bs-target="#offcanvas_edit" 
                           data-id="' . $events->id . '">
                            <i class="ti ti-pencil"></i>
                        </a>
                            
                        <button type="button" 
                                class="btn btn-sm btn-danger delete-btn p-2" 
                                data-id="' . $events->id . '" 
                                data-url="' . route('events.destroy', $events->id) . '">
                            <i class="ti ti-trash"></i>
                        </button>
                    </div>';
                })

                ->rawColumns(['image', 'action'])
                ->make(true);
        }

        return view("admin.events.index", compact("events_count"));
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

            // move file to public/assets/events
            $image->move(public_path('assets/events'), $filename);

            // save relative path in DB
            $data['image'] = 'assets/events/' . $filename;
        } 

        EventReport::create($data);

        if ($request->ajax()) {
            return response()->json(['success' => 'Event created successfully.']);
        } else {
            return response()->json(['error' => 'Something went wrong.']);
        }
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
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
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

        if ($request->ajax()) {
            return response()->json(['success' => 'Event updated successfully.']);
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
        $events = EventReport::findOrFail($id);
        // Delete associated image if exists
        if ($events->image && file_exists(public_path($events->image))) {
            unlink(public_path($events->image));
        }

        $events->delete();
        return response()->json([
        'status' => 'success',
        'message' => 'Event deleted successfully!'
    ]);
    }
}
