<?php

namespace App\Http\Controllers;

use App\Models\Workspace;
use Illuminate\Http\Request;

class WorkspaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $workspaces = Workspace::where('user_id', auth('sanctum')->id())->get();
        return view('workspace.index', compact('workspaces'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $workspace = Workspace::findOrFail($id);
        //VERIFICA SE PERTENCE AO USUARIO
        if (auth('sanctum')->id() != $workspace['user_id'])
            return redirect()->back(401);

        $tokens = $workspace->tokens;

        return view('workspace.show', [
            "workspace" => $workspace,
            "tokens" => $tokens
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
