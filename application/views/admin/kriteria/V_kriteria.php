<div class="panel box-shadow-none content-header">
    <div class="panel-body">
        <div class="col-md-12">
            <h3 class="animated fadeInLeft">Kriteria</h3>
            <p class="animated fadeInDown">
                Beranda <span class="fa-angle-right fa"></span> Kriteria
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
                    <a href="#tabs-demo6-area1" data-toggle="tab" title="Daftar Kriteria">
                        <span class="round-tabs one">
                            <i class="fa fa-database"></i>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#tabs-demo6-area2" data-toggle="tab" title="Tambah Kriteria">
                        <span class="round-tabs two">
                            <i class="fa fa-plus"></i>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#tabs-demo6-area3" data-toggle="tab" title="Kriteria Turnamen">
                        <span class="round-tabs three">
                            <i class="fa fa-laptop"></i>
                        </span>
                    </a>
                </li>
            </ul>
            <div class="tab-content tab-content-v5">
                <div class="tab-pane fade in active" id="tabs-demo6-area1">
                    <h3 class="head text-center">Daftar Kriteria</h3>
                    <div class="col-md-12">
                        <div class="responsive-table">
                            <table class="table datatables table-striped table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Kriteria</th>
                                        <th>Posisi Kriteria</th>
                                        <th>Tipe Kriteria</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($kriteria as $val) { ?>
                                        <tr>
                                            <td><?= $i . "."; ?></td>
                                            <td><?= $val->nama_kriteria ?></td>
                                            <td><?= $val->posisi_kriteria ?></td>
                                            <td><?= $val->tipe_kriteria ?></td>
                                            <td width="20%">
                                                <div class="col-md-6">
                                                    <button class="ripple btn-3d btn-warning" data-toggle="modal" data-target="#modal-edit" onclick="edit_kriteria('<?= $val->id_kriteria ?>','<?= $val->nama_kriteria ?>','<?= $val->posisi_kriteria ?>','<?= $val->tipe_kriteria ?>');">Edit</button>
                                                </div>
                                                <div class="col-md-6">
                                                    <button class="ripple btn-3d btn-danger" data-toggle="modal" data-target="#modal-delete" onclick="delete_kriteria('<?= $val->id_kriteria ?>','<?= $val->nama_kriteria ?>','<?= $val->posisi_kriteria ?>','<?= $val->tipe_kriteria ?>');">Hapus</button>
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
                    <h3 class="head text-center">Tambah Kriteria</h3>
                    <div class="col-md-12">
                        <form action="<?= base_url('admin/c_kriteria/ac_add_kriteria') ?>" method="post">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                    <input type="text" name="nama_kriteria" class="form-text" required>
                                    <span class="bar"></span>
                                    <label>Nama Kriteria</label>
                                </div>
                                <div>
                                    <label style="font-size: 20px;">Posisi Kriteria</label>
                                    <div class="form-group" style="margin-bottom: 60px;">
                                        <div class="col-md-6">
                                            <input type="radio" name="posisi" value="NON-GK" id="rd-pos1" checked> <label for="rd-pos1"><b> Non-Kiper</b></label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="radio" name="posisi" value="GK" id="rd-pos2"> <label for="rd-pos2"><b>Kiper</b></label>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label style="font-size: 20px;">Tipe Kriteria</label>
                                    <div class="form-group" style="margin-bottom: 60px;">
                                        <div class="col-md-6">
                                            <input type="radio" name="tipe" value="COST" id="rd-tipe1" checked> <label for="rd-tipe1"><b> COST</b></label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="radio" name="tipe" value="BENEFIT" id="rd-tipe2"> <label for="rd-tipe"><b>BENEFIT</b></label>
                                        </div>
                                    </div>
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
                <div class="tab-pane fade" id="tabs-demo6-area3">
                    <h3 class="head text-center">Kriteria Turnamen</h3>
                    <div class="col-md-12">
                        <div class="col-md-2 pull-right" style="margin-bottom: 30px;">
                            <button class=" btn ripple btn-3d btn-success" onclick="location.href='<?= base_url('admin/c_kriteria/add_turnamen_kriteria/') ?>';">Tambah</button>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="responsive-table">
                            <table class="table datatables table-striped table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Turnamen</th>
                                        <th>Tgl. Turnamen</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($turnamen as $val) { ?>
                                        <tr>
                                            <td><?= $i . "."; ?></td>
                                            <td><?= $val->nama_turnamen ?></td>
                                            <td><?= date('d-m-Y', strtotime($val->tgl_turnamen)) ?></td>
                                            <td width="20%">
                                                <div class="col-md-6">
                                                    <button class="ripple btn-3d btn-warning" onclick="location.href='<?= base_url('admin/c_kriteria/edit_turnamen_kriteria/' . $val->id_turnamen) ?>';">Edit</button>
                                                </div>
                                                <div class="col-md-6">
                                                    <button class="ripple btn-3d btn-primary" onclick="location.href='<?= base_url('admin/c_kriteria/view_turnamen_kriteria/' . $val->id_turnamen) ?>';">Lihat</button>
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
                <h4 class="modal-title">Edit Kriteria</h4>
            </div>
            <form action="<?= base_url('admin/c_kriteria/ac_update_kriteria') ?>" method="post">
                <div class="modal-body">
                    <div class="card-body">
                        <input type="hidden" name="id" class="form-text" required id="e-id">
                        <div class="form-group form-animate-text" style="margin-top:40px !important;">
                            <input type="text" name="nama_kriteria" class="form-text" required id="e-kriteria">
                            <span class="bar"></span>
                            <label>Nama Kriteria</label>
                        </div>
                        <div>
                            <label style="font-size: 20px;">Posisi Kriteria</label>
                            <div class="form-group" style="margin-bottom: 60px;">
                                <div class="col-md-6">
                                    <input type="radio" name="posisi" value="NON-GK" id="erd-pos1" checked> <label for="erd-pos1"><b> Non-Kiper</b></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="radio" name="posisi" value="GK" id="erd-pos2"> <label for="erd-pos2"><b>Kiper</b></label>
                                </div>
                            </div>
                        </div>
                        <div>
                            <label style="font-size: 20px;">Tipe Kriteria</label>
                            <div class="form-group" style="margin-bottom: 60px;">
                                <div class="col-md-6">
                                    <input type="radio" name="tipe" value="COST" id="erd-tipe1" checked> <label for="erd-tipe1"><b> COST</b></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="radio" name="tipe" value="BENEFIT" id="erd-tipe2"> <label for="erd-tipe2"><b>BENEFIT</b></label>
                                </div>
                            </div>
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
                <h4 class="modal-title">Hapus Kriteria</h4>
            </div>
            <form action="<?= base_url('admin/c_kriteria/ac_delete_kriteria') ?>" method="post">
                <div class="modal-body">
                    <div class="card-body">
                        <input type="hidden" name="id" class="form-text" required id="d-id">
                        <div class="form-group" style="margin-top:40px !important;">
                            <label class="col-sm-4">Nama Kriteria</label>
                            <input type="text" required id="d-kriteria" readonly>
                            <span class="bar"></span>
                        </div>
                        <div>
                            <label style="font-size: 20px;margin-left: 15px;">Posisi Kriteria</label>
                            <div class="form-group" style="margin-bottom: 60px;">
                                <div class="col-md-6">
                                    <input type="radio" name="posisi" value="NON-GK" id="drd-pos1" checked> <label for="drd-pos1"><b> Non-Kiper</b></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="radio" name="posisi" value="GK" id="drd-pos2"> <label for="drd-pos2"><b>Kiper</b></label>
                                </div>
                            </div>
                        </div>
                        <div>
                            <label style="font-size: 20px;">Tipe Kriteria</label>
                            <div class="form-group" style="margin-bottom: 60px;">
                                <div class="col-md-6">
                                    <input type="radio" name="tipe" value="COST" id="drd-tipe1" checked> <label for="drd-tipe1"><b> COST</b></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="radio" name="tipe" value="BENEFIT" id="drd-tipe2"> <label for="drd-tipe2"><b>BENEFIT</b></label>
                                </div>
                            </div>
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
    function edit_kriteria(id, nm, pos, tipe) {
        $('#e-id').val(id);
        $('#e-kriteria').val(nm);
        var setpos1 = $('#erd-pos1'); //non-gk
        var setpos2 = $('#erd-pos2'); //gk
        if (pos == "GK") {
            setpos2.prop('checked', true);
        } else {
            setpos1.prop('checked', true);
        }
        var settipe1 = $('#erd-tipe1'); //cost
        var settipe2 = $('#erd-tipe2'); //benefit
        if (tipe == "BENEFIT") {
            settipe2.prop('checked', true);
        } else {
            settipe1.prop('checked', true);
        }
    }

    function delete_kriteria(id, nm, pos, tipe) {
        $('#d-id').val(id);
        $('#d-kriteria').val(nm);
        var setpos1 = $('#drd-pos1'); //non-gk
        var setpos2 = $('#drd-pos2'); //gk
        if (pos == "GK") {
            setpos2.prop('checked', true);
        } else {
            setpos1.prop('checked', true);
        }
        var settipe1 = $('#erd-tipe1'); //cost
        var settipe2 = $('#erd-tipe2'); //benefit
        if (tipe == "BENEFIT") {
            settipe2.prop('checked', true);
        } else {
            settipe1.prop('checked', true);
        }
    }
</script>