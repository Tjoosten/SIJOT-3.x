<div class="modal fade" id="newKey" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">API sleutel toevoegen</h4>
            </div>
            <div class="modal-body">
                <form action="" class="form-horizontal" id="keyInsert" method="POST">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <div class="col-md-12">
                            <select class="form-control" name="user">
                                <option value="">-- selecteer de login --</option>

                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" name="service" placeholder="Naam sleutel" class="form-control">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success btn-sm" form="keyInsert">
                    <span class="fa fa-check" aria-hidden="true"></span> Aanmaken
                </button>

                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">
                    <span class="fa fa-close" aria-hidden="true"></span> Sluiten
                </button>
            </div>
        </div>
    </div>
</div>