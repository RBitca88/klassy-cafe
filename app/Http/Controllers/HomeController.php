<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Models\Food;

use App\Models\Foodchefs;



class HomeController extends Controller
{
    public function index() {

        $data = food::all();
        $data2 = foodchefs::all();

        return view("home", compact('data', 'data2'));
    }

    public function redirects() {

        $data = food::all();
        $data2 = foodchefs::all();

        $usertype = Auth::user() -> usert_type;

        if($usertype == '1'){
            return view('admin.admin-home');
        } else {
            return view('home', compact('data', 'data2'));
        }

    }
}
