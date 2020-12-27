<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\CurriculumVitae;
use App\Models\Company;
use App\Models\Recruitment;

use Illuminate\Support\Facades\DB;

class ManagementController extends Controller
{
    private $page = 9;

    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $users = User::paginate($this->page);
        return view('admin.management', ['users' => $users]);
    }

    // public function searchUsersWithEmail(Request $request)
    // {
    //     if (($keyword = $request->keyword)) {
    //         $sql = "
    //         SELECT
    //             users.id, users.name, users.email, users.address, users.profile_photo_path,
    //             r.name as role_name,
    //             g.name as gender_name
    //             FROM users
    //                 JOIN roles as r ON users.role_id = r.id
    //                 JOIN genders as g ON users.gender_id = g.id
    //         WHERE users.name LIKE '%$keyword%'
    //         ";
    //         $users = DB::select($sql);
    //         return view('admin.management', ['users' => $users]);
    //     }
    // }

    /**
     * statistic
     *
     * @param  mixed $id
     * @return void
     */
    public function statistic($id)
    {
        $user = User::where('id', '=', $id)->first();

        $curriculumVitaes = curriculumVitae::all()->where("user_id", $id);
        $companies = Company::all()->where('user_id', '=', $id);

        return view('admin.statistic', [
            'user' => $user,
            'curriculumVitaes' => $curriculumVitaes,
            'companies' => $companies
        ]);
    }

    public function showListCurriculumVitaeUser($id)
    {
        $curriculumVitaes = curriculumVitae::where('id', '=', $id)->paginate($this->page);
        return view('admin.curriculumVitae.index', [
            'curriculumVitaes' => $curriculumVitaes
        ]);
    }

    public function showListCompanyUser($id)
    {
        $companies = Company::where('id', '=', $id)->paginate($this->page);
        return view('admin.company.index', [
            'companies' => $companies
        ]);
    }
}
