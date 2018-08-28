<?php

namespace App\Http\Controllers;
use App\Providers\BookServiceProvider;
use App\books;
use App\species;
use App\gallery;
use App\voice;
use Illuminate\Http\Request;
use Validator;
use Image;

class BookController extends BaseApiController
{
   	public $bookServiceProvider;
    public function __construct()
    {
        $this->bookServiceProvider = new BookServiceProvider();
    }
 
    public function index() {
        $user = auth()->guard('admin')->user();
        $books = books::select()->get();
        return view('books.index')->with(['books'=>$books]);
    }
    public function bookList() {
       $result = $this->bookServiceProvider->getBooks();
       return $this->returnResponse($result);
    }
    public function show_book($id){
        $user = auth()->guard('admin')->user();
        $book_details = books::find($id);
        $book_species = books::join('species', 'species.book_id', '=', 'books.id')
                ->select('species.*')
                ->where('books.id',$id)
                ->get();
        $book_details = books::where('id', $id)->firstOrFail();
        return view('books.view_book')->with(['book_details'=>$book_details, 'book_species'=> $book_species]);
    }
    
    public function delete($id){
        
        $book_details = books::find($id);
        $species_list = species::where('book_id', $id)->get();

        foreach ($species_list as $key => $species) {
         
          $species_details = species::find($species['id']);
          
          $voice_list = voice::where('species_id', $species['id'])->get(); 
          if($voice_list){
              foreach ($voice_list as $key => $voice) {
                  $voiceUrlArray = explode('/', $voice['mediaUrl']); 
                  $voise_path = public_path('/media/'.$voiceUrlArray[count($voiceUrlArray)-1]);
                  if(file_exists($voise_path)) {
                      @unlink($voise_path);
                  }
              }
          }
          
          $gallery_list = gallery::where('species_id', $species['id'])->get();
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
          gallery::where('species_id', $species['id'])->delete();
          voice::where('species_id', $species['id'])->delete();
        }
        if(isset($book_details['imageUrl'])){
              $bookUrlArray = explode('/', $book_details['imageUrl']);
              $book_image_path = public_path('/images/books/'.$bookUrlArray[count($bookUrlArray)-1]);
              if(file_exists($book_image_path)) {
                  @unlink($book_image_path);
              }   
          }
        if(isset($book_details['map'])){
              $bookMapUrlArray = explode('/', $book_details['map']);
              $book_map_path = public_path('/images/books/map/'.$bookMapUrlArray[count($bookMapUrlArray)-1]);
              if(file_exists($book_map_path)) {
                  @unlink($book_map_path);
              }   
          }
        if(isset($book_details['paidPdfUrl'])){
              $bookPaidPdfUrlArray = explode('/', $book_details['paidPdfUrl']);
              $book_paid_pdf_url_path = public_path('/images/books/files/'.$bookPaidPdfUrlArray[count($bookPaidPdfUrlArray)-1]);
              if(file_exists($book_paid_pdf_url_path)) {
                  @unlink($book_paid_pdf_url_path);
              }   
          }
        if(isset($book_details['unpaidPdfUrl'])){
              $bookUnPaidPdfUrlArray = explode('/', $book_details['unpaidPdfUrl']);
              $book_unpaid_pdf_url_path = public_path('/images/books/files/'.$bookUnPaidPdfUrlArray[count($bookUnPaidPdfUrlArray)-1]);
              if(file_exists($book_unpaid_pdf_url_path)) {
                  @unlink($book_unpaid_pdf_url_path);
              }   
          }

        species::where('book_id', $id)->delete();
        books::destroy($id);
        flash('Book deleted successfully.')->success();
        return redirect('/admin/books/');
    }

