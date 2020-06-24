<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['signin'])) {
    $KadPengenalanPemohon=$_POST['KadPengenalanPemohon'];
    $KataLaluanPemohon=$_POST['KataLaluanPemohon'];
    $sql ="SELECT * FROM pemohon WHERE KadPengenalanPemohon=:KadPengenalanPemohon and KataLaluanPemohon=:KataLaluanPemohon";
    $query= $dbh -> prepare($sql);
    $query-> bindParam(':KadPengenalanPemohon', $KadPengenalanPemohon, PDO::PARAM_STR);
    $query-> bindParam(':KataLaluanPemohon', $KataLaluanPemohon, PDO::PARAM_STR);
    $query-> execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    if($query->rowCount() > 0) {
        foreach ($results as $result) {
            $Status=$result->Status;
            $_SESSION['pid']=$result->IdPemohon;
        } 
        if($Status==1) {
            $_SESSION['pemlogin']=$_POST['KadPengenalanPemohon'];
            echo "<script type='text/javascript'> document.location = 'page-verify-1.php'; </script>";
        } else {
            $_SESSION['pemlogin']=$_POST['KadPengenalanPemohon'];
            echo "<script type='text/javascript'> document.location = 'edit-page-verify-1.php'; </script>";
        }
    } else {
        echo "<script>alert('Maklumat Tiada Didalam Pangkalan Data');</script>";
    }
    
}
?>
<!DOCTYPE html>
<html lang="en">
    <!--- HEADER --->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Sistem Pendaftaran Pelajar</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <style type="text/css">
            body {
                padding-top: 40px;
            }
            fieldset.scheduler-border {
                border: 1px groove #ddd !important;
                padding: 0 1.4em 1.4em 1.4em !important;
                margin: 0 0 1.5em 0 !important;
                -webkit-box-shadow:  0px 0px 0px 0px #000;
                box-shadow:  0px 0px 0px 0px #000;
            }
            legend.scheduler-border {
                width:inherit; /* Or auto */
                padding:0 10px; /* To give a bit of padding on the left and right */
                border-bottom:none;
            }
            .jumbotron{
    background: url("images/banner-esmanj.jpg") no-repeat center center;
    -webkit-background-size: 100% 100%;
    -moz-background-size: 100% 100%;
    -o-background-size: 100% 100%;
    background-size: 100% 100%;
}
        </style>
    </head>
    <!--- HEADER --->
    
    <!--- BODY --->
    <body>
        <!--- CONTAINER --->
        <div class="container">
            <!--- JUMBOTRON --->
            <div class="jumbotron">
            </div>
            <!--- JUMBOTRON --->
            <!--- NAVBAR --->
            <?php //include ('includes/nav-bar.php'); ?>
            <!--- NAVBAR --->
            <!--- ROW 1 --->
            <div class="row">
                <div class="col-md-6">
                    <h2>Makluman</h2>
                    <p>
                        <marquee direction="up" scrollamount="4" onmouseover="this.stop();" onmouseout="this.start();" loop="repeat">
                            <ul>
                                <li>
                                    <p>Keputusan panggilan temuduga boleh disemak pada 5 Disember 2019, Jam 5 Petang.<br/>
                                        Semakan boleh dilakukan secara atas talian dengan melayari laman web <a href="../semak.daftar.sekolahjohor.net/index.php"><font color="#0000FF">semak.daftar.sekolahjohor.net</font></a>. Harap maklum.<br/>
                                    </p>  
                                </li>
                                <li>
                                    <p>
                                        Bagi pengguna yang baru, anda perlu mendaftar terlebih dahulu di <a href="daftar-pengguna.php"><font color="#0000FF">PENGGUNA BARU</font></a>. Pendaftaran pengguna adalah menggunakan ID Pelajar
                                    </p>
                                </li>
                            </ul>
                        </marquee>
                    </p>
                </div>
                
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">Log Masuk</div>
                        <div class="card-body">
                            <form name="signin" method="post">
                                <div class="form-group row">
                                    <label for="KadPengenalanPemohon" class="col-md-5 col-form-label text-md-right">Kad Pengenalan Pelajar</label>
                                    <div class="col-md-7">
                                        <input type="text" id="KadPengenalanPemohon" class="form-control" name="KadPengenalanPemohon" required autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="KataLaluanPemohon" class="col-md-5 col-form-label text-md-right">Kata Laluan</label>
                                    <div class="col-md-7">
                                        <input type="password" id="KataLaluanPemohon" class="form-control" name="KataLaluanPemohon" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <center><button type="submit" class="btn btn-primary" name="signin">Log Masuk</button>&nbsp;&nbsp;&nbsp;
                                    <a href="daftar-pengguna.php" class="btn btn-success">Daftar Pengguna</a>&nbsp;&nbsp;&nbsp;
                                    <a href="lupa-katalaluan.php" class="btn btn-danger">Lupa Kata Laluan</a></center>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <!--- ROW1 --->
            
            <!--- FOOTER --->
            <footer>
                <div class="row">
                    <div class="col-md-6">
                        <p>Hak Cipta Terpelihara &copy; 2019 BPIJAINJ <font color="#d3d3d3" size="-10">
                                        <i>AlifJamain</i><br>
                                    </font></p>
                    </div>
                </div>
            </footer>
        </div>
        <!--- CONTAINER --->
    </body>
</html> 