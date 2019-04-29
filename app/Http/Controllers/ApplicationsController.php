<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Person;
use App\Models\Client;
use App\Models\Applicant;
use App\Models\Application;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;

class ApplicationsController extends Controller
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
     * Display a listing of the applications.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $applications = Application::with('applicant','client','user')->latest()->paginate(25);

        return view('applications.index', compact('applications'));
    }

    /**
     * Show the form for creating a new application.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $applicants = Applicant::pluck('deleted_at','id')->all();
        $clients = Client::pluck('deleted_at','id')->all();
        //$users = User::pluck('id','id')->all();
        $people = Person::pluck('name','id')->all();
        //No. Registrasi
        $idpeople = Person::latest()->limit(1)->pluck('id');
            foreach (json_decode($idpeople) as $idpeople);
        $initpeople = Person::latest()->limit(1)->pluck('name');
            foreach (json_decode($initpeople) as $initpeople);

        $words = explode(" ", "$initpeople");
        $dates = date('Y.m');
        $numbers = $idpeople;
        $names = null;
            foreach ($words as $w) {
                $names .= $w[0];
            }
        
        return view('applications.create', compact('applicants','clients','people','names', 'dates', 'numbers', 'words'));
    }

    /**
     * Store a new application in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Application::create($data);

            return redirect()->route('applications.application.index')
                             ->with('success_message', 'Application was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display the specified application.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $application = Application::with('applicant','client','user')->findOrFail($id);

        return view('applications.show', compact('application'));
    }

    /**
     * Show the form for editing the specified application.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $application = Application::findOrFail($id);
        $applicants = Applicant::pluck('deleted_at','id')->all();
        $people = Person::pluck('name','id')->all();
        $clients = Client::pluck('deleted_at','id')->all();
        $users = User::pluck('id','id')->all();

        return view('applications.edit', compact('application','applicants','people','clients','users'));
    }

    /**
     * Update the specified application in the storage.
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
            
            $application = Application::findOrFail($id);
            $application->update($data);

            return redirect()->route('applications.application.index')
                             ->with('success_message', 'Application was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }

    /**
     * Remove the specified application from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $application = Application::findOrFail($id);
            $application->delete();

            return redirect()->route('applications.application.index')
                             ->with('success_message', 'Application was successfully deleted!');

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
            'no_reg' => 'nullable|string|min:0|max:255',
            'reg_date' => 'nullable|string|min:0|max:255',
            'applicant_id' => 'nullable',
            'client_id' => 'nullable',
            'is_client' => 'nullable|boolean',
            'other_org' => 'nullable|string|min:0|max:255',
            'info_lbh' => 'nullable|string|min:0|max:255',
            'why_lbh' => 'nullable|string|min:0|max:255',
            'problem_desc' => 'nullable|string|min:0|max:255',
            'is_confirmed' => 'nullable|boolean',
            'is_advocacy' => 'nullable|boolean',
            //'user_id' => 'nullable',
     
        ];
        
        $data = $request->validate($rules);

        $data['is_client'] = $request->has('is_client');

        return $data;
    }

}
