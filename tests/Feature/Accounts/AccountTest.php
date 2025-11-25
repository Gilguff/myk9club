<?php

use App\Models\User;

test('Default personal account gets created on user registration', function () {
    $user = User::factory()->create();
    echo 'User ID: '.$user->id.PHP_EOL;
    echo $user->personal_account()->get()->first().PHP_EOL;

    $this->assertDatabaseHas('accounts', [
        'user_id' => $user->id,
    ]);

    $this->assertDatabaseHas('account_user', [
        'user_id' => $user->id,
        'account_id' => $user->personal_account()->id,
        'role' => 'owner',
    ]);
});
