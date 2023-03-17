<p>
    @include('backend/subscribers/tambah')
    @include('backend/subscribers/send_email')
</p>

<div class="row">
    <div class="col-md-12 form-group">
        <div class="btn-group">
            <button class="btn btn-success" data-toggle="modal" data-target="#Tambah">
                <i class="fa fa-plus"></i> Tambah Baru
            </button>
            <button class="btn btn-info" data-toggle="modal" data-target="#SendNewEmail">
                <i class="fas fa-envelope"></i> Kirim Email Baru
            </button>
        </div>
    </div>
</div>

<table class="table table-bordered" id="example1">
    <thead>
        <tr>
            <th width="5%">NO</th>
            <th >Email</th>
            <th >Nama</th>
            <th >Hit</th>
            <th >Sent</th>
            <th width="10%">Pembuat</th>
            <th width="10%">Tanggal Terbuat</th>
            <th width="10%">Pengedit</th>
            <th width="10%">Tanggal Diedit</th>
            <th></th>
        </tr>
    </thead>
    <tbody>

        <?php $i=1; foreach($subscribers as $val) { ?>

        <tr>
            <td class="text-center"><?php echo $i; ?></td>
            <td><?php echo $val->email; ?></td>
            <td><?php echo $val->name; ?></td>
            <td><?php echo number_format($val->hit,0,",","."); ?></td>
            <td><?php echo number_format($val->sent,0,",","."); ?></td>
            <td class="text-center"><?php echo $val->userCreated->name; ?></td>
            <td><?php echo $val->created_date; ?></td>
            <td class="text-center"><?php echo $val->userUpdated->name; ?></td>
            <td><?php echo $val->updated_date; ?></td>
            <td>
                <div class="btn-group">
                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#Edit<?php echo $val->id; ?>">
                        <i class="fa fa-edit"></i> Edit
                    </button>
                    <a href="{{ asset('admin/subscribers/delete/' . $val->id) }}" class="btn btn-danger btn-sm delete-link">
                        <i class="fas fa-trash-alt"></i> Hapus
                    </a>
                </div>
                @include('backend/subscribers/edit')
            </td>
        </tr>

        <?php $i++; } ?>

    </tbody>
</table>
