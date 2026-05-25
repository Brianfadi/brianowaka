<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FileController extends Controller
{
    public function index(Request $request)
    {
        $query = File::query();

        // Filter by category
        if ($request->filled('category')) {
            $query->byCategory($request->category);
        }

        // Filter by type
        if ($request->filled('type')) {
            $query->byType($request->type);
        }

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        $files = $query->ordered()->paginate(20);

        // Get statistics
        $stats = [
            'total' => File::count(),
            'public' => File::public()->count(),
            'downloads' => File::sum('download_count'),
            'storage' => File::sum('file_size'),
        ];

        // Get categories
        $categories = File::select('category')
            ->distinct()
            ->whereNotNull('category')
            ->pluck('category');

        return view('admin.files.index', compact('files', 'stats', 'categories'));
    }

    public function create()
    {
        return view('admin.files.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file' => 'required|file|max:51200', // 50MB max
            'category' => 'nullable|string|max:100',
            'tags' => 'nullable|string',
            'is_public' => 'boolean',
            'is_downloadable' => 'boolean',
            'is_active' => 'boolean',
            'order' => 'nullable|integer',
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            
            // Store file
            $path = $file->store('files', 'public');
            
            // Process tags
            $tags = null;
            if ($request->filled('tags')) {
                $tags = array_map('trim', explode(',', $request->tags));
            }

            // Determine file type
            $mimeType = $file->getMimeType();
            $fileType = $this->determineFileType($mimeType);

            File::create([
                'title' => $validated['title'],
                'description' => $validated['description'] ?? null,
                'file_path' => $path,
                'file_type' => $fileType,
                'mime_type' => $mimeType,
                'file_size' => $file->getSize(),
                'category' => $validated['category'] ?? null,
                'tags' => $tags,
                'is_public' => $request->has('is_public'),
                'is_downloadable' => $request->has('is_downloadable'),
                'is_active' => $request->has('is_active'),
                'order' => $validated['order'] ?? 0,
            ]);
        }

        return redirect()->route('admin.files.index')
            ->with('success', 'File uploaded successfully.');
    }

    public function show(File $file)
    {
        return view('admin.files.show', compact('file'));
    }

    public function edit(File $file)
    {
        return view('admin.files.edit', compact('file'));
    }

    public function update(Request $request, File $file)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file' => 'nullable|file|max:51200', // 50MB max
            'category' => 'nullable|string|max:100',
            'tags' => 'nullable|string',
            'is_public' => 'boolean',
            'is_downloadable' => 'boolean',
            'is_active' => 'boolean',
            'order' => 'nullable|integer',
        ]);

        // Handle file replacement
        if ($request->hasFile('file')) {
            // Delete old file
            if ($file->file_path) {
                Storage::disk('public')->delete($file->file_path);
            }

            $uploadedFile = $request->file('file');
            $path = $uploadedFile->store('files', 'public');
            
            $file->file_path = $path;
            $file->mime_type = $uploadedFile->getMimeType();
            $file->file_type = $this->determineFileType($uploadedFile->getMimeType());
            $file->file_size = $uploadedFile->getSize();
        }

        // Process tags
        $tags = null;
        if ($request->filled('tags')) {
            $tags = array_map('trim', explode(',', $request->tags));
        }

        $file->update([
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'category' => $validated['category'] ?? null,
            'tags' => $tags,
            'is_public' => $request->has('is_public'),
            'is_downloadable' => $request->has('is_downloadable'),
            'is_active' => $request->has('is_active'),
            'order' => $validated['order'] ?? 0,
        ]);

        return redirect()->route('admin.files.index')
            ->with('success', 'File updated successfully.');
    }

    public function destroy(File $file)
    {
        if ($file->file_path) {
            Storage::disk('public')->delete($file->file_path);
        }

        $file->delete();

        return redirect()->route('admin.files.index')
            ->with('success', 'File deleted successfully.');
    }

    private function determineFileType($mimeType)
    {
        if (Str::startsWith($mimeType, 'image/')) {
            return 'image';
        } elseif (Str::startsWith($mimeType, 'video/')) {
            return 'video';
        } elseif (Str::startsWith($mimeType, 'audio/')) {
            return 'audio';
        } elseif (in_array($mimeType, [
            'application/pdf',
            'application/msword',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'application/vnd.ms-excel',
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'application/vnd.ms-powerpoint',
            'application/vnd.openxmlformats-officedocument.presentationml.presentation',
        ])) {
            return 'document';
        } else {
            return 'other';
        }
    }
}
