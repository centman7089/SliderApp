<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Media;
use App\Models\Setting;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    /**
     * Show upload form
     */
    public function create()
    {
        return view('upload');
    }

    /**
     * Handle file upload and store in database
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'file' => 'required|mimes:jpg,jpeg,png,mp4,mov,avi|max:20480', // 20MB limit
        ]);

        $file = $request->file('file');
        $fileName = time() . '_' . $file->getClientOriginalName(); // Unique file name
        $filePath = $file->storeAs('media', $fileName, 'public'); // Store in storage/app/public/media

        // Insert into database
        Media::create([
            'title' => $request->title,
            'file_path' => 'storage/' . $filePath,
            'type' => in_array($file->getClientOriginalExtension(), ['mp4', 'mov', 'avi']) ? 'video' : 'image',
        ]);

        return redirect('/upload')->with('success', 'Media uploaded successfully!');
    }

    /**
     * Display all media
     */
    public function index()
    {
        $media = Media::all();
        $settings = Setting::first();
        return view('slider', compact('media','settings'));
    }
}
