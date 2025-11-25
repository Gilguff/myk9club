<?php

namespace App\Observers;

use App\Models\Account;
use App\Models\User;

class UserObserver
{
    /**
     * Handle the User "created" event.
     */
    public function created(User $user): void
    {
        // Create a personal account for the user upon creation
        $personal_account = Account::create([
            'name' => $user->name."'s Personal Account",
        ]);

        // Attach the personal account to the user with 'owner' role
        $user->accounts()->attach($personal_account->id, [
            'role' => 'owner',
            'is_personal' => true,
        ]);

        // Set the user's default account to the personal account
        $user->default_account()->associate($personal_account);

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
