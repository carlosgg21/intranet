<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProcessFileCollection;
use App\Http\Resources\ProcessFileResource;
use App\Models\ProcessFileStatus;
use Illuminate\Http\Request;

class ProcessFileStatusProcessFilesController extends Controller
{
    public function index(
        Request $request,
        ProcessFileStatus $processFileStatus
    ): ProcessFileCollection {
        $this->authorize('view', $processFileStatus);

        $search = $request->get('search', '');

        $processFiles = $processFileStatus
            ->processFiles()
            ->search($search)
            ->latest()
            ->paginate();

        return new ProcessFileCollection($processFiles);
    }

    public function store(
        Request $request,
        ProcessFileStatus $processFileStatus
    ): ProcessFileResource {
        $this->authorize('create', ProcessFile::class);

        $validated = $request->validate([
            'code'          => ['required', 'max:255', 'string'],
            'title'         => ['required', 'max:255', 'string'],
            'description'   => ['nullable', 'max:255', 'string'],
            'created_date'  => ['nullable', 'date'],
            'created_by'    => ['nullable', 'max:255', 'string'],
            'reviewed_by'   => ['required', 'max:255', 'string'],
            'appoved_by'    => ['required', 'max:255', 'string'],
            'approval_date' => ['required', 'date'],
            'file'          => ['file', 'max:1024', 'nullable'],
        ]);

        if ($request->hasFile('file')) {
            $validated['file'] = $request->file('file')->store('public');
        }

        $processFile = $processFileStatus->processFiles()->create($validated);

        return new ProcessFileResource($processFile);
    }
}
