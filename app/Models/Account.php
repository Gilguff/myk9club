<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends Model
{
    /** @use HasFactory<\Database\Factories\AccountFactory> */
    use HasFactory, HasUuids, SoftDeletes;

    /**
     * @return BelongsTo<User,Account>
     */
    public function owner(): BelongsToMany
    {
        return $this->belongsToMany(User::class)
            ->using(AccountUser::class)
            ->withPivot('role')
            ->withTimestamps()
            ->wherePivot('role', 'owner')
            ->limit(1);
    }

    /**
     * @return BelongsToMany<User,Account>
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)
            ->using(AccountUser::class)
            ->withPivot('role')
            ->withTimestamps();
    }

    protected $fillable = [
        'name',
        'slug',
        'owner_id',
    ];

    protected $keyType = 'string';
}
