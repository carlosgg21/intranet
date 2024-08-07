<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\EmployeeCollection;
use App\Http\Resources\EmployeeResource;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyEmployeesController extends Controller
{
    public function index(
        Request $request,
        Company $company
    ): EmployeeCollection {
        $this->authorize('view', $company);

        $search = $request->get('search', '');

        $employees = $company
            ->employees()
            ->search($search)
            ->latest()
            ->paginate();

        return new EmployeeCollection($employees);
    }

    public function store(Request $request, Company $company): EmployeeResource
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
            'area_id'        => ['nullable', 'exists:areas,id'],
            'birthday'       => ['nullable', 'date'],
            'phone'          => ['nullable', 'max:255', 'string'],
            'cell_phone'     => ['nullable', 'max:255', 'string'],
            'email'          => ['nullable', 'email'],
            'hiring_date'    => ['nullable', 'date'],
            'discharge_date' => ['nullable', 'date'],
            'observation'    => ['nullable', 'max:255', 'string'],
            'image'          => ['nullable', 'image', 'max:1024'],
            'code'           => ['nullable', 'max:255', 'string'],
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $employee = $company->employees()->create($validated);

        return new EmployeeResource($employee);
    }
}
