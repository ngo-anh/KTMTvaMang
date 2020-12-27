<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;
use App\Models\Company;
use App\Models\CurriculumVitae;
use App\Models\Recruitment;

class HomeController extends Controller
{
    private $page = 10;
    public function index()
    {
        $featuredCompanies = Company::all()->random(3);
        $featuredCVs = CurriculumVitae::all()->random(3);
        $featuredRecruitment = Recruitment::all()->random(3);

        return view('index', [
            'featuredCompanies' => $featuredCompanies,
            'featuredCVs' => $featuredCVs,
            'featuredRecruitment' => $featuredRecruitment,
        ]);
    }

    public function company()
    {
        $companies = Company::paginate($this->page);
        return view('company', [
            'companies' => $companies,
        ]);
    }

    public function recruitment()
    {
        $recruitments = Recruitment::paginate($this->page);
        return view('recruitment', [
            'recruitments' => $recruitments,
        ]);
    }

    public function curriculumVitae()
    {
        $curriculumVitaes = CurriculumVitae::paginate($this->page);
        return view('curriculumVitae', [
            'curriculumVitaes' => $curriculumVitaes,
        ]);
    }
}
