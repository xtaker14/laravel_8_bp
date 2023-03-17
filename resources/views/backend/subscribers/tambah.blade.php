<div class="modal fade" id="Tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Tambah data?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">

                <form action="{{ url('admin/subscribers/tambah') }}" method="post" accept-charset="utf-8">
                    {{ csrf_field() }}

                    <div class="form-group row">
                        <label class="col-md-3 text-right">Email</label>
                        <div class="col-md-9">
                            <input type="text" name="inp_email" class="form-control" placeholder="Email" value="" required>
                            @if ($errors->has('inp_email'))
                                <span class="text-danger">{{ $errors->first('inp_email') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 text-right">Nama</label>
                        <div class="col-md-9">
                            <input type="text" name="inp_name" class="form-control" placeholder="Nama" value="" required>
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
