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
    <link rel="stylesheet" href="<?php echo base_url('assets/pace-progress/themes/silver/pace-theme-flash.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/toastr/toastr.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/datatables-bs4/dataTables.bootstrap4.min.css'); ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700">

    <style>
        .bg-pink-custom {
            background-color: #F09BA0; 
            color: #F4F6F9;
        }

        .white-custom {
            color: #F4F6F9;
        }

        .green-plus2-custom {
            color: #66D69A;
        }

        .green-plus2-custom:hover {
            color: #2FD67D;
        }

        .pink-min-bg-custom {
            background-color: #F0EAEA;
        }

        .green-btn-custom {
            background-color: #66D69A;
            color: #FFFFFF;
        }

        .green-btn-custom:hover {
            background-color: #2FD67D;
            color: #FFFFFF;
        }

        .anchor-custom:hover {
            color: #FFFFFF;
        }
        
        .pagination > li > a:focus,
        .pagination > li > a:hover,
        .pagination > li > span:focus,
        .pagination > li > span:hover {
            z-index: 3;
            background-color: #66D69A;
            color: #F4F6F9;
            border-color: #ddd;
        }

        .pagination .page-item.active .page-link { 
            background-color: #66D69A; 
            border-color: #ddd;
        }

        div.dataTables_wrapper div.dataTables_paginate ul.pagination .page-item.active .page-link:focus {
            background-color: #66D69A; 
            border-color: #ddd; 
        }

        .pagination .page-item.active .page-link:hover {
            background-color: #66D69A; 
            border-color: #ddd;
        }

        .page-link {
            color: #66D69A;
        }

        .form-control:focus{
            border-color: #F09BA0;
        }
        
        .dropdown-item:focus{
            background-color: #66D69A; 
        }
    </style>

    <script src="<?php echo base_url('assets/jquery/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/bootstrap/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/pace-progress/pace.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/toastr/toastr.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/datatables/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/datatables-bs4/dataTables.bootstrap4.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/adminlte/adminlte.min.js'); ?>"></script>
</head>
<body class="hold-transition layout-top-nav layout-navbar-fixed">
<div class="wrapper">

    <?php echo $navbar; ?>

    <?php echo $main_content; ?>

    <footer class="main-footer bg-pink-custom">
        <?php
            if(isset($force))
            {
                echo '<strong>Copyright &copy; 2020 <a href="#" class="white-custom anchor-custom force-ubah-password">SIMP - Adorable Projects</a>.</strong> All rights reserved.';
            }
            else
            {
                echo '<strong>Copyright &copy; 2020 <a href="'.base_url().'" class="white-custom anchor-custom">SIMP - Adorable Projects</a>.</strong> All rights reserved.';
            }
        ?>
    </footer>
</div>
<script type="text/javascript">
    toastr.options = {
        "positionClass": "toast-bottom-right"
    }     

    <?php
        $existFlashDataInfoMessage = $this->session->flashdata('info_message');  
        if($existFlashDataInfoMessage) {
            echo 'toastr.info("'.$existFlashDataInfoMessage.'")';
        } 

        $existFlashDataAlertMessage = $this->session->flashdata('alert_message');  
        if($existFlashDataAlertMessage) {
            echo 'toastr.error("'.$existFlashDataAlertMessage.'")';
        } 

        $existFlashDataSuccessMessage = $this->session->flashdata('success_message');  
        if($existFlashDataSuccessMessage) {
            echo 'toastr.success("'.$existFlashDataSuccessMessage.'")';
        } 

        $existFlashDataSuccessClosableMessage = $this->session->flashdata('success_closable_message');  
        if($existFlashDataSuccessClosableMessage) {
            echo '
                $(document).Toasts("create", {
                    body: "'.$existFlashDataSuccessClosableMessage.'",
                    title: "Success",
                    icon: "fas fa-shield-check fa-lg",
                    class: "bg-success",
                    position: "bottomRight",
                })
            ';
        } 
    ?>

    $('.force-ubah-password').click(function() {
        toastr.warning('Mohon untuk mengubah password anda terlebih dahulu')
    });
</script>
</body>
</html>
