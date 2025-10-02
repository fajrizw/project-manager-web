<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $files = File::with('task','uploader')->get();
        return view('files.index', compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('files.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'file' => 'required|file|mimes:jpg,jpeg,png,pdf,docx,xlsx,zip|max:2048', // max 2MB
            'task_id' => 'required|exists:tasks,id',
        ]);

        $path = $request->file('file')->store('files', 'public');

        File::create([
            'file_type' => $request->file('file')->getClientMimeType(),
            'file_path' => $path,
            'task_id' => $data['task_id'],
            'uploaded_by' => Auth::id() ?? 1,

        ]);


        return redirect()->route('files.index')->with('success', 'File uploaded successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $file = File::with('task','uploader')->findOrFail($id);
        return view('files.show', compact('file'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $file = File::with('task','uploader')->findOrFail($id);
        return view('files.edit', compact('file'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $file = File::findOrFail($id);

        $data = $request->validate([
            'task_id' => 'required|exists:tasks,id',
            'file' => 'nullable|file|mimes:jpg,jpeg,png,pdf,docx,xlsx,zip|max:2048', // max 2MB
        ]);

        if ($request->hasFile('file')) {
            // Delete old file
            if ($file->file_path && Storage::disk('public')->exists($file->file_path)) {
                Storage::disk('public')->delete($file->file_path);
            }

            // Store new file
            $path = $request->file('file')->store('files', 'public');
            $file->file_path = $path;
            $file->file_type = $request->file('file')->getClientMimeType();
        }

        $file->task_id = $data['task_id'];
        $file->save();

        return redirect()->route('files.index')->with('success', 'File updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $file = File::findOrFail($id);

        // Delete the file from storage
        if ($file->file_path && Storage::disk('public')->exists($file->file_path)) {
            Storage::disk('public')->delete($file->file_path);
        }

        $file->delete();

        return redirect()->route('files.index')->with('success', 'File deleted successfully.');
    }
}
