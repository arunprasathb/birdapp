<?php

namespace App\Http\Controllers;
use App\species;
use App\books;
use App\voice;
use App\gallery;
use App\species_comments;
use Illuminate\Http\Request;
use App\Providers\SpeciesServiceProvider;
use Validator;
use Image;
use Session;


class SpeciesController extends Controller
{
    public $speciesServiceProvider;
    public function __construct()
    {
        $this->speciesServiceProvider = new SpeciesServiceProvider();
    }
    public function create($id){  
        return view('species.create', compact('id'));
    }

     /**
     * Update the specified book in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $book_id)
    {
        $this->validate($request, [
            'speciesName' => 'required',
            'imageUrl' => 'image|mimes:jpeg,png,jpg|max:10240',
            'map' => 'image|mimes:jpeg,png,jpg|max:10240',
            // 'shortDescription' => 'required|min:10',
            'description' => 'min:10'
        ]);
        $species_details = species::where('book_id', $book_id)
        ->where('speciesName', $request->input('speciesName'))
        ->get();
        if(count($species_details) > 0){
            flash('Species name already exist.')->error();
            return redirect('/admin/books/'.$book_id.'/edit');
          }else{
            $species = new species();
            $species->book_id = $book_id;
            $species->speciesName = $request->input('speciesName');
            // $species->shortDescription = "";
            $species->description = $request->input('description');
            if($request->hasFile('imageUrl')){
                $file = $request->file('imageUrl');
                /* $validator = Validator::make($request->all(), [
                    'imageUrl' => 'image|mimes:jpeg,png,jpg|max:'.env('IMAGE_MAX_SIZE'),
                ]);
                if ($validator->fails()) {
                   return response(array(
                    'message' => 'parameters missing',
                    'missing_parameters' =>  $validator->errors()
                ), 400);
                }*/
                $thumbnail_path = public_path('/images/species/');
                
