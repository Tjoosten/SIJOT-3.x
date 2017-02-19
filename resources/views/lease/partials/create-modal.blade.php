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