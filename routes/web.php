<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Notification
use App\User;
use App\Notifications\NewApplication;

//Default routes
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Notification
Route::get('/notifications', function () {

    $user = Auth::user();
    $user->notify(new NewApplication(User::findOrFail(2)));

    //return view('home');
    //echo "notification";
});

//Formulir Bantuan Hukum
Route::get('/legal_aid_forms', function () {
    return view('legal_aid_forms/index');
});

//Regions Indonesia
Route::get('/region','RegionsController@provinces');
Route::get('/json-regencies','RegionsController@regencies');
Route::get('/json-districts', 'RegionsController@districts');
/*Route::get('/json-village', 'RegionsController@villages');*/

//Klasifikasi Hak
Route::get('/case1Classifications','CaseClassificationController@case1Classifications');
Route::get('/json-case2Classifications','CaseClassificationController@case2Classifications');
Route::get('/json-case3Classifications', 'CaseClassificationController@case3Classifications');

Route::resource("users", "UserController");

Route::group(
[
    'prefix' => 'people',
], function () {

    Route::get('/', 'PeopleController@index')
         ->name('people.person.index');

    Route::get('/create','PeopleController@create')
         ->name('people.person.create');

    Route::get('/show/{person}','PeopleController@show')
         ->name('people.person.show')
         ->where('id', '[0-9]+');

    Route::get('/{person}/edit','PeopleController@edit')
         ->name('people.person.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'PeopleController@store')
         ->name('people.person.store');
               
    Route::put('person/{person}', 'PeopleController@update')
         ->name('people.person.update')
         ->where('id', '[0-9]+');

    Route::delete('/person/{person}','PeopleController@destroy')
         ->name('people.person.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'family_assets',
], function () {

    Route::get('/', 'FamilyAssetsController@index')
         ->name('family_assets.family_asset.index');

    Route::get('/create','FamilyAssetsController@create')
         ->name('family_assets.family_asset.create');

    Route::get('/show/{familyAsset}','FamilyAssetsController@show')
         ->name('family_assets.family_asset.show')
         ->where('id', '[0-9]+');

    Route::get('/{familyAsset}/edit','FamilyAssetsController@edit')
         ->name('family_assets.family_asset.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'FamilyAssetsController@store')
         ->name('family_assets.family_asset.store');
               
    Route::put('family_asset/{familyAsset}', 'FamilyAssetsController@update')
         ->name('family_assets.family_asset.update')
         ->where('id', '[0-9]+');

    Route::delete('/family_asset/{familyAsset}','FamilyAssetsController@destroy')
         ->name('family_assets.family_asset.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'applications',
], function () {

    Route::get('/', 'ApplicationsController@index')
         ->name('applications.application.index');

    Route::get('/create','ApplicationsController@create')
         ->name('applications.application.create');

    Route::get('/show/{application}','ApplicationsController@show')
         ->name('applications.application.show')
         ->where('id', '[0-9]+');

    Route::get('/{application}/edit','ApplicationsController@edit')
         ->name('applications.application.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'ApplicationsController@store')
         ->name('applications.application.store');
               
    Route::put('application/{application}', 'ApplicationsController@update')
         ->name('applications.application.update')
         ->where('id', '[0-9]+');

    Route::delete('/application/{application}','ApplicationsController@destroy')
         ->name('applications.application.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'cases',
], function () {

    Route::get('/', 'CasesController@index')
         ->name('cases.case.index');

    Route::get('/create','CasesController@create')
         ->name('cases.case.create');

    Route::get('/show/{case}','CasesController@show')
         ->name('cases.case.show')
         ->where('id', '[0-9]+');

    Route::get('/{case}/edit','CasesController@edit')
         ->name('cases.case.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'CasesController@store')
         ->name('cases.case.store');
               
    Route::put('case/{case}', 'CasesController@update')
         ->name('cases.case.update')
         ->where('id', '[0-9]+');

    Route::delete('/case/{case}','CasesController@destroy')
         ->name('cases.case.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'client_cases',
], function () {

    Route::get('/', 'ClientCasesController@index')
         ->name('client_cases.client_case.index');

    Route::get('/create','ClientCasesController@create')
         ->name('client_cases.client_case.create');

    Route::get('/show/{clientCase}','ClientCasesController@show')
         ->name('client_cases.client_case.show')
         ->where('id', '[0-9]+');

    Route::get('/{clientCase}/edit','ClientCasesController@edit')
         ->name('client_cases.client_case.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'ClientCasesController@store')
         ->name('client_cases.client_case.store');
               
    Route::put('client_case/{clientCase}', 'ClientCasesController@update')
         ->name('client_cases.client_case.update')
         ->where('id', '[0-9]+');

    Route::delete('/client_case/{clientCase}','ClientCasesController@destroy')
         ->name('client_cases.client_case.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'case_consultations',
], function () {

    Route::get('/', 'CaseConsultationsController@index')
         ->name('case_consultations.case_consultation.index');

    Route::get('/create','CaseConsultationsController@create')
         ->name('case_consultations.case_consultation.create');

    Route::get('/show/{caseConsultation}','CaseConsultationsController@show')
         ->name('case_consultations.case_consultation.show')
         ->where('id', '[0-9]+');

    Route::get('/{caseConsultation}/edit','CaseConsultationsController@edit')
         ->name('case_consultations.case_consultation.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'CaseConsultationsController@store')
         ->name('case_consultations.case_consultation.store');
               
    Route::put('case_consultation/{caseConsultation}', 'CaseConsultationsController@update')
         ->name('case_consultations.case_consultation.update')
         ->where('id', '[0-9]+');

    Route::delete('/case_consultation/{caseConsultation}','CaseConsultationsController@destroy')
         ->name('case_consultations.case_consultation.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'case_handlings',
], function () {

    Route::get('/', 'CaseHandlingsController@index')
         ->name('case_handlings.case_handling.index');

    Route::get('/create','CaseHandlingsController@create')
         ->name('case_handlings.case_handling.create');

    Route::get('/show/{caseHandling}','CaseHandlingsController@show')
         ->name('case_handlings.case_handling.show')
         ->where('id', '[0-9]+');

    Route::get('/{caseHandling}/edit','CaseHandlingsController@edit')
         ->name('case_handlings.case_handling.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'CaseHandlingsController@store')
         ->name('case_handlings.case_handling.store');
               
    Route::put('case_handling/{caseHandling}', 'CaseHandlingsController@update')
         ->name('case_handlings.case_handling.update')
         ->where('id', '[0-9]+');

    Route::delete('/case_handling/{caseHandling}','CaseHandlingsController@destroy')
         ->name('case_handlings.case_handling.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'case_classifications',
], function () {

    Route::get('/', 'CaseClassificationsController@index')
         ->name('case_classifications.case_classification.index');

    Route::get('/create','CaseClassificationsController@create')
         ->name('case_classifications.case_classification.create');

    Route::get('/show/{caseClassification}','CaseClassificationsController@show')
         ->name('case_classifications.case_classification.show')
         ->where('id', '[0-9]+');

    Route::get('/{caseClassification}/edit','CaseClassificationsController@edit')
         ->name('case_classifications.case_classification.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'CaseClassificationsController@store')
         ->name('case_classifications.case_classification.store');
               
    Route::put('case_classification/{caseClassification}', 'CaseClassificationsController@update')
         ->name('case_classifications.case_classification.update')
         ->where('id', '[0-9]+');

    Route::delete('/case_classification/{caseClassification}','CaseClassificationsController@destroy')
         ->name('case_classifications.case_classification.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'case_meeting_results',
], function () {

    Route::get('/', 'CaseMeetingResultsController@index')
         ->name('case_meeting_results.case_meeting_result.index');

    Route::get('/create','CaseMeetingResultsController@create')
         ->name('case_meeting_results.case_meeting_result.create');

    Route::get('/show/{caseMeetingResult}','CaseMeetingResultsController@show')
         ->name('case_meeting_results.case_meeting_result.show')
         ->where('id', '[0-9]+');

    Route::get('/{caseMeetingResult}/edit','CaseMeetingResultsController@edit')
         ->name('case_meeting_results.case_meeting_result.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'CaseMeetingResultsController@store')
         ->name('case_meeting_results.case_meeting_result.store');
               
    Route::put('case_meeting_result/{caseMeetingResult}', 'CaseMeetingResultsController@update')
         ->name('case_meeting_results.case_meeting_result.update')
         ->where('id', '[0-9]+');

    Route::delete('/case_meeting_result/{caseMeetingResult}','CaseMeetingResultsController@destroy')
         ->name('case_meeting_results.case_meeting_result.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'case_progresses',
], function () {

    Route::get('/', 'CaseProgressesController@index')
         ->name('case_progresses.case_progress.index');

    Route::get('/create','CaseProgressesController@create')
         ->name('case_progresses.case_progress.create');

    Route::get('/show/{caseProgress}','CaseProgressesController@show')
         ->name('case_progresses.case_progress.show')
         ->where('id', '[0-9]+');

    Route::get('/{caseProgress}/edit','CaseProgressesController@edit')
         ->name('case_progresses.case_progress.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'CaseProgressesController@store')
         ->name('case_progresses.case_progress.store');
               
    Route::put('case_progress/{caseProgress}', 'CaseProgressesController@update')
         ->name('case_progresses.case_progress.update')
         ->where('id', '[0-9]+');

    Route::delete('/case_progress/{caseProgress}','CaseProgressesController@destroy')
         ->name('case_progresses.case_progress.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'case_transfers',
], function () {

    Route::get('/', 'CaseTransfersController@index')
         ->name('case_transfers.case_transfer.index');

    Route::get('/create','CaseTransfersController@create')
         ->name('case_transfers.case_transfer.create');

    Route::get('/show/{caseTransfer}','CaseTransfersController@show')
         ->name('case_transfers.case_transfer.show')
         ->where('id', '[0-9]+');

    Route::get('/{caseTransfer}/edit','CaseTransfersController@edit')
         ->name('case_transfers.case_transfer.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'CaseTransfersController@store')
         ->name('case_transfers.case_transfer.store');
               
    Route::put('case_transfer/{caseTransfer}', 'CaseTransfersController@update')
         ->name('case_transfers.case_transfer.update')
         ->where('id', '[0-9]+');

    Route::delete('/case_transfer/{caseTransfer}','CaseTransfersController@destroy')
         ->name('case_transfers.case_transfer.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'networks',
], function () {

    Route::get('/', 'NetworksController@index')
         ->name('networks.network.index');

    Route::get('/create','NetworksController@create')
         ->name('networks.network.create');

    Route::get('/show/{network}','NetworksController@show')
         ->name('networks.network.show')
         ->where('id', '[0-9]+');

    Route::get('/{network}/edit','NetworksController@edit')
         ->name('networks.network.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'NetworksController@store')
         ->name('networks.network.store');
               
    Route::put('network/{network}', 'NetworksController@update')
         ->name('networks.network.update')
         ->where('id', '[0-9]+');

    Route::delete('/network/{network}','NetworksController@destroy')
         ->name('networks.network.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'case_documents',
], function () {

    Route::get('/', 'CaseDocumentsController@index')
         ->name('case_documents.case_document.index');

    Route::get('/create','CaseDocumentsController@create')
         ->name('case_documents.case_document.create');

    Route::get('/show/{caseDocument}','CaseDocumentsController@show')
         ->name('case_documents.case_document.show')
         ->where('id', '[0-9]+');

    Route::get('/{caseDocument}/edit','CaseDocumentsController@edit')
         ->name('case_documents.case_document.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'CaseDocumentsController@store')
         ->name('case_documents.case_document.store');
               
    Route::put('case_document/{caseDocument}', 'CaseDocumentsController@update')
         ->name('case_documents.case_document.update')
         ->where('id', '[0-9]+');

    Route::delete('/case_document/{caseDocument}','CaseDocumentsController@destroy')
         ->name('case_documents.case_document.destroy')
         ->where('id', '[0-9]+');

});
