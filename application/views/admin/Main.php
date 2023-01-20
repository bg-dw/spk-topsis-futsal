<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="description" content="Miminium Admin Template v.1">
    <meta name="author" content="Isna Nur Azis">
    <meta name="keyword" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Miminium</title>

    <!-- start: Css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/bootstrap.min.css">

    <!-- plugins -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/plugins/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/plugins/animate.min.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/plugins/nouislider.min.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/plugins/select2.min.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/plugins/ionrangeslider/ion.rangeSlider.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/plugins/ionrangeslider/ion.rangeSlider.skinFlat.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/plugins/bootstrap-material-datetimepicker.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/plugins/datatables.bootstrap.min.css" />
    <link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet">
    <script src="<?= base_url() ?>assets/js/jquery.min.js"></script>
    <!-- end: Css -->

    <link rel="shortcut icon" href="<?= base_url() ?>assets/img/logomi.png">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
</head>

<body id="mimin" class="dashboard">
    <!-- start: Header -->
    <nav class="navbar navbar-default header navbar-fixed-top">
        <div class="col-md-12 nav-wrapper">
            <div class="navbar-header" style="width:100%;">
                <div class="opener-left-menu is-open">
                    <span class="top"></span>
                    <span class="middle"></span>
                    <span class="bottom"></span>
                </div>
                <a href="index.html" class="navbar-brand">
                    <b>MIMIN</b>
                </a>

                <ul class="nav navbar-nav search-nav">
                    <li>
                        <div class="search">
                            <span class="fa fa-search icon-search" style="font-size:23px;"></span>
                            <div class="form-group form-animate-text">
                                <input type="text" class="form-text" required>
                                <span class="bar"></span>
                                <label class="label-search">Type anywhere to <b>Search</b> </label>
                            </div>
                        </div>
                    </li>
                </ul>

                <ul class="nav navbar-nav navbar-right user-nav">
                    <li class="user-name"><span><?= $this->session->userdata('nama') ?></span></li>
                    <li class="dropdown avatar-dropdown">
                        <img src="<?= base_url() ?>assets/img/avatar.jpg" class="img-circle avatar" alt="user name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" />
                        <ul class="dropdown-menu user-dropdown">
                            <li><a href="#"><span class="fa fa-user"></span> My Profile</a></li>
                            <li><a href="<?= base_url('login/logout/') ?>"><span class="fa fa-power-off"></span> Logout</a></li>
                        </ul>
                    </li>
                    <li><a href="#" class=""></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- end: Header -->

    <div class="container-fluid mimin-wrapper">

        <!-- start:Left Menu -->
        <?php $this->load->view('admin/Menu') ?>
        <!-- end: Left Menu -->


        <!-- start: Content -->
        <div id="content">
            <?php $this->load->view($content) ?>
        </div>
        <!-- end: content -->
    </div>

    <?php $this->load->view('modal/Alert') ?>

    <!-- start: Mobile -->
    <div id="mimin-mobile" class="reverse">
        <div class="mimin-mobile-menu-list">
            <div class="col-md-12 sub-mimin-mobile-menu-list animated fadeInLeft">
                <ul class="nav nav-list">

                    <li class="ripple">
                        <a href="<?= base_url() ?>"><span class="fa-home fa"></span> Dashboard</a>
                    </li>
                    <li class="ripple">
                        <a href="<?= base_url('admin/c_turnamen/') ?>"><span class="fa fa-futbol-o"></span>Turnamen</a>
                    </li>
                    <li class="ripple">
                        <a href="<?= base_url('admin/c_club/') ?>"><span class="fa fa-suitcase"></span>Club</a>
                    </li>
                    <li class="ripple">
                        <a href="<?= base_url('admin/c_pemain/') ?>"><span class="fa fa-users"></span>Pemain</a>
                    </li>
                    <li class="ripple">
                        <a href="<?= base_url('admin/c_kriteria/') ?>"><span class="fa fa-database"></span>Kriteria</a>
                    </li>
                    <li class="ripple">
                        <a href="<?= base_url('admin/c_pertandingan/') ?>"><span class="fa fa-calendar"></span>Pertandingan</a>
                    </li>
                    <li class="ripple">
                        <a href="<?= base_url('admin/c_perangkingan/') ?>"><span class="fa fa-trophy"></span>Perangkingan</a>
                    </li>
                    <li class="ripple">
                        <a href="<?= base_url('about/') ?>"><span class="fa fa-question"></span>Tentang</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <button id="mimin-mobile-menu-opener" class="animated rubberBand btn btn-circle btn-danger">
        <span class="fa fa-bars"></span>
    </button>
    <!-- end: Mobile -->

    <!-- start: Javascript -->
    <script src="<?= base_url() ?>assets/js/jquery.ui.min.js"></script>
    <script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>


    <!-- plugins -->
    <script src="<?= base_url() ?>assets/js/plugins/moment.min.js"></script>
    <script src="<?= base_url() ?>assets/js/plugins/jquery.knob.js"></script>
    <script src="<?= base_url() ?>assets/js/plugins/ion.rangeSlider.min.js"></script>
    <script src="<?= base_url() ?>assets/js/plugins/bootstrap-material-datetimepicker.js"></script>
    <script src="<?= base_url() ?>assets/js/plugins/jquery.nicescroll.js"></script>
    <script src="<?= base_url() ?>assets/js/plugins/jquery.mask.min.js"></script>
    <script src="<?= base_url() ?>assets/js/plugins/select2.full.min.js"></script>
    <script src="<?= base_url() ?>assets/js/plugins/nouislider.min.js"></script>
    <script src="<?= base_url() ?>assets/js/plugins/jquery.validate.min.js"></script>
    <script src="<?= base_url() ?>assets/js/plugins/jquery.datatables.min.js"></script>
    <script src="<?= base_url() ?>assets/js/plugins/datatables.bootstrap.min.js"></script>


    <!-- custom -->
    <script src="<?= base_url() ?>assets/js/main.js"></script>
    <script>
        $(".select2").select2({
            placeholder: "Pilih Club",
            allowClear: true
        });
        $(".select2-turnamen").select2({
            placeholder: "Pilih Turnamen",
            allowClear: true
        });
        $(".select2-pertandingan").select2({
            placeholder: "Pilih Tim",
            allowClear: true
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {

            $('.datatables').DataTable();
            $('.mask-date').mask('00/00/0000');
            $('.mask-time').mask('00:00:00');
            $('.mask-date_time').mask('00/00/0000 00:00:00');
            $('.mask-cep').mask('00000-000');
            $('.mask-phone').mask('0000-0000');
            $('.mask-phone_idn').mask('(0000) 0000-0000');
            $('.mask-phone_with_ddd').mask('(00) 0000-0000');
            $('.mask-phone_us').mask('(000) 000-0000');
            $('.mask-mixed').mask('AAA 000-S0S');
            $('.mask-cpf').mask('000.000.000-00', {
                reverse: true
            });
            $('.mask-money').mask('000.000.000.000.000,00', {
                reverse: true
            });
            $('.mask-money2').mask("#.##0,00", {
                reverse: true
            });
            $('.mask-ip_address').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
                translation: {
                    'Z': {
                        pattern: /[0-9]/,
                        optional: true
                    }
                }
            });
            $('.mask-ip_address').mask('099.099.099.099');
            $('.mask-percent').mask('##0,00%', {
                reverse: true
            });
            $('.mask-clear-if-not-match').mask("00/00/0000", {
                clearIfNotMatch: true
            });
            $('.mask-placeholder').mask("00/00/0000", {
                placeholder: "__/__/____"
            });
            $('.mask-fallback').mask("00r00r0000", {
                translation: {
                    'r': {
                        pattern: /[\/]/,
                        fallback: '/'
                    },
                    placeholder: "__/__/____"
                }
            });
            $('.mask-selectonfocus').mask("00/00/0000", {
                selectOnFocus: true
            });

            var options = {
                onKeyPress: function(cep, e, field, options) {
                    var masks = ['00000-000', '0-00-00-00'];
                    mask = (cep.length > 7) ? masks[1] : masks[0];
                    $('.mask-crazy_cep').mask(mask, options);
                }
            };

            $('.mask-crazy_cep').mask('00000-000', options);


            var options2 = {
                onComplete: function(cep) {
                    alert('CEP Completed!:' + cep);
                },
                onKeyPress: function(cep, event, currentField, options) {
                    console.log('An key was pressed!:', cep, ' event: ', event,
                        'currentField: ', currentField, ' options: ', options);
                },
                onChange: function(cep) {
                    console.log('cep changed! ', cep);
                },
                onInvalid: function(val, e, f, invalid, options) {
                    var error = invalid[0];
                    console.log("Digit: ", error.v, " is invalid for the position: ", error.p, ". We expect something like: ", error.e);
                }
            };

            $('.mask-cep_with_callback').mask('00000-000', options2);

            var SPMaskBehavior = function(val) {
                    return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
                },
                spOptions = {
                    onKeyPress: function(val, e, field, options) {
                        field.mask(SPMaskBehavior.apply({}, arguments), options);
                    }
                };

            $('.mask-sp_celphones').mask(SPMaskBehavior, spOptions);

            $(".select2-A").select2({
                placeholder: "Select a state",
                allowClear: true
            });

            $(".select2-B").select2({
                tags: true
            });

            $("#range1").ionRangeSlider({
                type: "double",
                grid: true,
                min: -1000,
                max: 1000,
                from: -500,
                to: 500
            });

            $('.dateAnimate').bootstrapMaterialDatePicker({
                weekStart: 0,
                time: false,
                animation: true
            });
            $('.date').bootstrapMaterialDatePicker({
                weekStart: 0,
                time: false
            });
            $('.time').bootstrapMaterialDatePicker({
                date: false,
                format: 'HH:mm',
                animation: true
            });
            $('.datetime').bootstrapMaterialDatePicker({
                format: 'DD MMMM YYYY - HH:mm',
                minDate: new Date(),
                animation: true
            });
            $('.date-fr').bootstrapMaterialDatePicker({
                format: 'DD-MM-YYYY HH:mm',
                minDate: new Date(),
                lang: 'fr',
                weekStart: 1,
                cancelText: 'ANNULER'
            });
            $('.min-date-time').bootstrapMaterialDatePicker({
                format: 'DD/MM/YYYY HH:mm',
                minDate: new Date()
            });
        });
    </script>
    <!-- end: Javascript -->
</body>

</html>