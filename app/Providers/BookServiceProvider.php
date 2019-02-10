<?php

namespace App\Providers;
use App\books;
use App\book_payment;

/**
 * BookServiceProvider class contains methods for Book management
 */
class BookServiceProvider extends BaseServiceProvider {

    protected $book_payment;
    public function __construct()
    {
        $this->book_payment = new book_payment();
    }

    /**
     * books list
     * @return type
     */
    public function getBooks($request) {
        try {
            $books = books::select()->orderBy('bookName', 'asc')->get();
            foreach ($books as $key => $value) {
                $userbook = book_payment::where('bookId', $value->id)->where('user_id', $request->user_id)->get();
                if(count($userbook) > 0){
                    $value['download_count'] = $userbook[0]['download_count'];
                    $value['payment_status'] = $userbook[0]['payment_status'];
                }else{
                    $value['download_count'] = 0;
                    $value['payment_status'] = 0;
                }
            }
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
            $book_result = books::find($request->book_id);
            $userbook = book_payment::where('bookId', $request->book_id)->where('user_id', $request->user_id)->get();
            if(count($userbook) > 0){ 
                $species_result = books::join('species', 'species.book_id', '=', 'books.id')
                ->select('species.*')
                ->where('books.id',$request->book_id)
                ->orderBy('species.speciesName', 'asc')
                ->get();
            }else{
                $species_result = books::join('species', 'species.book_id', '=', 'books.id')
                ->select('species.*')
                ->where('books.id',$request->book_id)
                ->orderBy('species.speciesName', 'asc')
                ->limit(5)
                ->get();
            }
            
            $result = array_merge(["book" => $book_result],['species' => $species_result]);

            BookServiceProvider::$data['status'] = 200;
            BookServiceProvider::$data['data'] = ['bookdetails' => $book_result, 'species' => $species_result];
            BookServiceProvider::$data['message'] = trans('messages.book_species_list');
        } catch (Exception $e) {
            $this->logError(__CLASS__,__METHOD__,$e->getMessage());
        }
        return BookServiceProvider::$data;
    }

    /**
     * Payment book
     * @return type
     */
    public function payment($data){
         try {
            $userbook = book_payment::where('bookId', $data['book_id'])->where('user_id', $data['user_id'])->get();
            $bookPayment = new book_payment();
            $bookPayment->bookId = $data['book_id'];
            $bookPayment->user_id = $data['user_id'];
            $bookPayment->payment_status = $data['payment_status'];
            $bookPayment->transaction_id = $data['transaction_id'];
            if(count($userbook) > 0){
                if($userbook[0]['download_count'] != 3){
                    if($userbook[0]['amount'] != ""){
                        $bookPayment->amount = $userbook[0]['amount']+$data['amount'];    
                    }
                    if($userbook[0]['download_count'] == 1){ 
                        $bookPayment->download_count = 2;    
                    }else if($userbook[0]['download_count'] == 2){
                        $bookPayment->download_count = 3;    
                    }
                }else{
                    $bookPayment->amount = $userbook[0]['amount'];
                    $bookPayment->download_count = 3;
                }
                $bookPaymentupdate = book_payment::where('id',$userbook[0]['id'])->update(['download_count'=>$bookPayment->download_count, 'amount'=>$bookPayment->amount]);
            }else{
                $bookPayment->amount = $data['amount'];
                $bookPayment->download_count = $data['download_count'];
                $bookPayment->save();
            }
            BookServiceProvider::$data['status'] = 200;
            BookServiceProvider::$data['data'] = $bookPayment;
            BookServiceProvider::$data['message'] = trans('messages.payment_success');
        } catch (Exception $e) {
            $this->logError(__CLASS__,__METHOD__,$e->getMessage());
        }
        return BookServiceProvider::$data;
    }


}