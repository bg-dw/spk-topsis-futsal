<div class="panel box-shadow-none content-header">
    <div class="panel-body">
        <div class="col-md-12">
            <h3 class="animated fadeInLeft">Hasil Perhitungan</h3>
            <p class="animated fadeInDown">
                Beranda <span class="fa-angle-right fa"></span> Perhitungan <span class="fa-angle-right fa"></span> Hasil Perhitungan
            </p>
        </div>
    </div>
</div>
<div class="col-md-12">
    <div class="panel">
        <div class="panel-body">
            <h3 class="head text-center">Hasil Perangkingan</h3>
            <div class="col-md-12">
                <div class="responsive-table">
                    <table class="table datatables table-striped table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Pemain</th>
                                <th style="text-align: center;">No. Punggung</th>
                                <th>Nama Club</th>
                                <th>Nilai</th>
                                <th>Rangking</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            for ($i = 0; $i < count($id_pemain); $i++) { ?>
                                <tr>
                                    <td><?= $i + 1 . "."; ?></td>
                                    <td><?= $final[$i]['nama'] ?></td>
                                    <td style="text-align: center;">
                                        <button class=" btn btn-circle btn-3d btn-md btn-primary" value="primary">
                                            <span class="label label-primary"><?= $final[$i]['no'] ?></span>
                                        </button>
                                    </td>
                                    <td><?= $final[$i]['club'] ?></td>
                                    <td><?= $final[$i]['nilai'] ?></td>
                                    <td><?= $final[$i]['rank'] ?></td>
                                </tr>
                            <?php
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>