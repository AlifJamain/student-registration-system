<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])=="") {   
    header("Location: index.php"); 
} else {
?>
<!DOCTYPE html>
<html lang="en">
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sistem Pendaftaran Pelajar</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" >
        <link rel="stylesheet" href="css/toastr/toastr.min.css" media="screen" >
        <link rel="stylesheet" href="css/icheck/skins/line/blue.css" >
        <link rel="stylesheet" href="css/icheck/skins/line/red.css" >
        <link rel="stylesheet" href="css/icheck/skins/line/green.css" >
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <script src="js/modernizr/modernizr.min.js"></script>
    </head>
    <body class="top-navbar-fixed">
        <div class="main-wrapper">
              <?php include('includes/topbar.php');?>
            <div class="content-wrapper">
                <div class="content-container">

                    <?php include('includes/leftbar.php');?>  

                    <div class="main-page">
                        <!-- /.container-fluid -->

                        <section class="section">
                            <div class="row page-title-div">
                                <div class="col-sm-6">
                                    <h2 class="title">Jumlah Pilihan Sekolah</h2>
                                  
                                </div>
                                <!-- /.col-sm-6 -->
                            </div>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                        <a class="dashboard-stat bg-primary" href="#">
                                            <?php 
                                                $sql1 ="SELECT IdPemohon from pemohon";
                                                $query1 = $dbh -> prepare($sql1);
                                                $query1->execute();
                                                $results1=$query1->fetchAll(PDO::FETCH_OBJ);
                                                $totalstudents=$query1->rowCount();
                                            ?>
                                            <span class="number counter"><?php echo htmlentities($totalstudents);?></span>
                                            <span class="name">Jumlah Pemohonan</span>
                                            <span class="bg-icon"><i class="fa fa-users"></i></span>
                                        </a>
                                        <!-- /.dashboard-stat -->
                                    </div>
                                    <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->
                                    
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                        <a class="dashboard-stat bg-danger" href="pemohonan-mtnj.php">
                                                <?php 
                                                    $sql ="SELECT IdKelayakan from kelayakan where SekolahKelayakan1='Maahad Tahfiz Negeri Johor, Johor Bahru (Ditempatkan di MJ - Lelaki Sahaja)'";
                                                    $query = $dbh -> prepare($sql);
                                                    $query->execute();
                                                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                                                    $totalmtnj=$query->rowCount();
                                                ?>
                                            <span class="number counter"><?php echo htmlentities($totalmtnj);?></span>
                                            <span class="name">MTNJ</span>
                                            <span class="bg-icon"><i class="fa fa-graduation-cap"></i></span>
                                        </a>
                                        <!-- /.dashboard-stat -->
                                    </div>
                                    <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->

                                    <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->

                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                        <a class="dashboard-stat bg-success" href="pemohonan-smakj.php">
                                                <?php 
                                                    $sql ="SELECT IdKelayakan from kelayakan where SekolahKelayakan1='SMA Kerajaan Johor, Kluang'";
                                                    $query = $dbh -> prepare($sql);
                                                    $query->execute();
                                                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                                                    $totalsmakj=$query->rowCount();
                                                ?>
                                            <span class="number counter"><?php echo htmlentities($totalsmakj);?></span>
                                            <span class="name">SMAKJ</span>
                                            <span class="bg-icon"><i class="fa fa-graduation-cap"></i></span>
                                        </a>
                                        <!-- /.dashboard-stat -->
                                    </div>
                                    <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->

                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.container-fluid -->
                        </section>
                        <!-- /.section -->
                        <section class="section">
                            <div class="container-fluid">
                                <div class="row">
                                    <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->
                                    
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a class="dashboard-stat bg-warning" href="pemohonan-mp.php">
                                                <?php 
                                                    $sql ="SELECT IdKelayakan from kelayakan where SekolahKelayakan1='Maahad Pontian, Pontian'";
                                                    $query = $dbh -> prepare($sql);
                                                    $query->execute();
                                                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                                                    $totalmp=$query->rowCount();
                                                ?>
                                            <span class="number counter"><?php echo htmlentities($totalmp);?></span>
                                            <span class="name">MP</span>
                                            <span class="bg-icon"><i class="fa fa-graduation-cap"></i></span>
                                        </a>
                                        <!-- /.dashboard-stat -->
                                    </div>
                                    <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->

                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a class="dashboard-stat bg-success" href="pemohonan-smapr.php">
                                                <?php 
                                                    $sql ="SELECT IdKelayakan from kelayakan where SekolahKelayakan1='SMA Parit Raja, Batu Pahat'";
                                                    $query = $dbh -> prepare($sql);
                                                    $query->execute();
                                                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                                                    $totalsmapr=$query->rowCount();
                                                ?>
                                            <span class="number counter"><?php echo htmlentities($totalsmapr);?></span>
                                            <span class="name">SMAPR</span>
                                            <span class="bg-icon"><i class="fa fa-graduation-cap"></i></span>
                                        </a>
                                        <!-- /.dashboard-stat -->
                                    </div>
                                    <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->

                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a class="dashboard-stat bg-danger" href="pemohonan-bugisiah.php">
                                                <?php 
                                                    $sql ="SELECT IdKelayakan from kelayakan where SekolahKelayakan1='SMA Bugisiah Tampok, Benut, Pontian'";
                                                    $query = $dbh -> prepare($sql);
                                                    $query->execute();
                                                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                                                    $totalbugisiah=$query->rowCount();
                                                ?>
                                            <span class="number counter"><?php echo htmlentities($totalbugisiah);?></span>
                                            <span class="name">BUGISIAH</span>
                                            <span class="bg-icon"><i class="fa fa-graduation-cap"></i></span>
                                        </a>
                                        <!-- /.dashboard-stat -->
                                    </div>
                                    <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->
                                    
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a class="dashboard-stat bg-primary" href="pemohonan-bugisiah.php">
                                                <?php 
                                                    $sql ="SELECT IdKelayakan from kelayakan where SekolahKelayakan1='Maahad Johor Lil Banat (Ditempatkan di SMAKJ - Perempuan Sahaja)'";
                                                    $query = $dbh -> prepare($sql);
                                                    $query->execute();
                                                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                                                    $totalmjl=$query->rowCount();
                                                ?>
                                            <span class="number counter"><?php echo htmlentities($totalmjl);?></span>
                                            <span class="name">MJ Lilbanat</span>
                                            <span class="bg-icon"><i class="fa fa-graduation-cap"></i></span>
                                        </a>
                                        <!-- /.dashboard-stat -->
                                    </div>

                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.container-fluid -->
                        </section>
                    </div>
                    <!-- /.main-page -->

                    
                </div>
                <!-- /.content-container -->
            </div>
            <!-- /.content-wrapper -->

        </div>
        <!-- /.main-wrapper -->

        <!-- ========== COMMON JS FILES ========== -->
        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <script src="js/jquery-ui/jquery-ui.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>

        <!-- ========== PAGE JS FILES ========== -->
        <script src="js/prism/prism.js"></script>
        <script src="js/waypoint/waypoints.min.js"></script>
        <script src="js/counterUp/jquery.counterup.min.js"></script>
        <script src="js/amcharts/amcharts.js"></script>
        <script src="js/amcharts/serial.js"></script>
        <script src="js/amcharts/plugins/export/export.min.js"></script>
        <link rel="stylesheet" href="js/amcharts/plugins/export/export.css" type="text/css" media="all" />
        <script src="js/amcharts/themes/light.js"></script>
        <script src="js/toastr/toastr.min.js"></script>
        <script src="js/icheck/icheck.min.js"></script>

        <!-- ========== THEME JS ========== -->
        <script src="js/main.js"></script>
        <script src="js/production-chart.js"></script>
        <script src="js/traffic-chart.js"></script>
        <script src="js/task-list.js"></script>
        <script>
            $(function(){

                // Counter for dashboard stats
                $('.counter').counterUp({
                    delay: 10,
                    time: 1000
                });

                // Welcome notification
                toastr.options = {
                  "closeButton": true,
                  "debug": false,
                  "newestOnTop": false,
                  "progressBar": false,
                  "positionClass": "toast-top-right",
                  "preventDuplicates": false,
                  "onclick": null,
                  "showDuration": "300",
                  "hideDuration": "1000",
                  "timeOut": "5000",
                  "extendedTimeOut": "1000",
                  "showEasing": "swing",
                  "hideEasing": "linear",
                  "showMethod": "fadeIn",
                  "hideMethod": "fadeOut"
                }
                toastr["success"]( "Selamat Datang!");

            });
        </script>
    </body>
</html>
<?php } ?>