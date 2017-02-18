<?php

namespace Tests\Feature;

use Sijot\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class HomeTest extends TestCase
{
    use DatabaseMigrations, DatabaseTransactions;

    /**
     * @group all
     * @group frontend
     */
    public function testHomeFrontEnd()
    {
        $this->get(route('home'))->assertStatus(200);
    }

    /**
     * @group all
     * @group backend
     */
    public function testHomeBackend()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user)
            ->seeIsAuthenticatedAs($user)
            ->get(route('home.backend'))
            ->assertStatus(200);
    }
}
