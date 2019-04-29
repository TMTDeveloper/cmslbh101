<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Employment;
use App\Models\Nationality;
use App\Models\Person;
use App\Models\Province;
use App\Models\Regency;
use Barryvdh\Debugbar\Facade as Debugbar;
use Exception;
use Illuminate\Http\Request;

class PeopleController extends Controller
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
  * Display a listing of the people.
  *
  * @return Illuminate\View\View
  */
 public function index()
 {
  $people = Person::with('user', 'nationality', 'province', 'regency', 'district', 'employment')->latest()->paginate(25);

  return view('people.index', compact('people'));
 }

 /**
  * Show the form for creating a new person.
  *
  * @return Illuminate\View\View
  */
 public function create()
 {
  //$users = User::pluck('id','id')->all();
  $nationalities = Nationality::pluck('name', 'id')->all();
  $provinces     = Province::pluck('name', 'id')->all();
  $employments   = Employment::pluck('name', 'id')->all();

  return view('people.create', compact( /*'users',*/'nationalities', 'provinces', 'employments'));
 }

 /**
  * Store a new person in the storage.
  *
  * @param Illuminate\Http\Request $request
  *
  * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
  */
 public function store(Request $request)
 {
  try {

   $data = $this->getData($request);

   Person::create($data);

   return redirect()->route('family_assets.family_asset.create')
    ->with('success_message', 'Person was successfully added!');

  } catch (Exception $exception) {
    error_log($exception);
   return back()->withInput()
    ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
  }
 }

 /**
  * Display the specified person.
  *
  * @param int $id
  *
  * @return Illuminate\View\View
  */
 public function show($id)
 {
  $person = Person::with('user', 'nationality', 'province', 'regency', 'district')->findOrFail($id);

  return view('people.show', compact('person'));
 }

 /**
  * Show the form for editing the specified person.
  *
  * @param int $id
  *
  * @return Illuminate\View\View
  */
 public function edit($id)
 {
  $person = Person::findOrFail($id);
  //$users = User::pluck('id','id')->all();
  $nationalities = Nationality::pluck('name', 'id')->all();
  $provinces     = Province::pluck('name', 'id')->all();
//   $regencies     = Regency::pluck('name', 'id')->all();
  //   $districts     = District::pluck('name', 'id')->all();
  $employments = Employment::pluck('name', 'id')->all();

  return view('people.edit', compact('person', /*'users',*/'nationalities', 'provinces', 'employments'));
 }

 /**
  * Update the specified person in the storage.
  *
  * @param  int $id
  * @param Illuminate\Http\Request $request
  *
  * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
  */
 public function update($id, Request $request)
 {
  $data = $this->getData($request);
  try {

   Debugbar::warning($data);
   // Debugbar::addThrowable();
   $isDisabilityExist = array_key_exists("has_disability", $data);
   if (!$isDisabilityExist) {
    $disability = array("has_disability" => null);
    $data       = array_merge($data, $disability);
   }
   $person = Person::findOrFail($id);
   $person->update($data);

   return redirect()->route('people.person.index')
    ->with('success_message', 'Person was successfully updated!');

  } catch (Exception $exception) {
   error_log($exception);
   Debugbar::warning($data);
   return back()->withInput()
    ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
  }
 }

 /**
  * Remove the specified person from the storage.
  *
  * @param  int $id
  *
  * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
  */
 public function destroy($id)
 {
  try {
   $person = Person::findOrFail($id);
   $person->delete();

   return redirect()->route('people.person.index')
    ->with('success_message', 'Person was successfully deleted!');

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
   //'user_id' => 'nullable',
   'name'             => 'nullable|string|min:0|max:255',
   'alias'            => 'nullable|string|min:0|max:255',
   'count_unit'       => 'nullable',
   'pob'              => 'nullable|string|min:0|max:255',
   'dob'              => 'nullable|string|min:0|max:255',
   'gender'           => 'nullable',
   'religion'         => 'nullable',
   'idcard_type'      => 'nullable|string|min:0|max:255',
   'blood_type'       => 'nullable',
   'idcard_number'    => 'nullable|string|min:0|max:255',
   'no_contact'       => 'nullable|string|min:0|max:255',
   'email'            => 'nullable|string|min:0|max:255',
   'inability_letter' => 'nullable',
   'address'          => 'nullable|string|min:0|max:255',
   'nationality_id'   => 'nullable',
   'province_id'      => 'nullable',
   'regency_id'       => 'nullable',
   'district_id'      => 'nullable',
   'has_disability'   => 'nullable|integer',
   'education'        => 'nullable',
   'marital_status'   => 'nullable',
   'employment_id'    => 'nullable',
   'income'           => 'nullable',
   'home_status'      => 'nullable',
   'represent'        => 'nullable',
   'org_name'         => 'nullable|string|min:0|max:255',
   'org_position'     => 'nullable|string|min:0|max:255',
   'org_member'       => 'nullable|string|min:0|max:255',

  ];

  $data = $request->validate($rules);

  return $data;
 }

}
