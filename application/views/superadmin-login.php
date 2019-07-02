<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Agung">
    <link rel="shortcut icon" href="<?php echo base_url().'_include/img/favicon.png';?>">

    <title><?php echo $title; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url().'_include/css/bootstrap.min.css'; ?>" rel="stylesheet">
    <link href="<?php echo base_url().'_include/css/bootstrap-reset.css'; ?>" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo base_url().'_include/assets/font-awesome/css/font-awesome.css'; ?>" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url().'_include/css/style.css'; ?>" rel="stylesheet">
    <link href="<?php echo base_url().'_include/css/style-responsive.css'; ?>" rel="stylesheet" />
</head>

  <body class="lock-screen" style="background-color: black">
    
    <div class="lock-wrapper">
      <form class="form-signin" action="<?php echo $action; ?>" method="post">
        <h1><?php echo strtoupper($title); ?></h1>
        <div class="lock-box">
            <div class="row">
            <div class="panel-body">
                <?php if ($this->session->flashdata('failed')) { ?>
                <div class="form-group close-alert">
                    <div class="col-xs-12">
                        <div class="alert alert-danger">
                            <i class="fa fa-info-circle"></i> <?php echo $this->session->flashdata('failed'); ?>
                        </div>
                    </div>
                </div>
                <?php } ?>
               
                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" type="text" autofocus="" required="" placeholder="Username" name="username">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" type="password" required="" placeholder="Password" name="password">
                    </div>
                </div>

                <div class="form-group text-center m-t-40">
                    <div class="col-xs-12">
                        <button class="btn btn-primary btn-block btn-lg waves-effect waves-light" type="submit">Log In</button>
                    </div>
                </div>
            </div>
            </div>
        </div>
      </form>

    </div>
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url().'_include/js/jquery.js'; ?>"></script>
    <script src="<?php echo base_url().'_include/js/bootstrap.min.js'; ?>"></script>
    <script type="text/javascript">
        $(".close-alert").show().delay(5000).fadeOut();
    </script>
    </body>
</html>