    public function bookById(Request $request){
        $result = $this->bookServiceProvider->bookById($request);
        return $this->returnResponse($result);
    }
    public function create(Request $request){
        return view('books.create');
    }
    public function store(Request $request){
        $this->validate($request, [
            'bookName' => 'required|min:2|unique:books,bookName',
            'shortDescription' => 'required|min:10',
            'price' => 'required',
            'imageUrl' => 'image|mimes:jpeg,png,jpg|max:1024',
            'map' => 'image|mimes:jpeg,png,jpg|max:1024',
            'paidPdfUrl' => 'mimes:pdf,jpeg,png,jpg|max:1024',
            'unpaidPdfUrl' => 'mimes:pdf,jpeg,png,jpg|max:1024'
        ]);

        $books = new books();
        $books->bookName = $request->input('bookName');
        $books->shortDescription = $request->input('shortDescription');
        $books->description = $request->input('description');
        $books->price = $request->input('price');
        $books->author = $request->input('author');

        if($request->hasFile('imageUrl')){
            $file = $request->file('imageUrl');
            /* $validator = Validator::make($request->all(), [
                'imageUrl' => 'image|mimes:jpeg,png,jpg|max:1024',
            ]);
            if ($validator->fails()) {
               return response(array(
                'message' => 'parameters missing',
                'missing_parameters' =>  $validator->errors()
            ), 400);
            }*/
            /*min:4*/
            $thumbnail_path = public_path('/images/books/');
            
            $file_name = 'book'.'_'. str_random(8) . '.' . $file->getClientOriginalExtension();
            Image::make($file)
                  ->resize(120,180,function ($constraint) {
                    $constraint->aspectRatio();
                     })
                  ->save($thumbnail_path . $file_name);
            $books->imageUrl = url('/').'/images/books/'.$file_name;
        }
        if($request->hasFile('map')){
            $file = $request->file('map');
             /*$validator = Validator::make($request->all(), [
                'map' => 'image|mimes:jpeg,png,jpg|max:1024',
            ]);
            if ($validator->fails()) {
               return response(array(
                'message' => 'parameters missing',
                'missing_parameters' =>  $validator->errors()
            ), 400);
            }*/
            $thumbnail_path = public_path('/images/books/map/');
            
            $file_name = 'book'.'_'. str_random(8) . '.' . $file->getClientOriginalExtension();
            Image::make($file)
                  ->resize(120,180,function ($constraint) {
                    $constraint->aspectRatio();
                     })
                  ->save($thumbnail_path . $file_name);
            $books->map = url('/').'/images/books/map/'.$file_name;
        }
        if($request->hasFile('paidPdfUrl')){
            $file = $request->file('paidPdfUrl');
            /*$validator = Validator::make($request->all(), [
                'paidPdfUrl' => 'mimes:pdf,jpeg,png,jpg|max:1024',
            ]);
            if ($validator->fails()) {
               return response(array(
                'message' => 'parameters missing',
                'missing_parameters' =>  $validator->errors()
            ), 400);
            }*/
            $thumbnail_path = public_path('/images/books/files/');
            
            $file_name = 'book'.'_'. str_random(8) . '.' . $file->getClientOriginalExtension();

            if ($file->move($thumbnail_path,  $file_name)) {
                $books->paidPdfUrl = url('/').'/images/books/files/'.$file_name;
            }

        }
        if($request->hasFile('unpaidPdfUrl')){
            $file = $request->file('unpaidPdfUrl');
            /*$validator = Validator::make($request->all(), [
                'unpaidPdfUrl' => 'mimes:pdf,jpeg,png,jpg|max:1024',
            ]);
            if ($validator->fails()) {
               return response(array(
                'message' => 'parameters missing',
                'missing_parameters' =>  $validator->errors()
            ), 400);
            }*/
            $thumbnail_path = public_path('/images/books/files/');
            
            $file_name = 'book'.'_'. str_random(8) . '.' . $file->getClientOriginalExtension();
            if ($file->move($thumbnail_path,  $file_name)) {
                $books->unpaidPdfUrl = url('/').'/images/books/files/'.$file_name;
            }
        }
        $books->save();
        flash('New book has been created successfully.')->success();
        return redirect('/admin/books');
    }
    /**
     * Edit the specified book.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $book = books::where('id', $id)
                        ->first();
        return view('books.edit', compact('book', 'id'));
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
            'bookName' => 'required|min:2|unique:books,bookName,'.$id,
            'shortDescription' => 'required|min:10',
            'price' => 'required',
            'imageUrl' => 'image|mimes:jpeg,png,jpg|max:1024',
            'map' => 'image|mimes:jpeg,png,jpg|max:1024',
            'paidPdfUrl' => 'mimes:pdf,jpeg,png,jpg|max:1024',
            'unpaidPdfUrl' => 'mimes:pdf,jpeg,png,jpg|max:1024'
        ]);

        $books = books::find($id);
        $books->bookName = $request->input('bookName');
        $books->shortDescription = $request->input('shortDescription');
        $books->description = $request->input('description');
        $books->price = $request->input('price');
        $books->author = $request->input('author');
        
        if($request->hasFile('imageUrl_new')){
            $file = $request->file('imageUrl_new');
            /* $validator = Validator::make($request->all(), [
                'imageUrl_new' => 'image|mimes:jpeg,png,jpg|max:1024',
            ]);
            if ($validator->fails()) {
               return response(array(
                'message' => 'parameters missing',
                'missing_parameters' =>  $validator->errors()
            ), 400);
            }*/
            $this->validate($request, [
                 'imageUrl_new' => 'image|mimes:jpeg,png,jpg|max:1024'
            ]);
            $thumbnail_path = public_path('/images/books/');
            