                $file_name = 'species'.'_'. str_random(8) . '.' . $file->getClientOriginalExtension();
                Image::make($file)
                      // ->resize(120,180,function ($constraint) {
                      //   $constraint->aspectRatio();
                      //    })
                      ->save($thumbnail_path . $file_name);
                $species->imageUrl = url('/').'/images/species/'.$file_name;
            }
            if($request->hasFile('map')){
                $file = $request->file('map');
                 /*$validator = Validator::make($request->all(), [
                    'map' => 'image|mimes:jpeg,png,jpg|max:'.env('IMAGE_MAX_SIZE'),
                ]);
                if ($validator->fails()) {
                   return response(array(
                    'message' => 'parameters missing',
                    'missing_parameters' =>  $validator->errors()
                ), 400);
                }*/
                $thumbnail_path = public_path('/images/species/map/');
                
                $file_name = 'species'.'_'. str_random(8) . '.' . $file->getClientOriginalExtension();
                Image::make($file)
                      // ->resize(120,180,function ($constraint) {
                      //   $constraint->aspectRatio();
                      //    })
                      ->save($thumbnail_path . $file_name);
                $species->map = url('/').'/images/species/map/'.$file_name;
            }

            $species->save();
            flash('Species added successfully.')->success();
            return redirect('/admin/books/'.$book_id.'/edit');
        }
    }

    public function index() {
        $result = $this->speciesServiceProvider->getSpecies();
        return $this->returnResponse($result);
    }

    /*public function update(Request $request){
        $result = $this->speciesServiceProvider->updateSpecies($request);
        return $this->returnResponse($result);
    }*/


    public function delete($id){

        $species_details = species::find($id);
        $book_details = books::find($species_details['book_id']);
        $voice_list = voice::where('species_id', $id)->get(); 
        if($voice_list){
            foreach ($voice_list as $key => $voice) {
                $voiceUrlArray = explode('/', $voice['mediaUrl']); 
                $voise_path = public_path('/media/'.$voiceUrlArray[count($voiceUrlArray)-1]);
                if(file_exists($voise_path)) {
                    @unlink($voise_path);
                }
            }
        }
        
        $gallery_list = gallery::where('species_id', $id)->get();
        if($gallery_list){
            foreach ($gallery_list as $key => $gallery) {
                $galleryUrlArray = explode('/', $gallery['imageUrl']);
                $gallery_path = public_path('/images/galleries/'.$galleryUrlArray[count($galleryUrlArray)-1]);
                if(file_exists($gallery_path)) {
                    @unlink($gallery_path);
                }
            }
        }
        if(isset($species_details['imageUrl'])){
            $speciesUrlArray = explode('/', $species_details['imageUrl']);
            $species_image_path = public_path('/images/species/'.$speciesUrlArray[count($speciesUrlArray)-1]);
            if(file_exists($species_image_path)) {
                @unlink($gallery_path);
            }   
        }
        if(isset($species_details['map'])){
              $speciesMapUrlArray = explode('/', $species_details['map']);
              $species_map_path = public_path('/images/species/map/'.$speciesMapUrlArray[count($speciesMapUrlArray)-1]);
              if(file_exists($species_map_path)) {
                  @unlink($species_map_path);
              }   
          }
                 
        gallery::where('species_id', $id)->delete();
        voice::where('species_id', $id)->delete();
        species::destroy($id);
        flash('Species deleted successfully.')->success();
        return redirect('/admin/books/'.$book_details->id.'/edit');
    }

    public function speciesById(Request $request){  
        $result = $this->speciesServiceProvider->speciesById($request);
        return response()->json($result);
    }
    public function show_species($id){
        $admin = auth()->guard('admin')->user();
        $species_details = species::find($id);
        $book_details = books::find($species_details['book_id']);
        $galleries_list = species::join('galleries', 'galleries.species_id', '=', 'species.id')
                ->select('galleries.*')
                ->where('species.id',$id)
                ->get();
                $galleries = [];
                foreach ($galleries_list as $key => $value) {
                    $galleries[$key]['imageUrl'] = $galleries_list[$key]->imageUrl;
                    $galleries[$key]['id'] = $galleries_list[$key]->id;
                }

        $voices_list = species::join('voices', 'voices.species_id', '=', 'species.id')
                ->select('voices.*')
                ->where('species.id',$id)
                ->get();
        return view('species.view_species')->with(['species_details'=>$species_details, 'galleries_list'=> $galleries, 'voices_list'=> $voices_list, 'book_details' => $book_details, 'admin'=>$admin]);
    }

     /**
     * Edit the specified book.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $admin = auth()->guard('admin')->user();
        $species_details = species::find($id);
        $book_details = books::find($species_details['book_id']);
        $galleries_list = species::join('galleries', 'galleries.species_id', '=', 'species.id')
                ->select('galleries.*')
                ->where('species.id',$id)
                ->get();
                $galleries = [];
                foreach ($galleries_list as $key => $value) {
                    $galleries[$key]['imageUrl'] = $galleries_list[$key]->imageUrl;
                    $galleries[$key]['id'] = $galleries_list[$key]->id;
                }

        $voices_list = species::join('voices', 'voices.species_id', '=', 'species.id')
                ->select('voices.*')
                ->where('species.id',$id)
                ->get();
        // return view('species.edit', compact('species', 'id'));
          return view('species.edit')->with(['species_details'=>$species_details, 'galleries_list'=> $galleries, 'voices_list'=> $voices_list, 'book_details' => $book_details, 'id', 'admin'=>$admin]);
    }

     /**
     * Update the specified book in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'speciesName' => 'required',
            'imageUrl_new' => 'image|mimes:jpeg,png,jpg|max:10240',
            'map_new' => 'image|mimes:jpeg,png,jpg|max:10240',
            // 'shortDescription' => 'required|min:10',
            'description' => 'min:10'
        ]);

        $species = species::find($id);
        $book_id = $species->book_id;

        $species_details = species::where('book_id', $book_id)
        ->where('speciesName', $request->input('speciesName'))
        ->where('id','!=', $id)
        ->get(); 
        if(count($species_details) > 0){
            flash('Species name already exist.')->error();
            return redirect('/admin/books/'.$book_id.'/edit');
          }else{

              $species->speciesName = $request->input('speciesName');
              // $species->shortDescription = "";
              $species->description = $request->input('description');
              if($request->hasFile('imageUrl_new')){
                  $file = $request->file('imageUrl_new');
                   /*$validator = Validator::make($request->all(), [
                      'imageUrl_new' => 'image|mimes:jpeg,png,jpg|max:'.env('IMAGE_MAX_SIZE'),
                  ]);
                  if ($validator->fails()) {
                     return response(array(
                      'message' => 'parameters missing',
                      'missing_parameters' =>  $validator->errors()
                  ), 400);
                  }*/
                  $thumbnail_path = public_path('/images/species/');
                  
                  $file_name = 'species'.'_'. str_random(8) . '.' . $file->getClientOriginalExtension();
                  Image::make($file)
                        // ->resize(120,180,function ($constraint) {
                        //   $constraint->aspectRatio();
                        //    })
                        ->save($thumbnail_path . $file_name);
                  $species->imageUrl = url('/').'/images/species/'.$file_name;
              }
              if($request->hasFile('map_new')){
                  $file = $request->file('map_new');
                   $validator = Validator::make($request->all(), [
                      'map_new' => 'image|mimes:jpeg,png,jpg|max:10240',
                  ]);
                  if ($validator->fails()) {
                     return response(array(
                      'message' => 'parameters missing',
                      'missing_parameters' =>  $validator->errors()
                  ), 400);
                  }
                  $thumbnail_path = public_path('/images/species/map/');
                  
                  $file_name = 'species'.'_'. str_random(8) . '.' . $file->getClientOriginalExtension();
                  Image::make($file)
                        // ->resize(120,180,function ($constraint) {
                        //   $constraint->aspectRatio();
                        //    })
                        ->save($thumbnail_path . $file_name);
                  $species->map = url('/').'/images/species/map/'.$file_name;
              }
              $species->save();
          }
          flash('Species has been updated!!')->success();
        return redirect('/admin/species/'.$id.'/edit');
    }

    /**
     * Species under comments image upload
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function commentImageUpload(Request $request)
    {
        $this->validate($request, [
            'image' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:10240'
        ]);

        try {
          if($request->hasFile('image')){
              $file = $request->file('image');
            
              $thumbnail_path = public_path('/images/species/comments//');
              
              $file_name = 'comments'.'_'. str_random(8) . '.' . $file->getClientOriginalExtension();
              Image::make($file)
                    ->save($thumbnail_path . $file_name);
              $imageUrl = url('/').'/images/species/comments/'.$file_name;
          }

          $data['status'] = 200;
          $data['message'] = trans('messages.image_upload_success');

          $data['data'] = ['image' => $imageUrl];
        } catch (Exception $e) {
            $this->logError(__CLASS__,__METHOD__,$e->getMessage());
        }
         return response($data);
    }

     /**
     * Species under comments add option
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function comments(Request $request)
    {
        try {

            $species_comments = new species_comments();
            $species_comments->species_id = $request['species_id'];
            $species_comments->user_id = $request['user_id'];
            $species_comments->image = $request['image'];
            $species_comments->comment = $request['comment'];
            $species_comments->save();

            $data['status'] = 200;
            $data['data'] = ['comments_details' => $species_comments];
            $data['message'] = trans('messages.comment_success');
        } catch (Exception $e) {
            $this->logError(__CLASS__,__METHOD__,$e->getMessage());
        }
         return response($data);
    }

}
