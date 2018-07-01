<?php

namespace App\Http\Controllers;
// use App\Http\Requests\DeleteBookRequest;
// use App\Http\Requests\UpdateBookRequest;
use App\Providers\BookServiceProvider;
use App\books;
use App\species;
use Illuminate\Http\Request;

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
    }
 
    public function update(Request $request){
        $result = $this->bookServiceProvider->updateBook($request);
        return $this->returnResponse($result);
    }
 
    public function delete(Request $request){
        $result = $this->bookServiceProvider->deleteBook($request);
        return $this->returnResponse($result);
    }

    public function bookById(Request $request){
        $result = $this->bookServiceProvider->bookById($request);
        return $this->returnResponse($result);
    }
}
