{{-- Modal --}}
<div id="newComment" class="modal fade" role="dialog">
    <div class="modal-dialog">

        {{-- Modal content --}}
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Create a comment</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('comment.new', ['rid' => $request->id]) }}" method="POST">
                    {{-- CSRF FIELD --}}
                    {{ csrf_field() }}

                    <textarea class="form-control" name="comment" placeholder="Your comment" rows="7"></textarea>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Comment</button>
                </form>

                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>