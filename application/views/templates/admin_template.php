<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Agung">

    <link rel="shortcut icon" href="<?php echo base_url() . '_include/img/favicon.png'; ?>">

    <title><?php echo $title; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url() . '_include/css/bootstrap.min.css'; ?>" rel="stylesheet">
    <link href="<?php echo base_url() . '_include/css/bootstrap-reset.css'; ?>" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo base_url() . '_include/assets/font-awesome/css/font-awesome.css'; ?>" rel="stylesheet" />
    <link href="<?php echo base_url() . '_include/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css'; ?>" rel="stylesheet" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo base_url() . '_include/css/owl.carousel.css'; ?>" type="text/css">
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url() . '_include/css/style.css'; ?>" rel="stylesheet" />
    <link href="<?php echo base_url() . '_include/css/template.css'; ?>" rel="stylesheet" />
    <link href="<?php echo base_url() . '_include/css/style-responsive.css'; ?>" rel="stylesheet" />
    <!-- Datatable-->
    <link href="<?php echo base_url() . '_include/assets/advanced-datatable/media/css/demo_page.css'; ?>" rel="stylesheet" />
    <link href="<?php echo base_url() . '_include/assets/advanced-datatable/media/css/demo_table.css'; ?>" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url() . '_include/assets/data-tables/DT_bootstrap.css'; ?>" />
    <!-- Textarea -->
    <link rel="stylesheet" href="<?php echo base_url() . '_include/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css'; ?>" />

    <script src="<?php echo base_url() . '_include/js/jquery-1.8.3.min.js'; ?>"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <section id="container">
        <!--header start-->
        <header class="header white-bg">
            <div class="sidebar-toggle-box">
                <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
            </div>
            <!--logo start-->
            <a href="<?php echo base_url(); ?>" class="logo">Dashboard<span>Admin</span></a>
            <!--logo end-->
            <div class="top-nav ">
                <!--search & user info start-->
                <ul class="nav pull-right top-menu">
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <img alt="" src="<?php echo base_url() . '_include/img/admin.png'; ?>" width="29" height="29">
                            <span class="username"><?php echo $this->session->userdata('sess_username'); ?></span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li><a href="<?php echo base_url('dashboard-admin/pengaturan'); ?>"><i class="fa fa-key"></i> Kelola Akun</a></li>
                            <li><a href="<?php echo base_url('login/signout'); ?>"><i class="fa fa-sign-out"></i> Logout / Keluar</a></li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!--search & user info end-->
            </div>
        </header>
        <!--header end-->
        <!--sidebar start-->
        <aside>
            <div id="sidebar" class="nav-collapse ">
                <!-- sidebar menu start-->
                <ul class="sidebar-menu" id="nav-accordion">
                    <li>
                        <a href="<?php echo base_url('dashboard-admin/home'); ?>">
                            <i class="fa fa-dashboard"></i>
                            <span>Dashboard</span>
                        </a>
                        <!-- <a href="<?php echo base_url('dashboard-admin/pasien'); ?>">
                            <i class="fa fa-bars"></i>
                            <span>Pasien</span>
                        </a>
                        <a href="<?php echo base_url('dashboard-admin/data_dpjp'); ?>">
                            <i class="fa fa-file-o"></i>
                            <span>Data DPJP</span>
                        </a>
                        <a href="<?php echo base_url('dashboard-admin/data_diagnosa'); ?>">
                            <i class="fa fa-file-o"></i>
                            <span>Data Diagnosa</span>
                        </a>
                        <a href="<?php echo base_url('dashboard-admin/data_tindakan'); ?>">
                            <i class="fa fa-file-o"></i>
                            <span>Data Tindakan</span>
                        </a>
                        <a href="<?php echo base_url('dashboard-admin/data_rs'); ?>">
                            <i class="fa fa-file-o"></i>
                            <span>Data RS</span>
                        </a> -->
                    </li>

                </ul>
                <!-- sidebar menu end-->
            </div>
        </aside>
        <!--sidebar end-->
        <!--main content start-->
        <?php $this->load->view($content); ?>
        <!--main content end-->

    </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url() . '_include/js/jquery.js'; ?>"></script>
    <script src="<?php echo base_url() . '_include/js/bootstrap.min.js'; ?>"></script>
    <script src="<?php echo base_url() . '_include/js/jquery.dcjqaccordion.2.7.js'; ?>"></script>
    <script src="<?php echo base_url() . '_include/js/jquery.scrollTo.min.js'; ?>"></script>
    <script src="<?php echo base_url() . '_include/js/jquery.nicescroll.js'; ?>" type="text/javascript"></script>
    <script src="<?php echo base_url() . '_include/js/jquery.sparkline.js'; ?>" type="text/javascript"></script>
    <script src="<?php echo base_url() . '_include/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js'; ?>"></script>
    <script src="<?php echo base_url() . '_include/js/owl.carousel.js'; ?>"></script>
    <script src="<?php echo base_url() . '_include/js/jquery.customSelect.min.js'; ?>"></script>
    <script src="<?php echo base_url() . '_include/js/jquery.validate.min.js'; ?>"></script>
    <script src="<?php echo base_url() . '_include/js/respond.min.js'; ?>"></script>

    <!--this page plugins-->
    <script src="<?php echo base_url() . '_include/assets/bootstrap-datepicker/js/bootstrap-datepicker.js'; ?>"></script>
    <script type="text/javascript" src="<?php echo base_url() . '_include/assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js'; ?>"></script>
    <script type="text/javascript" src="<?php echo base_url() . '_include/assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js'; ?>"></script>
    <script type="text/javascript" src="<?php echo base_url() . '_include/assets/bootstrap-timepicker/js/bootstrap-timepicker.js'; ?>"></script>
    <script type="text/javascript" src="<?php echo base_url() . '_include/assets/jquery-multi-select/js/jquery.multi-select.js'; ?>"></script>
    <!--common script for all pages-->

    <script src="<?php echo base_url() . '_include/assets/advanced-datatable/media/js/jquery.dataTables.js'; ?>"></script>
    <script src="<?php echo base_url() . '_include/assets/data-tables/DT_bootstrap.js'; ?>"></script>
    <!--script for this page-->
    <script src="<?php echo base_url() . '_include/js/sparkline-chart.js'; ?>"></script>
    <script src="<?php echo base_url() . '_include/js/easy-pie-chart.js'; ?>"></script>
    <script src="<?php echo base_url() . '_include/js/count.js'; ?>"></script>

    <script src="<?php echo base_url() . '_include/js/form-validation-script.js'; ?>"></script>
    <script src="<?php echo base_url() . '_include/js/jquery.autocomplete.js'; ?>"></script>

    <script src="<?php echo base_url() . '_include/assets/fuelux/js/spinner.min.js'; ?>"></script>
    <script src="<?php echo base_url() . '_include/assets/bootstrap-wysihtml5/wysihtml5-0.3.0.js'; ?>"></script>
    <script src="<?php echo base_url() . '_include/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js'; ?>"></script>

    <script src="<?php echo base_url() . '_include/js/jQuery-Mask-Plugin-master/dist/jquery.mask.min.js'; ?>"></script>

    <!--common script for all pages-->
    <script src="<?php echo base_url() . '_include/js/common-scripts.js'; ?>"></script>
    <!--this page  script only-->
    <script src="<?php echo base_url() . '_include/js/advanced-form-components.js'; ?>"></script>


    <script type="text/javascript">
        //custom select box
        $(function() {
            $('select.styled').customSelect();
        });

        $(document).ready(function() {
            $('#example').dataTable({
                "aaSorting": [],
                "oLanguage": {
                    "sZeroRecords": "Data tidak ditemukan",
                    "sEmptyTable": "Tidak ada data",
                    "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                    "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 data",
                    "sInfoFiltered": "(Pencarian dari _MAX_ total data)",
                    "sSearch": "Cari Data : ",
                    "oPaginate": {
                        "sPrevious": "Sebelumnya",
                        "sNext": "Selanjutnya",
                    }
                }
            });


            $("#autoclose").fadeTo(4000, 500).slideUp(500, function() {
                $("#autoclose").slideUp(500);
            });

            //format rupiah
            $('.uang').mask('000.000.000', {
                reverse: true
            });


        });
    </script>

</body>

</html>