<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\EmployeeCollection;
use App\Models\Employee;
use App\Models\WorkGroup;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class WorkGroupEmployeesController extends Controller
{
    public function index(
        Request $request,
        WorkGroup $workGroup
    ): EmployeeCollection {
        $this->authorize('view', $workGroup);

        $search = $request->get('search', '');

        $employees = $workGroup
            ->employees()
            ->search($search)
            ->latest()
            ->paginate();

        return new EmployeeCollection($employees);
    }

    public function store(
        Request $request,
        WorkGroup $workGroup,
        Employee $employee
    ): Response {
        $this->authorize('update', $workGroup);

        $workGroup->employees()->syncWithoutDetaching([$employee->id]);

        return response()->noContent();
    }

    public function destroy(
        Request $request,
        WorkGroup $workGroup,
        Employee $employee
    ): Response {
        $this->authorize('update', $workGroup);

        $workGroup->employees()->detach($employee);

        return response()->noContent();
    }
}
