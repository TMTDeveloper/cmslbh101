<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\ClientCase;
use App\Models\CaseProgress;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\Auth;
class CaseProgressesController extends Controller
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
     * Display a listing of the case progresses.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $caseProgresses = CaseProgress::with('clientcase','user')->paginate(25);

        return view('case_progresses.index', compact('caseProgresses'));
    }

    /**
     * Show the form for creating a new case progress.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $clientCases = ClientCase::pluck('case_title','id')->all();
$users = User::pluck('id','id')->all();
        
        return view('case_progresses.create', compact('clientCases','users'));
    }

    /**
     * Store a new case progress in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            $authInfo = array("user_id" => Auth::user()->id);
            $data = array_merge($data,$authInfo);

            
            CaseProgress::create($data);

            return redirect()->route('case_progresses.case_progress.index')
                             ->with('success_message', 'Case Progress was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display the specified case progress.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $caseProgress = CaseProgress::with('clientcase','user')->findOrFail($id);

        return view('case_progresses.show', compact('caseProgress'));
    }

    /**
     * Show the form for editing the specified case progress.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $caseProgress = CaseProgress::findOrFail($id);
        $clientCases = ClientCase::pluck('case_title','id')->all();
$users = User::pluck('id','id')->all();

        return view('case_progresses.edit', compact('caseProgress','clientCases','users'));
    }

    /**
     * Update the specified case progress in the storage.
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
            $authInfo = array("user_id" => Auth::user()->id);
            $data = array_merge($data,$authInfo);

            
            $caseProgress = CaseProgress::findOrFail($id);
            $caseProgress->update($data);

            return redirect()->route('case_progresses.case_progress.index')
                             ->with('success_message', 'Case Progress was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }

    /**
     * Remove the specified case progress from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $caseProgress = CaseProgress::findOrFail($id);
            $caseProgress->delete();

            return redirect()->route('case_progresses.case_progress.index')
                             ->with('success_message', 'Case Progress was successfully deleted!');

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
            'judicial' => 'nullable|string|min:0|max:255',
            'note' => 'nullable|string|min:0|max:255',
            'sk' => 'nullable|string|min:0|max:255',
            'skpk' => 'nullable|string|min:0|max:255',
     
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
