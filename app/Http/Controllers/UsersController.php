<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tweet;
use App\User;

class UsersController extends Controller
{
    public function show($user_id)
    {
        $name = User::find($user_id)->name;
        $tweets = Tweet::where('user_id', $user_id)->orderBy('created_at', 'DESC')->paginate(5);

        return view('users.show')->with(['name' => $name, 'tweets' => $tweets]);
    }
}
