<?php

namespace Tests\Browser;

use Sijot\User;
use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AccountTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function testSettingsNoErr()
    {
        $data['user'] = factory(User::class)->create();

        $this->browse(function ($browser) use ($data) {
            $browser->loginAs(User::find($data['user']->id))
                ->visit(route('account.index'))
                ->clickLink('Account')
                ->select('theme', 'skin red')
                ->assertInputValue('#name', $data['user']->name)
                ->assertInputValue('#email', $data['user']->email)
                ->press('Wijzigen')
                ->assertSee('De account informatie is aangepast.');
        });
    }
}
