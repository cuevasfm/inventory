<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Employee;
use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $employees->name_employee = mb_strtoupper($request->get('name_employee'));
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
        $employees = Employee::find($id);
        return $employees->toArray();
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
        $employees->name_employee = mb_strtoupper($request->get('name_employee'));
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
            'inventories' => Inventory::where('employee_id', $id)
                ->join('brands', 'brands.id', '=', 'inventories.brand_id')
                ->join('categories', 'categories.id', '=', 'inventories.category_id')
                ->select('inventories.*', 'brands.name_brand', 'categories.name_category')
                ->get(),
            'data' => Employee::find($id),
            'assignments' => Assignment::where('id_employee', '=', $id)
            ->join('inventories', 'assignments.id_part','=','inventories.id')
            ->get()
        ]);
    }
    public function toAssign($id)
    {
        return view('employees.toassign', [
            'inventories' => Inventory::select('inventories')
                ->join('categories', 'inventories.category_id', '=', 'categories.id')
                ->join('brands', 'inventories.brand_id', '=', 'brands.id')
                ->select('inventories.*', 'categories.name_category', 'brands.name_brand')
                ->where('employee_id', '=', NULL)
                ->get(),
            'employee' => $id
        ]);
    }
    public function toAssignStore(Request $request, $id)
    {
        $datos = $request->get('d');
        foreach ($datos as $dato) {
            $inventory = Inventory::find($dato);
            $inventory->employee_id = $id;
            $inventory->save();

            $assignment = new Assignment();
            $assignment->id_part = $dato;
            $assignment->id_employee = $id;
            $assignment->state = 'ASSIGNED';
            $assignment->save();
        }
        return redirect('/employee/' . $id . '/assignment');
    }
    public function unAssign($id, $employee)
    {
        $inventory = Inventory::find($id);
        $inventory->employee_id = null;
        $inventory->save();

        $assignment = new Assignment();
        $assignment->id_part = $id;
        $assignment->id_employee = $employee;
        $assignment->state = 'RETURN';
        $assignment->save();
        return redirect('/employee/' . $employee . '/assignment');
    }
    public function deploy($id)
    {
        $employees = Employee::find($id);
        return $employees->toArray();
    }
}
