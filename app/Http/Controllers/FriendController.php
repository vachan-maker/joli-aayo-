<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use Illuminate\Http\Request;

class FriendController extends Controller
{
    public function addFriend(Request $request) {
        $validated = $request->validate(
            [
                'email'=> 'required|email',
                'name'=> 'required|text'
            ]
        );

        $request->user()->friends()->create($validated);
        return redirect()->route('profile')->with('success', "Friend added sucessfully");
    }
}
