<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\KetersediaanKamarHomestay;

class AvailabilityController extends Controller
{
    public function checkAvailability(Request $request)
    {
         // Validate the form data
         $request->validate([
            'tanggal' => 'required|date',
            'homestay' => 'required|exists:homestay,id',
            'roomCount' => 'required|exists:rooms,id',
            'adultCount' => 'required|numeric|min:1',
        ]);

        // Process the form data and perform the homestay availability check
        $checkInDate = $request->input('tanggal');
        $homestayId = $request->input('homestay');
        $roomId = $request->input('roomCount');
        $adultCount = $request->input('adultCount');

        // Check room availability based on your business logic
        $isRoomAvailable = KetersediaanKamarHomestay::where([
            'homestay_id' => $homestayId,
            'room_id' => $roomId,
            'tanggal' => $checkInDate,
        ])->whereHas('rooms', function ($query) use ($adultCount) {
            $query->where('kapasitas', '>=', $adultCount);
        })->exists();

        // Handle the availability status as needed
        if ($isRoomAvailable) {
            // Room is available, you can proceed with booking or any other action
            return back()->with('success', 'Room is available. You can proceed with booking.');
        } else {
            // Room is not available, display an error message
            return back()->with('error', 'Room is not available for the specified date and requirements.');
        }
    }
}