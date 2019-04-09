<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\ClientCase;
use App\Models\CaseDocument;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;

class CaseDocumentsController extends Controller
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
     * Display a listing of the case documents.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $caseDocuments = CaseDocument::with('clientcase','user')->paginate(25);

        return view('case_documents.index', compact('caseDocuments'));
    }

    /**
     * Show the form for creating a new case document.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $clientCases = ClientCase::pluck('case_title','id')->all();
$users = User::pluck('id','id')->all();
        
        return view('case_documents.create', compact('clientCases','users'));
    }

    /**
     * Store a new case document in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            CaseDocument::create($data);

            return redirect()->route('case_documents.case_document.index')
                             ->with('success_message', 'Case Document was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display the specified case document.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $caseDocument = CaseDocument::with('clientcase','user')->findOrFail($id);

        return view('case_documents.show', compact('caseDocument'));
    }

    /**
     * Show the form for editing the specified case document.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $caseDocument = CaseDocument::findOrFail($id);
        $clientCases = ClientCase::pluck('case_title','id')->all();
$users = User::pluck('id','id')->all();

        return view('case_documents.edit', compact('caseDocument','clientCases','users'));
    }

    /**
     * Update the specified case document in the storage.
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
            
            $caseDocument = CaseDocument::findOrFail($id);
            $caseDocument->update($data);

            return redirect()->route('case_documents.case_document.index')
                             ->with('success_message', 'Case Document was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }

    /**
     * Remove the specified case document from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $caseDocument = CaseDocument::findOrFail($id);
            $caseDocument->delete();

            return redirect()->route('case_documents.case_document.index')
                             ->with('success_message', 'Case Document was successfully deleted!');

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
            'surat_polisi' => 'nullable|string|min:0|max:255',
            'surat_gugatan' => 'nullable|string|min:0|max:255',
            'jwbn_gugatan' => 'nullable|string|min:0|max:255',
            'surat_dakwaan' => 'nullable|string|min:0|max:255',
            'eksepsi' => 'nullable|string|min:0|max:255',
            'tanggapan_eksepsi' => 'nullable|string|min:0|max:255',
            'putusan_sela' => 'nullable|string|min:0|max:255',
            'bukti' => 'nullable|string|min:0|max:255',
            'pledoi' => 'nullable|string|min:0|max:255',
            'replik' => 'nullable|string|min:0|max:255',
            'duplik' => 'nullable|string|min:0|max:255',
            'kesimpulan' => 'nullable|string|min:0|max:255',
            'putusan_pn' => 'nullable|string|min:0|max:255',
            'pernyataan_banding' => 'nullable|string|min:0|max:255',
            'memori_banding' => 'nullable|string|min:0|max:255',
            'kontra_memori_banding' => 'nullable|string|min:0|max:255',
            'putusan_pt' => 'nullable|string|min:0|max:255',
            'pernyataan_kasasi' => 'nullable|string|min:0|max:255',
            'memori_kasasi' => 'nullable|string|min:0|max:255',
            'kontra_memori_kasasi' => 'nullable|string|min:0|max:255',
            'putusan_ma' => 'nullable|string|min:0|max:255',
            'surat' => 'nullable|string|min:0|max:255',
            'lainnya' => 'nullable|string|min:0|max:255',
            'user_id' => 'nullable',
     
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
