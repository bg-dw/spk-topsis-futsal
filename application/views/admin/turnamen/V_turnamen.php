<div class="panel box-shadow-none content-header">
    <div class="panel-body">
        <div class="col-md-12">
            <h3 class="animated fadeInLeft">Turnamen</h3>
            <p class="animated fadeInDown">
                Beranda <span class="fa-angle-right fa"></span> Turnamen
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
                    <a href="#tabs-demo6-area1" data-toggle="tab" title="Daftar Turnamen">
                        <span class="round-tabs one">
                            <i class="fa fa-futbol-o"></i>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#tabs-demo6-area2" data-toggle="tab" title="Tambah Turnamen">
                        <span class="round-tabs two">
                            <i class="fa fa-plus"></i>
                        </span>
                    </a>
                </li>
            </ul>
            <div class="tab-content tab-content-v5">
                <div class="tab-pane fade in active" id="tabs-demo6-area1">
                    <h3 class="head text-center">Daftar Turnamen</h3>
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
                                            <td><?= date("d-m-Y", strtotime($val->tgl_turnamen)); ?></td>
                                            <td width="20%">
                                                <div class="col-md-6">
                                                    <button class="ripple btn-3d btn-warning" data-toggle="modal" data-target="#modal-edit" onclick="edit_turnamen('<?= $val->id_turnamen ?>','<?= $val->nama_turnamen ?>','<?= $val->tgl_turnamen ?>');">Edit</button>
                                                </div>
                                                <div class="col-md-6">
                                                    <button class="ripple btn-3d btn-danger" data-toggle="modal" data-target="#modal-delete" onclick="delete_turnamen('<?= $val->id_turnamen ?>','<?= $val->nama_turnamen ?>','<?= $val->tgl_turnamen ?>');">Hapus</button>
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
                    <h3 class="head text-center">Tambah Turnamen</h3>
                    <div class="col-md-12">
                        <form action="<?= base_url('admin/c_turnamen/ac_add_turnamen') ?>" method="post">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                    <input type="text" name="nama_turnamen" class="form-text" required>
                                    <span class="bar"></span>
                                    <label>Nama Turnamen</label>
                                </div>
                                <div class="form-group form-animate-text">
                                    <input type="text" name="tgl_turnamen" class="form-text min-date" required>
                                    <span class="bar"></span>
                                    <label><span class="fa fa-calendar"></span> Tanggal Turnamen</label>
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
                <h4 class="modal-title">Edit Turnamen</h4>
            </div>
            <form action="<?= base_url('admin/c_turnamen/ac_update_turnamen') ?>" method="post">
                <div class="modal-body">
                    <div class="card-body">
                        <input type="hidden" name="id" class="form-text" required id="e-id">
                        <div class="form-group form-animate-text" style="margin-top:40px !important;">
                            <input type="text" name="nama_turnamen" class="form-text" required id="e-tm">
                            <span class="bar"></span>
                            <label>Nama Turnamen</label>
                        </div>
                        <div class="form-group form-animate-text">
                            <input type="text" name="tgl_turnamen" class="form-text min-date" required id="e-tgl-tm">
                            <span class="bar"></span>
                            <label><span class="fa fa-calendar"></span> Tanggal Turnamen</label>
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
                <h4 class="modal-title">Hapus Turnamen</h4>
            </div>
            <form action="<?= base_url('admin/c_turnamen/ac_delete_turnamen') ?>" method="post">
                <div class="modal-body">
                    <div class="card-body">
                        <input type="hidden" name="id" required id="d-id" readonly>
                        <div class="form-group" style="margin-top:40px !important;">
                            <label class="col-sm-4">Nama Turnamen</label>
                            <input type="text" required id="d-tm" readonly>
                            <span class="bar"></span>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4">Tanggal Turnamen</label>
                            <input type="text" required id="d-tgl-tm" readonly>
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
    function edit_turnamen(id, tm, tgl_tm) {
        $('#e-id').val(id);
        $('#e-tm').val(tm);
        $('#e-tgl-tm').val(tgl_tm);
    }

    function delete_turnamen(id, tm, tgl_tm) {
        $('#d-id').val(id);
        $('#d-tm').val(tm);
        $('#d-tgl-tm').val(tgl_tm);
    }
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.min-date').bootstrapMaterialDatePicker({
            format: 'DD-MM-YYYY',
            time: false,
            minDate: new Date()
        });
    });
</script>