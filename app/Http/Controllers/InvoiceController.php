<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\Region;
use App\Models\Invoice;
use App\Models\Setting;
use App\Models\Homestay;
use Barryvdh\DomPDF\PDF;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    public function invoiceGuest()
    {
        $pemesanan = Pemesanan::where('tamu_id', Auth::guard('tamu')->id())
            ->whereHas('invoice', function ($query) {
                $query->where('status_pembayaran', 'pending');
            })
            ->first();
        $Paidpemesanan = Pemesanan::where('tamu_id', Auth::guard('tamu')->id())
            ->whereHas('invoice', function ($query) {
                $query->where('status_pembayaran', 'paid');
            })
            ->first();


        if ($pemesanan) {
            // Load the associated guest information
            $pemesanan->load('tamu', 'homestay.region');

            if ($pemesanan->invoice->status_pembayaran === 'paid') {
                // Download the invoice file automatically
                $file = storage_path('app/invoices/' . $pemesanan->invoice->file_path);
                return response()->download($file, 'invoice.pdf');
            }
        } else {
            // Handle the case when $pemesanan is null (e.g., redirect or show an error)
            // You can customize this part based on your application's requirements
            return back();
        }
        $regions = Region::all();
        $generalSettings = GeneralSetting::first();
        $settings = Setting::first();
        return view('Front_End.Pages.dashboard-guest.invoice-guest', compact(
            'generalSettings',
            'settings',
            'regions',
            'pemesanan',
            'Paidpemesanan'

        ));
    }

    public function confirmPayment(Request $request, $id)
    {
        // Retrieve the Pemesanan model instance
        $pemesanan = Pemesanan::findOrFail($id);

        // Check if the checkbox is checked
        $isPaymentConfirmed = $request->has('payment_confirmed');

        // Update the payment status based on the checkbox state
        $pemesanan->invoice->status_pembayaran = $isPaymentConfirmed ? 'paid' : 'pending';

        // Save the changes
        $pemesanan->invoice->save();

        // Flash a success message to the session
        $message = $isPaymentConfirmed ? 'Payment successful!' : 'Payment status updated.';
        session()->flash('success', $message);


        // Redirect back to the 'tamu.invoice' named route
        return redirect('/');
    }


    public function generateInvoice($id)
    {
        // Retrieve the invoice data from the database
        $pemesanan = Pemesanan::findOrFail($id);
        $generalSettings = GeneralSetting::first();

        // Create a new Dompdf instance
        $dompdf = new Dompdf();

        // Load the HTML content of the invoice view
        $html = view('Front_End.Pages.dashboard-guest.invoice', compact('pemesanan', 'generalSettings'))->render();

        // Load options for Dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);

        $dompdf->setOptions($options);

        // Load the HTML content to Dompdf
        $dompdf->loadHtml($html);

        // Set paper size (optional)
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Generate a unique filename for the PDF
        $filename = 'invoice_' . $pemesanan->id . '.pdf';

        // Output the generated PDF to the browser (force download)
        $dompdf->stream($filename);
    }
}
