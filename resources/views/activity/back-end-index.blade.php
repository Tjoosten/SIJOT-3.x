@extends('layouts.backend')

@section('page-heading')
    {{-- Page Title --}}
    <h1> Activiteiten <small>overzicht</small></h1>

    {{-- Breadcrumb --}}
    <ol class="breadcrumb">
        <li><a href="{{ route('home.backend') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Activiteiten overzicht</li>
    </ol>
@endsection


@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Activiteit</h3>

            <div class="box-tools pull-right">
                <a href="#" data-toggle="modal" data-target="#newActivity" class="label label-success">Activiteit toevoegen</a>
            </div>
        </div>
        <div class="box-body">
            @if ((int) count($activities) === 0)
                <div class="alert alert-info">
                    <strong><span class="fa fa-warning" aria-hidden="true"></span> Info:</strong>
                    Er zijn nog geen activiteiten aangemaakt.
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover table-condensed">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Status:</th>
                                <th>Aangemaakt door:</th>
                                <th>Titel:</th>
                                <th colspan="2">Aangemaakt op:</th> {{-- Functions are embedded into this th --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($activities as $activity)
                                <tr>
                                    <th><code>#A{{ $activity->id }}</code></th>
                                    <th>{{ $activity->status->name }}</th>
                                    <th>{{ $activity->creator->name }}</th>
                                    <th>{{ $activity->heading }}</th>
                                    <th>{{ $activity->created_at }}</th>

                                    <th> {{-- Functions --}}
                                        <a href="" class="label label-danger">Verwijder</a>
                                    </th> {{-- /Functions --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>

        {{-- Modal includes --}}
            @include('activity.partials.create')
        {{-- Modal includes --}}
    </div>
@endsection