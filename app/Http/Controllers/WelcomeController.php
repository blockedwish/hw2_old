<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request; //Per poter usare Request
use App\Http\Controllers\Controller;
use App\Models\User;
 
class WelcomeController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */

    private function control($username, $password){
        if(strlen($username)<3 || strlen($password)<5){
            return false;
        }
        else{
            return true;
        }
    }
    private function checkUsernameInDb($username){
        $cnt = User::find($username); //per forza cosi' perche' la chiave primaria e' impostata su id, dunque il find cerca su id. 
        if($cnt!=null){//esiste gia' l'username
            return true; 
        }
        return false;
    }
    public function controlUsername(Request $request){
        echo json_encode($this->checkUsernameInDb($request["username"]));

    }

    public function logout(Request $request){
        $request->session()->flush();
        return redirect("/");
    }
    public function login(Request $request)
    {
        $username = "";
        $img_link ="";
        $auth_code = "";
        if($request->isMethod('get') && session("auth_code","none")!="none"){
            $cnt = User::where("id","=",session("auth_code"))->get();

            if($cnt != null){//Essite effettivamente un utente con tale id.
                
                $username = $cnt[0]->username;
                $img_link = $cnt[0]->img_profile;
                $auth_code = $cnt[0]->id;
            }
        }
        elseif($request->isMethod("post")){
            $cnt = User::find($request["username"]);
            //Questa funzione deve gestire il login.
            if($cnt!= null && $cnt["password"] == crypt($request["pwd"],10) ){#SUCCESS
                session(["auth_code"=>$cnt["id"]]);
                $username = $cnt["username"];
                $img_link = $cnt["img_profile"];
                $auth_code =$cnt["id"];
            }else{#FAILURE
                return redirect("/");
            }
         }
         else{
             return view("index");
         }
        
         if($img_link==null){
             $img_link = "https://cdn-icons-png.flaticon.com/512/219/219983.png";
         }
         session([
             "username"=>$username,
            "img_link"=> $img_link,
            "auth_code" => $auth_code
        ]);

         return redirect("bacheca"); //Qui abbiamo l'id dell'utente generato in fase di reg con uniq_id
    }

    public function register(Request $request){
        $username = $request["username"];
        $password = $request["pwd"];
        if($this->control($username, $password)){
            //Buon fine
            //Adesso dobbiamo controllare se esiste un altro utente con tale username
            if($this->checkUsernameInDb($username)){//esiste gia' l'username
                return view("index");
            }
            else{
                $user = new User;
                $user->username = $username;
                $user ->password = crypt($password, 10);
                $user -> id = uniqid();
                $user ->save();
                return view("FinishRegister", ['message' => 'Registrazione avvenuta con successo']);
            }
        }
        else{
            return view("index");
        }
    }

    public function changeimgprofile(Request $request){
       $user = User::where("id","=",session("auth_code"))->first();
       $user->img_profile = $request["img_link"];
       $user->save();
       session(["img_link"=>$request["img_link"]]);
       return redirect("profile");
    }

}