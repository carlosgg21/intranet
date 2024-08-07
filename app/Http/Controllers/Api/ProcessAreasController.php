<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AreaCollection;
use App\Models\Area;
use App\Models\Process;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProcessAreasController extends Controller
{
    public function index(Request $request, Process $process): AreaCollection
    {
        $this->authorize('view', $process);

        $search = $request->get('search', '');

        $areas = $process
            ->areas()
            ->search($search)
            ->latest()
            ->paginate();

        return new AreaCollection($areas);
    }

    public function store(
        Request $request,
        Process $process,
        Area $area
    ): Response {
        $this->authorize('update', $process);

        $process->areas()->syncWithoutDetaching([$area->id]);

        return response()->noContent();
    }

    public function destroy(
        Request $request,
        Process $process,
        Area $area
    ): Response {
        $this->authorize('update', $process);

        $process->areas()->detach($area);

        return response()->noContent();
    }
}
