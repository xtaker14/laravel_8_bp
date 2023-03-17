<div wire:ignore>
    <select name="user" class="form-control" id="select2-user" wire:model="selectedUser" {{ $is_required == 'yes' ? 'required' : '' }} {{ $is_readonly == 'yes' ? 'readonly' : '' }}>
        <option value="">
            --Choose One--
        </option>
        @foreach($user_list as $idx => $val)
            <option value="{{ $val['id'] }}" {{ $current_value == $val['id'] ? 'selected' : '' }}>{{ $val['name'] }}</option>
        @endforeach
    </select>
</div>

@push('after-styles')
    {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css"> --}}
@endpush

@push('after-scripts')
    {{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}
@endpush
    
@php
    $opt_select2 = [
        'theme' => 'bootstrap4',
        'allowClear' => true,
    ];

    if($is_required == 'yes'){
        $opt_select2['disabled'] = true;
    }
@endphp

@push('additional-scripts')
    <script> 
        // $(document).ready(function () {
        //     $('#select2-user').select2({
        //         theme: 'bootstrap4',
        //         allowClear: true,
        //     });
        //     $('#select2-user').on('change', function (e) {
        //         var data = $('#select2-user').select2("val");
        //         @this.set('user_val', data);
        //     });
        // });
        
        let opt_select2 = <?= json_encode($opt_select2); ?>;

        window.loadUserSelect2 = () => {
            $('#select2-user').select2(opt_select2).on('change',function () {
                var select_val = $(this).select2("val");
                livewire.emitTo('components.backend.select2-user', 'usersSelect', $(this).val());
            });
        }
        loadUserSelect2();
        window.livewire.on('loadUserSelect2',()=>{
            loadUserSelect2();
        });
    </script>
@endpush