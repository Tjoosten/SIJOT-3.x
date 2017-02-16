<?php

namespace Tests\Feature;

use Sijot\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

/**
 * Class AccountTest
 *
 * @package Tests\Feature
 */
class AccountTest extends TestCase
{
    use DatabaseMigrations, DatabaseTransactions;

    /**
     * ROUTE: account.index
     *
     * @group backend
     * @group all
     */
    public function testProfileView()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user);
        $this->seeIsAuthenticatedAs($user);

        $test = $this->get(route('account.index'));
        $test->assertSee($user->name);
        $test->assertSee($user->email);
        $test->assertStatus(200);

    }

    /**
     * ROUTE: account.security
     *
     * @group backend
     * @group all
     */
    public function testUpdatePasswordNoValidationErr()
    {

    }

    public function testUpdatePasswordValidationErr()
    {
        $user = factory(User::class)->create();

        $this->actingas($user);
        $this->seeIsAuthenticatedAs($user);

        $test = $this->post(route('account.security'), []);
        $test->assertStatus(302);
    }

    public function testUpdateSettingsValidationErr()
    {
        //
    }

    public function testUpdateSettingsNoValidationErr()
    {
        //
    }
}
