<div class="panel box-shadow-none content-header">
    <div class="panel-body">
        <div class="col-md-12">
            <h3 class="animated fadeInLeft">Lihat Kriteria Turnamen</h3>
            <p class="animated fadeInDown">
                Beranda <span class="fa-angle-right fa"></span> Kriteria <span class="fa-angle-right fa"></span> Lihat Kriteria Turnamen
            </p>
        </div>
    </div>
</div>
<div class="col-md-12">
    <div class="panel">
        <div class="panel-body">
            <div class="col-md-12 text-center">
                <h2>Lihat Kriteria Turnamen</h2>
            </div>
            <div class="col-md-12" style="margin-top: 30px;;">
                <div class="col-md-12" style="margin-bottom: 20px;">
                    <label style="font-size: 20px;">Turnamen</label>
                    <div class="form-group">
                        <select class="fomr-text select2-turnamen" name="id_turnamen" required style="width: 50%;" disable>
                            <option value="">Pilih Turnamen</option>
                            <?php foreach ($turnamen as $isi) : if ($isi->id_turnamen == $terpilih[0]->id_turnamen) : ?>
                                    <option value=" <?= $isi->id_turnamen ?>" <?php if ($isi->id_turnamen == $terpilih[0]->id_turnamen) {
                                                                                    echo "selected";
                                                                                } ?>><?= $isi->nama_turnamen . " ( " . date('d/m/Y', strtotime($isi->tgl_turnamen)) . " )" ?></option>
                            <?php endif;
                            endforeach; ?>
                        </select>
                    </div>
                    <span class="bar"></span>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="col-sm-2" style="font-size: 20px;">Non-Kiper</label>
                        <div class="col-sm-10">
                            <?php $i = 0;
                            foreach ($non_gk as $val) : ?>
                                <div class="col-md-4">
                                    <input type="number" name="bbt-non[]" class="cnon-gk" min="0" max="100" value="<?php
                                                                                                                    $a = 0;
                                                                                                                    foreach ($terpilih as $isi) {
                                                                                                                        if ($val->id_kriteria == $isi->id_kriteria) {
                                                                                                                            $a += 1;
                                                                                                                            echo $isi->bobot;
                                                                                                                        }
                                                                                                                    }
                                                                                                                    if ($a == 0) {
                                                                                                                        echo 0;
                                                                                                                    } ?>" id="inp-non-<?= $i ?>" readonly>
                                    <input type="checkbox" name="kt-non[]" value="<?= $val->id_kriteria ?>" id="non-<?= $i ?>" <?php foreach ($terpilih as $isi) {
                                                                                                                                    if ($val->id_kriteria == $isi->id_kriteria) {
                                                                                                                                        echo 'checked';
                                                                                                                                    }
                                                                                                                                } ?> disabled> <label for="non-<?= $i ?>"> <?= $val->nama_kriteria ?></label>
                                </div>
                            <?php $i++;
                            endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-12" style="border-bottom: 3px solid grey; margin-top:30px;"></div>
                <div class="col-md-12" style="margin-top: 50px;">
                    <div class="form-group">
                        <label class="col-sm-2" style="font-size: 20px;">Kiper</label>
                        <div class="col-sm-10">
                            <?php $i = 0;
                            foreach ($gk as $val) : ?>
                                <div class="col-md-4">
                                    <input type="number" name="bbt-gk[]" class="c-gk" min="0" max="100" value="<?php
                                                                                                                $a = 0;
                                                                                                                foreach ($terpilih as $isi) {
                                                                                                                    if ($val->id_kriteria == $isi->id_kriteria) {
                                                                                                                        $a += 1;
                                                                                                                        echo $isi->bobot;
                                                                                                                    }
                                                                                                                }
                                                                                                                if ($a == 0) {
                                                                                                                    echo 0;
                                                                                                                } ?>" id="inp-<?= $i ?>" readonly>
                                    <input type="checkbox" name="kt-gk[]" value="<?= $val->id_kriteria ?>" id="gk-<?= $i ?>" <?php foreach ($terpilih as $isi) {
                                                                                                                                    if ($val->id_kriteria == $isi->id_kriteria) {
                                                                                                                                        echo 'checked';
                                                                                                                                    }
                                                                                                                                } ?> disabled> <label for="gk-<?= $i ?>"> <?= $val->nama_kriteria ?></label>
                                </div>
                            <?php $i++;
                            endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-12" style="border-bottom: 3px solid grey; margin-top:30px;margin-bottom: 10px;"></div>
                <div class="col-md-12">
                    <div class="col-md-2 pull-right" style="margin-bottom: 10px;">
                        <button class=" btn ripple btn-3d btn-default" onclick="location.href='<?= base_url('admin/c_kriteria/') ?>';" type="button">Kembali</button>
                    </div>
                </div>
            </div>
            <div class="col-md-12 article-v1-footer">
                <div class="col-md-12 aritcle-v1-writter">
                </div>
            </div>
        </div>
    </div>
</div>