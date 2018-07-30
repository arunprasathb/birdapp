<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\books;
use App\species;
use App\voices;
use App\Models\User;
use DB;
class AdminController extends Controller
{
   
    public function dashboard(){
        $user = auth()->guard('admin')->user();
        $books = books::select()->get();
        $users = User::select()->get();
        // $new_users = DB::table('users')->whereDate('created_at', DB::raw('CURDATE()'));
        // dd($new_users->toSql(), $new_users->getBindings());
        $dashboard_details['users_count'] =  count($users);
        $dashboard_details['books_count'] =  count($books);
        return view('admin.dashboard',array('dashboard_details' => $dashboard_details));
    }
    public function users(){
        $user = auth()->guard('admin')->user();
        $users = User::select()->get();
        return view('admin.users_list')->with(['users'=>$users]);
    }
    public function show_user($id){
        $user = auth()->guard('admin')->user();
        $user_details = User::where('id', $id)->firstOrFail();
        return view('admin.view_user')->with(['user_details'=>$user_details]);
    }
    public function books(){
        $user = auth()->guard('admin')->user();
        $books = books::select()->get();
        return view('admin.books_list')->with(['books'=>$books]);
    }
    public function show_book($id){
        $user = auth()->guard('admin')->user();
        $book_details = books::find($id);
        $book_species = books::join('species', 'species.book_id', '=', 'books.id')
                ->select('species.*')
                ->where('books.id',$id)
                ->get();
        $book_details = books::where('id', $id)->firstOrFail();
        return view('admin.view_book')->with(['book_details'=>$book_details, 'book_species'=> $book_species]);
    }

    public function show_species($id){
        $user = auth()->guard('admin')->user();
        $species_details = species::find($id);
        $book_details = books::find($species_details['id']);
        $galleries_list = species::join('galleries', 'galleries.species_id', '=', 'species.id')
                ->select('galleries.*')
                ->where('species.id',$id)
                ->get();
                $galleries = [];
                foreach ($galleries_list as $key => $value) {
                    $galleries[]['imageUrl'] = $galleries_list[$key]->imageUrl;
                }
        $voices_list = species::join('voices', 'voices.species_id', '=', 'species.id')
                ->select('voices.*')
                ->where('species.id',$id)
                ->get();
        $book_details = books::where('id', $id)->firstOrFail();
        return view('admin.view_species')->with(['species_details'=>$species_details, 'galleries_list'=> $galleries, 'voices_list'=> $voices_list, 'book_details' => $book_details]);
    }
}  