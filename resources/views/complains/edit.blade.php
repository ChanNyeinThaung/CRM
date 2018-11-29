<div class="modal" id="edit-complain">
    <div class="modal-dialog">
        <form method="post" action="{{ url('/complains/edit/' . $complain->id) }}">
            {{ csrf_field() }}
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Complain</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label><i class="fa fa-font"></i> Subject</label>
                        <input type="text" name="subject" class="form-control" value="{{ $complain->subject }}">
                    </div>
                    <div class="form-group">
                        <label><i class="fa fa-align-left"></i> Detail</label>
                        <textarea name="detail" class="form-control">{{ $complain->detail }}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="Update">
                </div>
            </div>
        </form>
    </div>
</div>
