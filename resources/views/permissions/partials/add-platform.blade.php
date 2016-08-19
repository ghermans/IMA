<div id="addApplication" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">
                    <span class="fa fa-plus"></span> Add permission
                </h4>
            </div>
            <div class="modal-body">
                <form method="POST" class="form-horizontal" action="">

                    {{-- CSRF token --}}
                    {{ csrf_field() }}

                    {{-- Name form-group --}}
                    <div class="form-group">
                        <label for="name" class="control-label col-sm-2">
                            Name: <span class="text-danger">*</span>
                        </label>

                        <div class="col-sm-10">
                            <input type="text" name="name" id="name" class="form-control" placeholder="Permission name">
                        </div>
                    </div>

                    {{-- Description view --}}
                    <div class="form-group">
                        <label for="description" class="control-label col-sm-2">
                            Description:
                        </label>

                        <div class="col-sm-10">
                            <textarea class="form-control" name="description" id="description" placeholder="description" rows="7"></textarea>
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>