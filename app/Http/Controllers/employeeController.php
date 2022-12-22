<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeeRequests;
use App\Models\Company;
use App\Models\Employee;


class employeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees=Employee::paginate(3);
        return view('employee.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies=Company::all();
        return view('employee.form',compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequests $request)
    {

        $employee = new Employee;
        $employee->fname=$request->fname;
        $employee->lname=$request->lname;
        $employee->company=$request->cid;
        $employee->email=$request->email;
        $employee->phone=$request->phone;

        $employee->save();
        return redirect()->route('employee.index');
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
        $companies=Company::all();
        $employee=Employee::FindOrfail($id);

        return view('employee.edit',compact('employee','companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeRequests $request, $id)
    {
        $employee=Employee::FindOrfail($id);

        $employee->update([
            'fname'=>$request->fname,
            'lname'=>$request->lname,
            'company'=>$request->cid,
            'email'=>$request->email,
            'phone'=>$request->phone
        ]);

        return redirect()->route('employee.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee=Employee::FindOrfail($id);
        $employee->delete();

        return redirect()->route('employee.index');
        
    }
}
