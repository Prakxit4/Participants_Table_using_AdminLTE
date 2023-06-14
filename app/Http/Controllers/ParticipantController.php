<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use Illuminate\Http\Request;
use App\Models\DocumentType;

class ParticipantController extends Controller
{
    public function index()
    {
        $participants = Participant::all();

        return view('first_page', compact('participants'));
    }

    public function create()
    {
        $documentTypes = DocumentType::all();

        return view('create', compact('documentTypes'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'dob' => 'required|date',
            'tenth_offering' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'document_type_id' => 'required',
            'document_file' => 'required|file',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('uploads', 'public');
        }

        // Handle file upload
        if ($request->hasFile('document_file')) {
            $file = $request->file('document_file');
            $filePath = $file->store('uploads', 'public');
        }

        // Create a new participant
        $participant = new Participant();
        $participant->name = $validatedData['name'];
        $participant->dob = $validatedData['dob'];
        $participant->tenth_offering = $validatedData['tenth_offering'];
        $participant->image = $imagePath ?? null; // Save the image path if it exists
        $participant->document_type_id = $validatedData['document_type_id'];
        $participant->document_file = $filePath ?? null; // Save the file path if it exists
        $participant->save();

        return redirect()->route('first_page')->with('success', 'Participant created successfully.');
    }

    public function edit(Participant $participant)
    {
        $documentTypes = DocumentType::all();

        return view('edit', compact('participant', 'documentTypes'));
    }

    public function update(Request $request, Participant $participant)
    {
        // Validate the input
        $validatedData = $request->validate([
            'name' => 'required',
            'dob' => 'required|date',
            'tenth_offering' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'document_type_id' => 'required',
            'document_file' => 'nullable|file',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('uploads', 'public');

            // Delete the old image if it exists
            if ($participant->image) {
                $oldImagePath = public_path('storage/' . $participant->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $participant->image = $imagePath; // Update the image path
        }

        // Handle file upload
        if ($request->hasFile('document_file')) {
            $file = $request->file('document_file');
            $filePath = $file->store('uploads', 'public');

            // Delete the old file if it exists
            if ($participant->document_file) {
                $oldFilePath = public_path('storage/' . $participant->document_file);
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }
            }

            $participant->document_file = $filePath; // Update the file path
        }

        // Update the participant
        $participant->name = $validatedData['name'];
        $participant->dob = $validatedData['dob'];
        $participant->tenth_offering = $validatedData['tenth_offering'];
        $participant->document_type_id = $validatedData['document_type_id'];
        $participant->save();

        return redirect()->route('first_page')->with('success', 'Participant updated successfully.');
    }

    public function destroy(Participant $participant)
    {
        // Delete the image if it exists
        if ($participant->image) {
            $imagePath = public_path('storage/' . $participant->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        // Delete the file if it exists
        if ($participant->document_file) {
            $filePath = public_path('storage/' . $participant->document_file);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }

        $participant->delete();

        return redirect()->route('index')->with('success', 'Participant deleted successfully.');
    }
}
