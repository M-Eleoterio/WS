<?php

namespace App\Http\Controllers;

use App\Models\Token;
use Illuminate\Http\Request;
use Laravel\Sanctum\Sanctum;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $userData = $request->validate([
            "email" => "email",
            "password" => ""
        ]);

        if (!auth()->attempt($userData)) {
            return redirect()->back()->with(['message'=> "Account does not exist"]);
        }

        /* $token = fake()->password(40, 60);
        while (count_chars($token) < 50) {
            $token = fake()->password(40, 60);
        } */

        $request->session()->regenerate();

        return redirect()->intended('dashboard');

    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

}
