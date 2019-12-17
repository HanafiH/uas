<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Employees;
use App\Job;
use App\Jobs;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index')->with('employees', $employees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = Employee::all();
        return view('employees.create')->with('employees', $employees);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'job'=>'required',
            'nama'=>'required',
            'email'=>'required',
            'kontak'=>'required',
            'alamat'=>'required',
        ]);
        $employees = new Employee([
            'id_jobs' => $request->input('job'),
            'name' => $request->input('nama'),
            'email' => $request->input('email'),
            'phone' => $request->input('kontak'),
            'address' => $request->input('alamat')
        ]);
        $employees->save();
        return redirect('employes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jobs = Job::all();
        $data = Employee::where('id_employees', '=', $id)->firstOrFail();
        return view('')->with('employee', $data)->with('jobs', $jobs);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'job'=>'required',
            'nama'=>'required',
            'email'=>'required',
            'kontak'=>'required',
            'alamat'=>'required'
        ]);
        $data = [
            'id_jobs' => $request->input('job'),
            'name' => $request->input('nama'),
            'email' => $request->input('email'),
            'phone' => $request->input('kontak'),
            'address' => $request->input('alamat')
        ];
        Employee::where('id_employees',$id)->update($data);
        return redirect('employees.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employee::where('id_employees',$id)->delete();
        return redirect('employe');
    }
}
