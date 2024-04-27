<?php

namespace App\Http\Controllers;

use App\Models\Tamu;
use App\Models\Homestay;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;
use App\Models\Rooms;

class ReservationsController extends Controller
{
    public function index(Request $request)
    {
        $generalSettings = GeneralSetting::first();
        $search = $request->input('search');
        $reservations = Pemesanan::with(['room','tamu'])
            ->whereHas('homestay', function ($query) use ($search) {
                $query->where('nama', 'like', '%' . $search . '%');
            })
            ->orWhereHas('tamu', function ($query) use ($search) {
                $query->where('nama_tamu', 'like', '%' . $search . '%');
            })
            ->orWhere('tanggal_checkin', 'like', '%' . $search . '%')
            ->orWhere('tanggal_checkout', 'like', '%' . $search . '%')
            ->orWhere('jumlah_tamu', 'like', '%' . $search . '%')
            ->orWhere('total_harga', 'like', '%' . $search . '%')
            ->paginate(5);
        return view('Back_End.pages.reservation.index', compact('reservations', 'generalSettings'));
    }

    public function create()
    {
        $generalSettings = GeneralSetting::first();
        $homestays = Homestay::all(); // Mengambil semua data Homestay
        $rooms = Rooms::with('homestay')->get();
        $guests = Tamu::all(); // Mengambil semua data Guest

        return view('Back_End.pages.reservation.add', compact('homestays', 'guests','rooms','generalSettings'));
    }

    public function store(Request $request)
    {
        // Validasi data input
        $request->validate([
            'homestay_id' => 'required|exists:homestay,id',
            'room_id' => 'required',
            'guest_id' => 'required|exists:tamu,id',
            'tanggal_checkin' => 'required|date',
            'tanggal_checkout' => 'required|date|after:tanggal_checkin',
            'jumlah_tamu' => 'required|integer',
        ]);

        // Mengambil data Homestay berdasarkan homestay_id yang dipilih
        $homestay = Homestay::find($request->input('homestay_id'));

        if (!$homestay) {
            return redirect()->route('reservation.index')->with('error', 'Homestay not found.');
        }

        // Hitung total_harga berdasarkan harga per malam dari homestay yang sesuai
        $hargaPerMalam = $homestay->harga_per_malam;
        $tanggalCheckin = $request->input('tanggal_checkin');
        $tanggalCheckout = $request->input('tanggal_checkout');
        $jumlahMalam = max(ceil((strtotime($tanggalCheckout) - strtotime($tanggalCheckin)) / 86400), 1); // Hitung selisih hari

        // Hitung total harga
        $totalHarga = $hargaPerMalam * $jumlahMalam;

         // Tambahan biaya untuk layanan tambahan
    if ($request->has('additional_services')) {
        foreach ($request->input('additional_services') as $servicePrice) {
            // Assuming the array contains the price of each additional service
            $totalHarga += $servicePrice;
        }
    }

        // Simpan data reservasi baru ke dalam database
        Pemesanan::create([
            'homestay_id' => $request->input('homestay_id'),
            'room_id' => $request->room_id,
            'tamu_id' => $request->input('guest_id'),
            'tanggal_checkin' => $request->input('tanggal_checkin'),
            'tanggal_checkout' => $request->input('tanggal_checkout'),
            'jumlah_tamu' => $request->input('jumlah_tamu'),
            'total_harga' => $totalHarga, // Simpan total_harga ke dalam database
        ]);



        return redirect()->route('reservation.index')->with('success', 'Reservation added successfully.');
    }

    public function show($id)
    {
        $generalSettings = GeneralSetting::first();
        $reservation = Pemesanan::find($id);


        if (!$reservation) {
            return redirect()->route('reservation.index')->with('error', 'Reservation not found.');
        }

        return view('Back_End.pages.reservation.show', compact('reservation','generalSettings'));
    }

    public function edit($id)
    {
        $generalSettings = GeneralSetting::first();
        $reservation = Pemesanan::find($id);
        $homestays = Homestay::all(); // Pastikan variabel $homestays sudah di-passing
        $guests = Tamu::all(); // Pastikan variabel $guests sudah di-passing

        if (!$reservation) {
            return redirect()->route('reservation.index')->with('error', 'Reservation not found.');
        }

        return view('Back_End.pages.reservation.edit', compact('reservation', 'homestays', 'guests','generalSettings')); // Pastikan variabel $homestays di-passing
    }

    public function update(Request $request, $id)
    {
        // Validasi data input
        $request->validate([
            'homestay_id' => 'required|exists:homestay,id',
            'guest_id' => 'required|exists:tamu,id',
            'tanggal_checkin' => 'required|date',
            'tanggal_checkout' => 'required|date|after:tanggal_checkin',
            'jumlah_tamu' => 'required|integer',
        ]);

        // Cari data reservasi berdasarkan ID
        $reservation = Pemesanan::find($id);

        // Jika reservasi tidak ditemukan, kembalikan ke halaman daftar reservasi dengan pesan error
        if (!$reservation) {
            return redirect()->route('reservation.index')->with('error', 'Reservation not found.');
        }

        // Mengambil data Homestay berdasarkan homestay_id yang dipilih
        $homestay = Homestay::find($request->input('homestay_id'));

        if (!$homestay) {
            return redirect()->route('reservation.index')->with('error', 'Homestay not found.');
        }

        // Update data reservasi
        $reservation->homestay_id = $request->input('homestay_id');
        $reservation->tamu_id = $request->input('guest_id');
        $reservation->tanggal_checkin = $request->input('tanggal_checkin');
        $reservation->tanggal_checkout = $request->input('tanggal_checkout');
        $reservation->jumlah_tamu = $request->input('jumlah_tamu');

        // Simpan perubahan ke dalam database
        $reservation->save();

        // Redirect ke halaman daftar reservasi dengan pesan sukses
        return redirect()->route('reservation.index')->with('success', 'Reservation updated successfully.');
    }


    public function destroy($id)
    {
        $reservation = Pemesanan::find($id);

        if (!$reservation) {
            return redirect()->route('reservation.index')->with('error', 'Reservation not found.');
        }

        $reservation->delete();

        return redirect()->route('reservation.index')->with('success', 'Reservation deleted successfully.');
    }
}
