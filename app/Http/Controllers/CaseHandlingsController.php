<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CaseHandling;
use App\Models\ClientCase;
use Exception;
use Illuminate\Http\Request;

class CaseHandlingsController extends Controller
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
  * Display a listing of the case handlings.
  *
  * @return Illuminate\View\View
  */
 public function index()
 {
  $caseHandlings = CaseHandling::with('clientcase')->paginate(25);

  return view('case_handlings.index', compact('caseHandlings'));
 }

 /**
  * Show the form for creating a new case handling.
  *
  * @return Illuminate\View\View
  */
 public function create()
 {
  $clientCases = ClientCase::pluck('case_title', 'id')->all();

  return view('case_handlings.create', compact('clientCases'));
 }

 /**
  * Store a new case handling in the storage.
  *
  * @param Illuminate\Http\Request $request
  *
  * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
  */
 public function store(Request $request)
 {
  
  try {
    $data = $this->getData($request);
   CaseHandling::create($data);

   return redirect()->route('case_handlings.case_handling.index')
    ->with('success_message', 'Case Handling was successfully added!');

  } catch (Exception $exception) {
   return back()->withInput()
    ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
  }
 }

 /**
  * Display the specified case handling.
  *
  * @param int $id
  *
  * @return Illuminate\View\View
  */
 public function show($id)
 {
  $caseHandling = CaseHandling::with('clientcase')->findOrFail($id);

  return view('case_handlings.show', compact('caseHandling'));
 }

 /**
  * Show the form for editing the specified case handling.
  *
  * @param int $id
  *
  * @return Illuminate\View\View
  */
 public function edit($id)
 {
  $caseHandling = CaseHandling::findOrFail($id);
  $clientCases  = ClientCase::pluck('case_title', 'id')->all();

  return view('case_handlings.edit', compact('caseHandling', 'clientCases'));
 }

 /**
  * Update the specified case handling in the storage.
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

   $caseHandling = CaseHandling::findOrFail($id);
   $caseHandling->update($data);

   return redirect()->route('case_handlings.case_handling.index')
    ->with('success_message', 'Case Handling was successfully updated!');

  } catch (Exception $exception) {

   return back()->withInput()
    ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
  }
 }

 /**
  * Remove the specified case handling from the storage.
  *
  * @param  int $id
  *
  * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
  */
 public function destroy($id)
 {
  try {
   $caseHandling = CaseHandling::findOrFail($id);
   $caseHandling->delete();

   return redirect()->route('case_handlings.case_handling.index')
    ->with('success_message', 'Case Handling was successfully deleted!');

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
   'client_case_id'        => 'required',
   'position'              => 'nullable|string|min:0|max:255',
   'litigation'            => 'nullable|string|min:0|max:255',
   'nonlitigation'         => 'nullable',
   'advocacy_target'       => 'nullable|string|min:0|max:255',
   'condition_achievement' => 'nullable|string|min:0|max:255',
   'obstacle'              => 'nullable|string|min:0|max:255',
   'strategy_plan'         => 'nullable|string|min:0|max:255',

  ];

  $data = $request->validate($rules);

  return $data;
 }

}
