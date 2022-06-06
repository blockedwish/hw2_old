<?php
 
namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request; //Per poter usare Request
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Auction;
use App\Models\FollowedAuction;
use Illuminate\Support\Facades\DB;
class InteractDatabaseController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */

     private function getUserFromId($id){
         return User::where("id","=", $id)->first();
     }

     public function filter(Request $request){
         if(strlen($request["filter"])!=0){
            $result = User::find($request["filter"]);
            if($result != null)
                {
                    return $result->Auctions;// //COn questo codice prendiamo tutte le aste Collegate a tale utente. 
                }
            else{
                return "";
            }
        }else{
            return Auction::all();
        }

     }
     public function followedauctionsby(Request $request){
        $cnt = $this->getUserFromId($request["auth_code"]);
        if($cnt != null){
            return User::find($cnt["username"])->FollowedAuctions->pluck("auction_id") ;
            //pluck va a scegliere la colonna da mostrare dal risultato, invece di mostrare i valori di tutte e 3 le colonne.
        }
     }
     public function recognizeimage(Request $request){#img_link
        $api_key="2b10NrHPeMZWPlPC8GZMmKqHDO";
        $url=sprintf("https://my-api.plantnet.org/v2/identify/all?api-key=%s&images=%s&organs=leaf",$api_key, urlencode($request["img_link"]));
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL,$url); //settiamo l'url
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); //Questo ci serve per fare restituire il risultato come stringa.
        $result = curl_exec($curl);
        curl_close($curl);
        return $result; //JSON
     }
     public function insertnewauction(Request $request){
         //$_POST["auth_code"], $_POST["img_link"], $_POST["money"], $_POST["nome_pianta"]);
         $cnt = $this->getUserFromId($request["auth_code"]);
         if($cnt != null){

            $auction = new  Auction;
            $auction ->owner_username =           $cnt["username"];
            $auction -> plant_name    =    $request["nome_pianta"];
            $auction -> current_price =    $request["money"];
            $auction -> cover_img_link=    $request["img_link"];
            $auction -> end_at= Carbon::tomorrow();
            $auction -> save();
         }
         else{
             return "errore";
         }
     }
     public function togglebookmark(Request $request){
         //auth_code, asta_id
         $id = $request["asta_id"]."".$request["auth_code"];
         $followedAuction = FollowedAuction::find($id);
         if($followedAuction == null){//Se non esiste la creiamo per iniziarla a seguire
             $followedAuction = new FollowedAuction;
             $followedAuction -> id = $id;
             $followedAuction -> follower_id = $request["auth_code"];
             $followedAuction -> auction_id = $request["asta_id"];
             $followedAuction -> save(); 
         }
         else{
             $followedAuction -> delete();
         }
     }
     public function getfolloweronauctions(Request $request){ 
         //NON C'è MODO ESISTENTE CON ORM SE NON ESEGUIRE LA STESSA QUERY CON QUERY BUILDER. QUINDI NON HA SENSO. 
        //ESSENDO SOLO UNA QUERY DI VISUALIZZAZIONE E' CONCESSO, POICHE' NON VA AD ALTERARE GLI EQUILIBRI DI ORM. 
        $cnt = $this->getUserFromId($request["auth_code"]);
        return DB::select("SELECT A.id, A.plant_name, A.current_price, B.C FROM auctions AS A, (SELECT auction_id,COUNT(*) AS C FROM followed_auctions GROUP BY auction_id) AS B  WHERE A.owner_username=? AND B.auction_id = A.id;", [$cnt["username"]]);

     }
     public function changepassword(Request $request){
        //($_POST["auth_code"], $_POST["old_password"], $_POST["new_password"]
        $cnt = User::where("id","=", $request["auth_code"])->where("password","=", crypt($request["old_password"], 10))->first();
        if($cnt != null){
            $user = User::find($cnt->username);
            $user -> password = crypt($request["new_password"],10);
            $user -> save();
        }
        else{
            return "0";
        }
    }

    public function offer(Request $request){
        //auth_code, asta_id
        $cnt = $this->getUserFromId($request["auth_code"]);
        if($cnt != null){
            $topoffer= $cnt->username;
            $auction = Auction::find($request["asta_id"]);
            if($auction != null){
                $auction -> current_price =  $auction -> current_price+2;
                $auction -> top_offer_username = $topoffer;
                $auction -> save();
                return ["success"=>true,
                         "asta_id"=>$request["asta_id"],
                         "user"=>$topoffer ];
            }
        }

    }


}