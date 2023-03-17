<div class="modal fade" id="Edit<?php echo $val->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Edit data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">

                <form action="{{ asset('admin/statistik/edit') }}" method="post" accept-charset="utf-8">
                    {{ csrf_field() }}
                    <input type="hidden" name="inp_id" value="{{ $val->id }}">
                    <div class="form-group row">
                        <label class="col-md-3 text-right">Judul</label>
                        <div class="col-md-9">
                            <input type="text" name="inp_title" class="form-control"
                                placeholder="Judul" value="<?php echo $val->title; ?>" required>
                            @if ($errors->has('inp_title'))
                                <span class="text-danger">{{ $errors->first('inp_title') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 text-right">Nilai</label>
                        <div class="col-md-9">
                            <input type="text" name="inp_value" class="form-control" placeholder="Nilai" value="<?php echo $val->value; ?>" required>
                            @if ($errors->has('inp_value'))
                                <span class="text-danger">{{ $errors->first('inp_value') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 text-right">Text Nilai</label>
                        <div class="col-md-9">
                            <input type="text" name="inp_subtitle" class="form-control" placeholder="Text Nilai" value="<?php echo $val->subtitle; ?>" required>
                            @if ($errors->has('inp_subtitle'))
                                <span class="text-danger">{{ $errors->first('inp_subtitle') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 text-right">Nomor urut</label>
                        <div class="col-md-9">
                            <input type="number" name="inp_urutan" class="form-control" placeholder="Urutan"
                                value="<?php echo $val->urutan; ?>" required>
                            @if ($errors->has('inp_urutan'))
                                <span class="text-danger">{{ $errors->first('inp_urutan') }}</span>
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
