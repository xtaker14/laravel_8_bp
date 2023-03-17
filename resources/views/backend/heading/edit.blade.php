
<div class="modal fade" id="Edit<?php echo $heading->id_heading ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
	<h4 class="modal-title" id="myModalLabel">Edit data</h4>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>
<div class="modal-body">
    
<form action="{{ asset('admin/heading/edit') }}" enctype="multipart/form-data"  method="post" accept-charset="utf-8">
{{ csrf_field() }}
<input type="hidden" name="id_heading"   value="{{ $heading->id_heading }}">

<div class="form-group row">
	<label class="col-md-3">Heading untuk Halaman</label>
	<div class="col-md-9">
		<select name="halaman" class="form-control">
			@foreach ($category_heading as $key => $val)
				<option value="{{ $key }}" @if($heading->halaman == $key) {{ 'selected'; }} @endif >{{ $val }}</option>
			@endforeach 
		</select>
	</div>
</div>

<div class="form-group row">
	<label class="col-md-3">Upload Gambar Status</label>
	<div class="col-md-9">
		<input type="file" name="gambar" class="form-control" placeholder="Upload Gambar" value="">
		@if ($errors->has('gambar'))
	      	<span class="text-danger">{{ $errors->first('gambar') }}</span>
	    @endif  
	</div>
</div>

<div class="form-group row">
	<label class="col-md-3">Nama Status</label>
	<div class="col-md-9">
		<input type="text" name="judul_heading" class="form-control" placeholder="Nama kategori berita" value="<?php echo $heading->judul_heading ?>" required>
	</div>
</div>

<div class="form-group row">
	<label class="col-md-3">Keterangan</label>
	<div class="col-md-9">
		<textarea name="keterangan" class="form-control simple" placeholder="Keterangan">{{ $heading->keterangan }}</textarea>
		@if ($errors->has('keterangan'))
	      	<span class="text-danger">{{ $errors->first('keterangan') }}</span>
	    @endif  
	</div>
</div>


<div class="form-group row">
	<label class="col-md-3"></label>
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
