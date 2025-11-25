<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends Model
{
    /** @use HasFactory<\Database\Factories\AccountFactory> */
    use HasFactory, HasUuids, SoftDeletes;

    /**
     * @return BelongsTo<User,Account>
     */
    public function owner(): HasOne
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    protected $fillable = [
        'name',
        'slug',
        'owner_id',
    ];

    protected $keyType = 'string';
}
