@extends('layouts.app')

@section('specific-css')
    <link rel="stylesheet" href="{{ asset('css/datepicker.css') }}">
@endsection

@section('specific-js')
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
    <script src="{{ asset('js/datepicker.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#datepicker-start').datetimepicker({locale: 'nl'});
            $('#datepicker-end').datetimepicker({locale: 'nl'});
            $('div.alert').delay(6000).slideUp(300);
        });
    </script>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if(session()->get('class') && session()->get('message'))
                <div class="{{ session()->get('class') }} alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

                    {{ session()->get('message') }}
                </div>
            @endif

            <img class="img-rounded img-front" src="http://www.wansmaak.activisme.be/assets/img/front.jpg" alt="BK postjes pakken">
        </div>
    </div>

    <div class="row row-padding">
        <div class="col-md-9">
            <div class="panel panel-default border">
                <div class="panel-body">
                    <div style="margin-top: -20px;" class="page-header">
                        <h2 style="margin-bottom: -5px;">Verhuur aanvraag</h2>
                    </div>

                    <p><span class="label label-danger"><span class="fa fa-info-circle" aria-hidden="true"></span> info:</span> Het laatste weekend van een maand verhuren we niet.</p>

                    <form style="padding-top: 15px;" class="form-horizontal" action="{{ route('lease.insert') }}" method="POST">
                        {{ csrf_field() }}

                        <div class="form-group {{ $errors->has('start_date') ? 'has-error' : '' }}">
                            <label for="start" class="control-label col-sm-2">
                                <span class="pull-left">Start datum: <span class="text-danger">*</span></span>
                            </label>

                            <div class="col-sm-5">
                                <input id="datepicker-start" value="{{ old('start_date') }}" name="start_date" placeholder="Start datum" class="form-control" type="text">

                                @if ($errors->has('start_date'))
                                    <span class="help-block">
                                        <small>{{ $errors->first('start_date') }}</small>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('end_date') ? 'has-error' : '' }}">
                            <label for="end" class="control-label col-sm-2">
                                <span class="pull-left">Eind datum: <span class="text-danger">*</span></span>
                            </label>

                            <div class="col-sm-5">
                                <input id="datepicker-end" value="{{ old('end_date') }}" name="end_date" placeholder="Eind datum" class="form-control" type="text">

                                @if ($errors->has('end_date'))
                                    <span class="help-block">
                                        <small>{{ $errors->first('end_date') }}</small>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('email_address') ? 'has-error' : '' }}">
                            <label for="email" class="control-label col-sm-2">
                                <span class="pull-left">E-mail: <span class="text-danger">*</span></span>
                            </label>

                            <div class="col-sm-5">
                                <input type="text" value="{{ old('email_address') }}" name="email_address" class="form-control" placeholder="Email adres">

                                @if ($errors->has('email_address'))
                                    <span class="help-block">
                                        <small>{{ $errors->first('email_address') }}</small>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('group_name') ? 'has-error' : '' }}">
                            <label for="group" class="control-label col-sm-2">
                                <span class="pull-left">Groep: <span class="text-danger">*</span></span>
                            </label>

                            <div class="col-sm-5">
                                <input type="text" class="form-control" value="{{ old('group_name') }}" name="group_name" placeholder="Groepsnaam">

                                @if ($errors->has('group_name'))
                                    <span class="help-block">
                                        <small>{{ $errors->first('group_name') }}</small>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="number" class="control-label col-sm-2">
                                <span class="pull-left">GSM-nummer:</span>
                            </label>

                            <div class="col-sm-5">
                                <input type="text" class="form-control" value="{{ old('phone_number') }}" name="phone_number" placeholder="GSM nummer">
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-offset-2 col-md-5">
                                <button type="submit" class="btn btn-sm btn-success">
                                    <span class="fa fa-check" aria-hidden="true"></span> Bevestig
                                </button>

                                <button type="reset" class="btn btn-sm btn-danger">
                                    <span class="fa fa-undo" aria-hidden="true"></span> Reset formulier
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            @include('lease.partials.sidebar')
        </div>
    </div>
@endsection