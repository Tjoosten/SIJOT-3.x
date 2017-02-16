<?php

namespace Tests\Feature;

use Sijot\Theme;
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
        $user = factory(User::class)->create();

        $input['password']              = '123456!';
        $input['password_confirmation'] = '123456!';

        $this->actingas($user)
            ->seeIsAuthenticatedAs($user)
            ->post(route('account.security'), $input)
            ->assertSessionHas('class', 'alert alert-success')
            ->assertSessionHas('message', 'Account wachtwoord is aangepast.')
            ->assertStatus(302);
    }

    public function testUpdatePasswordValidationErr()
    {
        $user = factory(User::class)->create();

        $this->actingas($user)
            ->seeIsAuthenticatedAs($user)
            ->post(route('account.security'), [])
            ->assertSessionHasErrors('password')
            ->assertStatus(302)
            ->assertRedirect(route('home'));
    }

    public function testUpdateSettingsValidationErr()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user)
            ->seeIsAuthenticatedAs($user)
            ->post(route('account.settings'), [])
            // ->assertSessionHasErrors('name')
            // ->assertSessionHasErrors('email')
            // ->assertSessionHasErrors('theme')
            ->assertStatus(302);
    }

    public function testUpdateSettingsNoValidationErr()
    {
        $user  = factory(User::class)->create();
        $theme = factory(Theme::class)->create();

        $input['email'] = 'janmetdepet@domain.tld';
        $input['name']  = 'Jan met de pet';
        $input['theme'] = $theme->id;

        $this->actingAs($user)
            ->seeIsAuthenticatedAs($user)
            ->post(route('account.settings'), $input)
            ->assertSessionHas('class', 'alert alert-success')
            ->assertSessionHas('message', 'De account informatie is aangepast.')
            ->assertStatus(302);
    }
}
