<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\User;
use App\Models\RentLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Redis;

class ReturnBookController extends Controller
{

    public function index(){
        $user = User::where('role_id', '!=', '1')->where('status', '!=', 'inactive')->get();
        $books = Book::all();
        $rentlog = RentLog::all();
        return view('return.return-book', ['user' => $user, 'book' => $books], ['rent' => $rentlog]);
    }

    public function save(Request $request){
        $rent = RentLog::where('user_id', $request->user_id)
        ->where('book_id', $request->book_id)
        ->where('actual_return_date', null);
        $rentData = $rent->first();
        $countData = $rent->count();

        if($countData == 1){
            $rentData->actual_return_date = Carbon::now()->toDateString();
            $rentData->save();

            return redirect('return-book')->with([
                'status' => 'The Book is returned successfully',
                'alert-class' => 'text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-green-400',
                'close-class' => 'bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400'
            ]);
        } else{
            return redirect('return-book')->with([
                'status' => 'There is error n process',
                'alert-class' => 'text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400',
                'close-class' => 'bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400'
            ]);
        }
    }
}
