<?php

use App\Models\User;

beforeEach(function () {
    $this->adminPath = env('ADMIN_PATH', 'portal-tsh-78a9c2');
});

it('denies access to guests on the admin path with 404', function () {
    $response = $this->get('/' . $this->adminPath);
    $response->assertStatus(404);
});

it('denies access to normal users on the admin path with 404', function () {
    $user = User::factory()->create(['user_type' => 'normal']);
    $response = $this->actingAs($user)->get('/' . $this->adminPath);
    $response->assertStatus(404);
});

it('allows admin users to access the admin dashboard', function () {
    $admin = User::factory()->create(['user_type' => 'admin']);
    $response = $this->actingAs($admin)->get('/' . $this->adminPath);
    $response->assertStatus(200);
    $response->assertViewIs('admin.dashboard');
});

it('allows admin users to view the users list', function () {
    $admin = User::factory()->create(['user_type' => 'admin']);
    $response = $this->actingAs($admin)->get('/' . $this->adminPath . '/users');
    $response->assertStatus(200);
    $response->assertViewIs('admin.users');
});

it('allows admin users to update a user role', function () {
    $admin = User::factory()->create(['user_type' => 'admin']);
    $user = User::factory()->create(['user_type' => 'normal']);

    $response = $this->actingAs($admin)->post('/' . $this->adminPath . '/users/' . $user->id . '/role', [
        'user_type' => 'partner'
    ]);

    $response->assertRedirect();
    $response->assertSessionHas('success');
    $this->assertEquals('partner', $user->fresh()->user_type);
});

it('prevents admins from changing their own role', function () {
    $admin = User::factory()->create(['user_type' => 'admin']);

    $response = $this->actingAs($admin)->post('/' . $this->adminPath . '/users/' . $admin->id . '/role', [
        'user_type' => 'normal'
    ]);

    $response->assertRedirect();
    $response->assertSessionHas('error');
    $this->assertEquals('admin', $admin->fresh()->user_type);
});

it('allows admins to delete other users', function () {
    $admin = User::factory()->create(['user_type' => 'admin']);
    $user = User::factory()->create(['user_type' => 'normal']);

    $response = $this->actingAs($admin)->delete('/' . $this->adminPath . '/users/' . $user->id);

    $response->assertRedirect();
    $response->assertSessionHas('success');
    $this->assertNull(User::find($user->id));
});

it('allows admin users to update user details', function () {
    $admin = User::factory()->create(['user_type' => 'admin']);
    $user = User::factory()->create([
        'name' => 'Old Name',
        'username' => 'olduser',
        'email' => 'old@example.com',
        'user_type' => 'normal'
    ]);

    $response = $this->actingAs($admin)->post('/' . $this->adminPath . '/users/' . $user->id, [
        'name' => 'New Name',
        'username' => 'newuser',
        'email' => 'new@example.com',
        'user_type' => 'partner'
    ]);

    $response->assertRedirect();
    $response->assertSessionHas('success');
    
    $user = $user->fresh();
    $this->assertEquals('New Name', $user->name);
    $this->assertEquals('newuser', $user->username);
    $this->assertEquals('new@example.com', $user->email);
    $this->assertEquals('partner', $user->user_type);
});

it('prevents admin users from demoting themselves on details update', function () {
    $admin = User::factory()->create(['user_type' => 'admin']);

    $response = $this->actingAs($admin)->post('/' . $this->adminPath . '/users/' . $admin->id, [
        'name' => 'Admin Name',
        'username' => $admin->username,
        'email' => $admin->email,
        'user_type' => 'normal' // Demoting self
    ]);

    $response->assertRedirect();
    $response->assertSessionHas('error');
    $this->assertEquals('admin', $admin->fresh()->user_type);
});

