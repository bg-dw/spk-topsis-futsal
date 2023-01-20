<div class="panel box-shadow-none content-header">
    <div class="panel-body">
        <div class="col-md-12">
            <h3 class="animated fadeInLeft">Pertandingan</h3>
            <p class="animated fadeInDown">
                Beranda <span class="fa-angle-right fa"></span> Pertandingan
            </p>
        </div>
    </div>
</div>
<div class="form-element">
    <div class="col-md-12" style="margin-bottom: 50px;">
        <div class="col-md-12 tabs-area">
            <div class="liner"></div>
            <ul class="nav nav-tabs nav-tabs-v5" id="tabs-demo6">
                <li class="<?php if ($this->uri->segment(2) == "c_pertandingan" && $this->uri->segment(3) == "") {
                                echo "active";
                            } ?>" onclick="location.href='<?= base_url('admin/c_pertandingan/') ?>'">
                    <a href="#tabs-demo6-area1" data-toggle="tab" title="Daftar Pertandingan">
                        <span class="round-tabs one">
                            <i class="fa fa-calendar"></i>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#tabs-demo6-area2" data-toggle="tab" title="Tambah Pertandingan">
                        <span class="round-tabs two">
                            <i class="fa fa-plus"></i>
                        </span>
                    </a>
                </li>
            </ul>
            <div class="tab-content tab-content-v5">
                <div class="tab-pane fade <?php if ($this->uri->segment(2) == "c_pertandingan" && $this->uri->segment(3) == "") {
                                                echo "in active";
                                            } ?>" id="tabs-demo6-area1">
                    <h3 class="head text-center">Daftar Pertandingan</h3>
                    <div class="col-md-12">
                        <?php
                        // echo $this->uri->segment(2) 
                        ?>
                        <div class="responsive-table">
                            <table class="table datatables table-striped table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Turnamen</th>
                                        <th>Tim Satu</th>
                                        <th>Tim Dua</th>
                                        <th>Tgl. Pertandingan</th>
                                        <th>Jam Pertandingan</th>
                                        <th>Skor</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($pertandingan as $val) { ?>
                                        <tr>
                                            <td><?= $i . "."; ?></td>
                                            <td><?= $val->nama_turnamen ?></td>
                                            <td><?php foreach ($club as $isi) {
                                                    if ($val->tim_satu == $isi->id_tim) {
                                                        echo $isi->nama_tim;
                                                    }
                                                } ?></td>
                                            <td><?php foreach ($club as $isi) {
                                                    if ($val->tim_dua == $isi->id_tim) {
                                                        echo $isi->nama_tim;
                                                    }
                                                } ?></td>
                                            <td><?= date("d-m-Y", strtotime($val->tgl_pertandingan)); ?></td>
                                            <td><?= date("H:i", strtotime($val->jam_pertandingan)); ?></td>
                                            <td><?= $val->skor ?></td>
                                            <td width="20%">
                                                <div class="col-md-6">
                                                    <button class="ripple btn-3d btn-warning" data-toggle="modal" data-target="#modal-edit" onclick="edit_pertandingan('<?= $val->id_pertandingan ?>','<?= $val->nama_turnamen ?>','<?= $val->tim_satu ?>','<?= $val->tim_dua ?>','<?= date('d-m-Y', strtotime($val->tgl_pertandingan)) ?>','<?= date('H:i', strtotime($val->jam_pertandingan)) ?>');">Edit</button>
                                                </div>
                                                <div class="col-md-6">
                                                    <button class="ripple btn-3d btn-danger" data-toggle="modal" data-target="#modal-delete" onclick="delete_pertandingan('<?= $val->id_pertandingan ?>','<?= $val->nama_turnamen ?>','<?= $val->tim_satu ?>','<?= $val->tim_dua ?>','<?= date('d-m-Y', strtotime($val->tgl_pertandingan)) ?>','<?= date('H:i', strtotime($val->jam_pertandingan)) ?>');">Hapus</button>
                                                </div>
                                                <div class="col-md-6" style="margin-top: 20px;">
                                                    <button class="ripple btn-3d btn-success" onclick="location.href='<?= base_url('admin/c_pertandingan/mulai/' . $val->id_turnamen . '/' . $val->id_pertandingan . '/' . $val->tim_satu . '/' . $val->tim_dua) ?>'" <?php if ($val->skor != "") {
                                                                                                                                                                                                                                                                            echo "disabled";
                                                                                                                                                                                                                                                                        } ?>>Mulai</button>
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
                    <h3 class="head text-center">Tambah Pertandingan</h3>
                    <div class="col-md-12">
                        <form action="<?= base_url('admin/c_pertandingan/ac_add_pertandingan') ?>" method="post" onsubmit="return validate(this);">
                            <div class="col-md-12" style="margin-bottom: 20px;margin-top: 40px;">
                                <div class="col-md-3"></div>
                                <div class="col-md-6">
                                    <label style="font-size: 20px;">Turnamen</label>
                                    <div class="form-group">
                                        <select class="fomr-text select2-turnamen" name="id_turnamen" required style="width: 100%;">
                                            <option value="">Pilih Turnamen</option>
                                            <?php foreach ($turnamen as $isi) : ?>
                                                <option value="<?= $isi->id_turnamen ?>"><?= $isi->nama_turnamen . " ( " . date('d/m/Y', strtotime($isi->tgl_turnamen)) . " )" ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <span class="bar"></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-3"></div>
                                <div class="col-md-6">
                                    <div class="form-group form-animate-text">
                                        <input type="text" name="tgl" class="form-text date-fr" required>
                                        <span class="bar"></span>
                                        <label><span class="fa fa-calendar"></span> Tanggal Pertandingan</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3"></div>
                            <div class="col-md-3">
                                <label style="font-size: 20px;">Tim A</label>
                                <div class="form-group">
                                    <select class="fomr-text select2-pertandingan" name="tim_a" required style="width: 100%;" id="tim_a">
                                        <option value="">Pilih Tim</option>
                                        <?php foreach ($club as $isi) : ?>
                                            <option value="<?= $isi->id_tim ?>"><?= $isi->nama_tim ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label style="font-size: 20px;">Tim B</label>
                                <div class="form-group">
                                    <select class="fomr-text select2-pertandingan" name="tim_b" required style="width: 100%;" id="tim_b">
                                        <option value="">Pilih Tim</option>
                                        <?php foreach ($club as $isi) : ?>
                                            <option value="<?= $isi->id_tim ?>"><?= $isi->nama_tim ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-3"></div>
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
                <h4 class="modal-title">Edit Pertandingan</h4>
            </div>
            <form action="<?= base_url('admin/c_pertandingan/ac_update_pertandingan') ?>" method="post" onsubmit="return validate_edit(this);">
                <div class="modal-body">
                    <input type="hidden" name="id" class="form-text" required id="e-id">
                    <label style="font-size: 20px;">Turnamen</label>
                    <div class="form-group form-animate-text">
                        <input type="text" name="id_turnamen" class="form-text" required id="e-id_t" readonly>
                    </div>
                    <div class="form-group form-animate-text" style="margin-top: 50px;">
                        <input type="text" name="tgl" class="form-text date-fr" required id="e-tgl">
                        <span class="bar"></span>
                        <label><span class="fa fa-calendar"></span> Tanggal Pertandingan</label>
                    </div>
                    <table width="100%">
                        <tr>
                            <th>
                                <div class="form-group">
                                    <label style="font-size: 20px;" style="margin-bottom: 50px;">Tim A</label>
                                    <select class="form-text select2-pertandingan" name="tim_a" required style="width: 90%;" id="e-tim_a">
                                        <option value="">Pilih Tim</option>
                                        <?php foreach ($club as $isi) : ?>
                                            <option value="<?= $isi->id_tim ?>"><?= $isi->nama_tim ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </th>
                            <th>
                                <div class="form-group">
                                    <label style="font-size: 20px;" style="margin-bottom: 50px;">Tim B</label>
                                    <select class="form-text select2-pertandingan" name="tim_b" required style="width: 90%;" id="e-tim_b">
                                        <option value="">Pilih Tim</option>
                                        <?php foreach ($club as $isi) : ?>
                                            <option value="<?= $isi->id_tim ?>"><?= $isi->nama_tim ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </th>
                        </tr>
                    </table>
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
                <h4 class="modal-title">Hapus Pertandingan</h4>
            </div>
            <form action="<?= base_url('admin/c_pertandingan/ac_delete_pertandingan') ?>" method="post">
                <div class="modal-body">
                    <input type="hidden" name="id" class="form-text" required id="d-id">
                    <label style="font-size: 20px;">Turnamen</label>
                    <div class="form-group form-animate-text">
                        <input type="text" name="id_turnamen" class="form-text" required id="d-id_t" readonly>
                    </div>
                    <label style="font-size: 20px;"><span class="fa fa-calendar"></span> Tanggal Pertandingan</label>
                    <div class="form-group form-animate-text">
                        <input type="text" name="tgl" class="form-text date-fr" required id="d-tgl" disabled>
                        <span class="bar"></span>
                    </div>
                    <table width="100%">
                        <tr>
                            <th>
                                <div class="form-group">
                                    <label style="font-size: 20px;" style="margin-bottom: 50px;">Tim A</label>
                                    <select class="form-text select2-pertandingan" name="tim_a" required style="width: 90%;" id="d-tim_a" disabled>
                                        <option value="">Pilih Tim</option>
                                        <?php foreach ($club as $isi) : ?>
                                            <option value=" <?= $isi->id_tim ?>"><?= $isi->nama_tim ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </th>
                            <th>
                                <div class="form-group">
                                    <label style="font-size: 20px;" style="margin-bottom: 50px;">Tim B</label>
                                    <select class="form-text select2-pertandingan" name="tim_b" required style="width: 90%;" id="d-tim_b" disabled>
                                        <option value="">Pilih Tim</option>
                                        <?php foreach ($club as $isi) : ?>
                                            <option value=" <?= $isi->id_tim ?>"><?= $isi->nama_tim ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </th>
                        </tr>
                    </table>
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
    function edit_pertandingan(id_p, nama_turnamen, tim1, tim2, tgl, jam) {
        $('#e-id').val(id_p);
        $('#e-id_t').val(nama_turnamen);
        $('#e-tim_a').val(tim1).change();
        $('#e-tim_b').val(tim2).change();
        $('#e-tgl').val(tgl + " " + jam);
    }

    function delete_pertandingan(id_p, nama_turnamen, tim1, tim2, tgl, jam) {
        $('#d-id').val(id_p);
        $('#d-id_t').val(nama_turnamen);
        $('#d-tim_a').val(tim1).change();
        $('#d-tim_b').val(tim2).change();
        $('#d-tgl').val(tgl + " " + jam);
    }
</script>

<script>
    function validate(form) {
        var timA = $('#tim_a').val();
        var timB = $('#tim_b').val();
        if (timA != timB) {
            return true;
        } else {
            alert('Harap Pilih 2 Tim yang Berbeda!');
            return false;
        }
    }
</script>

<script>
    function validate_edit(form) {
        var timA = $('#e-tim_a').val();
        var timB = $('#e-tim_b').val();
        if (timA != timB) {
            return true;
        } else {
            alert('Harap Pilih 2 Tim yang Berbeda!');
            return false;
        }
    }
</script>