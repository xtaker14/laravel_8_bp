
<form action="{{ route('admin.db.backup_db') }}" method="post">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-md-5 form-group">
            Backup database :
        </div>
        <div class="col-md-6 form-group">
            <button style="submit" class="btn btn-primary">Download</button>
        </div>
    </div>
</form>

<form action="{{ route('admin.db.update_impot_sql') }}" method="post">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-md-5 form-group">
            Update import.sql file (untuk kebutuhan instalasi awal project) :
        </div>
        <div class="col-md-6 form-group">
            <button style="submit" class="btn btn-primary">Update</button>
        </div>
    </div>
</form>

@push('additional-scripts')
    @if(session()->get('flash_update_impot_sql'))
    <script>
        $(function(){
            swal({
                title: "{{ session()->get('flash_update_impot_sql') }}",
                type: "info",
                showCancelButton: false,
                confirmButtonClass: 'btn btn-success',
                buttonsStyling: false,
                confirmButtonText: "OK",
                closeOnConfirm: true,
                showLoaderOnConfirm: true,
            },
                function (isConfirm) {
                if (isConfirm) {
                    return true;
                }
                return false;
                });
        });
    </script>
    @endif 
@endpush 