<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Recruitment;
use App\Models\Company;
use Illuminate\Http\Request;

class RecruitmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.recruitment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $recruitment = new Recruitment();
        $recruitment->title = $request->recruitment__title;
        $recruitment->apply_for = $request->recruitment__apply_for;
        $recruitment->salary = $request->recruitment__salary;
        $recruitment->company_id =
            $request->session()->all()['company']->id;

        $recruitment->save();
        return redirect()->route('recruitment.show', $request->session()->all()['company']->id)->with('status', 'Create a new company successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $companyId
     * @return \Illuminate\Http\Response
     */
    public function show($companyId)
    {
        $recruitments = Recruitment::all()->where("company_id", $companyId);
        $company = Company::where('id', $companyId)->first();
        session(['company' => $company]);
        return view('user.recruitment.index', ['company' => $company, 'recruitments' => $recruitments]);
    }

    public function display($id)
    {
        $recruitment = Recruitment::all()->where("id", $id)->first();
        $company =
            Company::where('id', $recruitment->company_id)->first();

        return view('user.recruitment.display', [
            'company' => $company,
            'recruitment' => $recruitment
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $recruitment = Recruitment::all()->where("id", $id)->first();
        return view('user.recruitment.update', ['recruitment' => $recruitment]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $recruitment = Recruitment::all()->where("id", $id)->first();
        $recruitment->title = $request->recruitment__title;
        $recruitment->apply_for = $request->recruitment__apply_for;
        $recruitment->salary = $request->recruitment__salary;
        $recruitment->company_id =
            $request->session()->all()['company']->id;

        $recruitment->save();
        return redirect()->route('recruitment.show', $request->session()->all()['company']->id)->with('status', 'Update this Recruitment successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Recruitment::destroy($id);
    }
}
