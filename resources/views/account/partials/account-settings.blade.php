<div class="tab-pane fade in" id="settings">
    <form method="POST" class="form-horizontal" action="" enctype="multipart/form-data">
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
                        <option value="{{ $theme->class }}" @if($user->theme === $theme->class) selected="selected" @endif>
                            {{ $theme->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="name" class="control-label col-sm-2">
                Naam: <span class="text-danger">*</span>
            </label>

            <div class="col-sm-4">
                <input type="text" id="name" class="form-control" placeholder="Gebruikersnaam" value="{{ $user->name }}" name="name">
            </div>
        </div>

        <div class="form-group">
            <label for="Email" class="control-label col-sm-2">
                Email: <span class="text-danger">*</span>
            </label>

            <div class="col-sm-4">
                <input type="email" id="email" class="form-control" placeholder="Email adres." value="{{ $user->email }}">
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