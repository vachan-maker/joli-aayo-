<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use Illuminate\Http\Request;

class FriendController extends Controller
{
    public function add_friend(Request $request) {
        $validated = $request->validate(
            [
                'email'=> 'required|email',
                'name'=> 'required|string'
            ]
        );

        $request->user()->friends()->create($validated);
        return redirect()->route('profile')->with('success', "Friend added sucessfully");
    }
}
