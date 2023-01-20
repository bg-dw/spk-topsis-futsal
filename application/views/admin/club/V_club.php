<div class="panel box-shadow-none content-header">
    <div class="panel-body">
        <div class="col-md-12">
            <h3 class="animated fadeInLeft">Club</h3>
            <p class="animated fadeInDown">
                Beranda <span class="fa-angle-right fa"></span> Club
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
                    <a href="#tabs-demo6-area1" data-toggle="tab" title="Daftar Club">
                        <span class="round-tabs one">
                            <i class="fa fa-suitcase"></i>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#tabs-demo6-area2" data-toggle="tab" title="Tambah Club">
                        <span class="round-tabs two">
                            <i class="fa fa-plus"></i>
                        </span>
                    </a>
                </li>
            </ul>
            <div class="tab-content tab-content-v5">
                <div class="tab-pane fade in active" id="tabs-demo6-area1">
                    <h3 class="head text-center">Daftar Club</h3>
                    <div class="col-md-12">
                        <div class="responsive-table">
                            <table class="table datatables table-striped table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Club</th>
                                        <th>Penanggung Jawab</th>
                                        <th>No. Telp</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($club as $val) { ?>
                                        <tr>
                                            <td><?= $i . "."; ?></td>
                                            <td><?= $val->nama_tim ?></td>
                                            <td><?= $val->penanggung_jawab ?></td>
                                            <td><?= $val->no_telp ?></td>
                                            <td width="20%">
                                                <div class="col-md-6">
                                                    <button class="ripple btn-3d btn-warning" data-toggle="modal" data-target="#modal-edit" onclick="edit_club('<?= $val->id_tim ?>','<?= $val->nama_tim ?>','<?= $val->penanggung_jawab ?>','<?= $val->no_telp ?>');">Edit</button>
                                                </div>
                                                <div class="col-md-6">
                                                    <button class="ripple btn-3d btn-danger" data-toggle="modal" data-target="#modal-delete" onclick="delete_club('<?= $val->id_tim ?>','<?= $val->nama_tim ?>','<?= $val->penanggung_jawab ?>','<?= $val->no_telp ?>');">Hapus</button>
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
                    <h3 class="head text-center">Tambah Club</h3>
                    <div class="col-md-12">
                        <form action="<?= base_url('admin/c_club/ac_add_club') ?>" method="post">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                    <input type="text" name="nama_club" class="form-text" required>
                                    <span class="bar"></span>
                                    <label>Nama Club</label>
                                </div>
                                <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                    <input type="text" name="pj" class="form-text" required>
                                    <span class="bar"></span>
                                    <label>Penanggung Jawab</label>
                                </div>
                                <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                    <input type="text" name="telp" class="form-text mask-phone_idn" required>
                                    <span class="bar"></span>
                                    <label>No. Telp</label>
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
                <h4 class="modal-title">Edit Club</h4>
            </div>
            <form action="<?= base_url('admin/c_club/ac_update_club') ?>" method="post">
                <div class="modal-body">
                    <div class="card-body">
                        <input type="hidden" name="id" class="form-text" required id="e-id">
                        <div class="form-group form-animate-text" style="margin-top:40px !important;">
                            <input type="text" name="nama_club" class="form-text" required id="e-nm">
                            <span class="bar"></span>
                            <label>Nama Club</label>
                        </div>
                        <div class="form-group form-animate-text" style="margin-top:40px !important;">
                            <input type="text" name="pj" class="form-text" required id="e-pj">
                            <span class="bar"></span>
                            <label>Penanggung Jawab</label>
                        </div>
                        <div class="form-group form-animate-text" style="margin-top:40px !important;">
                            <input type="text" name="telp" class="form-text mask-phone_idn" required id="e-telp">
                            <span class="bar"></span>
                            <label>No. Telp</label>
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
                <h4 class="modal-title">Hapus Club</h4>
            </div>
            <form action="<?= base_url('admin/c_club/ac_delete_club') ?>" method="post">
                <div class="modal-body">
                    <div class="card-body">
                        <input type="hidden" name="id" required id="d-id" readonly>
                        <div class="form-group" style="margin-top:40px !important;">
                            <label class="col-sm-4">Nama Club</label>
                            <input type="text" required id="d-nm" readonly>
                            <span class="bar"></span>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4">Penanggung Jawab</label>
                            <input type="text" required id="d-pj" readonly>
                            <span class="bar"></span>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4">No. Telp</label>
                            <input type="text" required id="d-telp" readonly>
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
    function edit_club(id, nm, pj, telp) {
        $('#e-id').val(id);
        $('#e-nm').val(nm);
        $('#e-pj').val(pj);
        $('#e-telp').val(telp);
    }

    function delete_club(id, nm, pj, telp) {
        $('#d-id').val(id);
        $('#d-nm').val(nm);
        $('#d-pj').val(pj);
        $('#d-telp').val(telp);
    }
</script>