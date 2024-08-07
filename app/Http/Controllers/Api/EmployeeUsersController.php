<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeeUsersController extends Controller
{
    public function index(Request $request, Employee $employee): UserCollection
    {
        $this->authorize('view', $employee);

        $search = $request->get('search', '');

        $users = $employee
            ->users()
            ->search($search)
            ->latest()
            ->paginate();

        return new UserCollection($users);
    }

    public function store(Request $request, Employee $employee): UserResource
    {
        $this->authorize('create', User::class);

        $validated = $request->validate([
            'name'      => ['required', 'max:255', 'string'],
            'email'     => ['required', 'unique:users,email', 'email'],
            'user_name' => ['nullable', 'max:255', 'string'],
            'password'  => ['required'],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        $user = $employee->users()->create($validated);

        $user->syncRoles($request->roles);

        return new UserResource($user);
    }
}
