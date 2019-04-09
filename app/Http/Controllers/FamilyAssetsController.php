<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Models\FamilyAsset;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;

class FamilyAssetsController extends Controller
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
     * Display a listing of the family assets.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $familyAssets = FamilyAsset::with('person')->paginate(25);

        return view('family_assets.index', compact('familyAssets'));
    }

    /**
     * Show the form for creating a new family asset.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $people = Person::pluck('name','id')->all();
        
        return view('family_assets.create', compact('people'));
    }

    /**
     * Store a new family asset in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            FamilyAsset::create($data);

            return redirect()->route('applications.application.create')
                             ->with('success_message', 'Family Asset was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display the specified family asset.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $familyAsset = FamilyAsset::with('person')->findOrFail($id);

        return view('family_assets.show', compact('familyAsset'));
    }

    /**
     * Show the form for editing the specified family asset.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $familyAsset = FamilyAsset::findOrFail($id);
        $people = Person::pluck('name','id')->all();

        return view('family_assets.edit', compact('familyAsset','people'));
    }

    /**
     * Update the specified family asset in the storage.
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
            
            $familyAsset = FamilyAsset::findOrFail($id);
            $familyAsset->update($data);

            return redirect()->route('family_assets.family_asset.index')
                             ->with('success_message', 'Family Asset was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }

    /**
     * Remove the specified family asset from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $familyAsset = FamilyAsset::findOrFail($id);
            $familyAsset->delete();

            return redirect()->route('family_assets.family_asset.index')
                             ->with('success_message', 'Family Asset was successfully deleted!');

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
            'children' => 'nullable|string|min:1|max:255',
            'spouse' => 'nullable|string|min:1|max:255',
            'family' => 'nullable|string|min:1|max:255',
            'other' => 'nullable|string|min:1|max:255',
            'bangunan' => 'nullable|string|min:1|max:255',
            'rumah' => 'nullable|string|min:1|max:255',
            'toko' => 'nullable|string|min:1|max:255',
            'kios' => 'nullable|string|min:1|max:255',
            'warung' => 'nullable|string|min:1|max:255',
            'lapak' => 'nullable|string|min:1|max:255',
            'lahan' => 'nullable|string|min:1|max:255',
            'lahan_garapan' => 'nullable|string|min:1|max:255',
            'mobil' => 'nullable|string|min:1|max:255',
            'motor' => 'nullable|string|min:1|max:255',
     
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
