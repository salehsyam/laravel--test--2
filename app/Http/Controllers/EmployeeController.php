<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $employee = Employee::all();
        return response()->view('employee.index', ['employees' => $employee]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {

        $employee = new Employee();
        $employee->name = $request->input('name');
        $employee->mobile = $request->input('mobile');
        $employee->phone = $request->input('phone');
        $employee->identification_number = $request->input('identification_number');
        $employee->work_hour = $request->input('work_hour');
        $employee->type_job = $request->input('type_job');
        $employee->date_job = $request->input('date_job');
        $employee->salary = $request->has('salary');
        $employee->living = $request->has('living');
        $employee->photo = $request->has('photo');

        $isSaved = $employee->save();
        return response()->json(
            ['message' => $isSaved ? __('User created successfully') : __('Create failed!')],
            $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST,
        );

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
        //
        return response()->view('employee.edit', ['employee' => $employee]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {

                $employee->name = $request->input('name');
                $employee->phone = $request->input('phone');
                $employee->identification_number = $request->input('identification_number');
                $employee->work_hour = $request->input('work_hour');
                $employee->type_job = $request->input('type_job');
                $employee->date_job = $request->input('date_job');
                $employee->salary = $request->input('salary');
                $employee->living = $request->input('living');
                $employee->photo = $request->input('photo');
                $employee->dwelling = $request->has('dwelling');

                $isSaved = $employee->save();
                return response()->json(
                    ['message' => $isSaved ? 'Updated successfully' : 'Update failed!'],
                    $isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST,
                );


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
        $isDelete = $employee->delete();
        return response()->json(
            ['message' => $isDelete ? 'Deleted Successfully' : 'Delete failed'],
            $isDelete ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST,
        );
    }
}
