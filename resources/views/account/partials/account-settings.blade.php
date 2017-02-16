<div class="tab-pane fade in" id="settings">
    <form method="POST" class="form-horizontal" action="{{ route('account.settings') }}" enctype="multipart/form-data">
        {{-- CSRF Field --}}
        {{ csrf_field() }}

        <div class="form-group">
            <label for="theme" class="control-label col-md-2">
                Weergave: <span class="text-danger">*</span>
            </label>

            <div class="col-sm-4 col-md-4">
                <select class="form-control" name="theme" id="theme">
                    <option value="">-- Selecteer een weergave --</option>

                    @foreach ($themes as $theme)
                        <option value="{{ $theme->id }}" @if($user->theme === $theme->class) selected="selected" @endif>
                            {{ $theme->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
            <label for="name" class="control-label col-sm-2">
                Naam: <span class="text-danger">*</span>
            </label>

            <div class="col-sm-4">
                <input type="text" id="name" class="form-control" placeholder="Gebruikersnaam" value="{{ $user->name }}" name="name">

                @if ($errors->has('name'))
                    <span class="help-block">
                        <small>{{ $errors->first('name') }}</small>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
            <label for="Email" class="control-label col-sm-2">
                Email: <span class="text-danger">*</span>
            </label>

            <div class="col-sm-4">
                <input type="email" id="email" name="email" class="form-control" placeholder="Email adres." value="{{ $user->email }}">

                @if ($errors->has('email'))
                    <span class="help-block">
                        <small>{{ $errors->first('email') }}</small>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <label for="avatar" class="control-label col-sm-2">
                Avatar: {{-- <span class="text-danger">*</span> --}}
            </label>

            <div class="col-sm-4">
                <input class="form-control" type="file" name="avatar" id="avatar">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-9">
                <button type="submit" class="btn btn-flat btn-sm btn-success">
                    <span class="fa fa-check" aria-hidden="true"></span> Wijzigen
                </button>

                <button type="reset" class="btn btn-danger btn-flat btn-sm">
                    <span class="fa fa-undo" aria-hidden="true"></span> Reset formulier
                </button>
            </div>
        </div>

    </form>
</div>