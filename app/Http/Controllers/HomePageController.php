<?php

namespace App\Http\Controllers;

use App\Models\Tags;
use App\Models\Tamu;
use App\Models\Rooms;
use App\Models\Events;
use App\Models\Region;
use App\Models\Contact;
use App\Models\Gallery;
use App\Models\Reviews;
use App\Models\Setting;
use App\Models\Carousel;
use App\Models\Homestay;
use App\Models\Fasilitas;
use App\Models\Pemesanan;
use App\Models\RoomGallery;
use Illuminate\Http\Request;
use App\Models\ReviewGallery;
use App\Models\GeneralSetting;
use Illuminate\Support\Carbon;
use App\Models\KetersediaanHomestay;
use Illuminate\Support\Facades\Auth;

class HomePageController extends Controller
{

    public function index()
    {
        $regions = Region::all();
        $carouselItems = Carousel::all();
        $generalSetting = GeneralSetting::first();
        $settings = Setting::first();
        $reviews = Reviews::all();
        $homestays = Homestay::all();
        $rooms = Rooms::with('homestay')->get();
        $tags = Tags::all();
        $reviewGalleries = ReviewGallery::all();
        $roomGalleries = RoomGallery::all();
        $homestayIds = $homestays->pluck('id');
        $fasilitas = Fasilitas::whereIn('homestay_id', $homestayIds)->get();
        $galleries = Gallery::all();
        $uniqueCapacities = Rooms::distinct('kapasitas')->pluck('kapasitas');
        // Filter events based on the current date
        $events = Events::where('tanggal_selesai', '>=', Carbon::now())
            ->orderBy('tanggal_mulai', 'asc')
            ->get();

        return view('Front_End.app', compact(
            'carouselItems',
            'generalSetting',
            'settings',
            'reviews',
            'homestays',
            'rooms',
            'fasilitas',
            'tags',
            'galleries',
            'events',
            'regions',
            'reviewGalleries',
            'roomGalleries',
            'uniqueCapacities'
        ));
    }

    public function home()
    {
        $regions = Region::all();
        $carouselItems = Carousel::all();
        $generalSettings = GeneralSetting::first();
        $settings = Setting::first();
        $reviews = Reviews::all();
        $homestays = Homestay::all();
        $rooms = Rooms::with('homestay')->get();
        $tags = Tags::all();
        $reviewGalleries = ReviewGallery::all();
        $roomGalleries = RoomGallery::all();
        $homestayIds = $homestays->pluck('id');
        $fasilitas = Fasilitas::whereIn('homestay_id', $homestayIds)->get();
        $galleries = Gallery::all();
        $uniqueCapacities = Rooms::distinct('kapasitas')->pluck('kapasitas');
        // Filter events based on the current date
        $events = Events::where('tanggal_selesai', '>=', Carbon::now())
            ->orderBy('tanggal_mulai', 'asc')
            ->get();
        return view('Front_End.app', compact(
            'carouselItems',
            'generalSettings',
            'settings',
            'reviews',
            'homestays',
            'rooms',
            'fasilitas',
            'tags',
            'galleries',
            'events',
            'regions',
            'reviewGalleries',
            'roomGalleries',
            'uniqueCapacities'
        ));
    }

    // public function room()
    // {
    //     $regions = Region::all();
    //     $generalSettings = GeneralSetting::first();
    //     $settings = Setting::first();
    //     $reviews = Reviews::all();
    //     $homestays = Homestay::all();
    //     $rooms = Rooms::all();
    //     return view('Front_End.pages.rooms', compact(
    //         'generalSettings',
    //         'settings',
    //         'reviews',
    //         'homestays',
    //         'rooms',
    //         'regions'
    //     ));
    // }

    public function show($kota, Request $request)
    {
        // Find the region with the specified city
        $region = Region::where('kota', $kota)->first();

        // Check if the specified city exists
        if (!$region) {
            abort(404); // Or handle it in a way suitable for your application
        }


        // Set default values for filters
        $minPrice = $request->input('min_price', 100.00);
        $selectedFacilities = $request->input('fasilitas', []); // Change 'facility' to 'fasilitas'
        $sortOrder = $request->input('sort_price');

        // Get the check-in and check-out dates from the request
        $checkInDate = $request->input('tanggal_checkin');
        $checkOutDate = $request->input('tanggal_checkout');

        // Check if the user is authenticated using the 'tamu' guard
        $isAuthenticated = Auth::guard('tamu')->check();

        // Get homestays associated with the specified region and apply filters
        $homestays = Homestay::with('region', 'fasilitas', 'rooms')
            ->whereHas('region', function ($query) use ($kota) {
                $query->where('kota', $kota);
            })
            ->where('harga_per_malam', '>=', $minPrice)
            ->when(count($selectedFacilities) > 0, function ($query) use ($selectedFacilities) {
                // Filter homestays based on selected facilities
                $query->whereHas('fasilitas', function ($subQuery) use ($selectedFacilities) {
                    $subQuery->whereIn('id', $selectedFacilities);
                });
            })
            ->when($sortOrder, function ($query, $sortOrder) {
                // Sort by price
                $query->orderBy('harga_per_malam', $sortOrder);
            })
            ->whereDoesntHave('pemesanan', function ($subQuery) use ($checkInDate, $checkOutDate) {
                $subQuery->whereRaw("NOT (tanggal_checkin <= ? AND tanggal_checkout >= ?)", [$checkInDate, $checkOutDate]);
            })
            ->get();


        $generalSettings = GeneralSetting::first();
        $settings = Setting::first();
        $fasilitas = Fasilitas::all();
        return view('Front_End.pages.bali', compact(
            'generalSettings',
            'settings',
            'region',
            'homestays',
            'fasilitas',
            'minPrice',
            'selectedFacilities',
            'sortOrder',
            'checkInDate',
            'checkOutDate',
            'isAuthenticated',
        ));
    }

