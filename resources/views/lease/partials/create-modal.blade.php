<div class="modal fade" id="newLease" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        &times;
                    </span>
                </button>

                <h4 class="modal-title" id="myModalLabel">Verhuring aanmaken</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="" id="create">
                    {{-- CSRF field --}}
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label class="control-label col-sm-3">
                            Start datum: <span class="text-danger">*</span>
                        </label>

                        <div class="col-sm-9">
                            <input type="text" name="start_date" placeholder="Start datum" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">
                            Eind datum: <span class="text-danger">*</span>
                        </label>

                        <div class="col-sm-9">
                            <input type="text" name="end_data" placeholder="Eind datum" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">
                            Status: <span class="text-danger">*</span>
                        </label>

                        <div class="col-sm-9">
                            <select class="form-control" name="status_id">
                                <option value="">-- selecteer de status --</option>

                                @foreach($status as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">
                            Groep: <span class="text-danger">*</span>
                        </label>

                        <div class="col-sm-9">
                            <input type="text" name="group_name" class="form-control" placeholder="Groep">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">
                            Email adres: <span class="text-danger">*</span>
                        </label>

                        <div class="col-sm-9">
                            <input type="text" name="email_address" class="form-control" placeholder="Email adres">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3"> Tel. nr: </label>

                        <div class="col-sm-9">
                            <input type="text" name="phone_number" class="form-control" placeholder="Telefoon nr.">
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">
                    <span class="fa fa-close" aria-hidden="true"></span> Sluiten
                </button>

                <button type="submit" form="create" class="btn btn-sm btn-success">
                    <span class="fa fa-check" aria-hidden="true"></span> Aanmaken
                </button>
            </div>
        </div>
    </div>
</div>