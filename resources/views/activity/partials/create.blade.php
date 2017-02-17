<!-- Modal -->
<div class="modal fade" id="newActivity" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Activiteit toevoegen.</h4>
            </div>
            <div class="modal-body">
                <form id="activity" class="form-horizontal" action="" method="POST">
                    {{-- CSRF field --}}
                    {{ csrf_field() }}

                    <input type="hidden" value="{{ auth()->user()->id }}">

                    <div class="form-group">
                        <label for="heading" class="col-sm-3 control-label">
                            Titel: <span class="text-danger">*</span>
                        </label>

                        <div class="col-sm-9">
                            <input type="text" placeholder="Activiteit titel" name="heading" class="form-control" id="heading">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="sub_heading" class="control-label col-sm-3">
                            Sub titel: <span class="text-danger">*</span>
                        </label>

                        <div class="col-sm-9">
                            <input type="text" placeholder="Sub titel" name="sub_heading" class="form-control" id="sub_heading">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="group" class="control-label col-sm-3">
                            Groep: <span class="text-danger">*</span> 
                        </label>
                        
                        <div class="col-sm-9">
                            <select class="form-control" name="group" id="group">
                                <option value="">-- selecteer een groep --</option>

                                @foreach($groups as $group)
                                    <option value="{{ $group->id }}"> De {{ $group->selector }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description" class="control-label col-sm-3">
                            Beschrijving: <span class="text-danger">*</span>
                        </label>

                        <div class="col-sm-9">
                            <textarea class="form-control" name="description" id="description" rows="7" placeholder="Activiteit beschrijving"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">
                            Status: <span class="text-danger">*</span>
                        </label>

                        <div class="col-sm-9">
                            <label class="radio-inline"><input name="status_id" type="radio" value="Klad"> Klad versie</label>
                            <label class="radio-inline"> <input name="status_id" type="radio" value="Publiek"> Publieke versie</label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">
                    <span class="fa fa-close" aria-hidden="true"></span> Sluiten
                </button>

                <button type="submit" class="btn btn-sm btn-success" form="activity">
                    <span class="fa fa-check" aria-hidden="true"></span> Aanmaken
                </button>
            </div>
        </div>
    </div>
</div>