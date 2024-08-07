<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\EmployeeRepository;

class EmployeeController extends Controller
{
    protected $employeeRepository;
    protected $phraseRepository;
    protected $otherAppRepository;
    protected $articleRepository;

    public function __construct(
        EmployeeRepository $employeeRepository,
     
    ) {
        // $this->middleware('auth');
        $this->employeeRepository = $employeeRepository;
   
    }



    public function index()
    {
        $employees = $this->employeeRepository->getEmployees();
        // dd($employees->toArray());
        return view('site.employee.list', compact('employees'));

    }

}
