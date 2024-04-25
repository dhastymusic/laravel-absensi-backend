<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    //show company
    public function show($id)
    {
        $company = Company::find(1);
        return view('pages.companies.show', compact('company'));

    }
    //edit company
    public function edit($id)
    {
        $company = Company::find(1);
        return view('pages.companies.edit', compact('company'));
    }
    //update company
    public function update(Request $request, Company $company)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'email' => 'required|email',
            'latitude' => 'required',
            'longitude' => 'required',
            'radius_km' => 'required',
            'time_in' => 'required',
            'time_out' => 'required',
        ]);

        $company->update($validatedData);

        return redirect()->route('companies.show', 1)->with('success', 'Company updated successfully.');


    }

}
