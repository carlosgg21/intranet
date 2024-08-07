<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\WorkGroupCollection;
use App\Models\Employee;
use App\Models\WorkGroup;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EmployeeWorkGroupsController extends Controller
{
    public function index(
        Request $request,
        Employee $employee
    ): WorkGroupCollection {
        $this->authorize('view', $employee);

        $search = $request->get('search', '');

        $workGroups = $employee
            ->workGroups()
            ->search($search)
            ->latest()
            ->paginate();

        return new WorkGroupCollection($workGroups);
    }

    public function store(
        Request $request,
        Employee $employee,
        WorkGroup $workGroup
    ): Response {
        $this->authorize('update', $employee);

        $employee->workGroups()->syncWithoutDetaching([$workGroup->id]);

        return response()->noContent();
    }

    public function destroy(
        Request $request,
        Employee $employee,
        WorkGroup $workGroup
    ): Response {
        $this->authorize('update', $employee);

        $employee->workGroups()->detach($workGroup);

        return response()->noContent();
    }
}
