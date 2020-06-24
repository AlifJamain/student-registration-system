<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>
<!DOCTYPE html>
<html lang="en">
    <!--- HEADER --->
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
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
                        <div class="card-header">Semak Kelayakan Pemohonan</div>
                        <div class="card-body">
                            <?php
// code Student Data
$NamaPemohon=$_POST['NamaPemohon'];
$KadPengenalanPemohon=$_POST['KadPengenalanPemohon'];
$_SESSION['NamaPemohon']=$NamaPemohon;
$_SESSION['KadPengenalanPemohon']=$KadPengenalanPemohon;
$qery = "SELECT   pemohon.NamaPemohon,pemohon.KadPengenalanPemohon,pemohon.IdPemohon,pemohon.Status from pemohon where pemohon.NamaPemohon=:NamaPemohon and pemohon.KadPengenalanPemohon=:KadPengenalanPemohon";
$stmt = $dbh->prepare($qery);
$stmt->bindParam(':NamaPemohon',$NamaPemohon,PDO::PARAM_STR);
$stmt->bindParam(':KadPengenalanPemohon',$KadPengenalanPemohon,PDO::PARAM_STR);
$stmt->execute();
$resultss=$stmt->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($stmt->rowCount() > 0)
{
foreach($resultss as $row)
{   ?>
<p><b>Nama Pemohon :</b> <?php echo htmlentities($row->NamaPemohon);?></p>
<p><b>Kad Pengenalan Pemohon :</b> <?php echo htmlentities($row->KadPengenalanPemohon);?>
<?php }

    ?>
    <table class="table">
                                                <thead>
                                                        <tr>
                                                            <th><center>Status Permohonan</center></th>    
                                                        </tr>
                                               </thead>
  


                                                	
                                                	<tbody>
<?php                                              
// Code for result

 $query ="select pemohon.NamaPemohon, pemohon.KadPengenalanPemohon, pemohon.Status, kelayakan.* from pemohon join kelayakan on pemohon.IdPemohon=kelayakan.pemid where (pemohon.NamaPemohon=:NamaPemohon and pemohon.KadPengenalanPemohon=:KadPengenalanPemohon)";
$query= $dbh -> prepare($query);
$query->bindParam(':NamaPemohon',$NamaPemohon,PDO::PARAM_STR);
$query->bindParam(':KadPengenalanPemohon',$KadPengenalanPemohon,PDO::PARAM_STR);
$query-> execute();  
$results = $query -> fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($countrow=$query->rowCount()>0)
{ 

foreach($results as $result){

    ?><tr>
                                                        <td>
                                                            <?php $stats=$result->Status;
                                                                  if($stats==0){
                                                            ?>
                                                            <center><p><b><span style="color: green">Berjaya</span></b></p></center>
                                                            <center><a href="print-result.php" class="btn btn-primary">Cetak</a></center>
                                                            <?php } 
                                                                  if($stats==2)  { ?>
                                                            <center><p><b><span style="color: red">Tidak Berjaya</span></b></p></center>
                                                            <?php } 
                                                                  if($stats==1)  { ?>
                                                            <center><p><b><span style="color: blue">Permohonan sedang diproses</span></b></p></center>
                                                            <?php } ?>
                                                        </td>
                                                            <?php $cnt++; }} ?>
                                                        </tr>



                                                	</tbody>
                                                </table>
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
                        <p>Hak Cipta Terpelihara &copy; 2019 BPIJAINJ</p>
                    </div>
                </div>
            </footer>
        </div>
        <!--- CONTAINER --->
    </body>
</html> 
<?php } ?>