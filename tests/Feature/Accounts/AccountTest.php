<?php

use App\Models\User;

test('Account gets created on user creation', function () {
    $user = User::factory()->create();

    $this->assertDatabaseHas('account_user', [
        'user_id' => $user->id,
        'account_id' => $user->personal_account->id,
        'role' => 'owner',
    ]);
});

test('User is assigned as owner of personal account', function () {
    $user = User::factory()->create();

    $this->assertEquals('owner', $user->personal_account->users()->first()->pivot->role);
});

test('Default account is set to personal account on user creation', function () {
    $user = User::factory()->create();

    $this->assertEquals($user->personal_account->id, $user->default_account_id);
});

test('Personal account is marked correctly', function () {
    $user = User::factory()->create();

    $this->assertTrue($user->personal_account->is_personal);
});
