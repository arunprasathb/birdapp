<?php

namespace App\Providers;

// use App\Models\Book;
use App\species;

/**
 * SpeciesServiceProvider class contains methods for Book management
 */
class SpeciesServiceProvider extends BaseServiceProvider {

    public function __construct()
    {
    }

    /**
     * species list
     * @return type
     */
    public function getSpecies() {
        try {
            $species = species::select()->get();
                SpeciesServiceProvider::$data['status'] = 200;
                SpeciesServiceProvider::$data['data'] = ['species' => $species];
                SpeciesServiceProvider::$data['message'] = trans('messages.species_list');
        } catch (\Exception $e) {
            $this->logError(__CLASS__,__METHOD__,$e->getMessage());
        }
        return SpeciesServiceProvider::$data;
    }


    /**
     * update species
     * @return type
     */
    public function updateSpecies($request) {
        try {
            $isBookUpdated = species::where('id',$request->speciesId)->update(['speciesName'=>$request->speciesName]);
            if($isBookUpdated){
                SpeciesServiceProvider::$data['status'] = 200;
                SpeciesServiceProvider::$data['message'] = trans('messages.species_updated');
            }

        } catch (\Exception $e) {
            $this->logError(__CLASS__,__METHOD__,$e->getMessage());
        }
        return SpeciesServiceProvider::$data;
    }

    /**
     * delete species
     * @return type
     */
    public function deleteSpecies($request){
        try {
            $isBookUpdated = books::where('id',$request->bookId)->delete();
            if($isBookUpdated){
                SpeciesServiceProvider::$data['status'] = 200;
                SpeciesServiceProvider::$data['message'] = trans('messages.species_deleted');
            }

        } catch (\Exception $e) {
            $this->logError(__CLASS__,__METHOD__,$e->getMessage());
        }
        return SpeciesServiceProvider::$data;
    }


}