<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Food;
use App\Models\Reservation;
use App\Models\Foodchefs;
use App\Models\Order;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller {
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

    public function uploadFood(Request $req) {

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

        Alert::success('The request has been sent', 'Soon the administrator will send you an email about the availability of the tables');

        return redirect() -> back();
    }

    public function viewreservation() {

        if(Auth::id()){
            $data = reservation::all();

            return view("admin.admin-reservation", compact("data"));
        } else {
            return redirect('login');
        }

        
    }

    public function viewchef() {
        $data = foodchefs::all();

        return view("admin.admin-chef", compact("data"));
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

    public function updatechef($id) {
    
        $data = foodchefs::find($id);

        return view("admin.updatechef", compact("data"));
    }

    public function updatefoodchef(Request $req, $id) {
    
        $data = foodchefs::find($id);
        $image = $req -> image;
        if($image){
            $imagename = time().'.'.$image -> getClientOriginalExtension();
            $req -> image -> move('chefimage', $imagename);
            $data -> image = $imagename;
        }

        $data -> name = $req -> name;
        $data -> speciality = $req -> speciality;
        

        $data -> save();

        return redirect() -> back();
    }

    public function deletechef($id){

        $data = foodchefs::find($id);
        $data -> delete();
        return redirect() -> back();
    }

    public function orders(){

        $data = order::all();

        return view('admin.orders', compact('data'));
    }

    public function search(Request $req){

        $search = $req ->search;

        $data = order::where('name', 'Like', '%'.$search.'%') -> get();

        return view('admin.orders', compact('data'));
    }
}
