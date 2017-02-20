@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <img class="img-rounded img-front" src="http://www.wansmaak.activisme.be/assets/img/front.jpg" alt="BK postjes pakken">
        </div>
    </div>

    <div class="row row-padding">
        {{-- Content --}}
            <div class="col-md-9">
                <div class="panel panel-default border">
                    <div class="panel-body">
                        <div style="margin-top: -20px;" class="page-header">
                            <h2 style="margin-bottom: -5px;">{{ $group->heading }}
                                <small>{{ $group->sub_heading }}</small>
                            </h2>
                        </div>

                        {{-- Text --}}
                            <div class="row">
                                <div class="col-md-2" style="margin-left: -10px;">
                                    <img style="height: 125px; width: 100px; border: 0;" class="pull-right thumbnail img-thumbnail" src="{{ asset($group->image_path) }}" alt="">
                                </div>
                                <div class="col-sm-10">

                                </div>
                            </div>
                        {{-- /Text --}}
                    </div>
                </div>
            </div>
        {{-- /Content --}}

        {{-- Sidebar --}}
            <div class="col-sm-12 col-md-3">
                <div class="panel panel-default border">
                    <div class="panel-heading">
                        Activiteiten:
                    </div>

                    @if ((int) count($group->activities) === 0)
                        <div class="panel-body">
                            <span class="text-muted">
                                <i>(Geen activiteiten gevonden)</i>
                            </span>
                        </div>
                    @else
                        @foreach($group->activities as $activity)
                            {{ dd($activity) }}
                        @endforeach
                    @endif
                    </div>
                </div>
            </div>
        {{-- /Sidebar --}}
    </div>
@endsection