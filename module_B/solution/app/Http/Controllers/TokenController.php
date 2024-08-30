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
            "/" . str_pad($timedate['mon'], 2, "0", STR_PAD_LEFT) .
            "/" . str_pad($timedate['mday'], 2, "0", STR_PAD_LEFT) .
            " " . str_pad($timedate['hours'], 2, "0", STR_PAD_LEFT) .
            ":" . str_pad($timedate['minutes'], 2, "0", STR_PAD_LEFT) .
            ":" . str_pad($timedate['seconds'], 2, "0", STR_PAD_LEFT);
        Token::where('id', $id)->update(['revoked' => true, 'revocation_date' => $current_time]);
        return redirect()->back();
    }

    public function show()
    {
        $message = "";
        $workspaces = Workspace::where('user_id', auth('sanctum')->id())->get();
        return view('token.create', compact('workspaces', 'message'));
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
            return back()->with(['message' => "Take a note of this token, its not possible to get it later: ".$token]);
        }
    }
}
