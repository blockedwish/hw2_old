<?php
use App\Models\User;
use App\Models\Auction;
use App\Models\FollowedAuction;
use App\Http\Controllers\WelcomeController;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[WelcomeController::class, 'login'] );

  #  $user = Auction::find(1)->userTopOffer; #funziona
/*
    $cnt = FollowedAuction::find("ppp");
    return $cnt->followerid;
    //Se noi digitiamo: $cnt->follower_id praticametne ci da il campo vero e proprio, mentre followerid e' la funzione definita
    //che ci ritorna ricorsivamente l'utente.
    */
   


Route::get("register", function(){
    return view("register");
});

Route::post("register", [WelcomeController::class, 'register']);

Route::post("/", [WelcomeController::class, 'login']);

Route::get("finishregister", function(){ return view("FinishRegister"); });

Route::get("bacheca", function(){
  if(session("auth_code")!=null) {
    return view("bacheca");
  }else{
    return redirect("/");
  }
  }
);

Route::get("control_panel", function(){
  return view("controlPanel");
});

Route::post("profile",[WelcomeController::class, 'logout']);
Route::post("changeimgprofile",[WelcomeController::class, 'changeimgprofile']);
Route::get("profile", function(){
  return view("profile");
});

