<div class="modal fade" id="Edit<?php echo $val->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Edit data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">

                <form action="{{ asset('admin/subscribers/edit') }}" method="post" accept-charset="utf-8">
                    {{ csrf_field() }}
                    <input type="hidden" name="inp_id" value="{{ $val->id }}">
                    <div class="form-group row">
                        <label class="col-md-3 text-right">Email</label>
                        <div class="col-md-9">
                            <input type="text" name="inp_email" class="form-control"
                                placeholder="Email" value="<?php echo $val->email; ?>" required>
                            @if ($errors->has('inp_email'))
                                <span class="text-danger">{{ $errors->first('inp_email') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 text-right">Nama</label>
                        <div class="col-md-9">
                            <input type="text" name="inp_name" class="form-control" placeholder="Nama" value="<?php echo $val->name; ?>" required>
                            @if ($errors->has('inp_name'))
                                <span class="text-danger">{{ $errors->first('inp_name') }}</span>
                            @endif
                        </div>
                    </div> 

                    <div class="form-group row">
                        <label class="col-md-3 text-right"></label>
                        <div class="col-md-9">
                            <div class="btn-group">
                                <input type="submit" name="submit" class="btn btn-success " value="Simpan Data">
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
