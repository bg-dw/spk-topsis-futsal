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
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/plugins/simple-line-icons.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/plugins/animate.min.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/plugins/icheck/skins/flat/aero.css" />
    <link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet">
    <!-- end: Css -->

    <link rel="shortcut icon" href="<?= base_url() ?>assets/img/logomi.png">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
</head>

<body id="mimin" class="dashboard form-signin-wrapper">

    <div class="container">

        <form class="form-signin" action="<?= base_url('login/auth/') ?>" method="POST">
            <div class="panel periodic-login">
                <div class="panel-body text-center">
                    <div class="col-md-12">
                        <div class="alert alert-danger alert-dismissible fade in" role="alert" style="display: none;" id="warning">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <strong>Warning!</strong> <?= $this->session->flashdata('warning') ?>
                        </div>
                    </div>
                    <h1 class="atomic-symbol">Mi</h1>
                    <p class="element-name">Miminium</p>
                    <div class="form-group form-animate-text" style="margin-top:40px !important;">
                        <input type="text" name="user" class="form-text" required>
                        <span class="bar"></span>
                        <label>Username</label>
                    </div>
                    <div class="form-group form-animate-text" style="margin-top:40px !important;">
                        <input type="password" name="pass" class="form-text" required>
                        <span class="bar"></span>
                        <label>Password</label>
                    </div>
                    <label class="pull-left">
                        <input type="checkbox" class="icheck pull-left" name="checkbox1" /> Remember me
                    </label>
                    <input type="submit" class="btn col-md-12" value="SignIn" />
                </div>
            </div>
        </form>

    </div>

    <!-- end: Content -->
    <!-- start: Javascript -->
    <script src="<?= base_url() ?>assets/js/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/js/jquery.ui.min.js"></script>
    <script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>

    <script src="<?= base_url() ?>assets/js/plugins/moment.min.js"></script>
    <script src="<?= base_url() ?>assets/js/plugins/icheck.min.js"></script>

    <!-- custom -->
    <script src="<?= base_url() ?>assets/js/main.js"></script>
    <?php if ($this->session->flashdata('warning')) : ?>
        <script>
            $(document).ready(function() {
                $("#warning").fadeIn(2000);
                $('#warning').delay(3000).fadeOut();
            });
        </script>
    <?php endif; ?>
    <script type="text/javascript">
        $(document).ready(function() {
            $('input').iCheck({
                checkboxClass: 'icheckbox_flat-aero',
                radioClass: 'iradio_flat-aero'
            });
        });
    </script>
    <!-- end: Javascript -->
</body>

</html>