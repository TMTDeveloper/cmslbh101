<?php

namespace App\Http\Controllers;

use App\Models\ClientCase;
use App\Models\Person;
use App\Models\Applicant;
use App\Models\CaseConsultation;
use Illuminate\Http\Request;

class LegalAidFormsController extends Controller
{
    public function __construct()
	{
	    $this->middleware('auth');
	}
	
    /**
     * Display a listing of the client cases.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $client_cases= ClientCase::all();
        $people = Person::pluck('name','id')->all();
        $applicants = Applicant::all();
        $case_consultations = CaseConsultation::all();
        return view('home', compact(['client_cases', 'people', 'applicants', 'case_consultations']));
    }
}
