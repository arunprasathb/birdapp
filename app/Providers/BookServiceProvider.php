<?php

namespace App\Providers;

// use App\Models\Book;
use App\books;

/**
 * BookServiceProvider class contains methods for Book management
 */
class BookServiceProvider extends BaseServiceProvider {

    public function __construct()
    {
    }

    /**
     * books list
     * @return type
     */
    public function getBooks() {
        try {
            $books = books::select()->get();
                BookServiceProvider::$data['status'] = 200;
                BookServiceProvider::$data['data'] = ['books' => $books];
                BookServiceProvider::$data['message'] = trans('messages.books_list');
        } catch (\Exception $e) {
            $this->logError(__CLASS__,__METHOD__,$e->getMessage());
        }
        return BookServiceProvider::$data;
    }


    /**
     * update book
     * @return type
     */
    public function updateBook($request) {
        try {
            $isBookUpdated = books::where('id',$request->bookId)->update(['bookName'=>$request->bookName]);
            if($isBookUpdated){
                BookServiceProvider::$data['status'] = 200;
                BookServiceProvider::$data['message'] = trans('messages.book_updated');
            }

        } catch (\Exception $e) {
            $this->logError(__CLASS__,__METHOD__,$e->getMessage());
        }
        return BookServiceProvider::$data;
    }

    /**
     * delete book
     * @return type
     */
    public function deleteBook($request){
        try {
            $isBookUpdated = books::where('id',$request->bookId)->delete();
            if($isBookUpdated){
                BookServiceProvider::$data['status'] = 200;
                BookServiceProvider::$data['message'] = trans('messages.book_deleted');
            }

        } catch (\Exception $e) {
            $this->logError(__CLASS__,__METHOD__,$e->getMessage());
        }
        return BookServiceProvider::$data;
    }

    /**
     * delete book
     * @return type
     */
    public function bookById($request){
         try {
            $book_result = books::find($request->bookId);
            $species_result = books::join('species', 'species.book_id', '=', 'books.id')
                ->select('species.*')
                ->where('books.id',$request->bookId)
                ->get();
            $result = array_merge(["book" => $book_result],['species' => $species_result]);

            BookServiceProvider::$data['status'] = 200;
            BookServiceProvider::$data['data'] = ['bookdetails' => $book_result, 'species' => $species_result];
            BookServiceProvider::$data['message'] = trans('messages.book_species_list');
        } catch (Exception $e) {
            $this->logError(__CLASS__,__METHOD__,$e->getMessage());
        }
        return BookServiceProvider::$data;
    }


}