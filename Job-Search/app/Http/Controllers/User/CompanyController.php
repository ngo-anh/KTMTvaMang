<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;
/* Request */
use App\Http\Requests\CompanyRequest;

class CompanyController extends Controller
{
    private $page = 5;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId =  Auth::user()->id;
        $companies = Company::where("user_id", $userId)->paginate($this->page);
        return view('user.company.index', ['companies' => $companies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        $company = new Company();
        $company->name = $request->company__name;
        $company->description = $request->company__description;
        $company->image_path = $request->company__image;
        $company->address = $request->company__address;
        $company->user_id  = Auth()->user()->id;

        $company->save();
        return redirect()->route('company.index')->with('status', 'Create a new company successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Company::where("id", $id)->first();
        return view('user.company.detail', ['company' => $company]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::all()->where("id", $id)->first();
        return view('user.company.update', ['company' => $company]);
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
        $company = Company::all()->where("id", $id)->first();
        $company->name = $request->company__name;
        $company->description = $request->company__description;
        $company->image_path = $request->company__image;
        $company->address = $request->company__address;
        $company->user_id  = Auth()->user()->id;
        $company->save();
        return redirect()->route('company.index')->with('status', 'Update this company successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Company::destroy($id);
    }
}
