<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;
use App\Models\LayananTambahan;
use App\Models\Tamu;

class PaymentsController extends Controller
{
    public function index(Request $request)
    {
        $generalSettings = GeneralSetting::first();
        $search = $request->input('search');
        $payments = Invoice::where('id', 'like', '%' . $search . '%')
            ->orWhere('pemesanan_id', 'like', '%' . $search . '%')
            ->orWhere('tanggal', 'like', '%' . $search . '%')
            ->orWhere('total_harga', 'like', '%' . $search . '%')
            ->orWhere('status_pembayaran', 'like', '%' . $search . '%')
            ->paginate(3); // Ganti Payment sesuai dengan model yang sesuai
        return view('Back_End.pages.payment.index', compact('payments', 'generalSettings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $generalSettings = GeneralSetting::first();
        $pemesanans = Pemesanan::all();
        $guests = Tamu::all();
        $services = LayananTambahan::all();
        return view('Back_End.pages.payment.add', compact('pemesanans','generalSettings','guests','services'));
    }


    public function store(Request $request)
    {
        // Validasi data input
        $request->validate([
            'pemesanan_id' => 'required|exists:pemesanan,id',
            'tanggal' => 'required|date',
            'tamu_id' => 'required',
            'total_harga' => 'required|numeric',
            'status_pembayaran' => 'required|string',
            'layanan_tambahan_id' => 'required',
        ]);


        // Selanjutnya, Anda bisa menggunakan $pemesanan_id dalam operasi penyimpanan
        Invoice::create([
            'pemesanan_id' => $request->input('pemesanan_id'),
            'tanggal' => $request->input('tanggal'),
            'tamu_id' => $request->input('tamu_id'),
            'total_harga' => $request->input('total_harga'),
            'status_pembayaran' => $request->input('status_pembayaran'),
            'layanan_tambahan_id' => $request->input('layanan_tambahan_id'),
        ]);



        return redirect()->route('payment.index')->with('success', 'Payment record added successfully.');
    }

    public function show($id)
    {
        $generalSettings = GeneralSetting::first();
        // Mengambil data pembayaran berdasarkan ID
        $payment = Invoice::find($id);

        // Memeriksa apakah data pembayaran ditemukan
        if (!$payment) {
            return abort(404); // Atau tindakan lain sesuai kebijakan Anda jika data tidak ditemukan
        }
        return view('Back_End.pages.payment.show', compact('payment','generalSettings'));
    }

    public function edit($id)
    {
        $generalSettings = GeneralSetting::first();
        $payment = Invoice::find($id); // Gantilah 'Payment' dengan model yang sesuai
        $pemesanans = Pemesanan::all();
        $guests = Tamu::all();
        $services = LayananTambahan::all();

        // Pastikan pembayaran ditemukan sebelum melanjutkan
        if (!$payment) {
            abort(404); // Tampilkan halaman 404 jika pembayaran tidak ditemukan
        }
        return view('Back_End.pages.payment.edit', compact('payment', 'pemesanans','generalSettings','services','guests'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data input
        $request->validate([
            'pemesanan_id' => 'required|exists:pemesanan,id',
            'tanggal' => 'required|date',
            'total_harga' => 'required|numeric',
            'status_pembayaran' => 'required|in:Pending,Paid',
            'tamu_id' => 'required|exists:tamu,id',
            'layanan_tambahan_id' => 'required|exists:layanan_tambahan,id',

        ]);

        $invoice = Invoice::findOrFail($id);
        $invoice->update($request->all());

        return redirect()->route('payment.index')->with('success', 'Payment record updated successfully.');
    }

    public function destroy($id)
    {
        $invoice = Invoice::findOrFail($id);
        $invoice->delete();
        return redirect()->route('payment.index')->with('success', 'Payment record deleted successfully.');
    }
}