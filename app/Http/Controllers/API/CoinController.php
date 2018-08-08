<?php

namespace App\Http\Controllers\API;

use App\Coin;
use App\Http\Controllers\Controller;
use App\Quote;

class CoinController extends Controller
{
    public $successStatus = 200;

    public function update()
    {
        $url = "https://api.coinmarketcap.com/v2/ticker/";
        $json = file_get_contents($url);
        $json_data = json_decode($json, true);
        $first_coin = Coin::first();
        if (($first_coin == null) || ($json_data['metadata']['timestamp'] != $first_coin->last_updated)) {
            Coin::query()->delete();
            Quote::query()->delete();
            foreach ($json_data['data'] as $json) {
                $coin = new Coin($json);
                $coin->last_updated = $json_data['metadata']['timestamp'];
                $coin->save();
                $quote = new Quote($json['quotes']['USD']);
                $coin->quote()->save($quote);
            }
        }
        return response()->json(['success' => 'ok'], $this->successStatus);
    }
    public function ticker()
    {
        return response()->json(['data' => Coin::with('quote')->get()], $this->successStatus);
    }
    public function listings()
    {
        return response()->json(['data' => Coin::all(['name', 'symbol', 'website_slug'])], $this->successStatus);
    }
}
