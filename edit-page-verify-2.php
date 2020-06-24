<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['pemlogin'])==0) {   
    header('location:index.php');
} else {
    if(isset($_POST['edit'])) {
        $pemid=$_SESSION['pid'];
        
        $finalTahun=$_POST['finalTahun'];
        $finalBacaan=$_POST['finalBacaan'];
        $finalHafazan=$_POST['finalHafazan'];  
        $finalTauhid=$_POST['finalTauhid'];
        $finalIbadat=$_POST['finalIbadat'];
        $finalAkhlak=$_POST['finalAkhlak'];
        $finalSirah=$_POST['finalSirah'];  
        $finalArab=$_POST['finalArab'];
        $finalTajwid=$_POST['finalTajwid'];
        $finalTafsir=$_POST['finalTafsir'];
        $finalMuamalat=$_POST['finalMuamalat'];
        $output=$_POST['output'];  
        $upkkTahun=$_POST['upkkTahun'];
        $upkkAngka=$_POST['upkkAngka'];
        $upkkAmaliSolat=$_POST['upkkAmaliSolat'];
        $upkkCaraHidup=$_POST['upkkCaraHidup'];  
        $upkkQuran=$_POST['upkkQuran'];
        $upkkSirah=$_POST['upkkSirah'];
        $upkkAkhlak=$_POST['upkkAkhlak'];
        $upkkSyariah=$_POST['upkkSyariah'];  
        $upkkJawi=$_POST['upkkJawi'];
        $upkkLughatul=$_POST['upkkLughatul'];
        $Status=0;
        
        
        $sql = "UPDATE daftar_pemohon SET finalTahun=:finalTahun, finalBacaan=:finalBacaan, finalHafazan=:finalHafazan, finalTauhid=:finalTauhid, finalIbadat=:finalIbadat, finalAkhlak=:finalAkhlak, finalSirah=:finalSirah, finalArab=:finalArab, finalTajwid=:finalTajwid, finalTafsir=:finalTafsir, finalMuamalat=:finalMuamalat, output=:output, upkkTahun=:upkkTahun, upkkAngka=:upkkAngka, upkkAmaliSolat=:upkkAmaliSolat, upkkCaraHidup=:upkkCaraHidup, upkkQuran=:upkkQuran, upkkSirah=:upkkSirah, upkkAkhlak=:upkkAkhlak, upkkSyariah=:upkkSyariah, upkkJawi=:upkkJawi, upkkLughatul=:upkkLughatul where pemid=:pemid";
        $sql2="UPDATE pemohon SET Status=:Status WHERE IdPemohon=:pemid";
        
        $query = $dbh->prepare($sql);
        $query2 = $dbh->prepare($sql2);
        $query->bindParam(':finalTahun',$finalTahun,PDO::PARAM_STR);
        $query->bindParam(':finalBacaan',$finalBacaan,PDO::PARAM_STR);
        $query->bindParam(':finalHafazan',$finalHafazan,PDO::PARAM_STR);
        $query->bindParam(':finalTauhid',$finalTauhid,PDO::PARAM_STR);
        $query->bindParam(':finalIbadat',$finalIbadat,PDO::PARAM_STR);
        $query->bindParam(':finalAkhlak',$finalAkhlak,PDO::PARAM_STR);
        $query->bindParam(':finalSirah',$finalSirah,PDO::PARAM_STR);
        $query->bindParam(':finalArab',$finalArab,PDO::PARAM_STR);
        $query->bindParam(':finalTajwid',$finalTajwid,PDO::PARAM_STR);
        $query->bindParam(':finalTafsir',$finalTafsir,PDO::PARAM_STR);
        $query->bindParam(':finalMuamalat',$finalMuamalat,PDO::PARAM_STR);
        $query->bindParam(':output',$output,PDO::PARAM_STR);
        $query->bindParam(':upkkTahun',$upkkTahun,PDO::PARAM_STR);
        $query->bindParam(':upkkAngka',$upkkAngka,PDO::PARAM_STR);
        $query->bindParam(':upkkAmaliSolat',$upkkAmaliSolat,PDO::PARAM_STR);
        $query->bindParam(':upkkCaraHidup',$upkkCaraHidup,PDO::PARAM_STR);
        $query->bindParam(':upkkQuran',$upkkQuran,PDO::PARAM_STR);
        $query->bindParam(':upkkSirah',$upkkSirah,PDO::PARAM_STR);
        $query->bindParam(':upkkAkhlak',$upkkAkhlak,PDO::PARAM_STR);
        $query->bindParam(':upkkSyariah',$upkkSyariah,PDO::PARAM_STR);
        $query->bindParam(':upkkJawi',$upkkJawi,PDO::PARAM_STR);
        $query->bindParam(':upkkLughatul',$upkkLughatul,PDO::PARAM_STR);
        $query->bindParam(':pemid',$pemid,PDO::PARAM_STR);
        $query2->bindParam(':Status',$Status,PDO::PARAM_STR);
        $query2->bindParam(':pemid',$pemid,PDO::PARAM_STR);
        $query->execute();
        $query2->execute();
        echo "<script>alert('Maklumat Telah Berjaya Di Simpan.');</script>";
        echo "<script type='text/javascript'> document.location = 'edit-page-verify-3.php'; </script>";
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
$sql = "SELECT * from daftar_pemohon where pemid=:pemid";
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
                                                <h3><strong>&nbsp;&nbsp;Butiran Kelayakan Akademik &nbsp;&nbsp;</strong></h3>
                                            </legend>
                                             <table width="100%">
                                            <tbody>
                                                <tr>
                                                    <td width="5%">
                                                        &nbsp;
                                                    </td>
                                                    <td colspan="5">
                                                        <center>Keputusan Akhir Tahun Darjah 5 Sekolah Agama Kerajaan Johor</center> 
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
                                                    <td colspan="3">
                                                        <center>Tahun:
                                                            <select name="finalTahun">
                                                                <option value="<?php echo htmlentities($result->finalTahun);?>"><?php echo htmlentities($result->finalTahun);?></option>
                                                                <option value="2019">2019</option>
                                                            </select>
                                                        </center>
                                                    </td>
                                                    <td width="5%">
                                                        &nbsp; 
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
                                                    <td colspan="3">
                                                          <table width="100%" border="1">
                                                              <tbody>
                                                                  <tr>
                                                                      <td width="70%" bgcolor="#999999">
                                                                          <center>Matapelajaran</center>
                                                                      </td>
                                                                      <td width="30%" bgcolor="#999999">
                                                                          <center>Peratus (%)</center>
                                                                      </td>
                                                                  </tr>
                                                                  <tr>
                                                                      <td width="70%">Al Quran - Bacaan</td>
                                                                      <td width="30%">
                                                                          <center><input onchange="calculate()" id="finalBacaan" name="finalBacaan" type="text" size="1" onkeypress="return isNumberKey(event)" value="<?php echo htmlentities($result->finalBacaan);?>" ></center>
                                                                      </td>
                                                                  </tr>
                                                                  <tr>
                                                                      <td width="70%">Al Quran - Hafazan</td>
                                                                      <td width="30%">
                                                                          <center><input onchange="calculate()" id="finalHafazan" name="finalHafazan" type="text" size="1" onkeypress="return isNumberKey(event)" value="<?php echo htmlentities($result->finalHafazan);?>"></center>
                                                                      </td>
                                                                  </tr>
                                                                  <tr>
                                                                      <td  width="70%">Tauhid</td>
                                                                      <td  width="30%">
                                                                          <center><input onchange="calculate()" id="finalTauhid" name="finalTauhid" type="text" size="1" onkeypress="return isNumberKey(event)" value="<?php echo htmlentities($result->finalTauhid);?>"></center>
                                                                      </td>
                                                                  </tr>
                                                                  <tr>
                                                                      <td width="70%">Ibadat</td>
                                                                      <td width="30%">
                                                                          <center><input onchange="calculate()" id="finalIbadat" name="finalIbadat" type="text" size="1" onkeypress="return isNumberKey(event)" value="<?php echo htmlentities($result->finalIbadat);?>"></center>
                                                                      </td>
                                                                  </tr>
                                                                  <tr>
                                                                      <td width="70%">Akhlak</td>
                                                                      <td width="30%">
                                                                          <center><input onchange="calculate()" id="finalAkhlak" name="finalAkhlak" type="text" size="1" onkeypress="return isNumberKey(event)" value="<?php echo htmlentities($result->finalAkhlak);?>"></center>
                                                                      </td>
                                                                  </tr>
                                                                  <tr>
                                                                      <td width="70%">Sirah</td>
                                                                      <td width="30%">
                                                                          <center><input onchange="calculate()" id="finalSirah" name="finalSirah" type="text" size="1" onkeypress="return isNumberKey(event)" value="<?php echo htmlentities($result->finalSirah);?>"></center>
                                                                      </td>
                                                                  </tr>
                                                                  <tr>
                                                                      <td width="70%">Bahasa Arab</td>
                                                                      <td width="30%">
                                                                          <center><input onchange="calculate()" id="finalArab" name="finalArab" type="text" size="1" onkeypress="return isNumberKey(event)"onkeypress="return isNumberKey(event)"onkeypress="return isNumberKey(event)" value="<?php echo htmlentities($result->finalArab);?>"></center>
                                                                      </td>
                                                                  </tr>
                                                                  <tr>
                                                                      <td width="70%">Tajwid</td>
                                                                      <td width="30%">
                                                                          <center><input onchange="calculate()" id="finalTajwid" name="finalTajwid" type="text" size="1" onkeypress="return isNumberKey(event)"onkeypress="return isNumberKey(event)"onkeypress="return isNumberKey(event)" value="<?php echo htmlentities($result->finalTajwid);?>"></center>
                                                                      </td>
                                                                  </tr>
                                                                  <tr>
                                                                      <td width="70%">Tafsir Al Quran</td>
                                                                      <td width="30%">
                                                                          <center><input onchange="calculate()" id="finalTafsir" name="finalTafsir" type="text" size="1" onkeypress="return isNumberKey(event)"onkeypress="return isNumberKey(event)" value="<?php echo htmlentities($result->finalTafsir);?>"></center>
                                                                      </td>
                                                                  </tr>
                                                                  <tr>
                                                                      <td width="70%">Muamalat dan Munakahat</td>
                                                                      <td width="30%">
                                                                          <center><input onchange="calculate()" id="finalMuamalat" name="finalMuamalat" type="text" size="1" onkeypress="return isNumberKey(event)" value="<?php echo htmlentities($result->finalMuamalat);?>"></center>
                                                                      </td>
                                                                  </tr>
                                                                  <tr>
                                                                      <td width="70%">Jumlah Markah</td>
                                                                      <td width="30%">
                                                                          <center><input onchange="calculate()" type="text" size="1" onkeypress="return isNumberKey(event)" name="output" id="output" readonly value="<?php echo htmlentities($result->output);?>"></center>
                                                                      </td>
                                                                  </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                    <td width="5%">
                                                        &nbsp; 
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
                                             <table width="100%">
                                            <tbody>
                                                <tr>
                                                    <td width="5%">
                                                        &nbsp;
                                                    </td>
                                                    <td colspan="5">
                                                        <center>Keputusan Ujian Penilaian Kelas KAFA (UPKK)</center> 
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
                                                    <td colspan="3">
                                                        <center>Tahun:
                                                            <select name="upkkTahun">
                                                                <option value="<?php echo htmlentities($result->upkkTahun);?>"><?php echo htmlentities($result->upkkTahun);?></option>
                                                                <option value="2018">2018</option>
                                                            </select>&nbsp;&nbsp;A.Giliran:
                                                            <input name="upkkAngka" type="text" maxlength="12" required value="<?php echo htmlentities($result->upkkAngka);?>"/>
                                                        </center>
                                                    </td>
                                                    <td width="5%">
                                                        &nbsp; 
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
                                                    <td colspan="3">
                                                          <table width="100%" border="1">
                                                              <tbody>
                                                                  <tr>
                                                                      <td width="70%" bgcolor="#999999">
                                                                          <center>Matapelajaran</center>
                                                                      </td>
                                                                      <td width="30%" bgcolor="#999999">
                                                                          <center>Gred</center>
                                                                      </td>
                                                                  </tr>
                                                                  <tr>
                                                                      <td width="70%">Amali Solat</td>
                                                                      <td width="30%">
                                                                          <center><select name="upkkAmaliSolat" required>
                                                                               <option value="<?php echo htmlentities($result->upkkAmaliSolat);?>"><?php echo htmlentities($result->upkkAmaliSolat);?></option>
                                                                              <option value="A">A</option>
                                                                              <option value="B">B</option>
                                                                              <option value="C">C</option>
                                                                              <option value="D">D</option>
                                                                              <option value="E">E</option>
                                                                              <option value="F">F</option>
                                                                          </select></center>
                                                                      </td>
                                                                  </tr>
                                                                  <tr>
                                                                      <td width="70%">Penghayatan Cara Hidup Islam</td>
                                                                      <td width="30%">
                                                                          <center><select name="upkkCaraHidup" required>
                                                                              <option value="<?php echo htmlentities($result->upkkCaraHidup);?>"><?php echo htmlentities($result->upkkCaraHidup);?></option>
                                                                              <option value="A">A</option>
                                                                              <option value="B">B</option>
                                                                              <option value="C">C</option>
                                                                              <option value="D">D</option>
                                                                              <option value="E">E</option>
                                                                              <option value="F">F</option>
                                                                          </select></center>
                                                                      </td>
                                                                  </tr>
                                                                  <tr>
                                                                      <td  width="70%">Bidang Al - Quran</td>
                                                                      <td  width="30%">
                                                                          <center><select name="upkkQuran" required>
                                                                              <option value="<?php echo htmlentities($result->upkkQuran);?>"><?php echo htmlentities($result->upkkQuran);?></option>
                                                                              <option value="A">A</option>
                                                                              <option value="B">B</option>
                                                                              <option value="C">C</option>
                                                                              <option value="D">D</option>
                                                                              <option value="E">E</option>
                                                                              <option value="F">F</option>
                                                                          </select></center>
                                                                      </td>
                                                                  </tr>
                                                                  <tr>
                                                                      <td width="70%">Sirah</td>
                                                                      <td width="30%">
                                                                          <center><select name="upkkSirah" required>
                                                                              <option value="<?php echo htmlentities($result->upkkSirah);?>"><?php echo htmlentities($result->upkkSirah);?></option>
                                                                              <option value="A">A</option>
                                                                              <option value="B">B</option>
                                                                              <option value="C">C</option>
                                                                              <option value="D">D</option>
                                                                              <option value="E">E</option>
                                                                              <option value="F">F</option>
                                                                          </select></center>
                                                                      </td>
                                                                  </tr>
                                                                  <tr>
                                                                      <td width="70%">Adab (Akhlak Islamiah)</td>
                                                                      <td width="30%">
                                                                          <center><select name="upkkAkhlak" required>
                                                                              <option value="<?php echo htmlentities($result->upkkAkhlak);?>"><?php echo htmlentities($result->upkkAkhlak);?></option>
                                                                              <option value="A">A</option>
                                                                              <option value="B">B</option>
                                                                              <option value="C">C</option>
                                                                              <option value="D">D</option>
                                                                              <option value="E">E</option>
                                                                              <option value="F">F</option>
                                                                          </select></center>
                                                                      </td>
                                                                  </tr>
                                                                  <tr>
                                                                      <td width="70%">Ulum Syariah</td>
                                                                      <td width="30%">
                                                                          <center><select name="upkkSyariah" required>
                                                                              <option value="<?php echo htmlentities($result->upkkSyariah);?>"><?php echo htmlentities($result->upkkSyariah);?></option>
                                                                              <option value="A">A</option>
                                                                              <option value="B">B</option>
                                                                              <option value="C">C</option>
                                                                              <option value="D">D</option>
                                                                              <option value="E">E</option>
                                                                              <option value="F">F</option>
                                                                          </select></center>
                                                                      </td>
                                                                  </tr>
                                                                  <tr>
                                                                      <td width="70%">Pelajaran Jawi</td>
                                                                      <td width="30%">
                                                                          <center><select name="upkkJawi" required>
                                                                              <option value="<?php echo htmlentities($result->upkkJawi);?>"><?php echo htmlentities($result->upkkJawi);?></option>
                                                                              <option value="A">A</option>
                                                                              <option value="B">B</option>
                                                                              <option value="C">C</option>
                                                                              <option value="D">D</option>
                                                                              <option value="E">E</option>
                                                                              <option value="F">F</option>
                                                                          </select></center>
                                                                      </td>
                                                                  </tr>
                                                                  <tr>
                                                                      <td width="70%">Al - Lughatul Quran</td>
                                                                      <td width="30%">
                                                                          <center><select name="upkkLughatul" required>
                                                                              <option value="<?php echo htmlentities($result->upkkLughatul);?>"><?php echo htmlentities($result->upkkLughatul);?></option>
                                                                              <option value="A">A</option>
                                                                              <option value="B">B</option>
                                                                              <option value="C">C</option>
                                                                              <option value="D">D</option>
                                                                              <option value="E">E</option>
                                                                              <option value="F">F</option>
                                                                              </select>
                                                                          </center>
                                                                      </td>
                                                                  </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                    <td width="5%">
                                                        &nbsp; 
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
    function calculate()
            {
                
                var a=document.getElementById("finalBacaan").value;
                var b=document.getElementById("finalHafazan").value;
                var c=document.getElementById("finalTauhid").value;
                var d=document.getElementById("finalIbadat").value;
                var e=document.getElementById("finalAkhlak").value;
                var f=document.getElementById("finalSirah").value;
                var g=document.getElementById("finalArab").value;
                var h=document.getElementById("finalTajwid").value;
                var i=document.getElementById("finalTafsir").value;
                var j=document.getElementById("finalMuamalat").value;
                var total = ((a/1) - (- (b/1)) - (- (c/1)) - (- (d/1)) - (- (e/1))  - (- (f/1)) - (- (g/1)) - (- (h/1)) - (- (i/1)) - (-(j/1)));
                var total2 = (total * (100) / 900).toFixed(1);
                document.getElementById("output").value=total2;
                var a=document.getElementById("output").value;
            }
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