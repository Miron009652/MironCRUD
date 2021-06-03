<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;

class EmployeeController extends Controller
{
    use ValidatesRequests;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('employees.index', [
            'employees' => Employee::get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.create', [
            'employees' => [],
            'departments' => Department::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=> 'required',
            'surname'=> 'required',
            'patronymic'=> 'required',
            'gender'=> 'required',
            'wages'=> 'required',
            'departments'=> 'required',
            ]);

        $employee = Employee::create($request->all());

        if($request->input('departments')) :
            $employee->departments()->attach($request->input('departments'));
        endif;

        return redirect('/employees')->with('success', 'Сотрудник успешно добавлен!');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return view('employees.edit', [
            'employee' => $employee,
            'departments' => Department::get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=> 'required',
            'surname'=> 'required',
            'patronymic'=> 'required',
            'gender'=> 'required',
            'wages'=> 'required',
            'departments'=> 'required',
        ]);

        $employee = Employee::find($id);
        $employee->update($request->all());


        $employee->name = $request->get('name');
        $employee->surname = $request->get('surname');
        $employee->patronymic = $request->get('patronymic');
        $employee->gender = $request->get('gender');
        $employee->wages = $request->get('wages');
        $employee->save();

        $employee->departments()->detach();
        if($request->input('departments')) :
            $employee->departments()->attach($request->input('departments'));
        endif;

        return redirect('/employees')->with('success', 'Сотрудник успешно изменен!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->departments()->detach();
        $employee->delete();

        return redirect('/employees')->with('success', 'Сотрудник успешно удален!');
    }
}
