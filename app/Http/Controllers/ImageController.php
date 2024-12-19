<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ImageController extends Controller
{
    public function index()
    {
        $images = Image::all();
        return view('home', compact('images'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        $imagePath = $request->file('image')->store('uploads', 'public');

        Image::create(['file_path' => $imagePath]);

        return redirect()->back()->with('success', 'Image Uploaded Successfully');
    }


    public function delete($id)
    {
        $image = Image::findOrFail($id);

        // Delete the file from storage
        Storage::delete($image->file_path);

        // Delete the database record
        $image->delete();

        return redirect()->back()->with('success', 'Image deleted successfully!');
    }

    
}
