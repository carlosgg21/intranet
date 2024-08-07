<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\EmployeeCollection;
use App\Http\Resources\EmployeeResource;
use App\Models\Area;
use Illuminate\Http\Request;

class AreaEmployeesController extends Controller
{
    public function index(Request $request, Area $area): EmployeeCollection
    {
        $this->authorize('view', $area);

        $search = $request->get('search', '');

        $employees = $area
            ->employees()
            ->search($search)
            ->latest()
            ->paginate();

        return new EmployeeCollection($employees);
    }

    public function store(Request $request, Area $area): EmployeeResource
    {
        $this->authorize('create', Employee::class);

        $validated = $request->validate([
            'identification' => [
                'required',
                'unique:employees,identification',
                'max:255',
                'string',
            ],
            'name'           => ['required', 'max:255', 'string'],
            'last_name'      => ['required', 'max:255', 'string'],
            'charge_id'      => ['nullable', 'exists:charges,id'],
            'birthday'       => ['nullable', 'date'],
            'phone'          => ['nullable', 'max:255', 'string'],
            'cell_phone'     => ['nullable', 'max:255', 'string'],
            'email'          => ['nullable', 'email'],
            'hiring_date'    => ['nullable', 'date'],
            'discharge_date' => ['nullable', 'date'],
            'observation'    => ['nullable', 'max:255', 'string'],
            'image'          => ['nullable', 'image', 'max:1024'],
            'code'           => ['nullable', 'max:255', 'string'],
            'company_id'     => ['required', 'exists:companies,id'],
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $employee = $area->employees()->create($validated);

        return new EmployeeResource($employee);
    }
}