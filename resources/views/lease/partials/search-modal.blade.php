<div class="modal fade" id="searchLease" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Verhuring zoeken</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="GET" action="{{ route('lease.search') }}" id="search">
                    {{-- CSRF field --}}
                    {{ csrf_field() }}

                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="term" placeholder="zoek term">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" form="search" class="btn btn-sm btn-success">
                    <span class="fa fa-search" aria-hidden="true"></span> Zoeken
                </button>

                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">
                    <span class="fa fa-close" aria-hidden="true"></span> Sluiten
                </button>
            </div>
        </div>
    </div>
</div>