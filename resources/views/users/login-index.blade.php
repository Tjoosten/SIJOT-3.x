@extends('layouts.backend')

@section('page-heading')
    {{-- Page Title --}}
    <h1> Login <small>overzicht</small></h1>

    {{-- Breadcrumb --}}
    <ol class="breadcrumb">
        <li><a href="{{ route('home.backend') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Login overzicht</li>
    </ol>
@endsection

@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Logins</h3>

            <div class="box-tools pull-right">
                <a href="" class="label label-success">Login toevoegen</a>
            </div>
        </div>

        <div class="box-body">
            @if ((int) count($users) > 0)
                <div class="table-responsive">
                    <table class="table table-condensed table-hover table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Status:</th>
                                <th>Naam:</th>
                                <th>Email:</th>
                                <th>Laatst aangepast:</th>
                                <th colspan="2">Aangemaakt op:</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td><code>#U{{ $user->id }}</code></td>

                                    @if ($user->hasRole('active'))
                                        <td><span class="label label-success">Actief</span></td>
                                    @elseif($user->hasRole('blocked'))
                                        <td><span class="label label-danger">Geblokkeerd</span></td>
                                    @else
                                        <td><span class="label label-warning">Onbekend</span></td>
                                    @endif

                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->updated_at }}</td>
                                    <td>{{ $user->created_at }}</td>

                                    <td> {{-- Functions --}}
                                        <a href="{{ route('account.delete', ['id' => $user->account]) }}" class="label label-danger">
                                            <span class="fa fa-close" aria-hidden="true"></span> Verwijder
                                        </a>

                                        @if ($user->hasRole('active'))
                                            <a href="{{ route('account.block', ['id' => $user->id]) }}" class="label label-danger">
                                                <span class="fa fa-check" aria-hidden="true"></span> Blokkeer
                                            </a>
                                        @elseif($user->hasRole('blocked'))
                                            <a href="{{ route('account.unblock', ['id' => $user->id]) }}" class="label label-success">
                                                <span class="fa fa-check" aria-hidden="true"></span> Activeer
                                            </a>
                                        @endif
                                    </td> {{-- /Functions --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="alert alert-info" role="alert">
                    <strong>Info:</strong> Er zijn geen logins gevonden in het systeem.
                </div>
            @endif
        </div>
    </div>
@endsection