<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Http\Traits\GeneralTrait;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use voku\helper\ASCII;

class EmployeeController extends Controller
{
    use GeneralTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('employee.index');
    }

    public function fetchEmployees(){
        $employees = Employee::all();
        return response()->json([
            'employees' => $employees,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'father_name' => 'required',
            'type' => 'required',
            'marital_status' => 'required',
            'cell' => 'required',
            'cnic' => 'required',
            'monthly_income' => 'required',
            'residential_address' => 'required',
            'caste' => 'required',
            'cnic_expiry' => 'required',
            'dob' => 'required',
            'work_since' => 'required',
            'residential_phone' => 'required',
            'residential_since' => 'required',
            'cnic_front' => 'sometimes|file|image',
            'cnic_back' => 'sometimes|file|image',
            'image' => 'sometimes|file|image',
        ]);
        if (!$validator->passes()){
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }

        $employee = Employee::create($request->all());
        $this->storeImage($employee);
        if ($employee){
            return response()->json(['status' => 1, 'message' => 'Employee Added Successfully']);
        }
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
    public function edit($employee)
    {
        $employee = Employee::find($employee);
        $type = $employee->getAttributes()['type'];
        $marital_status = $employee->getAttributes()['marital_status'];
        if ($employee){
            return response()->json([
                'status' => 200,
                'employee' => $employee,
                'type' => $type,
                'marital_status' => $marital_status,
            ]);
        }
        else{
            return response()->json([
                'status' => 404,
                'message' => 'Employee not found'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $employee)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'father_name' => 'required',
            'type' => 'required',
            'marital_status' => 'required',
            'cell' => 'required',
            'cnic' => 'required',
            'monthly_income' => 'required',
            'residential_address' => 'required',
            'caste' => 'required',
            'cnic_expiry' => 'required',
            'dob' => 'required',
            'work_since' => 'required',
            'residential_phone' => 'required',
            'residential_since' => 'required',
            'cnic_front' => 'sometimes|file|image',
            'cnic_back' => 'sometimes|file|image',
            'image' => 'sometimes|file|image',
        ]);
        if (!$validator->passes()){
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }
        $employee = Employee::find($employee);
        $employee->update($request->all());
        $this->storeImage($employee);
        if ($employee){
            return response()->json(['status' => 1, 'message' => 'Employee Updated Successfully']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($employee)
    {
        $employee = Employee::find($employee);
        if (!$employee){
            return response()->json([
                'status' => 0,
                'message' => 'Employee not exist'
            ]);
        }
        $employee->delete();
        return response()->json([
            'status' => 1,
            'message' => 'Employee Deleted Successfully'
        ]);
    }

    public function storeImage($employee)
    {
        $employee->update([
            'image' => $this->imagePath('image', 'employee', $employee),
            'cnic_front' => $this->imagePath('cnic_front', 'employee', $employee),
            'cnic_back' => $this->imagePath('cnic_back', 'employee', $employee),
            'document' => $this->imagePath('document', 'employee', $employee),
        ]);
    }
}
