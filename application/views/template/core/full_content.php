<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>SIMP | <?php echo $title; ?></title>

    <link rel="shortcut icon" type="image/png" href="<?php echo base_url('assets/image/logo.png'); ?>"/>
    <link rel="stylesheet" href="<?php echo base_url('assets/adminlte/adminlte.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/font-awesome/css/all.min.css'); ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700">
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

    <?php echo $navbar; ?>

    <?php echo $main_content; ?>

    <footer class="main-footer">
        <strong>Copyright &copy; 2020 <a href="<?php echo base_url(); ?>">SIMP</a>.</strong> All rights reserved.
    </footer>
</div>

<script src="<?php echo base_url('assets/jquery/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/bootstrap/bootstrap.bundle.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/adminlte/adminlte.min.js'); ?>"></script>
</body>
</html>
