<div class="col-md-12" style="padding:20px;">
    <div class="col-md-12 padding-0">
        <div class="col-md-8 padding-0">
            <?php
            // var_dump($tot_by_pos);
            ?>
            <div class="col-md-12 padding-0">
                <div class="col-md-6">
                    <div class="panel box-v1">
                        <div class="panel-heading bg-white border-none">
                            <div class="col-md-6 col-sm-6 col-xs-6 text-left padding-0">
                                <h4 class="text-left"><?php if ($tot_by_pos[0]->posisi == "GK") {
                                                            echo "Kiper";
                                                        } else {
                                                            echo "Non-Kiper";
                                                        } ?></h4>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                                <h4>
                                    <span class="icon-user icons icon text-right"></span>
                                </h4>
                            </div>
                        </div>
                        <div class="panel-body text-center">
                            <h1><?= $tot_by_pos[0]->tot_by ?></h1>
                            <p>Pemain</p>
                            <hr />
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel box-v1">
                        <div class="panel-heading bg-white border-none">
                            <div class="col-md-6 col-sm-6 col-xs-6 text-left padding-0">
                                <h4 class="text-left"><?php if ($tot_by_pos[1]->posisi == "GK") {
                                                            echo "Kiper";
                                                        } else {
                                                            echo "Non-Kiper";
                                                        } ?></h4>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                                <h4>
                                    <span class="icon-basket-loaded icons icon text-right"></span>
                                </h4>
                            </div>
                        </div>
                        <div class="panel-body text-center">
                            <h1><?= $tot_by_pos[1]->tot_by ?></h1>
                            <p>Pemain</p>
                            <hr />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="panel box-v6">
                    <div class="panel-heading">
                        <h4>User
                            <span class="icon-options-vertical icons pull-right"></span>
                        </h4>
                    </div>
                    <div class="panel-body padding-0">
                        <div class="col-md-12 padding-0">
                            <div class="col-md-12 padding-0" style="height:127px;">
                                <div class="col-md-12 col-sm-12 box-v6-content-bg" data-progress="100%">

                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 padding-0 box-v6-content">
                                    <div class="col-md-10 col-sm-10 col-xs-10">
                                        <img src="<?= base_url() ?>assets/img/avatar.jpg" />
                                        <img src="<?= base_url() ?>assets/img/avatar.jpg" />
                                        <img src="<?= base_url() ?>assets/img/avatar.jpg" />
                                        <img src="<?= base_url() ?>assets/img/avatar.jpg" />

                                        <h4>Panitia Penyelenggara</h4>
                                        <p><?= date('l, jS M Y', strtotime($turnamen->tgl_turnamen)) ?></p>
                                    </div>
                                    <div class="col-md-2 col-sm-2 hidden-xs text-center box-v6-progress">
                                        <h3><?= $tot_us->tot_user . " Orang"; ?></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">

            <div class="col-md-12 padding-0">
                <div class="panel box-v3">
                    <div class="panel-heading bg-white border-none">
                        <h4>Report</h4>
                    </div>
                    <div class="panel-body">

                        <div class="media">
                            <div class="media-left">
                                <span class="icon-folder icons" style="font-size:2em;"></span>
                            </div>
                            <div class="media-body">
                                <h5 class="media-heading"><?php if ($tot_by_pos[0]->posisi == "GK") {
                                                                echo "Kiper";
                                                            } else {
                                                                echo "Non-Kiper";
                                                            } ?></h5>
                                <div class="progress progress-mini">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $tot_by_pos[0]->tot_by; ?>" aria-valuemin="0" aria-valuemax="<?php echo $tot_by_pos[0]->tot_by + $tot_by_pos[1]->tot_by; ?>" style="width: <?php echo (($tot_by_pos[0]->tot_by / ($tot_by_pos[0]->tot_by + $tot_by_pos[1]->tot_by)) * 100) . '%'; ?>;">
                                        <span class="sr-only"><?php echo (($tot_by_pos[0]->tot_by / ($tot_by_pos[0]->tot_by + $tot_by_pos[1]->tot_by)) * 100) . '%'; ?> Pemain</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="media">
                            <div class="media-left">
                                <span class="icon-energy icons" style="font-size:2em;"></span>
                            </div>
                            <div class="media-body">
                                <h5 class="media-heading"><?php if ($tot_by_pos[1]->posisi == "GK") {
                                                                echo "Kiper";
                                                            } else {
                                                                echo "Non-Kiper";
                                                            } ?></h5>
                                <div class="progress progress-mini">
                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="<?php echo $tot_by_pos[1]->tot_by; ?>" aria-valuemin="0" aria-valuemax="<?php echo $tot_by_pos[0]->tot_by + $tot_by_pos[1]->tot_by; ?>" style="width: <?php echo (($tot_by_pos[1]->tot_by / ($tot_by_pos[0]->tot_by + $tot_by_pos[1]->tot_by)) * 100) . '%'; ?>;">
                                        <span class="sr-only"><?php echo (($tot_by_pos[1]->tot_by / ($tot_by_pos[0]->tot_by + $tot_by_pos[1]->tot_by)) * 100) . '%'; ?> Pemain</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>