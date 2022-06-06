<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Auction extends Model{
public function userOwner(){ //Questo lo usiamo per prendere il possessore dell'asta
    return $this->belongsTo(User::class,"owner_id");
}
public function userTopOffer(){//Questo lo usiamo per estrapolare il top offer
    return $this->belongsTo(User::class,"top_offer");
}
}
?> 