<?php

namespace App\Http\Controllers;
use App\species;
use App\voices;
use App\galleries;
use Illuminate\Http\Request;
use App\Providers\SpeciesServiceProvider;


class SpeciesController extends Controller
{
    public $speciesServiceProvider;
    public function __construct()
    {
        $this->speciesServiceProvider = new SpeciesServiceProvider();
    }
    public function create(Request $request){  
    	$result = $this->speciesServiceProvider->createSpecies($request);
        return $this->returnResponse($result);
    }
    public function index() {
        $result = $this->speciesServiceProvider->getSpecies();
        return $this->returnResponse($result);
    }

    public function update(Request $request){
        $result = $this->speciesServiceProvider->updateSpecies($request);
        return $this->returnResponse($result);
    }


    public function delete(Request $request){
        $result = $this->speciesServiceProvider->deleteSpecies($request);
        return $this->returnResponse($result);
    }

    public function speciesById(Request $request){  
        $result = $this->speciesServiceProvider->speciesById($request);
        return response()->json($result);
    }
}
