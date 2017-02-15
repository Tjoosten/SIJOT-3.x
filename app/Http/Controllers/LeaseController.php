<?php

namespace Sijot\Http\Controllers;

use Illuminate\Http\Request;
use Sijot\Http\Requests\LeaseValidator;
use Sijot\Lease;
use Sijot\RentalStatus;

class LeaseController extends Controller
{
    /**
     * Front-end index for the domain lease.
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function leaseBackend()
    {
        $data['title'] = 'Verhuur overzicht';
        $data['lease'] = Lease::with(['status'])->paginate(15);
        return view('lease.back-end-index', $data);
    }

    /**
     * Lease calendar.
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
     * @param  LeaseValidator  $input  The lease request data validator.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function insertLease(LeaseValidator $input)
    {
        dd($input->all());
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function requestLease()
    {
        $data['title'] = 'Verhuring aanvragen';
        return view('lease.front-end-request', $data);
    }


    /**
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function setConfirmed($id)
    {
        $MySQL['update'] = Lease::find($id)->update([
            'rental_status_id' => RentalStatus::where('name', 'Bevestigd')->first()->id
        ]);

        if ($MySQL['update']) {
            session()->flash('class', 'alert alert-success');
            session()->flash('message', 'De verhuring is besvestigd.');
        }

        return back();
    }

    /**
     * @param  int $id
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
