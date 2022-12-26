<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Http\Requests\CompanyRequest;

class companyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies=Company::paginate(2);

        return view('company.index',compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        
        if($request->hasFile('file'))
        {
            $destination_path='public/images';
            $image=$request->file('file');
            $image_name= $image->getClientOriginalName();
            $path=$request->file('file')->storeAs($destination_path,$image_name); 
        }   

        $company = new Company;
        $company->name=$request->input('name');
        $company->email=$request->input('email');  
        $company->logo=$image_name;  
        $company->website=$request->input('website');  

        $company->save();

        return redirect()->route('company.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company=Company::find($id);
        return view('company.edit',compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, $id)
    {
        if($request->hasFile('file'))
        {
            $destination_path='public/images';
            $image=$request->file('file');
            $image_name= $image->getClientOriginalName();
            $path=$request->file('file')->storeAs($destination_path,$image_name); 
        }   

        $company=Company::find($id);

        $company->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'logo'=>$image_name,
            'website'=>$request->website,
        ]);

        return redirect()->route('company.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company=Company::FindOrfail($id);
        $company->delete();
        return redirect()->route('company.index');
    }
}
