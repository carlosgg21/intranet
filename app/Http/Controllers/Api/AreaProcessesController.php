<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProcessCollection;
use App\Models\Area;
use App\Models\Process;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AreaProcessesController extends Controller
{
    public function index(Request $request, Area $area): ProcessCollection
    {
        $this->authorize('view', $area);

        $search = $request->get('search', '');

        $processes = $area
            ->processes()
            ->search($search)
            ->latest()
            ->paginate();

        return new ProcessCollection($processes);
    }

    public function store(
        Request $request,
        Area $area,
        Process $process
    ): Response {
        $this->authorize('update', $area);

        $area->processes()->syncWithoutDetaching([$process->id]);

        return response()->noContent();
    }

    public function destroy(
        Request $request,
        Area $area,
        Process $process
    ): Response {
        $this->authorize('update', $area);

        $area->processes()->detach($process);

        return response()->noContent();
    }
}
