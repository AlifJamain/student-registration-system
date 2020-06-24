<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['login'])) {
    $NamaPengguna=$_POST['NamaPengguna'];
    $KataLaluanPengguna=$_POST['KataLaluanPengguna'];
    $sql ="SELECT * FROM pengguna WHERE NamaPengguna=:NamaPengguna and KataLaluanPengguna=:KataLaluanPengguna";
    $query= $dbh -> prepare($sql);
    $query-> bindParam(':NamaPengguna', $NamaPengguna, PDO::PARAM_STR);
    $query-> bindParam(':KataLaluanPengguna', $KataLaluanPengguna, PDO::PARAM_STR);
    $query-> execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    if($query->rowCount() > 0) {
        foreach ($results as $result) {
            $Role=$result->Role;
            $_SESSION['pid']=$result->IdPengguna;
        } 
        if($Role=='Maahad Johor - Lelaki Sahaja') {
            $_SESSION['mtnjlogin']=$_POST['NamaPengguna'];
            echo "<script type='text/javascript'> document.location = 'pemohonan-mtnj.php'; </script>";
        } else if ($Role=='SMA Kerajaan Johor, Kluang'){
            $_SESSION['smakjlogin']=$_POST['NamaPengguna'];
            echo "<script type='text/javascript'> document.location = 'pemohonan-smakj.php'; </script>";
        } else if ($Role=='SMA Kerajaan Johor, Kluang'){
            $_SESSION['smakjlogin']=$_POST['NamaPengguna'];
            echo "<script type='text/javascript'> document.location = 'pemohonan-mjlilbanat.php'; </script>";
        } else if ($Role=='Maahad Pontian, Pontian'){
            $_SESSION['mplogin']=$_POST['NamaPengguna'];
            echo "<script type='text/javascript'> document.location = 'pemohonan-mp.php'; </script>";
        } else if ($Role=='SMA Parit Raja, Batu Pahat'){
            $_SESSION['smaprlogin']=$_POST['NamaPengguna'];
            echo "<script type='text/javascript'> document.location = 'pemohonan-smapr.php'; </script>";
        } else if ($Role=='SMA Bugisiah Tampok, Benut, Pontian') {
            $_SESSION['bugisiahlogin']=$_POST['NamaPengguna'];
            echo "<script type='text/javascript'> document.location = 'pemohonan-bugisiah.php'; </script>";
        }
    } else {
        echo "<script>alert('Maklumat Tiada Didalam Pangkalan Data');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sistem Pendaftaran Pelajar</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/prism/prism.css" media="screen" > <!-- USED FOR DEMO HELP - YOU CAN REMOVE IT -->
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <script src="js/modernizr/modernizr.min.js"></script>
    </head>
    
    <body>
        <div class="row">
            <div class="col-md-12">
                &nbsp;
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-6">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title text-center">
                            <h4>Log Masuk Admin</h4>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="post">
                            <div class="form-group">
                                <label for="NamaPengguna" class="col-sm-3 control-label">Nama Pengguna</label>
                                <div class="col-sm-9">
                                    <select name="NamaPengguna" class="form-control">
                                        <option value="Maahad Johor - Lelaki Sahaja">MTNJ</option>
                                        <option value="SMA Kerajaan Johor, Kluang">MJ Lilbanat / SMAKJ</option>
                                        <option value="Maahad Pontian, Pontian">MP</option>
                                        <option value="SMA Parit Raja, Batu Pahat">PR</option>
                                        <option value="SMA Bugisiah Tampok, Benut, Pontian">SMABG</option>
                                    </select>
                                    <!---<input type="text" name="NamaPengguna" class="form-control" placeholder="Nama Pengguna">--->
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="KataLaluanPengguna" class="col-sm-3 control-label">Kata Laluan</label>
                                <div class="col-sm-9">
                                    <input type="password" name="KataLaluanPengguna" class="form-control" placeholder="Kata Laluan">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button type="submit" name="login" class="btn btn-success btn-labeled pull-right">Log Masuk<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <p class="text-muted text-center"><small>Copyright © BPIJAINJ</small></p>
            </div>
            <div class="col-md-3">
            </div>
        </div>

        <!-- ========== COMMON JS FILES ========== -->
        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <script src="js/jquery-ui/jquery-ui.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>

        <!-- ========== PAGE JS FILES ========== -->

        <!-- ========== THEME JS ========== -->
        <script src="js/main.js"></script>
        <script>
            $(function(){

            });
        </script>

        <!-- ========== ADD custom.js FILE BELOW WITH YOUR CHANGES ========== -->
    </body>
</html>
