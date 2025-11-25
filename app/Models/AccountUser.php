<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\Pivot;

class AccountUser extends Pivot
{
    use HasUuids;

    protected $fillable = [
        'account_id',
        'user_id',
        'role',
    ];

    protected $keyType = 'string';
}
