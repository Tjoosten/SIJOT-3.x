<?php

namespace Tests\Browser;

use Sijot\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AuthencationTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function testLogoutBackend()
    {
        $user = factory(User::class)->create();

        $this->browse(function ($browser) use ($user) {
            $browser->loginAs(User::find($user->id))
                ->visit('/home')
                ->clickLink('Uitloggen')
                ->assertPathIs('/')
                ->assertSee('Login');
        });
    }

    public function testLoginMethod()
    {
        $user = factory(User::class)->create([
            'email' => 'taylor@laravel.com',
        ]);

        $this->browse(function ($browser) use ($user) {
            $browser->visit('/')
                ->clickLink('Login')
                ->type('email', $user->email)
                ->type('password', 'secret')
                ->press('Inloggen')
                ->assertPathIs('/home')
                ->assertSee($user->name);
        });
    }

    public function testLogoutFrontend()
    {
        $user = factory(User::class)->create();

        $this->browse(function ($browser) use ($user) {
            $browser->loginAs(User::find($user->id))
                ->visit('/')
                ->assertSee($user->name)
                ->clickLink($user->name)
                ->clickLink('Uitloggen')
                ->assertSee('Login');
        });
    }
}
