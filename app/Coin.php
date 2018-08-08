<?php

namespace App;

use App\Quote;
use Illuminate\Database\Eloquent\Model;

class Coin extends Model
{
    protected $fillable = [
        'name',
        'symbol',
        'website_slug',
        'rank',
        'circulating_supply',
        'total_supply',
        'max_supply',
        'last_updated',
    ];

    protected $hidden = ['created_at', 'updated_at'];

    public function quote()
    {
        return $this->hasOne('App\Quote');
    }
}
