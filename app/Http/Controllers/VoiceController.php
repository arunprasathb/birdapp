<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\species;
use App\voice;
use Validator;
use Image;
use Session;

class VoiceController extends Controller
{
    
    public function create($id){  
        $admin = auth()->guard('admin')->user();
        return view('voices.create')->with(['id'=>$id, 'admin'=>$admin]);
    }

    public function store(Request $request, $id)
    {

		$this->validate($request, [
			'audio-name' => 'required',
		    'audio' => 'required',
		    'audio.*' => 'mimes:mp3,ogg,mpga'

		]);
		foreach($request->file('audio') as $key => $value) {
			if($request->hasFile('audio')){
	            $voices = new voice();
        		$voices->species_id = $id;
	            $thumbnail_path = public_path('/media/');
	            
	            $file_name = 'voices'.'_'. str_random(8) . '.' . $value->getClientOriginalExtension();

	            if ($value->move($thumbnail_path,  $file_name)) {
	           		$voices->mediaUrl = url('/').'/media/'.$file_name;
	           		if(isset($request->input('audio-name')[$key])){
	           			$voices->name = $request->input('audio-name')[$key];
	           		}
			        $voices->save();
		        }

	        }
	        
	        
       	}
   		flash('Species voice audio added successfully.')->success();
		return redirect('/admin/species/'.$id.'/edit');
    }

    public function delete($id){
        $voice_details = voice::find($id);
        $species_details = species::find($voice_details['species_id']);
        $urlArray = explode('/', $voice_details['mediaUrl']);
        $voise_path = public_path('/media/'.$urlArray[count($urlArray)-1]);
        
        if(file_exists($voise_path)) {
            @unlink($voise_path);
        }
        voice::destroy($id);

        flash('Voice deleted successfully.')->success();
        return redirect('/admin/species/'.$species_details->id.'/edit');
    }
}
