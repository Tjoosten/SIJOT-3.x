<?php

namespace Tests\Feature;

use Sijot\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AuthencationTest extends TestCase
{
    public function testLoginBackendIndex()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user)
            ->seeIsAuthenticatedAs($user)
            ->get(route('users.index'))
            ->assertStatus(200)
            ->assertSee($user->email)
            ->assertSee($user->name);
    }

    public function testLoginDelete()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user)
            ->seeIsAuthenticatedAs($user)
            ->get(route('account.delete', ['id' => $user->id]))
            ->assertStatus(302)
            ->assertSessionHas('class', 'alert alert-success')
            ->assertSessionHas('message', 'De login is verwijderd.')
            ->isRedirect();

    }
}
