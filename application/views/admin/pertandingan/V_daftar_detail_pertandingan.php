<div class="panel box-shadow-none content-header">
    <div class="panel-body">
        <div class="col-md-12">
            <h3 class="animated fadeInLeft">Daftar Detail Pertandingan</h3>
            <p class="animated fadeInDown">
                Beranda <span class="fa-angle-right fa"></span> Daftar Detail Pertandingan
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
                    <a href="#tabs-demo6-area1" data-toggle="tab" title="Daftar Detail Pertandingan">
                        <span class="round-tabs one">
                            <i class="fa fa-calendar"></i>
                        </span>
                    </a>
                </li>
            </ul>
            <div class="tab-content tab-content-v5">
                <div class="tab-pane fade in active" id="tabs-demo6-area1">
                    <h3 class="head text-center">Daftar Detail Pertandingan</h3>
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
                                                <?php if ($val->skor != "") { ?>
                                                    <div class="col-md-6">
                                                        <button class="ripple btn-3d btn-warning" onclick="location.href='<?= base_url('admin/c_pertandingan/edit_detail_pertandingan/' . $val->id_turnamen . '/' . $val->id_pertandingan . '/' . $val->tim_satu . '/' . $val->tim_dua) ?>'">Edit</button>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <button class="ripple btn-3d btn-danger" onclick="conf_delete('<?= $val->id_pertandingan ?>');">Hapus</button>
                                                    </div>
                                                    <div class="col-md-6" style="margin-top: 20px;">
                                                        <button class="ripple btn-3d btn-primary" onclick="location.href='<?= base_url('admin/c_pertandingan/lihat_detail_pertandingan/' . $val->id_turnamen . '/' . $val->id_pertandingan . '/' . $val->tim_satu . '/' . $val->tim_dua) ?>'">Lihat</button>
                                                    </div>
                                                <?php } ?>
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
    function conf_delete(id) {
        var x = confirm('Hapus Pertandingan Terpilih?');
        if (x == true) {
            location.href = '<?= base_url('admin/c_pertandingan/ac_delete_detail_pertandingan/') ?>' + id;
        } else {
            return false;
        }
    }
</script>