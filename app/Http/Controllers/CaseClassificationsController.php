<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\ClientCase;
use Illuminate\Http\Request;
use App\Models\ViolatedRight;
use App\Models\CaseClassification;
use App\Models\Case1Classification;
use App\Models\Case2Classification;
use App\Models\Case3Classification;
use App\Models\Case4Classification;
use App\Http\Controllers\Controller;
use Exception;

class CaseClassificationsController extends Controller
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
     * Display a listing of the case classifications.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $caseClassifications = CaseClassification::with('clientcase','user','case1classification','case2classification','case3classification','case4classification','violatedright')->paginate(25);

        return view('case_classifications.index', compact('caseClassifications'));
    }

    /**
     * Show the form for creating a new case classification.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $clientCases = ClientCase::pluck('case_title','id')->all();
$users = User::pluck('id','id')->all();
$case1Classifications = Case1Classification::pluck('name','id')->all();
$case2Classifications = Case2Classification::pluck('name','id')->all();
$case3Classifications = Case3Classification::pluck('name','id')->all();
$case4Classifications = Case4Classification::pluck('name','id')->all();
$violatedRights = ViolatedRight::pluck('name','id')->all();
        
        return view('case_classifications.create', compact('clientCases','users','case1Classifications','case2Classifications','case3Classifications','case4Classifications','violatedRights'));
    }

    /**
     * Store a new case classification in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            CaseClassification::create($data);

            return redirect()->route('case_classifications.case_classification.index')
                             ->with('success_message', 'Case Classification was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display the specified case classification.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $caseClassification = CaseClassification::with('clientcase','user','case1classification','case2classification','case3classification','case4classification','violatedright')->findOrFail($id);

        return view('case_classifications.show', compact('caseClassification'));
    }

    /**
     * Show the form for editing the specified case classification.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $caseClassification = CaseClassification::findOrFail($id);
        $clientCases = ClientCase::pluck('case_title','id')->all();
$users = User::pluck('id','id')->all();
$case1Classifications = Case1Classification::pluck('name','id')->all();
$case2Classifications = Case2Classification::pluck('name','id')->all();
$case3Classifications = Case3Classification::pluck('name','id')->all();
$case4Classifications = Case4Classification::pluck('name','id')->all();
$violatedRights = ViolatedRight::pluck('name','id')->all();

        return view('case_classifications.edit', compact('caseClassification','clientCases','users','case1Classifications','case2Classifications','case3Classifications','case4Classifications','violatedRights'));
    }

    /**
     * Update the specified case classification in the storage.
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
            
            $caseClassification = CaseClassification::findOrFail($id);
            $caseClassification->update($data);

            return redirect()->route('case_classifications.case_classification.index')
                             ->with('success_message', 'Case Classification was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }

    /**
     * Remove the specified case classification from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $caseClassification = CaseClassification::findOrFail($id);
            $caseClassification->delete();

            return redirect()->route('case_classifications.case_classification.index')
                             ->with('success_message', 'Case Classification was successfully deleted!');

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
            //'user_id' => 'required',
            'case1_classification_id' => 'nullable',
            'case2_classification_id' => 'nullable',
            'case3_classification_id' => 'nullable',
            'case4_classification_id' => 'nullable',
            'violated_right_id' => 'nullable',
     
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
