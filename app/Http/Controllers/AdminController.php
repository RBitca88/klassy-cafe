<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use App\Models\Food;

use App\Models\Reservation;

use App\Models\Foodchefs;


class AdminController extends Controller
{
    public function user() {

        $data = user::all();

        return view("admin.users", compact("data"));
    }

    public function deleteuser($id) {

        $data = user::find($id);
        $data -> delete();

        return redirect() -> back();
    }

    public function deletemenu($id) {

        $data = food::find($id);

        $data -> delete();
        return redirect() -> back();
    }

    public function updateview($id) {

        $data = food::find($id);

        return view("admin.updateview", compact("data"));
    }

    public function update(Request $req, $id) {

        $data = food::find($id);

        $image = $req -> image;
        $imagename = time().'.'.$image -> getClientOriginalExtension();
        $req -> image -> move('foodimage', $imagename);

        $data -> image = $imagename;
        $data -> title = $req -> title;
        $data -> price = $req -> price;
        $data -> description = $req -> description;

        $data -> save();

        return redirect() -> back();
    }

    public function foodmenu() {

        $data = food::all();

        return view("admin.food-menu", compact('data'));
    }

    public function upload(Request $req) {

        $data = new food;

        $image = $req -> image;
        $imagename = time().'.'.$image -> getClientOriginalExtension();
        $req -> image -> move('foodimage', $imagename);

        $data -> image = $imagename;
        $data -> title = $req -> title;
        $data -> price = $req -> price;
        $data -> description = $req -> description;

        $data -> save();

        return redirect() -> back();
    }

    public function reservation(Request $req) {

        $data = new reservation;

        
        $data -> name = $req -> name;
        $data -> email = $req -> email;
        $data -> phone = $req -> phone;
        $data -> guest = $req -> guest;
        $data -> date = $req -> date;
        $data -> time = $req -> time;
        $data -> message = $req -> message;


        $data -> save();

        return redirect() -> back();
    }

    public function viewreservation() {

        $data = reservation::all();

        return view("admin.admin-reservation", compact("data"));
    }

    public function viewchef() {

        return view("admin.admin-chef");
    }

    public function uploadchef(Request $req) {

        $data = new foodchefs;

        $image = $req -> image;
        $imagename = time().'.'.$image -> getClientOriginalExtension();
        $req -> image -> move('chefimage', $imagename);

        $data -> name = $req -> name;
        $data -> speciality = $req -> speciality;
        $data -> image = $imagename;

        $data -> save();

        return redirect() -> back();
    }
}
