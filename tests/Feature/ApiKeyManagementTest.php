<?php

namespace Tests\Feature;

use Chrisbjr\ApiGuard\Models\ApiKey;
use Sijot\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ApiKeyManagementTest extends TestCase
{
    use DatabaseMigrations, DatabaseTransactions;

    /**
     * @group all
     * @group backend
     */
    public function testKeyIndexNoData()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user)
            ->seeIsAuthenticatedAs($user)
            ->get(route('api.keys.index'))
            ->assertStatus(200)
            ->assertSee('Er zijn geen API sleutels gevonden in het systeem.');
    }

    /**
     * @group all
     * @group backend
     */
    public function testKeyDeleteKey()
    {
        $user = factory(User::class)->create();
        $key  = factory(ApiKey::class)->create();

        $this->actingAs($user)
            ->seeIsAuthenticatedAs($user)
            ->get(route('api.keys.delete', ['id' => $key->id]))
            //->assertSessionHas('class', 'alert alert-success')
            //->assertSessionHas('message', 'De api sleutel is verwijderd.')
            ->assertStatus(302)
            ->isRedirect();
    }
}
