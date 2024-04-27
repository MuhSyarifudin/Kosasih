<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;

class CarouselController extends Controller
{
    public function index()
    {
        $generalSettings = GeneralSetting::first();
        $carouselItems = Carousel::paginate(10);
        return view('Back_End.pages.carousel.index', compact('carouselItems', 'generalSettings'));
    }

    public function create()
    {
         $generalSettings = GeneralSetting::first();
        return view('Back_End.pages.carousel.add', compact('generalSettings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_carousel' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif', // Pastikan hanya gambar yang diizinkan
            'deskripsi' => 'required',
        ]);

        $gambar = $request->file('gambar');
        $gambarPath = $gambar->store('carousel_images', 'public'); // Simpan gambar ke direktori public/storage/carousel_images

        Carousel::create([
            'nama_carousel' => $request->input('nama_carousel'),
            'gambar' => $gambarPath,
            'deskripsi' => $request->input('deskripsi'),
        ]);

        return redirect()->route('carousel.index')->with('success', 'Carousel item added successfully.');
    }

    public function show($id)
    {
         $generalSettings = GeneralSetting::first();
        $carouselItem = Carousel::find($id);

        if (!$carouselItem) {
            return redirect()->route('carousel.index')->with('error', 'Carousel item not found.');
        }

        return view('Back_End.pages.carousel.show', compact('carouselItem', 'generalSettings'));
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_carousel' => 'required',
            'gambar' => 'required',
            'deskripsi' => 'required',
        ]);

        $carouselItem = Carousel::find($id);

        if (!$carouselItem) {
            return redirect()->route('carousel.index')->with('error', 'Carousel item not found.');
        }

        $carouselItem->update([
            'nama_carousel' => $request->input('nama_carousel'),
            'gambar' => $request->input('gambar'),
            'deskripsi' => $request->input('deskripsi'),
        ]);

        return redirect()->route('carousel.index')->with('success', 'Carousel item updated successfully.');
    }

    public function destroy($id)
    {
        $carouselItem = Carousel::find($id);

        if (!$carouselItem) {
            return redirect()->route('carousel.index')->with('error', 'Carousel item not found.');
        }

        $carouselItem->delete();

        return redirect()->route('carousel.index')->with('success', 'Carousel item deleted successfully.');
    }
}