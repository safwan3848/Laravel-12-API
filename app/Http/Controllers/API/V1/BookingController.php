<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookingResource;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return BookingResource::collection(Booking::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'date' => 'required|date',
            'status' => 'required'
        ]);

        $booking = Booking::create([
            'title' => $request->title,
            'date' => $request->date,
            'status' => $request->status
        ]);

        return new BookingResource($booking);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $bookings = Booking::find($id);
        return new BookingResource($bookings);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'date' => 'required|date',
            'status' => 'required'
        ]);

        $bookings = Booking::find($id);
        $bookings->update([
            'title' => $request->title,
            'date' => $request->date,
            'status' => $request->status
        ]);

        return new BookingResource($bookings);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Booking::find($id)->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Booking Deleted Successfully'
        ]);
    }
}
