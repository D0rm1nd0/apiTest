<?php

namespace App;

use App\Coin;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $fillable = [
        'price',
        'volume_24h',
        'market_cap',
        'percent_change_1h',
        'percent_change_24h',
        'percent_change_7d',
        'coin_id',
    ];
    protected $hidden = ['created_at', 'updated_at', 'coin_id'];

    public function coin()
    {
        return $this->hasOne('App\Coin');
    }
}
