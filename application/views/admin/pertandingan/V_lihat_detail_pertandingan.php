<div class="panel box-shadow-none content-header">
    <div class="panel-body">
        <div class="col-md-12">
            <h3 class="animated fadeInLeft">Detail Pertandingan</h3>
            <p class="animated fadeInDown">
                Beranda <span class="fa-angle-right fa"></span> Detail Pertandingan
            </p>
        </div>
    </div>
</div>
<div class="form-element">
    <div class="col-md-12" style="margin-bottom: 50px;">
        <div class="col-md-12 tabs-area">
            <div class="liner"></div>
            <ul class="nav nav-tabs nav-tabs-v5" id="tabs-demo6">
                <li class="active" onclick="location.href='<?= base_url('admin/c_pertandingan/') ?>'">
                    <a href="#tabs-demo6-area1" data-toggle="tab" title="Daftar Pertandingan">
                        <span class="round-tabs one">
                            <i class="fa fa-calendar"></i>
                        </span>
                    </a>
                </li>
            </ul>
            <div class="tab-content tab-content-v5">
                <div class="tab-pane fade in active" id="tabs-demo6-area1">
                    <h3 class="head text-center">Pertandingan</h3>
                    <div class="col-md-12" style="margin-top: 20px;">
                        <div class="col-md-5">
                            <center>
                                <h3><?= $tim_a[0]->nama_tim ?></h3>
                                <h1 id="skor-a">0</h1>
                            </center>
                        </div>
                        <div class="col-md-2">
                            <center>
                                <h1>VS</h1>
                            </center>
                        </div>
                        <div class="col-md-5">
                            <center>
                                <h3><?= $tim_b[0]->nama_tim ?></h3>
                                <h1 id="skor-b">0</h1>
                            </center>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <!-- NON-GK     -->
                        <div class="col-md-12" style="margin-top: 20px;color: black;">
                            <?php
                            // var_dump($detail); 
                            ?>
                            <div class="col-md-12">
                                <h3>Non-Kiper</h3>
                            </div>
                            <div class="col-md-6" style="overflow: auto;">
                                <input type="hidden" name="skorA" id="inp-skor-a" required>
                                <table width="100%" border="1" style="background-color: white;">
                                    <tr>
                                        <th style="text-align: center;">No. Punggung</th>
                                        <?php foreach ($kriteria_non as $kt) : ?>
                                            <th style="text-align: center;"><?= $kt->nama_kriteria ?></th>
                                        <?php endforeach; ?>
                                    </tr>
                                    <?php
                                    foreach ($tim_a as $a) :
                                        if ($a->posisi == "NON-GK") : ?>
                                            <tr>
                                                <th style="text-align: center;"><b><?= $a->no_punggung ?></b></th>
                                                <?php foreach ($kriteria_non as $kt) : ?>
                                                    <th style="text-align: center;">
                                                        <input type="number" min="0" max="200" name="nilai[]" value="<?php foreach ($detail as $dt) {
                                                                                                                            if ($a->id_pemain == $dt->id_pemain && $kt->id_kriteria_turnamen == $dt->id_kriteria_turnamen) {
                                                                                                                                echo $dt->nilai;
                                                                                                                            }
                                                                                                                        } ?>" style="text-align: center;" class="<?php if (strtoupper($kt->nama_kriteria) == "GOL") {
                                                                                                                                                                        echo "gol-a";
                                                                                                                                                                    } ?>" disabled>
                                                    </th>
                                                <?php endforeach; ?>
                                            </tr>
                                    <?php
                                        endif;
                                    endforeach; ?>
                                </table>
                            </div>
                            <div class="col-md-6" style="overflow: auto;">
                                <input type="hidden" name="skorB" id="inp-skor-b" required>
                                <table width="100%" border="1" style="background-color: white;">
                                    <tr>
                                        <th style="text-align: center;">No. Punggung</th>
                                        <?php foreach ($kriteria_non as $kt) : ?>
                                            <th style="text-align: center;"><?= $kt->nama_kriteria ?></th>
                                        <?php endforeach; ?>
                                    </tr>
                                    <?php
                                    foreach ($tim_b as $b) :
                                        if ($b->posisi == "NON-GK") : ?>
                                            <tr>
                                                <th style="text-align: center;"><b><?= $b->no_punggung ?></b></th>
                                                <?php foreach ($kriteria_non as $kt) : ?>
                                                    <th style="text-align: center;">
                                                        <input type="number" min="0" max="200" name="nilai[]" value="<?php foreach ($detail as $dt) {
                                                                                                                            if ($b->id_pemain == $dt->id_pemain && $kt->id_kriteria_turnamen == $dt->id_kriteria_turnamen) {
                                                                                                                                echo $dt->nilai;
                                                                                                                            }
                                                                                                                        } ?>" style="text-align: center;" class="<?php if (strtoupper($kt->nama_kriteria) == "GOL") {
                                                                                                                                                                        echo "gol-b";
                                                                                                                                                                    } ?>" disabled>
                                                    </th>
                                                <?php endforeach; ?>
                                            </tr>
                                    <?php
                                        endif;
                                    endforeach; ?>
                                </table>
                            </div>
                        </div>

                        <!-- GK -->
                        <div class="col-md-12" style="margin-top: 20px;color: black;">
                            <div class="col-md-12">
                                <h3>Kiper</h3>
                            </div>
                            <div class="col-md-6" style="overflow: auto;">
                                <table width="100%" border="1" style="background-color: white;">
                                    <tr>
                                        <th style="text-align: center;">No. Punggung</th>
                                        <?php foreach ($kriteria_gk as $kt) : ?>
                                            <th style="text-align: center;"><?= $kt->nama_kriteria ?></th>
                                        <?php endforeach; ?>
                                    </tr>
                                    <?php
                                    foreach ($tim_a as $a) :
                                        if ($a->posisi == "GK") : ?>
                                            <tr>
                                                <th style="text-align: center;"><b><?= $a->no_punggung ?></b></th>
                                                <?php foreach ($kriteria_gk as $kt) : ?>
                                                    <th style="text-align: center;">
                                                        <input type="number" min="0" max="200" name="nilai[]" value="<?php foreach ($detail as $dt) {
                                                                                                                            if ($a->id_pemain == $dt->id_pemain && $kt->id_kriteria_turnamen == $dt->id_kriteria_turnamen) {
                                                                                                                                echo $dt->nilai;
                                                                                                                            }
                                                                                                                        } ?>" style="text-align: center;" class="<?php if (strtoupper($kt->nama_kriteria) == "GOL") {
                                                                                                                                                                        echo "gol-a";
                                                                                                                                                                    } ?>" disabled>
                                                    </th>
                                                <?php endforeach; ?>
                                            </tr>
                                    <?php
                                        endif;
                                    endforeach; ?>
                                </table>
                            </div>
                            <div class="col-md-6" style="overflow: auto;">
                                <table width="100%" border="1" style="background-color: white;">
                                    <tr>
                                        <th style="text-align: center;">No. Punggung</th>
                                        <?php foreach ($kriteria_gk as $kt) : ?>
                                            <th style="text-align: center;"><?= $kt->nama_kriteria ?></th>
                                        <?php endforeach; ?>
                                    </tr>
                                    <?php
                                    foreach ($tim_b as $b) :
                                        if ($b->posisi == "GK") : ?>
                                            <tr>
                                                <th style="text-align: center;"><b><?= $b->no_punggung ?></b></th>
                                                <?php foreach ($kriteria_gk as $kt) : ?>
                                                    <th style="text-align: center;">
                                                        <input type="number" min="0" max="200" name="nilai[]" value="<?php foreach ($detail as $dt) {
                                                                                                                            if ($b->id_pemain == $dt->id_pemain && $kt->id_kriteria_turnamen == $dt->id_kriteria_turnamen) {
                                                                                                                                echo $dt->nilai;
                                                                                                                            }
                                                                                                                        } ?>" style="text-align: center;" class="<?php if (strtoupper($kt->nama_kriteria) == "GOL") {
                                                                                                                                                                        echo "gol-b";
                                                                                                                                                                    } ?>" disabled>
                                                    </th>
                                                <?php endforeach; ?>
                                            </tr>
                                    <?php
                                        endif;
                                    endforeach; ?>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-3"></div>
                            <div class="col-md-6 text-center">
                                <button type="button" onclick="location.href='<?= base_url('admin/c_pertandingan/daftar_detail_pertandingan/') ?>'" class="btn btn-default btn-round green">Kembali</button>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            var sum = 0;
            $('.gol-a').each(function() {
                sum += parseFloat($(this).val()); // Or this.innerHTML, this.innerText
            });
            $("#skor-a").text(sum);
            $("#inp-skor-a").val(sum);
            var sumb = 0;
            $('.gol-b').each(function() {
                sumb += parseFloat($(this).val()); // Or this.innerHTML, this.innerText
            });
            $("#skor-b").text(sumb);
            $("#inp-skor-b").val(sumb);
            $(".gol-a").bind('keyup mouseup', function() {
                var sum = 0;
                $('.gol-a').each(function() {
                    sum += parseFloat($(this).val()); // Or this.innerHTML, this.innerText
                });
                $("#skor-a").text(sum);
                $("#inp-skor-a").val(sum);
            });

            $(".gol-b").bind('keyup mouseup', function() {
                var sum = 0;
                $('.gol-b').each(function() {
                    sum += parseFloat($(this).val()); // Or this.innerHTML, this.innerText
                });
                $("#skor-b").text(sum);
                $("#inp-skor-b").val(sum);
            });
        });
    </script>