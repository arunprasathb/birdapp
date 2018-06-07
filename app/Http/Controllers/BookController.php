<?php

namespace App\Http\Controllers;
// use App\Http\Requests\DeleteBookRequest;
// use App\Http\Requests\UpdateBookRequest;
use App\Providers\BookServiceProvider;
use App\books;
// use Illuminate\Http\Request;

class BookController extends BaseApiController
{
   	public $bookServiceProvider;
    public function __construct()
    {
        $this->bookServiceProvider = new BookServiceProvider();
    }
 
    public function index() {
        $result = $this->bookServiceProvider->getBooks();
        return $this->returnResponse($result);
        // try {
        //     $books = books::select('id','bookName','price')->get();
        //         $data['status'] = 1;
        //         $data['data'] = ['books' => $books];
        //         $data['message'] = 'messages.books_list';
        // } catch (\Exception $e) {
        //     $this->logError(__CLASS__,__METHOD__,$e->getMessage());
        // }
        // return response($data);
    }
 
    // public function update(UpdateBookRequest $request){
    //     $result = $this->bookServiceProvider->updateBook($request);
    //     return $this->returnResponse($result);
    // }
 
 
    // public function delete(DeleteBookRequest $request){
    //     $result = $this->bookServiceProvider->deleteBook($request);
    //     return $this->returnResponse($result);
    // }
}
