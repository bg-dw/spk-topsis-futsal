<div class="panel box-shadow-none content-header">
    <div class="panel-body">
        <div class="col-md-12">
            <h3 class="animated fadeInLeft">Perangkingan</h3>
            <p class="animated fadeInDown">
                Beranda <span class="fa-angle-right fa"></span> Perangkingan
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
                    <a href="#tabs-demo6-area1" data-toggle="tab" title="Daftar Perangkingan">
                        <span class="round-tabs one">
                            <i class="fa fa-futbol-o"></i>
                        </span>
                    </a>
                </li>
            </ul>
            <div class="tab-content tab-content-v5">
                <div class="tab-pane fade <?php if ($this->uri->segment(3) == "") {
                                                echo "in active";
                                            } ?>" id="tabs-demo6-area1">
                    <h3 class="head text-center">Perangkingan</h3>
                    <form action="<?= base_url('admin/c_perangkingan/hasil_perangkingan') ?>" method="post">
                        <div class="col-md-12" style="margin-top: 30px;">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <label style="font-size: 20px;">Pilih Turnamen</label>
                                <div class="form-group">
                                    <select class="form-control select2-turnamen" name="id_turnamen" required style="width: 100%;">
                                        <option value="">Pilih Turnamen</option>
                                        <?php foreach ($turnamen as $isi) : ?>
                                            <option value=" <?= $isi->id_turnamen ?>"><?= $isi->nama_turnamen . " ( " . date('d/m/Y', strtotime($isi->tgl_turnamen)) . " )" ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
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
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <button class="btn btn-primary btn-3d pull-right" type="submit">Pilih</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>