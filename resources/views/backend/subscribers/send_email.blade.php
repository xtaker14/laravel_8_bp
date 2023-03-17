<div class="modal fade" id="SendNewEmail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Kirim Email?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <form action="{{ url('admin/subscribers/send_email') }}" method="post" accept-charset="utf-8">
                    {{ csrf_field() }}

                    {{-- <select name="slc_email" class="form-control select2">
                        <option value="">--Choose One--</option>
                    </select> --}} 

                    <div class="form-group row">
                        <label class="col-md-3 text-right">Isi Email</label>
                        <div class="col-md-9">
                            <textarea name="txt_content_email" class="form-control simple" placeholder="Content Email"></textarea>
                            @if ($errors->has('txt_content_email'))
                                <span class="text-danger">{{ $errors->first('txt_content_email') }}</span>
                            @endif  
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 text-right"></label>
                        <div class="col-md-9">
                            <div class="btn-group">
                                <input type="submit" name="submit" class="btn btn-success " value="Kirim Email">
                                <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                </form>

            </div>
        </div>
    </div>
</div>
