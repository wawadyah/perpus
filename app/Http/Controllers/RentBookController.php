<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\RentLog;

class RentBookController extends Controller
{
    public function index(){
        $user = User::where('role_id', '!=', '1')->where('status', '!=', 'inactive')->get();
        $books = Book::all();
        $rentlog = RentLog::all();
        return view('rent.rent-book', ['user' => $user, 'book' => $books], ['rent' => $rentlog]);
    }

    public function submit(Request $request){
        $request['rent_date'] = Carbon::now()->toDateString();
        $request['return_date'] = Carbon::now()->addDay(3)->toDateString();

        // $rentDate = Carbon::now()->toDateString();
        // $returnDate = Carbon::now()->addDay(3)->toDateString();

        $bookStatus = Book::findOrFail($request->book_id)->only('status'); 
        
        

        if($bookStatus['status'] != 'in stock'){
            return redirect('rent-book')->with('status', 'book are being rented!');
            } 
        else{
            $count = RentLog::where('user_id', $request->user_id)->where('actual_return_date', null)->count();
            if($count >= 3){
            return redirect('rent-book')->with('status', 'User has reached the limit!');
            } else {
                try{
                        // transanksi database
                    DB::beginTransaction();
    
                    RentLog::create($request->all());
                    $book = Book::findOrFail($request->book_id);
                    $book->status = 'not available';
                    $book->save();
    
                    DB::commit();
                    return redirect('rent-book')->with('status', 'book successfully rented!');
                } catch (\Throwable $th) {
                    DB::rollback();
                    dd($th);
                }
            }               
        } 

    }   
}
