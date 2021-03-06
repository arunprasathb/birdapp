<?php

namespace App\Providers;

// use App\Models\Book;
use App\species;
use App\voices;
use App\galleries;
use App\species_comments;
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


    /**
     * retrieve species galleries
     * @return type
     */
    public function speciesById($request){
         try {
            $species_result = species::find($request->species_id);
            $galleries_result = species::join('galleries', 'galleries.species_id', '=', 'species.id')
                ->select('galleries.*')
                ->where('species.id',$request->species_id)
                ->get();
                $galleries = [];
                foreach ($galleries_result as $key => $value) {
                    $galleries[] = $galleries_result[$key]->imageUrl;
                }
            $voices_result = species::join('voices', 'voices.species_id', '=', 'species.id')
                ->select('voices.*')
                ->where('species.id',$request->species_id)
                ->get();

            $comments = species_comments::where('user_id', $request->user_id)
                ->where('species_id', $request->species_id)
                ->get();    
            $result = array_merge(["species" => $species_result],['species' => $species_result]);

            SpeciesServiceProvider::$data['status'] = 200;
            SpeciesServiceProvider::$data['data'] = ['species_details' => $species_result, 'galleries' => $galleries, 'calls' => $voices_result, 'comments'=> $comments];
            SpeciesServiceProvider::$data['message'] = trans('messages.species_voices_gallery_list');
        } catch (Exception $e) {
            $this->logError(__CLASS__,__METHOD__,$e->getMessage());
        }
        return SpeciesServiceProvider::$data;
    }
}