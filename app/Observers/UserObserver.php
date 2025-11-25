<?php

namespace App\Observers;

use App\Models\User;

class UserObserver
{
    /**
     * Handle the User "created" event.
     */
    public function created(User $user): void
    {
        // Create a personal account for the user upon creation
        $personal_account = $user->personal_account()->create([
            'name' => $user->name."'s Account",
            'owner_id' => $user->id,
        ]);

        // Set the user's default account to the personal account
        $user->default_account()->associate($personal_account);

        // Create the account user pivot record with 'owner' role

        $user->accounts()->attach($personal_account->id, [
            'role' => 'owner',
        ]);

        $user->save();
    }

    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user): void
    {
        //
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user): void
    {
        //
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        //
    }
}
