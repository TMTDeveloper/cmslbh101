<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Person;
use App\Models\ClientCase;
use App\Models\Application;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;

class ClientCasesController extends Controller
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
     * Display a listing of the client cases.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $clientCases = ClientCase::with('person','application')->latest()->paginate(25);
        //$clientCases = ClientCase::latest()->first();
        return view('client_cases.index', compact('clientCases'));
    }

    /**
     * Show the form for creating a new client case.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $people = Person::pluck('name','id')->all();
        $applications = Application::pluck('no_reg','id')->all();
        $users = User::pluck('name','id')->all();
        
        return view('client_cases.create', compact('people','applications','users'));
    }

    /**
     * Store a new client case in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            ClientCase::create($data);

            return redirect()->route('client_cases.client_case.index')
                             ->with('success_message', 'Client Case was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display the specified client case.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $clientCase = ClientCase::with('person','application')->findOrFail($id);

        return view('client_cases.show', compact('clientCase'));
    }

    /**
     * Show the form for editing the specified client case.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $clientCase = ClientCase::findOrFail($id);
        $people = Person::pluck('name','id')->all();
        $applications = Application::pluck('no_reg','id')->all();
        $users = User::pluck('name','id')->all();

        return view('client_cases.edit', compact('clientCase','people','applications','users'));
    }

    /**
     * Update the specified client case in the storage.
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
            
            $clientCase = ClientCase::findOrFail($id);
            $clientCase->update($data);

            return redirect()->route('client_cases.client_case.index')
                             ->with('success_message', 'Client Case was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }

    /**
     * Remove the specified client case from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $clientCase = ClientCase::findOrFail($id);
            $clientCase->delete();

            return redirect()->route('client_cases.client_case.index')
                             ->with('success_message', 'Client Case was successfully deleted!');

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
            'person_id' => 'required',
            'application_id' => 'required',
            'case_title' => 'required|string|min:1|max:255',
            'recommendation' => 'nullable',
            'pp_piket' => 'nullable|string|min:0|max:255',
            'pp_penerima' => 'nullable|string|min:0|max:255',
            'pp_asisten' => 'nullable|string|min:0|max:255',
     
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
