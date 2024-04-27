<?php

namespace App\Http\Controllers;

use App\Models\Tamu;
use App\Models\Rooms;
use App\Models\Homestay;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use App\Models\LayananTambahan;
use App\Models\KetersediaanHomestay;
use Illuminate\Support\Facades\Auth;
use App\Models\KetersediaanKamarHomestay;

class BookingController extends Controller
{

    public function show($homestay_id)
    {
        // Fetch the homestay details based on $homestay_id if needed
        $homestay = Homestay::find($homestay_id);
        $rooms = Rooms::all();
        $selectedHomestay = $homestay;

        // Pass $homestay to the view if you need to display details on the booking form
        return view('Front_End.pages.bali', compact('homestay', 'rooms', 'selectedHomestay'));
    }


    public function showBookingModal($homestay_id)
    {
        $homestay = Homestay::find($homestay_id);
        $rooms = Rooms::all();

        return view('Front_End.modals.booking_modal', compact('homestay', 'rooms'));
    }


    public function store(Request $request)
    {
        // Validasi input jika diperlukan
        $request->validate([
            'homestay_id' => 'required|exists:homestay,id',
            'room_id' => 'required|exists:rooms,id',
            'tanggal_checkin' => 'required|date',
            'tanggal_checkout' => 'required|date|after:tanggal_checkin',
            'jumlah_tamu' => 'required|integer|min:1',
            // Add more validation rules as needed
        ]);

        // Retrieve homestay and room data based on the IDs
        $homestay = Homestay::findOrFail($request->homestay_id);
        $room = Rooms::findOrFail($request->room_id);

        // Check room availability
        if (!$this->checkRoomAvailability($room, $request->tanggal_checkin, $request->tanggal_checkout)) {
            return redirect()->back()->with('error', 'Sorry, the selected room is not available for the specified dates.');
        }

        // Calculate total price based on your business logic
        $totalHarga = $this->calculateTotalPrice($homestay, $room, $request->tanggal_checkin, $request->tanggal_checkout);

        // Save the booking data to the database
        $pemesanan = new Pemesanan();
        $pemesanan->homestay_id = $homestay->id;
        $pemesanan->room_id = $room->id;
        $pemesanan->tanggal_checkin = $request->tanggal_checkin;
        $pemesanan->tanggal_checkout = $request->tanggal_checkout;
        $pemesanan->jumlah_tamu = $request->jumlah_tamu;
        $pemesanan->total_harga = $totalHarga;

        // Add more fields as needed

        $tamu = Auth::guard('tamu')->user(); // Retrieve authenticated guest
        $pemesanan->tamu_id = $tamu->id;

        $pemesanan->save();


        // Update availability status in ketersediaan_homestay table
        $this->updateRoomAvailability($room, $request->tanggal_checkin, $request->tanggal_checkout, 'unavailable');


        // Redirect back to the previous page
        return redirect()->back()->with('success', 'Pemesanan has been submitted successfully!');
    }

    private function checkRoomAvailability($room, $checkin, $checkout)
    {
        // Implement your logic to check room availability based on the provided dates
        $available = KetersediaanKamarHomestay::where('room_id', $room->id)
            ->where('tanggal', '>=', $checkin)
            ->where('tanggal', '<', $checkout)
            ->where('tersedia', 'available') // Adjust the column name based on your database structure
            ->exists();

        return $available;
    }

    private function updateRoomAvailability($room, $checkin, $checkout, $status)
    {
        // Update the availability status in the ketersediaan_homestay table
        KetersediaanKamarHomestay::where('room_id', $room->id)
            ->where('tanggal', '>=', $checkin)
            ->where('tanggal', '<', $checkout)
            ->update(['tersedia' => $status]);
    }




    private function calculateTotalPrice($homestay, $room, $checkinDate, $checkoutDate)
    {
        // Convert the check-in and check-out dates to DateTime objects
        $checkin = new \DateTime($checkinDate);
        $checkout = new \DateTime($checkoutDate);

        // Calculate the number of nights
        $interval = $checkin->diff($checkout);
        $numberOfNights = $interval->days;

        // Calculate the total price based on the number of nights and room price
        $totalPrice = $numberOfNights * $room->harga_per_malam;

        // You can add additional logic for any discounts, taxes, or other fees

        return $totalPrice;
    }
}
