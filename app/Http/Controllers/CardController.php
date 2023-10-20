<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CardController extends Controller
{
    public function distributeCards(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'numberOfPeople' => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput($request->except('_token'));
        }

        $cards = [];

        $suits = ['S', 'H', 'D', 'C'];
        $values = ['A', '2', '3', '4', '5', '6', '7', '8', '9', 'X', 'J', 'Q', 'K'];

        foreach ($suits as $suit) {
            foreach ($values as $value) {
                $cards[] = $suit . '-' . $value;
            }
        }
        shuffle($cards);

        $output = [];
        for ($i = 0; $i < $request->numberOfPeople; $i++) {
            $personCards = [];
            for ($j = $i; $j < count($cards); $j += $request->numberOfPeople) {
                $personCards[] = $cards[$j];
            }
            $output[] = $personCards;
        }
        return back()->with('cards', $output)->withInput($request->except('_token'));
    }
}