            $file_name = 'book'.'_'. str_random(8) . '.' . $file->getClientOriginalExtension();
            Image::make($file)
                  ->resize(120,180,function ($constraint) {
                    $constraint->aspectRatio();
                     })
                  ->save($thumbnail_path . $file_name);
            $books->imageUrl = url('/').'/images/books/'.$file_name;
        }
        if($request->hasFile('map_new')){
            $file = $request->file('map_new');
             $validator = Validator::make($request->all(), [
                'map_new' => 'image|mimes:jpeg,png,jpg|max:1024',
            ]);
            if ($validator->fails()) {
               return response(array(
                'message' => 'parameters missing',
                'missing_parameters' =>  $validator->errors()
            ), 400);
            }
            $thumbnail_path = public_path('/images/books/map/');
            
            $file_name = 'book'.'_'. str_random(8) . '.' . $file->getClientOriginalExtension();
            Image::make($file)
                  ->resize(120,180,function ($constraint) {
                    $constraint->aspectRatio();
                     })
                  ->save($thumbnail_path . $file_name);
            $books->map = url('/').'/images/books/map/'.$file_name;
        }
        if($request->hasFile('paidPdfUrl_new')){
            $file = $request->file('paidPdfUrl_new');
            $thumbnail_path = public_path('/images/books/files/');
            
            $file_name = 'book'.'_'. str_random(8) . '.' . $file->getClientOriginalExtension();
            Image::make($file)
                  ->resize(120,180,function ($constraint) {
                    $constraint->aspectRatio();
                     })
                  ->save($thumbnail_path . $file_name);
            $books->paidPdfUrl = url('/').'/images/books/files/'.$file_name;
        }
        if($request->hasFile('unpaidPdfUrl_new')){
            $file = $request->file('unpaidPdfUrl_new');
            
            $thumbnail_path = public_path('/images/books/files/');
            
            $file_name = 'book'.'_'. str_random(8) . '.' . $file->getClientOriginalExtension();
            Image::make($file)
                  ->resize(120,180,function ($constraint) {
                    $constraint->aspectRatio();
                     })
                  ->save($thumbnail_path . $file_name);
            $books->unpaidPdfUrl = url('/').'/images/books/files/'.$file_name;
        }
        
        $books->save();
        flash('Book has been updated!!.')->success();
        return redirect('/admin/books');
    }

}
