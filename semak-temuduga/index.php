<?php
session_start();
error_reporting(0);
include('includes/config.php');

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
                <div class="col-md-3">
                </div>
                
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">Semak Kelayakan Temuduga</div>
                        <div class="card-body">
                            <form name="signin" method="post" action="semak-permohonan.php">
                                <div class="form-group row">
                                    <label for="NamaPemohon" class="col-md-5 col-form-label text-md-top">Nama Pemohon</label>
                                    <div class="col-md-7">
                                        <input type="text" id="NamaPemohon" class="form-control" name="NamaPemohon" required autofocus onkeydown="upperCaseF(this)">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="KadPengenalanPemohon" class="col-md-5 col-form-label text-md-right">Kad Pengenalan Pemohon</label>
                                    <div class="col-md-7">
                                        <input type="text" id="KadPengenalanPemohon" class="form-control" name="KadPengenalanPemohon" required onkeypress="return isNumberKey(event)">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <center><button type="submit" class="btn btn-success" name="semak">&nbsp;Semak&nbsp;</button></center>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
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
    <script>
        function isNumberKey(evt) {
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        }
        
    function upperCaseF(a) {
            setTimeout(function(){
                a.value = a.value.toUpperCase();
            }, 1);
        }
    </script>
</html> 