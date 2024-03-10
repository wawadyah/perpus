<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RentLog;

class RentLogController extends Controller
{
    public function index(){
        $rentlog = RentLog::with(['users', 'books'])->get();
        return view('rent.rent-log', ['rentlog' => $rentlog]);
    }
}
