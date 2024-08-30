<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Workspace;
use App\Models\User;

class Token extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'token',
        'workspace_id',
        'user_id',
        'revoked',
        'creation_date',
        'revocation_date',
    ];

    public function workspace() {
        return $this->belongsTo(Workspace::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

}
