<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Workspace;
use Illuminate\Database\Eloquent\Factories\Factory;
use Number;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Token>
 */
class TokenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $ws_id = Workspace::pluck('id')->random();
        $ws = Workspace::where('id', $ws_id)->first();
        $user_id = $ws->user->id;
        return [
            'name' => fake()->name(),
            'token' => fake()->password(40),
            'workspace_id' => $ws_id,
            'user_id' => $user_id,
            'revoked' => false,

        ];
    }
}
