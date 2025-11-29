<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\Pivot;

class AccountUser extends Pivot
{
    use HasUuids;

    protected $keyType = 'string';

    protected $fillable = [
        'account_id',
        'user_id',
        'role',
        'is_personal',
    ];

    protected $casts = [
        'is_personal' => 'boolean',
    ];
}
