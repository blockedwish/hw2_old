<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class FollowedAuction extends Model{
    public $timestamps = false; //Per forza altrimenti da errore.
    protected $autoIncrement = false;
    protected $keyType = "string";
    public function followerid(){ 
        return $this->belongsTo(User::class,"follower_id");
    }
    public function auctionid(){ 
        return $this->belongsTo(Auction::class,"auction_id");
    }
}
?>