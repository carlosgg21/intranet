<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeStoreRequest;
use App\Http\Requests\EmployeeUpdateRequest;
use App\Http\Resources\EmployeeCollection;
use App\Http\Resources\EmployeeResource;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    public function index(Request $request): EmployeeCollection
    {
        $this->authorize('view-any', Employee::class);

        $search = $request->get('search', '');

        $employees = Employee::search($search)
            ->latest()
            ->paginate();

        return new EmployeeCollection($employees);
    }

    public function store(EmployeeStoreRequest $request): EmployeeResource
    {
        $this->authorize('create', Employee::class);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $employee = Employee::create($validated);

        return new EmployeeResource($employee);
    }

    public function show(Request $request, Employee $employee): EmployeeResource
    {
        $this->authorize('view', $employee);

        return new EmployeeResource($employee);
    }

    public function update(
        EmployeeUpdateRequest $request,
        Employee $employee
    ): EmployeeResource {
        $this->authorize('update', $employee);

        $validated = $request->validated();

        if ($request->hasFile('image')) {
            if ($employee->image) {
                Storage::delete($employee->image);
            }

            $validated['image'] = $request->file('image')->store('public');
        }

        $employee->update($validated);

        return new EmployeeResource($employee);
    }

    public function destroy(Request $request, Employee $employee): Response
    {
        $this->authorize('delete', $employee);

        if ($employee->image) {
            Storage::delete($employee->image);
        }

        $employee->delete();

        return response()->noContent();
    }
}
