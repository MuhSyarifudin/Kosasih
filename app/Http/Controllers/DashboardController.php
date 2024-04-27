<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GeneralSetting;
use App\Models\Homestay;
use App\Models\Invoice;
use App\Models\LayananTambahan;
use App\Models\Pemesanan;
use App\Models\Rooms;
use App\Models\Tamu;

class DashboardController extends Controller
{

    public function dashboard()
    {
        $totalGuests = Tamu::count();
        $totalRooms = Rooms::count();
        $totalReservations = Rooms::count();
        $totalHomestays = Homestay::count();
        $totalPemesanan = Pemesanan::sum('total_harga');
        $totalLayananTambahan = LayananTambahan::sum('harga');
        $totalPaymentPending = Invoice::where('status_pembayaran', 'pending')->sum('total_harga');
        $pendingPayments = Invoice::where('status_pembayaran', 'pending')->get();

        $recentReservations = Pemesanan::orderBy('created_at', 'desc')->take(3)->get();

        // Fetch upcoming check-ins (you may need to adjust the query based on your schema)
        $upcomingCheckins = Pemesanan::orderBy('tanggal_checkin')->take(3)->get();

       // Retrieve top 5 Homestays with the highest reservation counts
       $topHomestays = Homestay::withCount('pemesanan')
       ->orderByDesc('pemesanan_count')
       ->limit(5)
       ->get();

        $totalRevenue = $totalPemesanan + $totalLayananTambahan;

        $generalSettings = GeneralSetting::first();
        return view('Back_End.pages.dashboard.index', compact(
            'generalSettings',
            'totalGuests',
            'totalRooms',
            'totalReservations',
            'totalHomestays',
            'totalPemesanan',
            'totalRevenue',
            'totalPaymentPending',
            'pendingPayments',
            'recentReservations',
            'upcomingCheckins',
            'topHomestays'
        ));
    }
}