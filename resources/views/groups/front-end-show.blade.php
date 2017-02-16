@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
        </div>
    </div>

    <div class="row row-padding">
        {{-- Content --}}
        {{-- /Content --}}

        {{-- Sidebar --}}
            <div class="col-sm-12 col-md-3">
                <div class="panel panel-default border">
                    <div class="panel-heading">
                        Activiteiten:
                    </div>

                    <div class="list-group">
                        @foreach ($group->activities as $activity)
                        @endforeach
                    </div>
                </div>
            </div>
        {{-- /Sidebar --}}
    </div>
@endsection