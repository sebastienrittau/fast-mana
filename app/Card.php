<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Card extends Model
{
    public static function getCards($name) {
        return Http::get('https://api.magicthegathering.io/v1/cards?name='.$name);
    }

    public static function getUsersCards() {
        $usersCards = DB::table('card')->select('card_id')->where('user_id', '=', Auth::id())->get();
        $apiCall = 'https://api.magicthegathering.io/v1/cards?id=';
        foreach($usersCards as $card) {
            $apiCall .= $card->card_id.'|';
        }
        return Http::get($apiCall);
    }

    public static function addCard($card_id) {
        DB::table('card')->insert(
            ['user_id' => Auth::id(), 'card_id' => $card_id, 'added_on' => now()]
        );
    }

    public static function deleteCard($card_id) {
        DB::table('card')->where([['user_id', '=', Auth::id()],['card_id', '=', $card_id]])->delete();
    }
}
