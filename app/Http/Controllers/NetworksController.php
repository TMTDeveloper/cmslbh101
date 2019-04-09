<?php

namespace App\Http\Controllers;

use App\Models\Network;
use App\Models\Regency;
use App\Models\Province;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;

class NetworksController extends Controller
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
     * Display a listing of the networks.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $networks = Network::with('province','regency')->paginate(25);

        return view('networks.index', compact('networks'));
    }

    /**
     * Show the form for creating a new network.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $provinces = Province::pluck('name','id')->all();
$regencies = Regency::pluck('name','id')->all();
        
        return view('networks.create', compact('provinces','regencies'));
    }

    /**
     * Store a new network in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Network::create($data);

            return redirect()->route('networks.network.index')
                             ->with('success_message', 'Network was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display the specified network.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $network = Network::with('province','regency')->findOrFail($id);

        return view('networks.show', compact('network'));
    }

    /**
     * Show the form for editing the specified network.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $network = Network::findOrFail($id);
        $provinces = Province::pluck('name','id')->all();
$regencies = Regency::pluck('name','id')->all();

        return view('networks.edit', compact('network','provinces','regencies'));
    }

    /**
     * Update the specified network in the storage.
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
            
            $network = Network::findOrFail($id);
            $network->update($data);

            return redirect()->route('networks.network.index')
                             ->with('success_message', 'Network was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }

    /**
     * Remove the specified network from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $network = Network::findOrFail($id);
            $network->delete();

            return redirect()->route('networks.network.index')
                             ->with('success_message', 'Network was successfully deleted!');

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
            'name' => 'required|string|min:1|max:255',
            'type' => 'nullable|string|min:0|max:255',
            'contact_person' => 'nullable|string|min:0|max:255',
            'no_contact' => 'nullable|string|min:0|max:255',
            'email' => 'nullable|string|min:0|max:255',
            'province_id' => 'nullable',
            'regency_id' => 'nullable',
            'address' => 'nullable|string|min:0|max:255',
     
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
