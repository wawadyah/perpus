<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RentLog;

class RentLogController extends Controller
{
    public function index(){
        $rentlog = RentLog::with(['users' => function ($query) {
            $query->whereNotNull('id'); // Ganti 'id' dengan kolom kunci primer yang sesuai di tabel users
        }, 'books'])
        ->get();

        return view('rent.rent-log', ['rent-log' => $rentlog]);
    }
}
