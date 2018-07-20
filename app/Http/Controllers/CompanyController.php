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
        $companies = Company::orderBy('created_at', 'desc')->paginate(4);

        return view('company.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->form(new Company);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Company $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return $this->form($company);
    }

    private function form(Company $company)
    {
        if ($company->exists) {
            $route = ['companies.update', $company->id];
            $method = 'put';

        } else {
            $route = ['companies.store'];
            $method = 'post';
        }

        return view('company.form', compact('company', 'route', 'method'));
    }

    /**
     * Display the specified resource.
     *
     * @param Company $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return view('company.show', compact('company'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyFormRequest $request)
    {
        $this->saveCompany($request, new Company);

        return redirect('/companies/');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CompanyFormRequest $request
     * @param Company $company
     *
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyFormRequest $request, Company $company)
    {
        $this->saveCompany($request, $company);

        return redirect()->route('companies.index');

    }

    private function saveCompany(Request $request, Company $company)
    {
        $attributes = $request->all();

        if ($request->hasFile('logo')) {
            $new_name = preg_replace('/\s+/', '', $request->name);
            $file_extension = $request->logo->extension();
            $file_name = 'ipera__'  . $new_name. time() . '.' . $file_extension;
            $request->logo->storeAs('company_logos', $file_name);
            $attributes['logo'] = $file_name;
        }

        $company->fill($attributes);
        $company->save();

        return $company;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Company $company
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     *
     * @throws \Exception
     */
    public function destroy(Company $company)
    {
        $company->delete();

        return route('companies.index');
    }
}
