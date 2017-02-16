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
        </div>

    </form>
</div>