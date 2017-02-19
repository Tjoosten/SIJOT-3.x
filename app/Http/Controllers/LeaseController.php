<?php

namespace Sijot\Http\Controllers;

use Illuminate\Http\Request;
use Sijot\Http\Requests\LeaseValidator;
use Sijot\Lease;
use Sijot\RentalStatus;

/**
 * Class LeaseController
 *
 * @package Sijot\Http\Controllers
 */
class LeaseController extends Controller
{
    /**
     * Front-end index for the domain lease.
     *
     * @see:unit-test   \Tests\Feature\LeaseTest::testFrontEndIndex
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data['title'] = 'Verhuur';
        return view('lease.front-end-index', $data);
    }

    /**
     * Front-end description domain access.
     *
     * @see:unit-test   \Tests\Feature\LeaseTest::testDomainAccess
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function domainAccess()
    {
        $data['title'] = 'Bereikbaarheid';
        return view('lease.front-end-access', $data);
    }

    /**
     * Backend lease index.
     *
     * @see:unit-test   \Tests\Feature\LeaseTest::testBackendIndex
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function leaseBackend()
    {
        $data['title']  = 'Verhuur overzicht';
        $data['lease']  = Lease::with(['status'])->paginate(15);
        $data['status'] = RentalStatus::all();

        return view('lease.back-end-index', $data);
    }

    /**
     * Lease calendar.
     *
     * @see:unit-test   \Tests\Feature\LeaseTest::testLeaseCalendar
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function leaseCalendar()
    {
        $statusId = RentalStatus::where('name', 'Bevestigd')->first()->id;

        $data['title']  = 'Verhuur kalender.';
        $data['leases'] = Lease::where('rental_status_id', $statusId)->paginate(15);
        return view('lease.front-end-calendar', $data);
    }

    /**
     * Insert a new domain lease.
     *
     * @see:unit-test   \Tests\Feature\LeaseTest::testInsertLeaseErr
     * @see:unit-test   \Tests\Feature\LeaseTest::testInsertLeaseNoErr
     *
     * @param  LeaseValidator  $input  The lease request data validator.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function insertLease(LeaseValidator $input)
    {
        $MySQL['insert'] = Lease::create($input->except('_token'));
        $MySQL['update'] = Lease::find($MySQL['insert']->id)->update([
            'rental_status_id' => RentalStatus::where('name', 'Nieuwe aanvraag')->first()->id
        ]);

        if ($MySQL['insert'] && $MySQL['update']) {
            session()->flash('class', 'alert alert-success');
            session()->flash('message', 'De aanvraag is verwerkt.');
        }

        return back();
    }

    /**
     * Request a new domain lease.
     *
     * @see:unit-test   \Tests\Feature\LeaseTest::testRequestLease
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function requestLease()
    {
        $data['title'] = 'Verhuring aanvragen';
        return view('lease.front-end-request', $data);
    }


    /**
     * Set a lease to confirmed status.
     *
     * @see:unit-test   \Tests\Feature\LeaseTest::testSetConfirmed
     *
     * @param  int $id The lease id in the database.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function setConfirmed($id)
    {
        $MySQL['update'] = Lease::find($id)->update([
            'rental_status_id' => RentalStatus::where('name', 'Bevestigd')->first()->id
        ]);

        if ($MySQL['update']) {
            session()->flash('class', 'alert alert-success');
            session()->flash('message', 'De verhuring is bevestigd.');
        }

        return back();
    }

    /**
     * Set a lease to option status.
     *
     * @see:unit-test  \Tests\Feature\LeaseTest::testSetOption
     *
     * @param  int $id The lease id in the database.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function setOption($id)
    {
        $MySQL['update'] = Lease::find($id)->update([
            'rental_status_id' => RentalStatus::where('name', 'Optie')->first()->id
        ]);

        if ($MySQL['update']) {
            session()->flash('class', 'alert alert-success');
            session()->flash('message', 'De verhuring is gezet naar een Optie.');
        }

        return back();
    }

    /**
     * Soft delete a rental in the database.
     *
     * @see:unit-test \Tests\Feature\LeaseTest::testLeaseDelete
     *
     * @param  int $id The rentalid in the database
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteLease($id)
    {
        if (Lease::find($id)->delete()) {
            session()->flash('class', 'alert alert-success');
            session()->flash('message', 'De verhuring is verwijderd.');
        }

        return back();
    }
}
