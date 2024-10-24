<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guest;
use App\Exports\GuestsExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class BukutamuController extends Controller
{
    public function index()
    {
        $guests = Guest::all();
        return view('bukutamu.index', compact('guests'));
    }

    public function edit($id)
    {
        $guest = Guest::findOrFail($id);
        return view('bukutamu.edit', compact('guest'));
    }

    public function update(Request $request, $id)
    {
        Log::info('Update method called'); // Logging for debugging

        $request->validate([
            'visit_datetime' => 'required|date',
            'name' => 'required|string|max:255',
            'mobile_no' => 'required|string|max:255',
            'institutions' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'necessity' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'signature_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $guest = Guest::findOrFail($id);

        // Handle photo upload
        if ($request->hasFile('photo')) {
            Log::info('Photo uploaded'); // Logging for debugging
            $photoPath = $request->file('photo')->store('photos', 'public');
            $guest->photo = $photoPath;
        }

        // Handle signature image upload
        if ($request->hasFile('signature_image')) {
            Log::info('Signature image uploaded'); // Logging for debugging
            $signatureImagePath = $request->file('signature_image')->store('signatures', 'public');
            $guest->signature = $signatureImagePath;
        }

        // Update other fields
        $guest->update([
            'visit_datetime' => $request->visit_datetime,
            'name' => $request->name,
            'mobile_no' => $request->mobile_no,
            'institutions' => $request->institutions,
            'address' => $request->address,
            'necessity' => $request->necessity,
            'signature' => $guest->signature, // Retain the existing signature if not updated
        ]);

        Log::info('Guest updated successfully'); // Logging for debugging

        return redirect()->route('bukutamu.index')->with('success', 'Guest updated successfully');
    }

    public function destroy($id)
    {
        $guest = Guest::findOrFail($id);
        $guest->delete();
        return redirect()->route('bukutamu.index')->with('success', 'Guest deleted successfully');
    }

    public function export()
    {
        return Excel::download(new GuestsExport, 'DataTamu.xlsx');
    }
}
