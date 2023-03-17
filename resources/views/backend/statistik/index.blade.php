<p>
    @include('backend/statistik/tambah')
</p>

<table class="table table-bordered" id="example1">
    <thead>
        <tr>
            <th width="5%">NO</th>
            <th >Judul</th>
            <th >Nilai</th>
            <th >Text Nilai</th>
            <th width="5%">Urutan</th>
            <th width="10%">Pembuat</th>
            <th width="10%">Tanggal Terbuat</th>
            <th width="10%">Pengedit</th>
            <th width="10%">Tanggal Diedit</th>
            <th></th>
        </tr>
    </thead>
    <tbody>

        <?php $i=1; foreach($statistik_data as $val) { ?>

        <tr>
            <td class="text-center"><?php echo $i; ?></td>
            <td><?php echo $val->title; ?></td>
            <td><?php echo number_format($val->value,0,",","."); ?></td>
            <td><?php echo $val->subtitle; ?></td>
            <td><?php echo $val->urutan; ?></td>
            <td class="text-center"><?php echo $val->userCreated->name; ?></td>
            <td><?php echo $val->created_date; ?></td>
            <td class="text-center"><?php echo $val->userUpdated->name; ?></td>
            <td><?php echo $val->updated_date; ?></td>
            <td>
                <div class="btn-group">
                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#Edit<?php echo $val->id; ?>">
                        <i class="fa fa-edit"></i> Edit
                    </button>
                    <a href="{{ asset('admin/statistik/delete/' . $val->id) }}" class="btn btn-danger btn-sm delete-link">
                        <i class="fas fa-trash-alt"></i> Hapus
                    </a>
                </div>
                @include('backend/statistik/edit')
            </td>
        </tr>

        <?php $i++; } ?>

    </tbody>
</table>
