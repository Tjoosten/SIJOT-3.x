@extends('layouts.backend')

@section('page-heading')
    {{-- Page Title --}}
    <h1> API sleutels<small>overzicht</small></h1>

    {{-- Breadcrumb --}}
    <ol class="breadcrumb">
        <li><a href="{{ route('home.backend') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">overzicht</li>
    </ol>
@endsection


@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">API sleutels</h3>

            <div class="box-tools pull-right">
                <a href="#" class="label label-info" data-toggle="modal" data-target="#newKey">Sleutel toevoegen</a>
            </div>
        </div>
        <div class="box-body">
            @if ((int) count($keys) === 0)
                <div class="alert alert-info">
                    <strong>Info:</strong> Er zijn geen API sleutels gevonden in het systeem.
                </div>
            @else

            @endif
        </div>
    </div>

    {{-- Modal includes --}}
        @include('api.partials.create-key')
    {{-- /Modal includes --}}
@endsection