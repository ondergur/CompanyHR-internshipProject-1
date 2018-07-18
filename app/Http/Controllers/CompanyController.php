<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyFormRequest;
use DemeterChain\C;
//use Faker\Provider\Company;
use Illuminate\Http\Request;
use App\Company;


class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::paginate(10);
        return view('company.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyFormRequest $request)
    {
        //
        $company = new Company;
        $company->name = $request->name;
        $company->address = $request->address;
        $company->phone = $request->phone;
        $company->email = $request->email;
        $company->website = $request->website;

        $new_name = preg_replace('/\s+/', '',$company->name);
        $photo_name = $new_name.time().'.'.$request->logo->getClientOriginalExtension();
        $request->logo->move(public_path('company_logos'), $photo_name);
        $company->logo =$photo_name;

        $company->save();

//        Company::create($request->all());

        return redirect('/companies/');
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
        $company = Company::find($id);
        return view('cats.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $company = Company::find($id);
        return view('company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyFormRequest $request, $id)
    {
        //
        $company = Company::find($id);
//
//        $company->name = $request->name;
//        $company->address = $request->address;
//        $company->phone = $request->phone;
//        $company->email = $request->email;
//        $company->website = $request->website;
//        $company->save();

        $company->update($request->all());

        return redirect('/companies/');

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
        $company = Company::find($id);
        $company->delete();
    }
}
