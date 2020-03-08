<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Card;


class CollectionController extends Controller
{
    /**
     * Show the view to search for and add cards to the users collection
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function indexCardsAdd()
    {
        return view('collection.cards.add');
    }

    /**
     * Show the view to list all of the users cards
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function indexCardsShow()
    {
        return view('collection.cards.show');
    }

    public function getUserCards()
    {
        return Card::getUsersCards();
    }

    public function deleteCard(Request $request)
    {
       Card::deleteCard($request->cardID);
    }

    /**
     * Show the form to search for and add cards to the users collection
     *
     */
    public function addCardsSearch(Request $request)
    {
        return  Card::getCards($request->name);
    }

    /**
     * Show the form to search for and add cards to the users collection
     *
     */
    public function addCard(Request $request)
    {
        Card::addCard($request->cardID);
    }
}
