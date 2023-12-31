<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        
        $authuser = Auth::user();

        return view('layout.home')->with([
            'authuser' => $authuser,
        ]);
    }

}
