<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Employee;
use App\Models\Part;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('employees.index', [
            'employees' => Employee::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validData = $request->validate(
            [
                'name_employee' => 'required | min:10 | max:99 | unique:employees,name_employee',
                'email_employee' => 'required | min:6 | max:99 | unique:employees,email_employee'
            ],
            [
                'name_employee.required' => 'El campo Nombre es requerido',
                'name_employee.min' => 'El campo Nombre requiere mínimo 10 caracteres',
                'name_employee.unique' => 'El nombre del empleado ya esta registrado',
                'email_employee.required' => 'El campo email es requerido',
                'email_employee.min' => 'El campo email requiere mínimo 6 caracteres',
                'email_employee.unique' => 'El email ya se encuentra almacenado en la base de datos'
            ]
        );
        $employees = new Employee();
        $employees->name_employee = $request->get('name_employee');
        $employees->email_employee = $request->get('email_employee');
        $employees->save();
        return redirect('/employee');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employees = Employee::find($id);
        return view('employees/edit', [
            'employees' => $employees
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validData = $request->validate(
            [
                'name_employee' => 'required | min:10 | max:99 | unique:employees,name_employee',
                'email_employee' => 'required | min:6 | max:99 | email'
            ],
            [
                'name_employee.required' => 'El campo Nombre es requerido',
                'name_employee.min' => 'El campo Nombre requiere mínimo 10 caracteres',
                'name_employee.unique' => 'El nombre del empleado ya esta registrado',
                'email_employee.required' => 'El campo email es requerido',
                'email_employee.min' => 'El campo email requiere mínimo 6 caracteres',
                'email_employee.email' => 'El email empleado debe ser un email valido'
            ]
        );
        $employees = Employee::find($id);
        $employees->name_employee = $request->get('name_employee');
        $employees->email_employee = $request->get('email_employee');
        $employees->save();
        return redirect('/employee');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function assignment($id)
    {
        return view('employees/assignment', [
            'parts' => Part::where('employee_id', $id)
                ->join('brands', 'brands.id', '=', 'parts.brand_id')
                ->join('categories', 'categories.id', '=', 'parts.category_id')
                ->select('parts.*', 'brands.name_brand', 'categories.name_category')
                ->get(),
            'data' => Employee::find($id),
            'assignments' => Assignment::all()->sortByDesc("id")
        ]);
    }
}
