<?php

namespace Sijot\Http\Controllers;

use Illuminate\Http\Request;
use Sijot\Http\Requests\LeaseSearchValidator;
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
        if (! auth()->check()) { // No user is logged in
            $updateFields = ['rental_status_id' => RentalStatus::where('name', 'Nieuwe aanvraag')->first()->id];
        } else { // User is logged in
            $updateFields = ['rental_status_id' => $input->status_id];
        }

        $MySQL['insert'] = Lease::create($input->except('_token'));
        $MySQL['update'] = Lease::find($MySQL['insert']->id)->update($updateFields);

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
     * Search for a specific lease.
     *
     * @see:unit-test   \Tests\Feature\LeaseTest::testSearchDataFound
     *
     * @param   LeaseSearchValidator $input
     * @return  \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(LeaseSearchValidator $input)
    {
        $term = $input->get('term');

        $data['title']  = 'Verhuur zoeken';
        $data['status'] = RentalStatus::all();
        $data['lease']  = Lease::with(['status'])
            ->where('start_date', 'LIKE', "%$term%")
            ->orWhere('end_date', 'LIKE', "%$term%")
            ->orWhere('email_address', 'LIKE', "%$term%")
            ->orWhere('group_name', 'LIKE', "%$term%")
            ->orWhere('phone_number', 'LIKE', "%$term%")
            ->paginate(15);

        if ((int) count($data['lease']) === 0) {
            session()->flash('class', 'alert alert-success');
            session()->flash('message', 'Er zijn geen verhuring gevonden onder de term: ' . $term);

            $data['lease']  = Lease::with(['status'])->paginate(15);
        }

        return view('lease.back-end-index', $data);
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
     * Show specific information for a specific lease.
     *
     * @param  int $id The lease id.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function leaseShow($id)
    {
        $data['lease'] = Lease::find($id);
        $data['title'] = 'Verhuur info #' . $data['lease']->id;

        return view('lease.back-end-show', $data);
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
