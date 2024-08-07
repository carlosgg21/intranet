<?php

namespace App\Repositories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Collection;

class EmployeeRepository
{
	protected $employee;


	public function __construct(Employee $employee) {
		$this->employee = $employee;
	}

	public function getEmployees(): Collection
	{
		return $this-> employee->with('charge', 'area')->get();
	}

	public function getEmployeesWithBirthdayInMonth(int $month): Collection
	{
    	  return $this->employee->birthdayInMonth($month)
					->orderByRaw('DAY(birthday)')
					->get();
	}

	public function getEmployeesWithBirthdayThisMonth(): Collection
	{
		return $this->getEmployeesWithBirthdayInMonth(now()->month);
	}

}