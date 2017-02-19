@extends('layouts.backend')

@section('page-heading')
    {{-- Page Title --}}
    <h1> Verhuur <small>overzicht</small></h1>

    {{-- Breadcrumb --}}
    <ol class="breadcrumb">
        <li><a href="{{ route('home.backend') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Verhuur overzicht</li>
    </ol>
@endsection

@section('content')
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Verhuringen</h3>

            <div class="box-tools pull-right">
                <a href="#" class="label label-info">Exporteer</a>
                <a href="#" data-toggle="modal" data-target="#searchLease" class="label label-info">Verhuring zoeken</a>
                <a href="#" data-toggle="modal" data-target="#newLease" class="label label-success">Verhuring toevoegen</a>
            </div>
        </div>
        <div class="box-body">
            @if ((int) count($lease) > 0)
                <table class="table table-condensed table-hover table-responsive">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Status:</th>
                            <th>Start datum:</th>
                            <th>Eind datum:</th>
                            <th>Groep:</th>
                            <th>Email:</th>
                            <th>Tel. nr:</th>
                            <th colspan="2">Aangevraagd op:</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($lease as $data)
                            <tr class="{{ $data->status->table_class }}">
                                <td><code>#{{ $data->id }}</code></td>
                                <td><span class="label {{ $data->status->label_class }}">{{ $data->status->name }}</span></td>
                                <td>{{ $data->start_date->format('d/m/Y') }}</td>
                                <td>{{ $data->end_date->format('d/m/Y') }}</td>
                                <td>{{ $data->group_name }}</td>
                                <td>{{ $data->email_address }}</td>
                                <td>{{ $data->phone_number }}</td>
                                <td>{{ $data->created_at }}</td>

                                {{-- Options --}}
                                    <td>
                                        <span class="pull-right">
                                            <a class="label label-warning" href="{{ route('lease.option', ['id' => $data->id ]) }}"><span class="fa fa-check"></span> Optie</a>
                                            <a class="label label-success" href="{{ route('lease.confirm', ['id' => $data->id]) }}"><span class="fa fa-check"></span> Bevestig</a>
                                            <a class="label label-info" href="#"><span class="fa fa-file-text-o"></span> Info</a>
                                            <a class="label label-danger" href="{{ route('lease.delete', ['id' => $data->id]) }}"><span class="fa fa-trash"></span> Verwijder</a>
                                        </span>
                                    </td>
                                {{-- /Options --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="alert alert-info">
                    <strong><span class="fa fa-warning"></span> Info:</strong> Er zijn geen verhuringen gevonden in het systeem.
                </div>
            @endif
        </div>
        <!-- /.box-body -->
        @if ((int) count($lease) > 15)
            <div class="box-footer">
                {{ $lease->links() }}
            </div>
        @endif
        <!-- /.box-footer-->
    </div>
    <!-- /.box -->

    {{--Lease modal includes --}}
        @include('lease.partials.create-modal')
        @include('lease.partials.search-modal')
    {{-- /Lease modal includes --}}
@endsection