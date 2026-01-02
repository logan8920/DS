<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChannelConfig extends Model
{
    protected $fillable = [
        "channel_id",
        "channel_type",
        "seller_id",
        "access_token",
        "api_key_secret",
        "api_key",
        "domain",
        "created_at",
        "updated_at"
    ];


    public function user() {

        return $this->hasOne(User::class,'id','seller_id');
        
    }
}
