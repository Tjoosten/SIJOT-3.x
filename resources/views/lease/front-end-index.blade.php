@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <img class="img-rounded img-front" src="http://www.wansmaak.activisme.be/assets/img/front.jpg" alt="BK postjes pakken">
        </div>
    </div>

    <div class="row row-padding">
        <div class="col-md-9">
            <div class="panel panel-default border">
                <div class="panel-body">
                    <div style="margin-top: -20px;" class="page-header">
                        <h2 style="margin-bottom: -5px;">Verhuur info</h2>
                    </div>

                    <p>
                        Onze Lokalen zijn het hele jaar te huur voor verenigingen. <br>
                        Of je een kampplaats in een mooie, avontuurlijke omgeving met speelterrein voor kinderen. <br>
                        een overnachtings plaats zoekt, of ...! We zijn rustig gelegen nabij het stadspark van Turnhout. <br>
                    </p>

                    <div class="row">
                        <div class="col-md-6">
                            <img class="img-rounded img-thumbnail" style="width: 400px; height: 200px;" src="{{ asset('img/lease-1.jpg') }}" alt="">
                        </div>

                        <div class="col-md-6">
                            <img class="img-rounded img-thumbnail" style="width: 400px; height: 200px;" src="{{ asset('img/lease-2.jpg') }}" alt="">
                        </div>
                    </div>

                    <p style="margin-top: 7px;">
                        Onze lokalen Bestaan uit 2 Blokken. Waarin 1 grote zaal en 5 lokalen en sanitaire blok gevestigd zijn. De grote zaal is <br>
                        Polyvalente. Verder is er ook nog een keuken. Deze keuken is voorzien 2 gasfornuizen, friet ketel ,keuken eilend, enz...
                    </p>

                    <div class="row">
                        <div class="col-md-6">
                            <img class="img-rounded img-thumbnail" style="width: 400px; height: 200px;" src="{{ asset('img/lease-3.jpg') }}" alt="">
                        </div>

                        <div class="col-md-6">
                            <img class="img-rounded img-thumbnail" style="width: 400px; height: 200px;" src="{{ asset('img/lease-4.jpg') }}" alt="">
                        </div>
                    </div>

                    <p style="margin-top: 7px;">
                        In alle gebouwen is er verwarming aanwezig. Aan de gebouwen grenst er zich een groot grasveld, bos, vuurplaats <br>
                        + u bevindt zich op wandel afstand van het stadspark. U hoeft ook echter 2 km te rijden voor zich u aan een <br>
                        supermarkt bevind.
                    </p>

                </div>
            </div>
        </div>

        <div class="col-sm-3">
            @include('lease.partials.sidebar')
        </div>
    </div>
@endsection