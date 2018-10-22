<?php

namespace App\Http\Controllers;
use App\Providers\BookServiceProvider;
use App\books;
use App\species;
use App\gallery;
use App\voice;
use App\book_payment;
use Illuminate\Http\Request;
use Validator;


class BookPaymentController extends Controller
{

	protected $book_payment;
    public function __construct()
    {
        $this->book_payment = new book_payment();
    }
     /**
     * Get paid book details
     * @return type
     */
    public function getBookFullDetails(Request $request){
    	$this->validate($request, [
            'user_id' => 'required',
            'book_id' => 'required'
        ]);
         try {
            $userbook = book_payment::where('bookId', $request['book_id'])->where('user_id', $request['user_id'])->get();
            $book_result = books::find($request->book_id);
            $result = [];
            if(count($userbook) > 0){
            	$book_result['download_count'] = $userbook[0]['download_count'];
            	$book_result['payment_status'] = $userbook[0]['payment_status'];
        	 }else{
        	 	$book_result['download_count'] = 0;
        		$book_result['payment_status'] = 0;
        	 }
            $species_result = books::join('species', 'species.book_id', '=', 'books.id')
                ->select('species.*')
                ->where('books.id',$request->book_id)
                ->get();
            
            foreach ($species_result as $key => $value) {
            	$species_details[] = $species_result[$key];
            	$galleries_result = species::join('galleries', 'galleries.species_id', '=', 'species.id')
	                ->select('galleries.*')
	                ->where('species.id',$species_result[$key]->id)
	                ->get();

	                $galleries = [];
	                foreach ($galleries_result as $key1 => $value1) {
	                    $galleries[] = $galleries_result[$key1]->imageUrl;
	                }

	            $voices_result = species::join('voices', 'voices.species_id', '=', 'species.id')
	                ->select('voices.*')
	                ->where('species.id',$species_result[$key]->id)
	                ->get();
	                
	            $voices['calls'] = [];
                foreach ($voices_result as $key2 => $value2) {
                    $voices[] = $voices_result[$key2]->mediaUrl;
                }
                $species_details[$key]['galleries'] = $galleries_result;
                $species_details[$key]['calls'] = $voices_result;
            }
            $result = array_merge(["book" => $book_result],['species' => $species_details]);
            BookServiceProvider::$data['status'] = 200;
            BookServiceProvider::$data['data'] = $result;
            BookServiceProvider::$data['message'] = trans('messages.book_full_details');
        } catch (Exception $e) {
            $this->logError(__CLASS__,__METHOD__,$e->getMessage());
        }
        return BookServiceProvider::$data;
    }
}
