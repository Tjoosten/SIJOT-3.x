@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <img class="img-rounded img-front" src="http://www.wansmaak.activisme.be/assets/img/front.jpg" alt="BK postjes pakken">
        </div>
    </div>

    <div class="row row-padding">
        <div class="col-md-9">
            <div class="panel panel-default border">
                <div class="panel-body">
                    <div style="margin-top: -20px;" class="page-header">
                        <h2 style="margin-bottom: -5px;">Verhuur kalender</h2>
                    </div>

                    <p>
                        Hier vind u wanner onze lokalen al reeds verhuurd zijn.
                        Vind u hier de datum niet dat u onze lokalen wilt huren leg dan snel je datum vast.
                        Dat doe je door dit <a href="{{ route('lease.request') }}">formulier</a> in te vullen.
                    </p>

                    <div class="row">
                        @if ((int) count($leases) === 0)
                            <div class="col-md-6 col-sm-6 col-lg-6">
                                <div class="alert alert-info">
                                    <strong><span class="fa fa-info-circle"></span> Info:</strong> Er zijn momenteel geen verhuringen.
                                </div>
                            </div>
                        @else
                            <div class="col-md-4 col-sm-4 col-lg-4">
                                <table class="table table-condensed">
                                    <thead>
                                    <tr>
                                        <th>Start datum</th>
                                        <th></th>
                                        <th>Eind datum</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($leases as $lease)
                                        <tr>
                                            <td>{{ $lease->start_date->format('d/m/Y') }}</td>
                                            <td><span class="text-center"> - </span></td>
                                            <td>{{ $lease->end_date->format('d/m/Y') }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            @include('lease.partials.sidebar')
        </div>
    </div>
@endsection