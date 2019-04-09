<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\ClientCase;
use Illuminate\Http\Request;
use App\Models\CaseConsultation;
use App\Http\Controllers\Controller;
use Exception;

class CaseConsultationsController extends Controller
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
     * Display a listing of the case consultations.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $caseConsultations = CaseConsultation::with('clientcase','user')->paginate(25);

        return view('case_consultations.index', compact('caseConsultations'));
    }

    /**
     * Show the form for creating a new case consultation.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $clientCases = ClientCase::pluck('case_title','id')->all();
$users = User::pluck('id','id')->all();
        
        return view('case_consultations.create', compact('clientCases','users'));
    }

    /**
     * Store a new case consultation in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            CaseConsultation::create($data);

            return redirect()->route('case_consultations.case_consultation.index')
                             ->with('success_message', 'Case Consultation was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display the specified case consultation.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $caseConsultation = CaseConsultation::with('clientcase','user')->findOrFail($id);

        return view('case_consultations.show', compact('caseConsultation'));
    }

    /**
     * Show the form for editing the specified case consultation.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $caseConsultation = CaseConsultation::findOrFail($id);
        $clientCases = ClientCase::pluck('case_title','id')->all();
$users = User::pluck('id','id')->all();

        return view('case_consultations.edit', compact('caseConsultation','clientCases','users'));
    }

    /**
     * Update the specified case consultation in the storage.
     *
     * @param  int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            $caseConsultation = CaseConsultation::findOrFail($id);
            $caseConsultation->update($data);

            return redirect()->route('case_consultations.case_consultation.index')
                             ->with('success_message', 'Case Consultation was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }

    /**
     * Remove the specified case consultation from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $caseConsultation = CaseConsultation::findOrFail($id);
            $caseConsultation->delete();

            return redirect()->route('case_consultations.case_consultation.index')
                             ->with('success_message', 'Case Consultation was successfully deleted!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    
    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request 
     * @return array
     */
    protected function getData(Request $request)
    {
        $rules = [
            'client_case_id' => 'required',
            'case_position' => 'required|numeric|min:-2147483648|max:2147483647',
            'case_analysis' => 'required|numeric|min:-2147483648|max:2147483647',
            'case_note' => 'required|numeric|min:-2147483648|max:2147483647',
            'user_id' => 'required',
     
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
