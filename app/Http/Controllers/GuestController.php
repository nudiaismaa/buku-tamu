<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guest;
use Illuminate\Support\Facades\Storage;

class GuestController extends Controller
{
    public function create()
    {
        return view('guest.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'visit_datetime' => 'required|date',
            'name' => 'required|string|max:255',
            'mobile_no' => 'required|string|max:255',
            'institutions' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'necessity' => 'required|string|max:255',
            'photo' => 'required',
            'signature' => 'required'
        ]);

        // Save photo
        $photoData = $request->photo;
        $photoPath = 'photos/' . uniqid() . '.png';
        $this->saveBase64Image($photoData, $photoPath);

        // Save signature
        $signatureData = $request->signature;
        $signaturePath = 'signatures/' . uniqid() . '.png';
        $this->saveBase64Image($signatureData, $signaturePath);

        Guest::create([
            'visit_datetime' => $request->visit_datetime,
            'name' => $request->name,
            'mobile_no' => $request->mobile_no,
            'institutions' => $request->institutions,
            'address' => $request->address,
            'necessity' => $request->necessity,
            'photo' => $photoPath,
            'signature' => $signaturePath,
        ]);

        return redirect()->route('guest.create')->with('success', 'Thank you for signing our guest book!');
    }

    private function saveBase64Image($data, $path)
    {
        $data = str_replace('data:image/png;base64,', '', $data);
        $data = str_replace(' ', '+', $data);
        $imageData = base64_decode($data);
        Storage::disk('public')->put($path, $imageData);
    }
}
