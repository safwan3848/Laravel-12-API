<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookingResource;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Booking::class, 'booking');
    }

    public function index()
    {
        return BookingResource::collection(Booking::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'date' => 'required|date',
            'status' => 'required'
        ]);

        $booking = Booking::create($request->only('title','date','status'));

        return new BookingResource($booking);
    }

    public function show(Booking $booking)
    {
        return new BookingResource($booking);
    }

    public function update(Request $request, Booking $booking)
    {
        $request->validate([
            'title' => 'required',
            'date' => 'required|date',
            'status' => 'required'
        ]);

        $booking->update($request->only('title','date','status'));

        return new BookingResource($booking);
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Booking Deleted Successfully'
        ]);
    }
}

