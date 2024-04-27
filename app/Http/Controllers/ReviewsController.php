<?php

namespace App\Http\Controllers;

use App\Models\Tamu;
use App\Models\Reviews;
use App\Models\Homestay;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;

class ReviewsController extends Controller
{
    public function index(Request $request)
    {
        $generalSettings = GeneralSetting::first();
        $search = $request->input('search');
        $reviews = Reviews::with(['homestay', 'tamu'])
            ->whereHas('homestay', function ($query) use ($search) {
                $query->where('nama', 'like', '%' . $search . '%');
            })
            ->orWhereHas('tamu', function ($query) use ($search) {
                $query->where('nama_tamu', 'like', '%' . $search . '%');
            })
            ->orWhere('rating', 'like', '%' . $search . '%')
            ->orWhere('ulasan', 'like', '%' . $search . '%')
            ->paginate(3);;
        return view('Back_End.pages.review.index', compact('reviews', 'generalSettings'));
    }

    public function create()
    {
        $generalSettings = GeneralSetting::first();
        $homestays = Homestay::all();
        $tamus = Tamu::all();

        return view('Back_End.pages.review.add', compact('homestays', 'tamus','generalSettings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'homestay_id' => 'required',
            'tamu_id' => 'required',
            'rating' => 'required|integer|min:1|max:5',
            'ulasan' => 'required',

        ]);

        Reviews::create([
            'homestay_id' => $request->homestay_id,
            'tamu_id' => $request->tamu_id,
            'rating' => $request->rating,
            'ulasan' => $request->ulasan,
        ]);


        return redirect()->route('review.index')
            ->with('success', 'Review added successfully.');
    }

    public function show($id)
    {
        $generalSettings = GeneralSetting::first();
        // Tampilkan detail ulasan
        $review = Reviews::find($id);

        if (!$review) {
            return redirect()->route('review.index')
                ->with('error', 'Review not found.');
        }

        return view('Back_End.pages.review.show', compact('review','generalSettings'));
    }

    public function edit($id)
    {
        $generalSettings = GeneralSetting::first();
        $review = Reviews::find($id);
        $homestays = Homestay::all();
        $tamus = Tamu::all();

        return view('Back_End.pages.review.edit', compact('review', 'homestays', 'tamus','generalSettings'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data input
        $request->validate([
            'homestay_id' => 'required|exists:homestay,id',
            'tamu_id' => 'required|exists:tamu,id',
            'rating' => 'required|integer|min:1|max:5',
            'ulasan' => 'required|string',
        ]);

        // Cari ulasan berdasarkan ID
        $review = Reviews::find($id);

        if (!$review) {
            return redirect()->route('review.index')
                ->with('error', 'Review not found.');
        }

        // Update ulasan
        $review->update($request->all());

        return redirect()->route('review.index')
            ->with('success', 'Review updated successfully.');
    }

    public function destroy($id)
    {
        // Hapus ulasan berdasarkan ID
        $review = Reviews::find($id);

        if (!$review) {
            return redirect()->route('review.index')
                ->with('error', 'Review not found.');
        }

        $review->delete();

        return redirect()->route('review.index')
            ->with('success', 'Review deleted successfully.');
    }
}
