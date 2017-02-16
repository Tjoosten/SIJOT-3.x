@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <img class="img-rounded img-front" src="{{ asset('img/front.jpg') }}" alt="BK postjes pakken">
        </div>
    </div>

    <div class="row row-padding">
        {{-- Content --}}
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-body">

                    </div>
                </div>
            </div>
        {{-- /Content --}}

        {{-- Activities --}}
            <div class="col-sm-12 col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">Activiteiten</div>

                    {{-- Listing --}}
                        <div class="list-group">
                            <a href="" class="list-group-item">Test</a>
                        </div>
                    {{-- /Listing --}}
                </div>
            </div>
        {{-- /Activities --}}
    </div>
@endsection