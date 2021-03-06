<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\species;
use App\gallery;
use Validator;
use Image;
use Session;

class GalleryController extends Controller
{
    public function create($id){  
        $admin = auth()->guard('admin')->user();
        return view('galleries.create')->with(['id'=>$id, 'admin'=>$admin]);
    }

    public function store(Request $request, $id)
    {

		$this->validate($request, [
			// 'imageUrl' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:'env('IMAGE_MAX_SIZE'),
		    'image' => 'required',
		    'image.*' => 'mimes:jpg,png,jpeg'

		]);
		foreach($request->file('image') as $key => $value) {
			if($request->hasFile('image')){
	            $galleries = new gallery();
        		$galleries->species_id = $id;
	            $thumbnail_path = public_path('/images/galleries/');
	            
	            $file_name = 'galleries'.'_'. str_random(8) . '.' . $value->getClientOriginalExtension();
	            Image::make($value)
	                  /*->resize(120,180,function ($constraint) {
	                    $constraint->aspectRatio();
	                     })*/
	                  ->save($thumbnail_path . $file_name);
	            $galleries->imageUrl = url('/').'/images/galleries/'.$file_name;
	        }
	        
	        $galleries->save();
       	}
   		flash('Species gallery imgae added successfully.')->success();
		return redirect('/admin/species/'.$id.'/edit');
    }

    public function delete($id){
        $gallery_details = gallery::find($id);
        $species_details = species::find($gallery_details['species_id']);
        $urlArray = explode('/', $gallery_details['imageUrl']);
        $gallery_path = public_path('/images/galleries/'.$urlArray[count($urlArray)-1]);
        
        if(file_exists($gallery_path)) {
            @unlink($gallery_path);
        }
        gallery::destroy($id);

        flash('Gallery Image deleted successfully.')->success();
        return redirect('/admin/species/'.$species_details->id.'/edit');
    }
}
