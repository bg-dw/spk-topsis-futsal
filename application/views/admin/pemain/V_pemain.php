<div class="panel box-shadow-none content-header">
    <div class="panel-body">
        <div class="col-md-12">
            <h3 class="animated fadeInLeft">Pemain</h3>
            <p class="animated fadeInDown">
                Beranda <span class="fa-angle-right fa"></span> Pemain
            </p>
        </div>
    </div>
</div>
<div class="form-element">
    <div class="col-md-12" style="margin-bottom: 50px;">
        <div class="col-md-12 tabs-area">
            <div class="liner"></div>
            <ul class="nav nav-tabs nav-tabs-v5" id="tabs-demo6">
                <li class="active">
                    <a href="#tabs-demo6-area1" data-toggle="tab" title="Daftar Pemain">
                        <span class="round-tabs one">
                            <i class="fa fa-users"></i>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#tabs-demo6-area2" data-toggle="tab" title="Tambah Pemain">
                        <span class="round-tabs two">
                            <i class="fa fa-plus"></i>
                        </span>
                    </a>
                </li>
            </ul>
            <div class="tab-content tab-content-v5">
                <div class="tab-pane fade in active" id="tabs-demo6-area1">
                    <h3 class="head text-center">Daftar Pemain</h3>
                    <div class="col-md-12">
                        <div class="responsive-table">
                            <table class="table datatables table-striped table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Club</th>
                                        <th>Nama Pemain</th>
                                        <th style="text-align: center;">No. Punggung</th>
                                        <th>Posisi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($pemain as $val) { ?>
                                        <tr>
                                            <td><?= $i . "."; ?></td>
                                            <td><?= $val->nama_tim ?></td>
                                            <td><?= $val->nama ?></td>
                                            <td style="text-align: center;">
                                                <button class=" btn btn-circle btn-3d btn-md btn-primary" value="primary">
                                                    <span class="label label-primary"><?= $val->no_punggung ?></span>
                                                </button>
                                            </td>
                                            <td><?= $val->posisi ?></td>
                                            <td width="20%">
                                                <div class="col-md-6">
                                                    <button class="ripple btn-3d btn-warning" data-toggle="modal" data-target="#modal-edit" onclick="edit_pemain('<?= $val->id_pemain ?>','<?= $val->id_tim ?>','<?= $val->nama ?>','<?= $val->no_punggung ?>','<?= $val->posisi ?>');">Edit</button>
                                                </div>
                                                <div class="col-md-6">
                                                    <button class="ripple btn-3d btn-danger" data-toggle="modal" data-target="#modal-delete" onclick="delete_pemain('<?= $val->id_pemain ?>','<?= $val->id_tim ?>','<?= $val->nama ?>','<?= $val->no_punggung ?>','<?= $val->posisi ?>');">Hapus</button>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php $i++;
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="tabs-demo6-area2">
                    <h3 class="head text-center">Tambah Pemain</h3>
                    <div class="col-md-12">
                        <form action="<?= base_url('admin/c_pemain/ac_add_pemain') ?>" method="post">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <div>
                                    <label style="font-size: 20px;">Nama Club</label>
                                    <div class="form-group">
                                        <select class="fomr-text select2" name="tim" required style="width: 100%;">
                                            <option value="">Pilih Club</option>
                                            <?php foreach ($club as $isi) : ?>
                                                <option value="<?= $isi->id_tim ?>"><?= $isi->nama_tim ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                    <input type="text" name="nama_pemain" class="form-text" required>
                                    <span class="bar"></span>
                                    <label>Nama Pemain</label>
                                </div>
                                <div>
                                    <label style="font-size: 20px;">Posisi</label>
                                    <div class="form-group" style="margin-bottom: 60px;">
                                        <div class="col-md-6">
                                            <input type="radio" name="posisi" value="NON-GK" id="rd-pos1" checked> <label for="rd-pos1"><b> Non-Kiper</b></label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="radio" name="posisi" value="GK" id="rd-pos2"> <label for="rd-pos2"><b>Kiper</b></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                    <input type="number" name="nomor" min="1" max="100" value="1" class="form-text" required>
                                    <span class="bar"></span>
                                    <label>No. Punggung</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-6"></div>
                                <div class="col-md-6 text-center">
                                    <button type="submit" class="btn btn-success btn-round green">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>


<!-- /.modal -->
<div class="modal fade" id="modal-edit" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Pemain</h4>
            </div>
            <form action="<?= base_url('admin/c_Pemain/ac_update_Pemain') ?>" method="post">
                <div class="modal-body">
                    <div class="card-body">
                        <input type="hidden" name="id" class="form-text" required id="e-id">
                        <div>
                            <label style="font-size: 20px;">Nama Club</label>
                            <div class="form-group">
                                <select class="fomr-text select2" name="tim" required style="width: 100%;" id="e-club">
                                    <option value="">Pilih Club</option>
                                    <?php foreach ($club as $isi) : ?>
                                        <option value="<?= $isi->id_tim ?>"><?= $isi->nama_tim ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group form-animate-text" style="margin-top:40px !important;">
                            <input type="text" name="nama_pemain" class="form-text" required id="e-pemain">
                            <span class="bar"></span>
                            <label>Nama Pemain</label>
                        </div>
                        <div>
                            <label style="font-size: 20px;">Posisi</label>
                            <div class="form-group" style="margin-bottom: 60px;">
                                <div class="col-md-6">
                                    <input type="radio" name="posisi" value="NON-GK" id="erd-pos1" checked> <label for="erd-pos1"><b> Non-Kiper</b></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="radio" name="posisi" value="GK" id="erd-pos2"> <label for="erd-pos2"><b>Kiper</b></label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-animate-text" style="margin-top:40px !important;">
                            <input type="number" name="nomor" min="1" max="100" class="form-text" required id="e-no">
                            <span class="bar"></span>
                            <label>No. Punggung</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- /.modal -->
<div class="modal fade" id="modal-delete" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Hapus Pemain</h4>
            </div>
            <form action="<?= base_url('admin/c_pemain/ac_delete_pemain') ?>" method="post">
                <div class="modal-body">
                    <div class="card-body">
                        <input type="hidden" name="id" class="form-text" required id="d-id">
                        <div class="col-md-12" style="margin-bottom: 20px;">
                            <label style="font-size: 20px;">Nama Club</label>
                            <div class="form-group">
                                <select class="fomr-text select2" name="tim" required style="width: 100%;" id="d-club" disabled>
                                    <option value="">Pilih Club</option>
                                    <?php foreach ($club as $isi) : ?>
                                        <option value="<?= $isi->id_tim ?>"><?= $isi->nama_tim ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <span class="bar"></span>
                        </div>
                        <div class="form-group" style="margin-top:40px !important;">
                            <label class="col-sm-4">Nama Pemain</label>
                            <input type="text" required id="d-pemain" readonly>
                            <span class="bar"></span>
                        </div>
                        <div class="col-md-12">
                            <label style="font-size: 20px;">Posisi</label>
                            <div class="form-group" style="margin-bottom: 60px;">
                                <div class="col-md-6">
                                    <input type="radio" name="posisi" value="NON-GK" id="drd-pos1" checked> <label for="drd-pos1"><b> Non-Kiper</b></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="radio" name="posisi" value="GK" id="drd-pos2"> <label for="drd-pos2"><b>Kiper</b></label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" style="margin-top:40px !important;">
                            <label class="col-sm-4">No. Punggung</label>
                            <input type="text" required id="d-no" readonly>
                            <span class="bar"></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script>
    function edit_pemain(id, id_tim, nm, no, pos) {
        $('#e-id').val(id);
        $('#e-club').val(id_tim).change();
        $('#e-pemain').val(nm);
        $('#e-no').val(no);
        var setpos1 = $('#erd-pos1'); //non-gk
        var setpos2 = $('#erd-pos2'); //gk
        if (pos == "GK") {
            setpos2.prop('checked', true);
        } else {
            setpos1.prop('checked', true);
        }
    }

    function delete_pemain(id, id_tim, nm, no, pos) {
        $('#d-id').val(id);
        $('#d-club').val(id_tim).change();
        $('#d-pemain').val(nm);
        $('#d-no').val(no);
        var setpos1 = $('#drd-pos1'); //non-gk
        var setpos2 = $('#drd-pos2'); //gk
        if (pos == "GK") {
            setpos2.prop('checked', true);
        } else {
            setpos1.prop('checked', true);
        }
    }
</script>