<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Network;
use App\Models\ClientCase;
use App\Models\CaseTransfer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;

class CaseTransfersController extends Controller
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
     * Display a listing of the case transfers.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $caseTransfers = CaseTransfer::with('clientcase','network','user')->paginate(25);

        return view('case_transfers.index', compact('caseTransfers'));
    }

    /**
     * Show the form for creating a new case transfer.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $clientCases = ClientCase::pluck('case_title','id')->all();
$networks = Network::pluck('id','id')->all();
$users = User::pluck('id','id')->all();
        
        return view('case_transfers.create', compact('clientCases','networks','users'));
    }

    /**
     * Store a new case transfer in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            CaseTransfer::create($data);

            return redirect()->route('case_transfers.case_transfer.index')
                             ->with('success_message', 'Case Transfer was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display the specified case transfer.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $caseTransfer = CaseTransfer::with('clientcase','network','user')->findOrFail($id);

        return view('case_transfers.show', compact('caseTransfer'));
    }

    /**
     * Show the form for editing the specified case transfer.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $caseTransfer = CaseTransfer::findOrFail($id);
        $clientCases = ClientCase::pluck('case_title','id')->all();
$networks = Network::pluck('id','id')->all();
$users = User::pluck('id','id')->all();

        return view('case_transfers.edit', compact('caseTransfer','clientCases','networks','users'));
    }

    /**
     * Update the specified case transfer in the storage.
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
            
            $caseTransfer = CaseTransfer::findOrFail($id);
            $caseTransfer->update($data);

            return redirect()->route('case_transfers.case_transfer.index')
                             ->with('success_message', 'Case Transfer was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }

    /**
     * Remove the specified case transfer from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $caseTransfer = CaseTransfer::findOrFail($id);
            $caseTransfer->delete();

            return redirect()->route('case_transfers.case_transfer.index')
                             ->with('success_message', 'Case Transfer was successfully deleted!');

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
            'note' => 'nullable|string|min:0|max:255',
            'document' => 'nullable|string|min:0|max:255',
            'network_id' => 'nullable',
            'user_id' => 'nullable',
     
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
