<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\CurriculumVitae;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;

class CurriculumVitaeController extends Controller
{
    private $page = 10;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId =  Auth::user()->id;
        $curriculumVitaes = CurriculumVitae::where("user_id", $userId)->paginate($this->page);
        return view('user.curriculumVitae.index', ['curriculumVitaes' => $curriculumVitaes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.curriculumVitae.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $curriculumVitae = new curriculumVitae();
        $curriculumVitae->title = $request->curriculumVitae__title;
        $curriculumVitae->apply_position = $request->curriculumVitae__position;
        $curriculumVitae->user_id  = Auth()->user()->id;

        $curriculumVitae->save();
        return redirect()->route('curriculum-vitae.index')->with('status', 'Create a new Curriculum Vitae successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $curriculumVitae = curriculumVitae::where("id", $id)->first();
        return view('user.curriculumVitae.preview', ['curriculumVitae' => $curriculumVitae]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $curriculumVitae = curriculumVitae::all()->where("id", $id)->first();
        return view('user.curriculumVitae.update', ['curriculumVitae' => $curriculumVitae]);
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
        $curriculumVitae = curriculumVitae::all()->where("id", $id)->first();
        $curriculumVitae->title = $request->curriculumVitae__title;
        $curriculumVitae->apply_position = $request->curriculumVitae__position;
        $curriculumVitae->user_id  = Auth()->user()->id;
        $curriculumVitae->save();
        return redirect()->route('curriculum-vitae.index')->with('status', 'Update this Curriculum Vitae successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        curriculumVitae::destroy($id);
    }
}
