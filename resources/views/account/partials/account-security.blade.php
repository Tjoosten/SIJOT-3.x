<div class="tab-pane fade in" id="security">
    <form action="" method="POST" class="form-horizontal">
        {{-- CSRF Token --}}
        {{ csrf_field() }}

        <div class="form-group">
            <label for="password" class="control-label col-sm-2">
                Wachtwoord: <span class="text-danger">*</span>
            </label>

            <div class="col-sm-5">
                <input id="password" class="form-control" name="password" placeholder="Wachtwoord" type="password">
            </div>
        </div>

        <div class="form-group">
            <label for="confirmation" class="control-label col-sm-2">
                Bevestiging wachtwoord: <span class="text-danger">*</span>
            </label>

            <div class="col-sm-5">
                <input id="confirmation" class="form-control" name="password_confirmation" placeholder="wachtwoord bevetiging" type="password">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-5">
                <button type="submit" class="btn btn-flat btn-sm btn-success">
                    <span class="fa fa-check" aria-hidden="true"></span> Wijzigen
                </button>

                <button type="reset" class="btn btn-flat btn-sm btn-danger">
                    <span class="fa fa-undo" aria-hidden="true"></span> Reset formulier
                </button>
            </div>
        </div>

    </form>
</div>