<?php

namespace App\Http\Controllers;

use App\Models\Region;
use App\Models\Reviews;
use App\Models\Setting;
use App\Models\Homestay;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;
use App\Models\ReviewGallery;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class ReviewController extends Controller
{
    public function reviewGuest()
    {
        $regions = Region::all();
        $generalSettings = GeneralSetting::first();
        $settings = Setting::first();
        $tamuId = Auth::guard('tamu')->user()->id;

        $reviews = Reviews::with('homestay', 'tamu', 'gallery')->latest()->take(2)
        ->get();

        $homestays = Homestay::all();
        return view('Front_End.Pages.dashboard-guest.review-guest', compact('generalSettings', 'settings', 'regions', 'reviews', 'homestays'));
    }

    public function submitReview(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'homestay_id' => 'required|exists:homestay,id',
            'ulasan' => 'required|string',
            'rating' => 'required|numeric|min:1|max:5',
            'gallery_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Create a new review instance
        $review = new Reviews([
            'homestay_id' => $validatedData['homestay_id'],
            'ulasan' => $validatedData['ulasan'],
            'rating' => $validatedData['rating'],
        ]);

        // Save the review
        Auth::guard('tamu')->user()->reviews()->save($review);

        // Upload and associate the gallery image
        if ($request->hasFile('gallery_image')) {
            $imagePath = $request->file('gallery_image')->store('gallery_images', 'public');
            $gallery = new ReviewGallery(['image_path' => $imagePath]);
            $review->gallery()->save($gallery);
        }

        // Redirect atau melakukan tindakan lainnya setelah berhasil menyimpan review
        return redirect('/')->with('success', 'Review submitted successfully');
    }
}