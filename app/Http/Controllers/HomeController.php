<?php

namespace App\Http\Controllers;

use App\Models\ClientCase;
use App\Models\Person;
use App\Models\Applicant;
use App\Models\Application;
use App\Models\CaseConsultation;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client_cases= ClientCase::all();
        $people = Person::all();
        $applicants = Applicant::all();
        $applications = Application::all();
        $case_consultations = CaseConsultation::all();
        return view('home', compact(['client_cases', 'people', 'applications', 'applicants', 'case_consultations']));
    }
}
