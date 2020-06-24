<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['pemlogin'])==0) {   
    header('location:index.php');
} else {
    if(isset($_POST['edit'])) {
        $pemid=$_SESSION['pid'];
        $TahunKoko1=$_POST['TahunKoko1'];
        $SekolahKoko1=$_POST['SekolahKoko1'];
        $KelabPersatuanKoko1=$_POST['KelabPersatuanKoko1'];
        $JawatanKoko1=$_POST['JawatanKoko1'];       
        
        $TahunKoko2=$_POST['TahunKoko2'];
        $SekolahKoko2=$_POST['SekolahKoko2'];
        $KelabPersatuanKoko2=$_POST['KelabPersatuanKoko2'];
        $JawatanKoko2=$_POST['JawatanKoko2'];  
        
        $TahunKoko3=$_POST['TahunKoko3'];
        $SekolahKoko3=$_POST['SekolahKoko3'];
        $KelabPersatuanKoko3=$_POST['KelabPersatuanKoko3'];
        $JawatanKoko3=$_POST['JawatanKoko3'];   
        
        $TahunKoko6=$_POST['TahunKoko6'];
        $AcaraKoko1=$_POST['AcaraKoko1'];
        $PencapaianKoko1=$_POST['PencapaianKoko1'];
        
        $TahunKoko7=$_POST['TahunKoko7'];
        $AcaraKoko2=$_POST['AcaraKoko2'];  
        $PencapaianKoko2=$_POST['PencapaianKoko2'];
        
        $TahunKoko8=$_POST['TahunKoko8'];
        $AcaraKoko3=$_POST['AcaraKoko3'];
        $PencapaianKoko3=$_POST['PencapaianKoko3']; 
        
    
        $sql = "UPDATE daftar_koko SET TahunKoko1=:TahunKoko1, SekolahKoko1=:SekolahKoko1, KelabPersatuanKoko1=:KelabPersatuanKoko1, JawatanKoko1=:JawatanKoko1, TahunKoko2=:TahunKoko2, SekolahKoko2=:SekolahKoko2, KelabPersatuanKoko2=:KelabPersatuanKoko2, JawatanKoko2=:JawatanKoko2, TahunKoko3=:TahunKoko3, SekolahKoko3=:SekolahKoko3, KelabPersatuanKoko3=:KelabPersatuanKoko3, JawatanKoko3=:JawatanKoko3, TahunKoko6=:TahunKoko6, AcaraKoko1=:AcaraKoko1, PencapaianKoko1=:PencapaianKoko1, TahunKoko7=:TahunKoko7, AcaraKoko2=:AcaraKoko2, PencapaianKoko2=:PencapaianKoko2, TahunKoko8=:TahunKoko8, AcaraKoko3=:AcaraKoko3, PencapaianKoko3=:PencapaianKoko3 where pemid=:pemid";
        
        $query = $dbh->prepare($sql);
        $query->bindParam(':TahunKoko1',$TahunKoko1,PDO::PARAM_STR);
        $query->bindParam(':SekolahKoko1',$SekolahKoko1,PDO::PARAM_STR);
        $query->bindParam(':KelabPersatuanKoko1',$KelabPersatuanKoko1,PDO::PARAM_STR);
        $query->bindParam(':JawatanKoko1',$JawatanKoko1,PDO::PARAM_STR);
        
        $query->bindParam(':TahunKoko2',$TahunKoko2,PDO::PARAM_STR);
        $query->bindParam(':SekolahKoko2',$SekolahKoko2,PDO::PARAM_STR);
        $query->bindParam(':KelabPersatuanKoko2',$KelabPersatuanKoko2,PDO::PARAM_STR);
        $query->bindParam(':JawatanKoko2',$JawatanKoko2,PDO::PARAM_STR);
        
        $query->bindParam(':TahunKoko3',$TahunKoko3,PDO::PARAM_STR);
        $query->bindParam(':SekolahKoko3',$SekolahKoko3,PDO::PARAM_STR);
        $query->bindParam(':KelabPersatuanKoko3',$KelabPersatuanKoko3,PDO::PARAM_STR);
        $query->bindParam(':JawatanKoko3',$JawatanKoko3,PDO::PARAM_STR);
        
        $query->bindParam(':TahunKoko6',$TahunKoko6,PDO::PARAM_STR);
        $query->bindParam(':AcaraKoko1',$AcaraKoko1,PDO::PARAM_STR);
        $query->bindParam(':PencapaianKoko1',$PencapaianKoko1,PDO::PARAM_STR);
        
        $query->bindParam(':TahunKoko7',$TahunKoko7,PDO::PARAM_STR);
        $query->bindParam(':AcaraKoko2',$AcaraKoko2,PDO::PARAM_STR);
        $query->bindParam(':PencapaianKoko2',$PencapaianKoko2,PDO::PARAM_STR);
        
        $query->bindParam(':TahunKoko8',$TahunKoko8,PDO::PARAM_STR);
        $query->bindParam(':AcaraKoko3',$AcaraKoko3,PDO::PARAM_STR);
        $query->bindParam(':PencapaianKoko3',$PencapaianKoko3,PDO::PARAM_STR);
        
        $query->bindParam(':pemid',$pemid,PDO::PARAM_STR);
        $query->execute();
        echo "<script>alert('Maklumat Telah Berjaya Di Simpan.');</script>";
        echo "<script type='text/javascript'> document.location = 'edit-page-verify-4.php'; </script>";
    }
?>
<!DOCTYPE html>
<html lang="en">
    <!--- HEADER --->
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Sistem Pendaftaran Pelajar</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
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
        <script language="javascript">
            function CheckForm() {
                var nokp=document.getElementById('KadPengenalanPemohon').value;
                var password=document.getElementById('KataLaluanPemohon').value;
                var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
                
                if (document.getElementById('NamaPemohon').value=="") {
                    alert("Sila masukkan Nama Pengguna!");
                    document.getElementById("NamaPemohon").focus();
                    return false;
                } else if (document.getElementById('KadPengenalanPemohon').value=="") {
                    alert("Sila masukkan no mykad!");
                    document.getElementById("KadPengenalanPemohon").focus();
                    return false;
                } else if (isNaN(nokp)==true) {
                    alert('No. MyKad tidak dibenarkan!');
                    document.getElementById("KadPengenalanPemohon").focus();
                    return false;
                } else if (nokp.length!=12) {
                    alert('No. MyKad tidak dibenarkan!');
                    document.getElementById("KadPengenalanPemohon").focus();
                    return false;
                } else if (document.getElementById('KataLaluanPemohon').value=="") {
                    alert("Sila masukkan Katalaluan!");
                    document.getElementById("KataLaluanPemohon").focus();
                    return false;
                } else if (document.getElementById('SahkanKataLaluanPemohon').value=="") {
                    alert("Sila masukkan Sahkan Katalaluan!");
                    document.getElementById("SahkanKataLaluanPemohon").focus();
                    return false;
                } else if (password.length>12) {
                    alert('Katalaluan melebihi dari 12 aksara!');
                    document.getElementById("SahkanKataLaluanPemohon").focus();
                    return false;
                } else if (document.getElementById('KataLaluanPemohon').value != document.getElementById('SahkanKataLaluanPemohon').value) {
                    alert("Sila sahkan semula katalaluan anda!");
                    document.getElementById("SahkanKataLaluanPemohon").value==" ";
                    document.getElementById("SahkanKataLaluanPemohon").focus();
                    return false;
                } else {
                    return true;
                }
            }
        </script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script>
            $(function() {
                $( "#dialog" ).dialog( {
                    modal: true,
                    buttons: {
                        Ok: function() {
                            $( this ).dialog( "close" );
                        }
                    }
                });
            });
        </script>
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
            <?php include ('includes/navbar.php'); ?>
            <!--- NAVBAR --->
            <!--- ROW 1 --->
            <div class="row">
                <div class="col-md-3">
                    <?php include ('includes/side-menu.php'); ?>
                </div>
                
                <div class="col-md-9">
                                        <?php if($msg){?>
<div class="alert alert-success left-icon-alert" role="alert">
 <strong>Tahniah! </strong><?php echo htmlentities($msg); ?>
 </div><?php } 
else if($error){?>
    <div class="alert alert-danger left-icon-alert" role="alert">
                                            <strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
                                        </div>
                                        <?php } ?>
                    <table width="100%">
                        <tbody>
                            <form method="post" onsubmit="return CheckForm();">
                                                                <?php 
$pemid=$_SESSION['pid'];
$sql = "SELECT * from daftar_koko where pemid=:pemid";
$query = $dbh -> prepare($sql);
$query -> bindParam(':pemid',$pemid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>
                                <tr>
                                    <td>
                                        &nbsp;
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <fieldset class="scheduler-border">
                                            <legend class="scheduler-border">
                                                <h3><strong>&nbsp;&nbsp;Butiran Kegiatan Dan Tanggungjawab Di Sekolah &nbsp;&nbsp;</strong></h3>
                                            </legend>
                                          <table width="100%">
                                            <tbody>
                                                <tr>
                                                    <td width="5%">
                                                        &nbsp;
                                                    </td>
                                                    <td colspan="5">
                                                        <table width="100%" border="1">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="5%">
                                                                        <center>Tahun</center>
                                                                    </td>
                                                                    <td colspan="2">
                                                                        <center>Sekolah Kebangsaan/<br>Sekolah Agama</center>
                                                                    </td>
                                                                    <td colspan="2">
                                                                        <center>Kelab/Persatuan</center>
                                                                    </td>
                                                                    <td colspan="2">
                                                                        <center>Jawatan</center>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="5%">
                                                                        <select name="TahunKoko1" id="Pendapatan" class="form-control">
                                                                            <option value="<?php echo htmlentities($result->TahunKoko1);?>"><?php echo htmlentities($result->TahunKoko1);?></option>
                                                                            <option value="2019">2019</option>
                                                                            <option value="2018">2018</option>
                                                                            <option value="2017">2017</option>
                                                                            <option value="2016">2016</option>
                                                                            <option value="2015">2015</option>
                                                                        </select>
                                                                    </td>
                                                                    <td colspan="2">
                                                                        <input onkeydown="upperCaseF(this)" name="SekolahKoko1" type="text" class="form-control" placeholder="Sekolah" value="<?php echo htmlentities($result->SekolahKoko1);?>"/>
                                                                    </td>
                                                                    <td colspan="2">
                                                                        <input onkeydown="upperCaseF(this)" name="KelabPersatuanKoko1" type="text" class="form-control" placeholder="Kelab / Persatuan" value="<?php echo htmlentities($result->KelabPersatuanKoko1);?>"/>
                                                                    </td>
                                                                    <td colspan="2">
                                                                        <input onkeydown="upperCaseF(this)" name="JawatanKoko1" type="text" class="form-control" placeholder="Jawatan" value="<?php echo htmlentities($result->JawatanKoko1);?>"/> 
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="5%">
                                                                        <select name="TahunKoko2" id="Pendapatan" class="form-control">
                                                                            <option value="<?php echo htmlentities($result->TahunKoko2);?>"><?php echo htmlentities($result->TahunKoko2);?></option>
                                                                            <option value="2019">2019</option>
                                                                            <option value="2018">2018</option>
                                                                            <option value="2017">2017</option>
                                                                            <option value="2016">2016</option>
                                                                            <option value="2015">2015</option>
                                                                        </select>                                                                    </td>
                                                                    <td colspan="2">
                                                                        <input onkeydown="upperCaseF(this)" name="SekolahKoko2" type="text" class="form-control" placeholder="Sekolah" value="<?php echo htmlentities($result->SekolahKoko2);?>"/>
                                                                    </td>
                                                                    <td colspan="2">
                                                                        <input onkeydown="upperCaseF(this)" name="KelabPersatuanKoko2" type="text" class="form-control" placeholder="Kelab / Persatuan" value="<?php echo htmlentities($result->KelabPersatuanKoko2);?>"/>
                                                                    </td>
                                                                    <td colspan="2">
                                                                        <input onkeydown="upperCaseF(this)" name="JawatanKoko2" type="text" class="form-control" placeholder="Jawatan" value="<?php echo htmlentities($result->JawatanKoko2);?>"/> 
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="5%">
                                                                        <select name="TahunKoko3" id="Pendapatan" class="form-control">
                                                                            <option value="<?php echo htmlentities($result->TahunKoko3);?>"><?php echo htmlentities($result->TahunKoko3);?></option>
                                                                            <option value="2019">2019</option>
                                                                            <option value="2018">2018</option>
                                                                            <option value="2017">2017</option>
                                                                            <option value="2016">2016</option>
                                                                            <option value="2015">2015</option>
                                                                        </select>                                                                    </td>
                                                                    <td colspan="2">
                                                                        <input onkeydown="upperCaseF(this)" name="SekolahKoko3" type="text" class="form-control" placeholder="Sekolah" value="<?php echo htmlentities($result->SekolahKoko3);?>"/>
                                                                    </td>
                                                                    <td colspan="2">
                                                                        <input onkeydown="upperCaseF(this)" name="KelabPersatuanKoko3" type="text" class="form-control" placeholder="Kelab / Persatuan" value="<?php echo htmlentities($result->KelabPersatuanKoko3);?>"/>
                                                                    </td>
                                                                    <td colspan="2">
                                                                        <input onkeydown="upperCaseF(this)" name="JawatanKoko3" type="text" class="form-control" placeholder="Jawatan" value="<?php echo htmlentities($result->JawatanKoko3);?>"/> 
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="5%">
                                                                        &nbsp;
                                                                    </td>
                                                                    <td width="5%">
                                                                        &nbsp;
                                                                    </td>
                                                                    <td width="5%">
                                                                        &nbsp;
                                                                    </td>
                                                                    <td width="5%">
                                                                        &nbsp;
                                                                    </td>
                                                                    <td width="5%">
                                                                        &nbsp;
                                                                    </td>
                                                                    <td width="5%">
                                                                        &nbsp; 
                                                                    </td>
                                                                    <td width="5%">
                                                                        &nbsp; 
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                    <td width="5%">
                                                        &nbsp; 
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="5%">
                                                        &nbsp;
                                                    </td>
                                                    <td width="5%">
                                                        &nbsp;
                                                    </td>
                                                    <td width="5%">
                                                        &nbsp;
                                                    </td>
                                                    <td width="5%">
                                                        &nbsp;
                                                    </td>
                                                    <td width="5%">
                                                        &nbsp;
                                                    </td>
                                                    <td width="5%">
                                                        &nbsp; 
                                                    </td>
                                                    <td width="5%">
                                                        &nbsp; 
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        </fieldset>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <fieldset class="scheduler-border">
                                            <legend class="scheduler-border">
                                                <h3><strong>&nbsp;&nbsp;Pencapaian Tertinggi Kokurikulum&nbsp;&nbsp;</strong></h3>
                                            </legend>
                                          <table width="100%">
                                            <tbody>
                                                <tr>
                                                    <td width="5%">
                                                        &nbsp;
                                                    </td>
                                                    <td colspan="5">
                                                        <table width="100%" border="1">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="5%">
                                                                        <center>Tahun</center>
                                                                    </td>
                                                                    <td colspan="2">
                                                                        <center>Nama Acara</center>
                                                                    </td>
                                                                    <td colspan="4">
                                                                        <center>Pencapaian</center>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="5%">
                                                                        <select name="TahunKoko6" id="Pendapatan" class="form-control">
                                                                            <option value="<?php echo htmlentities($result->TahunKoko6);?>"><?php echo htmlentities($result->TahunKoko6);?></option>
                                                                            <option value="2019">2019</option>
                                                                            <option value="2018">2018</option>
                                                                            <option value="2017">2017</option>
                                                                            <option value="2016">2016</option>
                                                                            <option value="2015">2015</option>
                                                                        </select>                                                                    </td>
                                                                    <td colspan="2">
                                                                        <input onkeydown="upperCaseF(this)" name="AcaraKoko1" type="text" class="form-control" value="<?php echo htmlentities($result->AcaraKoko1);?>"/>
                                                                    </td>
                                                                    <td colspan="4">
                                                                        <input onkeydown="upperCaseF(this)" name="PencapaianKoko1" type="text" class="form-control" value="<?php echo htmlentities($result->PencapaianKoko1);?>"/>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="5%">
                                                                        <select name="TahunKoko7" id="Pendapatan" class="form-control">
                                                                            <option value="<?php echo htmlentities($result->TahunKoko7);?>"><?php echo htmlentities($result->TahunKoko7);?></option>
                                                                            <option value="2019">2019</option>
                                                                            <option value="2018">2018</option>
                                                                            <option value="2017">2017</option>
                                                                            <option value="2016">2016</option>
                                                                            <option value="2015">2015</option>
                                                                        </select>                                                                    </td>
                                                                    <td colspan="2">
                                                                        <input onkeydown="upperCaseF(this)" name="AcaraKoko2" type="text" class="form-control" value="<?php echo htmlentities($result->AcaraKoko2);?>"/>
                                                                    </td>
                                                                    <td colspan="4">
                                                                        <input onkeydown="upperCaseF(this)" name="PencapaianKoko2" type="text" class="form-control" value="<?php echo htmlentities($result->PencapaianKoko2);?>"/>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="5%">
                                                                        <select name="TahunKoko8" id="Pendapatan" class="form-control">
                                                                            <option value="<?php echo htmlentities($result->TahunKoko8);?>"><?php echo htmlentities($result->TahunKoko8);?></option>
                                                                            <option value="2019">2019</option>
                                                                            <option value="2018">2018</option>
                                                                            <option value="2017">2017</option>
                                                                            <option value="2016">2016</option>
                                                                            <option value="2015">2015</option>
                                                                        </select>                                                                    </td>
                                                                    <td colspan="2">
                                                                        <input onkeydown="upperCaseF(this)" name="AcaraKoko3" type="text" class="form-control" value="<?php echo htmlentities($result->AcaraKoko3);?>"/>
                                                                    </td>
                                                                    <td colspan="4">
                                                                        <input onkeydown="upperCaseF(this)" name="PencapaianKoko3" type="text" class="form-control" value="<?php echo htmlentities($result->PencapaianKoko3);?>"/>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="5%">
                                                                        &nbsp;
                                                                    </td>
                                                                    <td width="5%">
                                                                        &nbsp;
                                                                    </td>
                                                                    <td width="5%">
                                                                        &nbsp;
                                                                    </td>
                                                                    <td width="5%">
                                                                        &nbsp;
                                                                    </td>
                                                                    <td width="5%">
                                                                        &nbsp;
                                                                    </td>
                                                                    <td width="5%">
                                                                        &nbsp; 
                                                                    </td>
                                                                    <td width="5%">
                                                                        &nbsp; 
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                    <td width="5%">
                                                        &nbsp; 
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="5%">
                                                        &nbsp;
                                                    </td>
                                                    <td width="5%">
                                                        &nbsp;
                                                    </td>
                                                    <td width="5%">
                                                        &nbsp;
                                                    </td>
                                                    <td width="5%">
                                                        &nbsp;
                                                    </td>
                                                    <td width="5%">
                                                        &nbsp;
                                                    </td>
                                                    <td width="5%">
                                                        &nbsp; 
                                                    </td>
                                                    <td width="5%">
                                                        &nbsp; 
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        </fieldset>
                                    </td>
                                </tr>
                                <tr align="center">
                                    <td colspan="7">
                                        <button type="submit" class="btn btn-primary" name="edit">Simpan</button>
                                        <!---<input value="Seterusnya" type="button" onclick="window.location='keputusan-upsr.php'">--->
                                        <input class="btn btn-danger" type="reset" value="Isi semula">
                                    </td>
                                </tr>
                                <?php }} ?>
                            </form>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-1">
                    
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
        
        function checkpassword() {
            var idtextbox = '#KataLaluanPemohon';
            var uppercase = new RegExp('[A-Z]');
            var lowercase = new RegExp('[a-z]');
            var numbers = new RegExp('[0-9]');
            var symbols = new RegExp('[^A-Za-z0-9]');
            if($(idtextbox).val().match(uppercase) && $(idtextbox).val().match(lowercase) && $(idtextbox).val().match(numbers) && !$(idtextbox).val().match(symbols) && $(idtextbox).val().length >= 8 && $(idtextbox).val().length <= 12) {
                return true;
            } else {
                alert("Katalaluan tidak mengikut syarat yang ditetapkan.");
                $("#KataLaluanPemohon").val('');
            }
        }
        
        function random_function()
            {
                var a=document.getElementById("input").value;
                if(a==="6A")
                {
                    var arr=["MTJ","SMAKJ"];
                }
                else if(a==="5A1B")
                {
                    var arr=["MTJ","SMAKJ"];
                }
                else if(a==="5A1C")
                {
                    var arr=["MTJ","SMAKJ"];
                }
                else if(a==="5A1D")
                {
                    var arr=["aaa","aaa"];
                }
                var string="";
               
                for(i=0;i<arr.length;i++)
                {
                    string=string+"<option>"+arr[i]+"</option>";
                }
                string="<select name='any_name'>"+string+"</select>";
                document.getElementById("output").innerHTML=string;
            }
    </script>
</html>
<?php } ?>                            