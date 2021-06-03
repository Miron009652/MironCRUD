<?php


namespace App\Http\Controllers;
use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index', [
            'departments' => Department::get(),
            'employees' => Employee::get(),
        ]);
    }
}
