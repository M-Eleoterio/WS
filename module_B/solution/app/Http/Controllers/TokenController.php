<?php

namespace App\Http\Controllers;

use App\Models\Token;
use App\Models\Workspace;
use Faker\Core\DateTime;
use Illuminate\Http\Request;

class TokenController extends Controller
{
    public function revoke($id)
    {
        $timedate = getdate();
        $current_time = $timedate['year'] .
            "-" . str_pad($timedate['mon'], 2, "0", STR_PAD_LEFT) .
            "-" . str_pad($timedate['mday'], 2, "0", STR_PAD_LEFT) .
            " " . str_pad($timedate['hours'], 2, "0", STR_PAD_LEFT) .
            ":" . str_pad($timedate['minutes'], 2, "0", STR_PAD_LEFT) .
            ":" . str_pad($timedate['seconds'], 2, "0", STR_PAD_LEFT);
        $token = Token::where('id', $id);

        //VERIFICA SE PERTENCE AO USUARIO
        if (auth('sanctum')->id() != $token['user_id'])
            return redirect()->back();
        $token->update(['revoked' => true, 'revocation_date' => $current_time]);
        return redirect()->back();
    }

    public function show()
    {
        $workspaces = Workspace::where('user_id', auth('sanctum')->id())->get();
        return view('token.create', compact('workspaces'));
    }
    public function create(Request $request)
    {
        $userData = $request->validate([
            'name' => 'string'
        ]);
        $token = fake()->password(40);
        if (
            Token::create([
                'name' => $userData['name'],
                'token' => $token,
                'workspace_id' => $request->workspace_id,
                'user_id' => auth('sanctum')->id(),
                'revoked' => false
            ])
        ) {
            return redirect()->back()->with('message', "Take a note of this token, its not possible to get it later: " . $token);
        }

        //CASO FALHE
        return redirect()->back()->with('message', "It was not possible to create the token.");
    }
}
