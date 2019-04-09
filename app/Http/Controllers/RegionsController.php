<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;

class RegionsController extends Controller
{
    public function provinces(){
      $provinces = Province::all();
      return view('region', compact('provinces'));
    }

    public function regencies(){
      $provinces_id = Input::get('province_id');
      $regencies = Regency::where('province_id', '=', $provinces_id)->get();
      return response()->json($regencies);
    }

    public function districts(){
      $regencies_id = Input::get('regencies_id');
      $districts = District::where('regency_id', '=', $regencies_id)->get();
      return response()->json($districts);
    }

}
