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
        </style>
        <style type="text/css">
    @media print {
  #printPageButton {
    display: none;
  }
}
</style>
    </head>
    <!--- HEADER --->
    
    <!--- BODY --->
    <body>
        <!--- CONTAINER --->
        <div class="container">
            <!--- JUMBOTRON --->
            <!--- JUMBOTRON --->
            <!--- NAVBAR --->
            <?php //include ('includes/nav-bar.php'); ?>
            <!--- NAVBAR --->
            <!--- ROW 1 --->
            <div class="row">
                
                <div class="col-md-12">
                            <?php
// code Student Data
    $NamaPemohon=$_SESSION['NamaPemohon'];
$KadPengenalanPemohon=$_SESSION['KadPengenalanPemohon'];

$qery = "SELECT   pemohon.NamaPemohon,pemohon.KadPengenalanPemohon,pemohon.IdPemohon,pemohon.Status, kelayakan.* from pemohon join kelayakan on pemohon.IdPemohon=kelayakan.pemid where pemohon.NamaPemohon=:NamaPemohon and pemohon.KadPengenalanPemohon=:KadPengenalanPemohon";
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
                    <center><p><b><?php echo htmlentities($row->NamaPemohon);?></b><br>
                        <b><?php echo htmlentities($row->KadPengenalanPemohon);?></b></p></center>
                    
    <table class="table table-bordered">
              <thead>
                                                        <tr>
                                                            <td><center>Pusat Temuduga</center></td>
                                                            <td><center><?php echo htmlentities($row->TemudugaKelayakan);?></center></td>
                                                        </tr>
                                               </thead>
        <tbody>
        <tr>
                                                        <td>
                                                            <center>Tarikh</center>
                                                            
            </td>
            <td>
                                                            <center><?php echo htmlentities($row->TarikhTemuduga);?></center>
                                                            
            </td>
            </tr>
            <tr>
                                                        <td>
                                                            <center>Hari</center>
                                                            
            </td>
            <td>
                                                            <center><?php echo htmlentities($row->HariTemuduga);?></center>
                                                            
            </td>
                
            </tr>
            <tr>
                                                        <td>
                                                            <center>Masa</center>
                                                            
            </td>
            <td>
                                                            <center>08.00 Pagi - 01.00 Petang</center>
                                                            
            </td>
                
            </tr>
            
        </tbody>
    </table>
                            <p><b>*Sila bawa ...........</b></p>
                            <p><b>*Sila bawa ...........</b></p>
<?php }

    ?>
                    <center><button id="printPageButton" onClick="window.print();" class="btn btn-primary">Print</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-danger" href="index.php" id="printPageButton">Kembali</a></center>
                </div>
            </div>
            <!--- ROW1 --->
            
            <!--- FOOTER --->
        </div>
        <!--- CONTAINER --->
    </body>
</html> 
<?php } ?>