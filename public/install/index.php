<?php include './app/Config.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Installation Wizard - Laravel | <?= (!empty($title) ? $title : null) ?></title>
        <!-- Favicon -->
        <link rel="icon" href="install/public/img/favicon.png" type="image/jpg">
        <!-- Bootstrap -->
        <link rel="stylesheet" type="text/css" href="install/public/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" type="text/css" href="install/public/css/font-awesome.min.css">
        <!-- Custom Style -->
        <link rel="stylesheet" type="text/css" href="install/public/css/style.css">
    </head>
    <body style="--tw-bg-opacity: 1;background-color: rgb(246 249 252/var(--tw-bg-opacity));">
        
        <div class="loader"></div> 
        <!-- BACK TO TOP  -->
        <a name="top"></a>

        <!-- BEGIN CONTAINER -->
        <div class="container">
            <!-- BEGIN ROW -->
            <div class="row"> 
                <div class="col-md-10 col-md-offset-1 col-sm-12"> 
                
                    <!-- MAIN WRAPPER -->
                    <div class="main_wrapper" style="border-top-left-radius:25px;border-top-right-radius: 25px; border-radius:25px;">

                        <!-- BEGIN HEADER -->
                        <div class="page-header" style="border-top-left-radius:25px;border-top-right-radius:25px;"> 
                            <h1>Installation Wizard - Gigtodo</h1>
                        </div>
                        <!-- ENDS HEADER -->

                        <div class="inner-container">
                            <!-- BEGIN LEFT SIDEBAR -->
                            <div class="col-sm-3 p-0 m-0">
                                <ul class="sidebar list-unstyled">
                                  <li class="<?= (($title == 'Requirements') ? 'active' : '') ?>"><a href="?step=requirements"><i class="fa fa-server"></i> Requirements</a></li>
                                  <li class="<?= (($title == 'Installation') ? 'active' : '') ?>"><a href="?step=installation"><i class="fa fa-wrench"></i> Installation</a></li>
                                  <li class="<?= (($title == 'Complete') ? 'active' : '') ?>"><a href="javascript:void(0)"><i class="fa fa-check"></i> Complete</a></li>
                                </ul>
                            </div>
                            <!-- ENDS LEFT SIDEBAR -->

                            <!-- BEGIN CONTENT -->
                            <div class="col-sm-9 center">
                                
                                <?php include($content) ?>
                                  <span class="justify-content-right">Version 3.2.0 | Developed by <a href="http://gigtodoscript.com">Gigtodoscript</a></span>
                            </div>
                            <!-- ENDS CONTENT -->

                            <!-- BEGIN FOOTER -->
                            <!-- <footer class="py-4">
                              
                            </footer> -->
                            <!-- ENDS FOOTER -->

                        </div>
                    </div>
                    <!-- END MAIN WRAPPER -->
                </div>
            </div>
            <!-- ENDS ROW -->
        </div>
        <!-- ENDS OF CONTAINER -->  

        <!-- ALL SCRIPTS/JS -->
        <script src="install/public/js/jquery.min.js"></script>
        <script src="install/public/js/script.js"></script>
    </body>
</html>