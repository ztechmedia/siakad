<!DOCTYPE html>
<html lang="en">
<?php include 'head.php'?>

<body>
    <!-- START PAGE CONTAINER -->
    <div class="page-container">

        <!-- START PAGE SIDEBAR -->
        <div class="page-sidebar page-sidebar-fixed scroll">
            <!-- START X-NAVIGATION -->
            <ul class="x-navigation nav-customx">
                <li class="xn-logo">
                    <a style="font-size: 20px;">SMK YAPIN 02 SETU</a>
                    <a class="x-navigation-control">
                    </a>
                </li>
                <?php 
                    include 'profile.php';
                    include 'sidebar.php';?>
            </ul>
            <!-- END X-NAVIGATION -->
        </div>
        <!-- END PAGE SIDEBAR -->

        <!-- PAGE CONTENT -->
        <div class="page-content">
            <?php include 'navbar.php';?>
            <div class="content"></div>
        </div>
        <!-- END PAGE CONTENT -->
    </div>
    <!-- END PAGE CONTAINER -->

    <div class="modal" id="modal_basic" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="defModalHead"></h4>
                </div>

                <div class="modal-body">
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="<?=base_url("assets/joli/js/jquery/jquery.min.js")?>"></script>
    <script type="text/javascript" src="<?=base_url("assets/joli/js/jquery/jquery-ui.min.js")?>"></script>
    <script type="text/javascript" src="<?=base_url("assets/joli/js/bootstrap/bootstrap.min.js")?>"></script>
    <script type="text/javascript" src="<?=base_url("assets/joli/js/bootstrap/bootstrap-datepicker.js")?>"></script>
    <script type="text/javascript" src="<?=base_url("assets/joli/js/bootstrap/bootstrap-select.js")?>"></script>
    <script type="text/javascript" src="<?=base_url("assets/joli/js/mcustomscrollbar/jquery.mCustomScrollbar.min.js")?>"></script>
    <script type="text/javascript" src="<?=base_url("assets/datatables/datatables.min.js")?>"></script>
    <script type="text/javascript" src="<?=base_url("assets/sweetalert/sweetalert.min.js")?>"></script>

    <script type="text/javascript" src="<?=base_url("assets/joli/js/validationengine/languages/jquery.validationEngine-id.js")?>"></script>
    <script type="text/javascript" src="<?=base_url("assets/joli/js/validationengine/jquery.validationEngine.js")?>"></script>
    <script type="text/javascript" src="<?=base_url("assets/joli/js/validationengine/jquery.validationEngine.js")?>"></script>
    <script type="text/javascript" src="<?=base_url("assets/joli/js/blueimp/jquery.blueimp-gallery.min.js")?>"></script>
    <script type="text/javascript" src="<?=base_url("assets/joli/js/icheck/icheck.min.js")?>"></script>
    <script type="text/javascript" src="<?=base_url("assets/joli/js/fileinput/fileinput.min.js")?>"></script>
    <script type="text/javascript" src="<?=base_url("assets/joli/js/maskedinput/jquery.maskedinput.min.js")?>"></script>

    <script type="text/javascript" src="<?=base_url("assets/joli/js/plugins.js")?>"></script>
    <script type="text/javascript" src="<?=base_url("assets/joli/js/actions.js")?>"></script>

    <!-- CUSTOM SCRIPT -->
    <script type="text/javascript" src="<?=base_url("assets/custom/js/dropzone.min.js")?>"></script>
    <script type="text/javascript" src="<?=base_url("assets/custom/js/jquery.maskMoney.min.js")?>"></script>
    <script type="text/javascript" src="<?=base_url("assets/custom/js/validation/forms.js")?>"></script>
    <script type="text/javascript" src="<?=base_url("assets/custom/js/ajax/ajaxRequest.js")?>"></script>
    <script type="text/javascript" src="<?=base_url("assets/custom/js/ajax/datatables/datatables.js")?>"></script>
    <script type="text/javascript" src="<?=base_url("assets/custom/js/loader/sidebar.js")?>"></script>
    <script type="text/javascript" src="<?=base_url("assets/custom/js/loader/viewLoader.js")?>"></script>
    <script type="text/javascript" src="<?=base_url("assets/custom/js/actions/errorHandler.js")?>"></script>
    <script type="text/javascript" src="<?=base_url("assets/custom/js/actions/authActions.js")?>"></script>
    <script type="text/javascript" src="<?=base_url("assets/custom/js/actions/formActions.js")?>"></script>
    <script type="text/javascript" src="<?=base_url("assets/custom/js/highcharts.js")?>"></script>
    
    <script>
        setSidebarOnLoad();
        setCurrentNav("<?=base_url("dashboard")?>");
        loadContent("<?=base_url("check-messages")?>", "#envelope");
    </script>

    <style>
        .profile .profile-image img {
            border: none !important;
        }

        .page-sidebar, .page-sidebar-fixed, .scroll,
        .mCustomScrollbar, ._mCS_1, .mCS-autoHide, .mCS_no_scrollbar{
            background: #fff;
        }

        .table > thead > tr > th {
            background: #01bafd !important;
            color: #fff;
            font-size: 12px;
        }
    </style>
</body>

</html>