    // public function bwi()
    // {
    //     $regions = Region::all();
    //     $generalSettings = GeneralSetting::first();
    //     $settings = Setting::first();
    //     $fasilitas = Fasilitas::all();
    //     $homestays = Homestay::all();
    //     return view('Front_End.pages.banyuwangi', compact(
    //         'generalSettings',
    //         'settings',
    //         'fasilitas',
    //         'homestays',
    //         'regions'
    //     ));
    // }



    // public function dki()
    // {
    //     $regions = Region::all();
    //     $generalSettings = GeneralSetting::first();
    //     $settings = Setting::first();
    //     $fasilitas = Fasilitas::all();
    //     return view('Front_End.pages.dki', compact(
    //         'generalSettings',
    //         'settings',
    //         'fasilitas',
    //         'regions'
    //     ));
    // }

    public function facility()
    {
        $regions = Region::all();
        $generalSettings = GeneralSetting::first();
        $settings = Setting::first();
        $facilities = Fasilitas::all();

        return view('Front_End.pages.facilities', compact(
            'generalSettings',
            'settings',
            'facilities',
            'regions'
        ));
    }

    public function about()
    {
        $regions = Region::all();
        $generalSettings = GeneralSetting::first();
        $settings = Setting::first();
        $totalRooms = Rooms::count();
        $totalTamu = Tamu::count();
        $totalReviews = Reviews::count();
        return view('Front_End.pages.about', compact(
            'generalSettings',
            'settings',
            'totalRooms',
            'totalTamu',
            'totalReviews',
            'regions'
        ));
    }

    public function contact()
    {
        $regions = Region::all();
        $generalSettings = GeneralSetting::first();
        $settings = Setting::first();
        return view('Front_End.pages.contact', compact(
            'generalSettings',
            'settings',
            'regions'
        ));
    }

    public function submitForm(Request $request)
    {
        $regions = Region::all();
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Create an array with the common fields
        $messageData = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'subject' => $request->input('subject'),
            'message' => $request->input('message'),
        ];

        // Check if the user is authenticated
        if (Auth::check()) {
            // If authenticated, associate the tamu_id with the message
            $messageData['tamu_id'] = auth()->user()->id;
        }

        // Store the form data in the database
        Contact::create($messageData);

        // After processing, you can redirect the user
        return redirect()->back()->with('success', 'Message sent successfully!');
    }


    public function profilGuest()
    {
        $regions = Region::all();
        $generalSettings = GeneralSetting::first();
        $settings = Setting::first();
        return view('Front_End.Pages.dashboard-guest.profile-guest', compact('generalSettings', 'settings', 'regions'));
    }

    public function chatGuest()
    {
        $regions = Region::all();
        $generalSettings = GeneralSetting::first();
        $settings = Setting::first();
        $contacts = Contact::with('tamu')->latest()->get();
        return view('Front_End.Pages.dashboard-guest.chat-guest', compact('generalSettings', 'settings', 'contacts', 'regions'));
    }

    public function showGuest()
    {
        $regions = Region::all();
        $generalSettings = GeneralSetting::first();
        $settings = Setting::first();
        $tamu = Auth::guard('tamu')->user();
        return view('Front_End.Pages.dashboard-guest.profile-guest', compact('tamu', 'generalSettings', 'settings', 'regions'));
    }

    public function updateGuest(Request $request)
    {
        // Validation rules...
        $request->validate([
            'nama_tamu' => 'required|string|max:255',
            'file_tamu' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'password_tamu' => 'nullable|string|min:6',
        ]);

        // Get the authenticated user
        $user = Auth::guard('tamu')->user();

        // Update user's name
        $user->nama_tamu = $request->input('nama_tamu');

        // Update user's profile image
        if ($request->hasFile('file_tamu')) {
            $file = $request->file('file_tamu');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('profile_images'), $fileName);
            $user->file_tamu = $fileName;
        }

        // Update user's password if provided
        if ($request->filled('password_tamu')) {
            $user->password_tamu = bcrypt($request->input('password_tamu'));
        }

        // Save changes
        $user->save();

        return redirect()->route('tamu.profile')->with('success', 'Profile updated successfully.');
    }
}