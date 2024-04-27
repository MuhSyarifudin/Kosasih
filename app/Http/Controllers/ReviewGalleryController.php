<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GeneralSetting;
use App\Models\ReviewGallery;

class ReviewGalleryController extends Controller
{
    public function index()
    {
        $generalSettings = GeneralSetting::first();
        $reviewGalleries = ReviewGallery::paginate(10);
        return view('Back_End.pages.reviewGallery.index', compact('reviewGalleries', 'generalSettings'));
    }

    public function edit($id)
    {
        $generalSettings = GeneralSetting::first();
        // Mengambil data review gallery berdasarkan ID
        $rg = ReviewGallery::find($id);

        // Mengecek apakah review gallery dengan ID tersebut ada
        if (!$rg) {
            return redirect()->route('reviewGallery.index')->with('error', 'Review Gallery not found');
        }

        return view('Back_End.pages.reviewGallery.edit', compact('rg', 'generalSettings'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'image_path' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        // Mengambil data review gallery berdasarkan ID
        $rg = ReviewGallery::find($id);

        // Mengecek apakah review gallery dengan ID tersebut ada
        if (!$rg) {
            return redirect()->route('reviewGallery.index')->with('error', 'Review Gallery not found');
        }

        // Handle image update
        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('review_galleries', 'public');
            $rg->image_path = $imagePath;
        }

        // Save changes
        $rg->save();

        return redirect()->route('reviewGallery.index')->with('success', 'Review Gallery updated successfully');
    }
}