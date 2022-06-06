<?php 
namespace App\Models;
use App\Models\Auction;
use Illuminate\Database\Eloquent\Model;
class User extends Model{
    protected $autoIncrement = false;
    protected $keyType = "string";
    protected $primaryKey = "username";
    public function Auctions() //Imposta una relazione di uno a molti e serve per ritornare le Aste associate a un'utente
    {
        return $this->hasMany(Auction::class,"owner_username","username");
    }
    public function FollowedAuctions() //Imposta una relazione di uno a molti e serve per ritornare le Aste associate a un'utente
    {
        return $this->hasMany(FollowedAuction::class,"follower_id","id");
    }
}

?>