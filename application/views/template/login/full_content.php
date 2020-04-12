<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SIMP - Adorable Projects | Masuk</title>

    <link rel="shortcut icon" type="image/png" href="<?php echo base_url('assets/image/logo.png'); ?>"/>
    <link rel="stylesheet" href="<?php echo base_url('assets/adminlte/adminlte.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/font-awesome/css/all.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/icheck-bootstrap/icheck-bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/pace-progress/themes/silver/pace-theme-flash.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/toastr/toastr.min.css'); ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700">
    <style>
        .bg-body {
            background: url('<?php echo base_url('assets/image/background.jpg'); ?>') no-repeat center center fixed; 
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

        .green-plus-custom {
            color: #2FD67D;
        }

        .pink-plus-btn-custom {
            background-color: #F0727A; 
            color: #F4F6F9;
        }

        .pink-plus-btn-custom:hover {
            background-color: #F0313E; 
            color: #F4F6F9;
        }

        .login-box-custom {
            width: 450px; 
            background-color: #F4F6F9; 
        }
    </style>

    <script src="<?php echo base_url('assets/jquery/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/bootstrap/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/pace-progress/pace.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/toastr/toastr.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/adminlte/adminlte.min.js'); ?>"></script>
</head>
<body class="hold-transition login-page bg-body">

    <?php
        echo $main_content;
    ?>

</body>
</html>