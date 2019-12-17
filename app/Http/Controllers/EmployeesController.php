<?php

namespace App\Http\Controllers;

use App\Employees;
use App\Jobs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employees::all();
        $jobs=Jobs::all();
        // dd($employees[1]->jobs);

        return view('employees.index')->with('employees', $employees,)->with('jobs',$jobs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = Employees::all();
        $jobs=Jobs::all();
        return view('employees.create')->with('employees', $employees)->with('jobs',$jobs);
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
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'address'=>'required',
        ]);
        $employees = new Employees([
            'id_jobs' => $request->input('job'),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address')
        ]);
        $employees->save();
        return redirect('employees');
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
        $jobs = Jobs::all();
        $data = Employees::where('id_employees', '=', $id)->firstOrFail();
        return view('employees.edit')->with('employee', $data)->with('jobs', $jobs);
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
        Employees::where('id_employees',$id)->update($data);
        return redirect('employees');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employees::where('id_employees',$id)->delete();
        return redirect('employees');
    }
}
