<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\ClientCase;
use Illuminate\Http\Request;
use App\Models\CaseMeetingResult;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\Auth;

class CaseMeetingResultsController extends Controller
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
     * Display a listing of the case meeting results.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $caseMeetingResults = CaseMeetingResult::with('clientcase','user')->paginate(25);

        return view('case_meeting_results.index', compact('caseMeetingResults'));
    }

    /**
     * Show the form for creating a new case meeting result.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $clientCases = ClientCase::pluck('case_title','id')->all();
$users = User::pluck('id','id')->all();
        
        return view('case_meeting_results.create', compact('clientCases','users'));
    }

    /**
     * Store a new case meeting result in the storage.
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

            CaseMeetingResult::create($data);

            return redirect()->route('case_meeting_results.case_meeting_result.index')
                             ->with('success_message', 'Case Meeting Result was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display the specified case meeting result.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $caseMeetingResult = CaseMeetingResult::with('clientcase','user')->findOrFail($id);

        return view('case_meeting_results.show', compact('caseMeetingResult'));
    }

    /**
     * Show the form for editing the specified case meeting result.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $caseMeetingResult = CaseMeetingResult::findOrFail($id);
        $clientCases = ClientCase::pluck('case_title','id')->all();
$users = User::pluck('id','id')->all();

        return view('case_meeting_results.edit', compact('caseMeetingResult','clientCases','users'));
    }

    /**
     * Update the specified case meeting result in the storage.
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

            $caseMeetingResult = CaseMeetingResult::findOrFail($id);
            $caseMeetingResult->update($data);

            return redirect()->route('case_meeting_results.case_meeting_result.index')
                             ->with('success_message', 'Case Meeting Result was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }

    /**
     * Remove the specified case meeting result from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $caseMeetingResult = CaseMeetingResult::findOrFail($id);
            $caseMeetingResult->delete();

            return redirect()->route('case_meeting_results.case_meeting_result.index')
                             ->with('success_message', 'Case Meeting Result was successfully deleted!');

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
            'status' => 'nullable|string|min:1|max:255',
            'legal_memo' => 'nullable|string|min:1|max:255',
            'notula' => 'nullable|string|min:1|max:255',
     
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
