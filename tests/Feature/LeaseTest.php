<?php

namespace Tests\Feature;

use Sijot\Lease;
use Sijot\RentalStatus;
use Sijot\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

/**
 * Class LeaseTest
 *
 * @package Tests\Feature
 */
class LeaseTest extends TestCase
{
    use DatabaseMigrations, DatabaseTransactions;

    /**
     * @group all
     * @group front-end
     */
    public function testFrontEndIndex()
    {
        $this->get(route('lease.index'))->assertStatus(200);
    }

    /**
     * @group all
     * @group front-end
     */
    public function testDomainAccess()
    {
        $this->get(route('lease.access'))->assertStatus(200);
    }

    /**
     * @group all
     * @group back-end
     */
    public function testBackEndIndex()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user)
            ->seeIsAuthenticatedAs($user)
            ->get(route('lease.backend'))
            ->assertStatus(200);
    }

    /**
     * @group all
     * @group front-end
     */
    public function testLeaseCalendar()
    {
        factory(RentalStatus::class)->create(['name' => 'Bevestigd']);
        $this->get(route('lease.calendar'))->assertStatus(200);
    }

    /**
     * @group all
     * @group front-end
     * @group back-end
     */
    public function testInsertLeaseNoErr()
    {
        factory(RentalStatus::class)->create(['name' => 'Nieuwe aanvraag']);

        $input['end_date'] = '01-02-2017';
        $input['start_date'] = '03-02-2017';
        $input['group_name'] = config('app.name');
        $înput['phone_number'] = '0000.00.00.00';
        $input['email_address'] = 'user@domain.tld';

        $this->post(route('lease.insert'), $input)
            ->assertSessionHas('class', 'alert alert-success')
            ->assertSessionHas('message', 'De aanvraag is verwerkt.')
            ->assertStatus(302)
            ->isRedirect();
    }

    /**
     * @group all
     * @group front-end
     * @group back-end
     */
    public function testInsertLeaseErr()
    {
        $this->post(route('lease.insert'), [])
            ->assertSessionHasErrors('start_date')
            ->assertSessionHasErrors('end_date')
            ->assertSessionHasErrors('group_name')
            ->assertSessionHasErrors('email_address')
            ->assertStatus(302)
            ->isRedirect();
    }

    /**
     * @group all
     * @group front-end
     */
    public function testRequestLease()
    {
        $this->get(route('lease.request'))->assertStatus(200);
    }

    /**
     * @group all
     * @group backend
     */
    public function testSetConfirmed()
    {
        factory(RentalStatus::class)->create(['name' => 'Bevestigd']);

        $user  = factory(User::class)->create();
        $lease = factory(Lease::class)->create();

        $this->actingAs($user)
            ->seeIsAuthenticatedAs($user)
            ->get(route('lease.confirm', ['id' => $lease->id]))
            ->assertSessionHas('class', 'alert alert-success')
            ->assertSessionHas('message', 'De verhuring is bevestigd.')
            ->assertStatus(302)
            ->isRedirect();
    }

    /**
     * @group all
     * @group backend
     */
    public function testSetOption()
    {
        factory(RentalStatus::class)->create(['name' => 'Optie']);

        $user  = factory(User::class)->create();
        $lease = factory(Lease::class)->create();

        $this->actingAs($user)
            ->seeIsAuthenticatedAs($user)
            ->get(route('lease.option', ['id' => $lease->id]))
            ->assertSessionHas('class', 'alert alert-success')
            ->assertSessionHas('message', 'De verhuring is gezet naar een Optie.')
            ->assertStatus(302)
            ->isRedirect();
    }

    /**
     * @group all
     * @group backend
     */
    public function testLeaseDelete()
    {
        $user  = factory(User::class)->create();
        $lease = factory(Lease::class)->create();

        $this->actingAs($user)
            ->seeIsAuthenticatedAs($user)
            ->get(route('lease.delete', ['id' => $lease->id]))
            ->assertSessionHas('class', 'alert alert-success')
            ->assertSessionHas('message', 'De verhuring is verwijderd.')
            ->assertStatus(302)
            ->isRedirect();
    }
}
