    <div class="panel box-shadow-none content-header">
        <div class="panel-body">
            <div class="col-md-12">
                <h3 class="animated fadeInLeft">Tambah Kriteria Turnamen</h3>
                <p class="animated fadeInDown">
                    Beranda <span class="fa-angle-right fa"></span> Kriteria <span class="fa-angle-right fa"></span> Tambah Kriteria Turnamen
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-body">
                <div class="col-md-12 text-center">
                    <h2>Tambah Kriteria Turnamen</h2>
                </div>
                <div class="col-md-12" style="margin-top: 30px;;">
                    <form action="<?= base_url('admin/c_kriteria/ac_add_kt_turnamen') ?>" method="post" onsubmit="return validate(this);">
                        <div class="col-md-12" style="margin-bottom: 20px;">
                            <label style="font-size: 20px;">Turnamen</label>
                            <div class="form-group">
                                <select class="fomr-text select2-turnamen" name="id_turnamen" required style="width: 50%;">
                                    <option value="">Pilih Turnamen</option>
                                    <?php foreach ($turnamen as $isi) : ?>
                                        <option value=" <?= $isi->id_turnamen ?>"><?= $isi->nama_turnamen . " ( " . date('d/m/Y', strtotime($isi->tgl_turnamen)) . " )" ?></option>
                                    <?php endforeach; ?>
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
                                            <input type="number" name="bbt-non[]" class="cnon-gk" min="0" max="100" value="0" id="inp-non-<?= $i ?>" readonly>
                                            <input type="checkbox" name="kt-non[]" value="<?= $val->id_kriteria ?>" id="non-<?= $i ?>" onclick="set_non('<?= $i ?>');"> <label for="non-<?= $i ?>"> <?= $val->nama_kriteria ?></label>
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
                                    <?php
                                    // $i = 0;
                                    foreach ($gk as $val) : ?>
                                        <div class="col-md-4">
                                            <input type="number" name="bbt-gk[]" class="c-gk" min="0" max="100" value="0" id="inp-<?= $i ?>" readonly>
                                            <input type="checkbox" name="kt-gk[]" value="<?= $val->id_kriteria ?>" id="gk-<?= $i ?>" onclick="set_gk('<?= $i ?>');"> <label for="gk-<?= $i ?>"> <?= $val->nama_kriteria ?></label>
                                        </div>
                                    <?php $i++;
                                    endforeach; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12" style="border-bottom: 3px solid grey; margin-top:30px;margin-bottom: 10px;"></div>
                        <label style="margin-bottom: 30px;color: red;"><i>* Harap pilih minimal 2 dari masing-masing posisi.</i></label>
                        <div class="col-md-12">
                            <div class="col-md-2 pull-right" style="margin-bottom: 10px;">
                                <button class=" btn ripple btn-3d btn-primary" type="submit">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-12 article-v1-footer">
                    <div class="col-md-12 aritcle-v1-writter">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function set_non(id) {
            var cb = $('#non-' + id).prop("checked");
            if (cb == true) {
                $('#inp-non-' + id).prop('readonly', false);
            } else {
                $('#inp-non-' + id).prop('readonly', true);
                $('#inp-non-' + id).val(0);
            }
            // console.log(cb);
        }

        function set_gk(id) {
            var cb = $('#gk-' + id).prop("checked");
            if (cb == true) {
                $('#inp-' + id).prop('readonly', false);
            } else {
                $('#inp-' + id).prop('readonly', true);
                $('#inp-' + id).val(0);
            }
            // console.log(cb);
        }
    </script>

    <script>
        function validate(form) {
            var non_gk = 0;
            var gk = 0;

            //pengulangan untuk setiap input
            $(".cnon-gk").each(function() {

                //jika inputan adalah angka
                if (!isNaN(this.value) && this.value.length != 0) {
                    non_gk += parseFloat(this.value);
                }

            });
            $(".c-gk").each(function() {

                //jika inputan adalah angka
                if (!isNaN(this.value) && this.value.length != 0) {
                    gk += parseFloat(this.value);
                }

            });
            if (non_gk == 100) {
                if (gk == 100) {
                    return true;
                } else {
                    alert('Total Nilai Bobot pada Posisi Kiper Harus 100!');
                    return false;
                }
            } else {
                alert('Total Nilai Bobot pada Posisi Non-Kiper Harus 100!');
                return false;
            }
        }
    </script>