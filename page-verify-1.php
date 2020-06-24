<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['pemlogin'])==0) {   
    header('location:index.php');
} else {
    if(isset($_POST['simpan'])) {
        $pemid=$_SESSION['pid'];
        
        $sql7="SELECT pemid FROM kelayakan WHERE pemid=:pemid";
        $query7 = $dbh->prepare($sql7);
        $query7->bindParam(':pemid',$pemid,PDO::PARAM_STR);
        $query7->execute();
        $user = $query7->fetch();
        if($user){
            echo "<script>alert('Saya mengaku segala keterangan yang dinyatakan dalam borang ini adalah betul dan benar.');</script>";
            echo "<script type='text/javascript'> document.location = 'edit-page-verify-2.php'; </script>";
        } else {
        $pemid=$_SESSION['pid'];
        $upsrTahun=$_POST['upsrTahun'];
        $upsrAngka=$_POST['upsrAngka'];
        $PPSR=$_POST['PPSR'];
        $upsrPemahamanBM=$_POST['upsrPemahamanBM'];
        $upsrPenulisanBM=$_POST['upsrPenulisanBM'];        
        $upsrPemahamanBI=$_POST['upsrPemahamanBI'];
        $upsrPenulisanBI=$_POST['upsrPenulisanBI'];
        $upsrMath=$_POST['upsrMath'];
        $upsrSains=$_POST['upsrSains'];
        $output=$_POST['output'];
        $SekolahKelayakan1=$_POST['SekolahKelayakan1'];
        $SekolahKelayakan2=$_POST['SekolahKelayakan2'];
        $TemudugaKelayakan=$_POST['TemudugaKelayakan'];
    
        $sql="INSERT INTO kelayakan(upsrTahun, upsrAngka, PPSR, upsrPemahamanBM, upsrPenulisanBM, upsrPemahamanBI, upsrPenulisanBI, upsrMath, upsrSains, output, SekolahKelayakan1, SekolahKelayakan2, TemudugaKelayakan, pemid) VALUES(:upsrTahun, :upsrAngka, :PPSR, :upsrPemahamanBM, :upsrPenulisanBM, :upsrPemahamanBI, :upsrPenulisanBI, :upsrMath, :upsrSains, :output, :SekolahKelayakan1, :SekolahKelayakan2, :TemudugaKelayakan, :pemid)";
        
        $sql2="INSERT INTO daftar_pemohon(finalTahun, finalBacaan, finalHafazan, finalTauhid, finalIbadat, finalAkhlak, finalSirah, finalArab, finalTajwid, finalTafsir, finalMuamalat, output, upkkTahun, upkkAngka, upkkAmaliSolat, upkkCaraHidup, upkkQuran, upkkSirah, upkkAkhlak, upkkSyariah, upkkJawi, upkkLughatul, pemid) VALUES(:finalTahun, :finalBacaan, :finalHafazan, :finalTauhid, :finalIbadat, :finalAkhlak, :finalSirah, :finalArab, :finalTajwid, :finalTafsir, :finalMuamalat, :output, :upkkTahun, :upkkAngka, :upkkAmaliSolat, :upkkCaraHidup, :upkkQuran, :upkkSirah, :upkkAkhlak, :upkkSyariah, :upkkJawi, :upkkLughatul, :pemid)";
        
        $sql3="INSERT INTO daftar_koko(TahunKoko1, SekolahKoko1, KelabPersatuanKoko1, JawatanKoko1, TahunKoko2, SekolahKoko2, KelabPersatuanKoko2, JawatanKoko2, TahunKoko3, SekolahKoko3, KelabPersatuanKoko3, JawatanKoko3, TahunKoko6, AcaraKoko1, PencapaianKoko1, TahunKoko7, AcaraKoko2, PencapaianKoko2, TahunKoko8, AcaraKoko3, PencapaianKoko3, pemid) VALUES(:TahunKoko1, :SekolahKoko1, :KelabPersatuanKoko1, :JawatanKoko1, :TahunKoko2, :SekolahKoko2, :KelabPersatuanKoko2, :JawatanKoko2, :TahunKoko3, :SekolahKoko3, :KelabPersatuanKoko3, :JawatanKoko3, :TahunKoko6, :AcaraKoko1, :PencapaianKoko1, :TahunKoko7, :AcaraKoko2, :PencapaianKoko2, :TahunKoko8, :AcaraKoko3, :PencapaianKoko3, :pemid)";
        
        $sql4="INSERT INTO daftar_penjaga(KhatamQuran, BilJuzukQuran, BilSurahQuran, NamaPenjaga, KadPengenalanPenjaga, TelefonPenjaga, AlamatPenjaga, pemid) VALUES(:KhatamQuran, :BilJuzukQuran, :BilSurahQuran, :NamaPenjaga, :KadPengenalanPenjaga, :TelefonPenjaga, :AlamatPenjaga, :pemid)";
        
        $sql5="INSERT INTO daftar_muatnaik(PemAsrama, JarakAsrama, pemid) VALUES(:PemAsrama, :JarakAsrama, :pemid)";
        
        $sql6="INSERT INTO markah (	HafazanMarkah, BertulisMarkah, LisanMarkah, QuranMarkah, pemid) VALUES(:HafazanMarkah, :BertulisMarkah, :LisanMarkah, :QuranMarkah, :pemid)";
        
        
        $query = $dbh->prepare($sql);
        $query2 = $dbh->prepare($sql2);
        $query3 = $dbh->prepare($sql3);
        $query4 = $dbh->prepare($sql4);
        $query5 = $dbh->prepare($sql5);
        $query6 = $dbh->prepare($sql6);
        $query->bindParam(':upsrTahun',$upsrTahun,PDO::PARAM_STR);
        $query->bindParam(':upsrAngka',$upsrAngka,PDO::PARAM_STR);
        $query->bindParam(':PPSR',$PPSR,PDO::PARAM_STR);
        $query->bindParam(':upsrPemahamanBM',$upsrPemahamanBM,PDO::PARAM_STR);
        $query->bindParam(':upsrPenulisanBM',$upsrPenulisanBM,PDO::PARAM_STR);
        $query->bindParam(':upsrPemahamanBI',$upsrPemahamanBI,PDO::PARAM_STR);
        $query->bindParam(':upsrPenulisanBI',$upsrPenulisanBI,PDO::PARAM_STR);
        $query->bindParam(':upsrMath',$upsrMath,PDO::PARAM_STR);
        $query->bindParam(':upsrSains',$upsrSains,PDO::PARAM_STR);
        $query->bindParam(':output',$output,PDO::PARAM_STR);
        $query->bindParam(':SekolahKelayakan1',$SekolahKelayakan1,PDO::PARAM_STR);
        $query->bindParam(':SekolahKelayakan2',$SekolahKelayakan2,PDO::PARAM_STR);
        $query->bindParam(':TemudugaKelayakan',$TemudugaKelayakan,PDO::PARAM_STR);
        $query->bindParam(':pemid',$pemid,PDO::PARAM_STR);
        $query2->bindParam(':finalTahun',$finalTahun,PDO::PARAM_STR);
        $query2->bindParam(':finalBacaan',$finalBacaan,PDO::PARAM_STR);
        $query2->bindParam(':finalHafazan',$finalHafazan,PDO::PARAM_STR);
        $query2->bindParam(':finalTauhid',$finalTauhid,PDO::PARAM_STR);
        $query2->bindParam(':finalIbadat',$finalIbadat,PDO::PARAM_STR);
        $query2->bindParam(':finalAkhlak',$finalAkhlak,PDO::PARAM_STR);
        $query2->bindParam(':finalSirah',$finalSirah,PDO::PARAM_STR);
        $query2->bindParam(':finalArab',$finalArab,PDO::PARAM_STR);
        $query2->bindParam(':finalTajwid',$finalTajwid,PDO::PARAM_STR);
        $query2->bindParam(':finalTafsir',$finalTafsir,PDO::PARAM_STR);
        $query2->bindParam(':finalMuamalat',$finalMuamalat,PDO::PARAM_STR);
        $query2->bindParam(':output',$output,PDO::PARAM_STR);
        $query2->bindParam(':upkkTahun',$upkkTahun,PDO::PARAM_STR);
        $query2->bindParam(':upkkAngka',$upkkAngka,PDO::PARAM_STR);
        $query2->bindParam(':upkkAmaliSolat',$upkkAmaliSolat,PDO::PARAM_STR);
        $query2->bindParam(':upkkCaraHidup',$upkkCaraHidup,PDO::PARAM_STR);
        $query2->bindParam(':upkkQuran',$upkkQuran,PDO::PARAM_STR);
        $query2->bindParam(':upkkSirah',$upkkSirah,PDO::PARAM_STR);
        $query2->bindParam(':upkkAkhlak',$upkkAkhlak,PDO::PARAM_STR);
        $query2->bindParam(':upkkSyariah',$upkkSyariah,PDO::PARAM_STR);
        $query2->bindParam(':upkkJawi',$upkkJawi,PDO::PARAM_STR);
        $query2->bindParam(':upkkLughatul',$upkkLughatul,PDO::PARAM_STR);
        $query2->bindParam(':pemid',$pemid,PDO::PARAM_STR);
        $query3->bindParam(':TahunKoko1',$TahunKoko1,PDO::PARAM_STR);
        $query3->bindParam(':SekolahKoko1',$SekolahKoko1,PDO::PARAM_STR);
        $query3->bindParam(':KelabPersatuanKoko1',$KelabPersatuanKoko1,PDO::PARAM_STR);
        $query3->bindParam(':JawatanKoko1',$JawatanKoko1,PDO::PARAM_STR);
        $query3->bindParam(':TahunKoko2',$TahunKoko2,PDO::PARAM_STR);
        $query3->bindParam(':SekolahKoko2',$SekolahKoko2,PDO::PARAM_STR);
        $query3->bindParam(':KelabPersatuanKoko2',$KelabPersatuanKoko2,PDO::PARAM_STR);
        $query3->bindParam(':JawatanKoko2',$JawatanKoko2,PDO::PARAM_STR);
        $query3->bindParam(':TahunKoko3',$TahunKoko3,PDO::PARAM_STR);
        $query3->bindParam(':SekolahKoko3',$SekolahKoko3,PDO::PARAM_STR);
        $query3->bindParam(':KelabPersatuanKoko3',$KelabPersatuanKoko3,PDO::PARAM_STR);
        $query3->bindParam(':JawatanKoko3',$JawatanKoko3,PDO::PARAM_STR);
        $query3->bindParam(':TahunKoko6',$TahunKoko6,PDO::PARAM_STR);
        $query3->bindParam(':AcaraKoko1',$AcaraKoko1,PDO::PARAM_STR);
        $query3->bindParam(':PencapaianKoko1',$PencapaianKoko1,PDO::PARAM_STR);
        $query3->bindParam(':TahunKoko7',$TahunKoko7,PDO::PARAM_STR);
        $query3->bindParam(':AcaraKoko2',$AcaraKoko2,PDO::PARAM_STR);
        $query3->bindParam(':PencapaianKoko2',$PencapaianKoko2,PDO::PARAM_STR);
        $query3->bindParam(':TahunKoko8',$TahunKoko8,PDO::PARAM_STR);
        $query3->bindParam(':AcaraKoko3',$AcaraKoko3,PDO::PARAM_STR);
        $query3->bindParam(':PencapaianKoko3',$PencapaianKoko3,PDO::PARAM_STR);
        $query3->bindParam(':pemid',$pemid,PDO::PARAM_STR);
        $query4->bindParam(':KhatamQuran',$KhatamQuran,PDO::PARAM_STR);
        $query4->bindParam(':BilJuzukQuran',$BilJuzukQuran,PDO::PARAM_STR);
        $query4->bindParam(':BilSurahQuran',$BilSurahQuran,PDO::PARAM_STR);
        $query4->bindParam(':NamaPenjaga',$NamaPenjaga,PDO::PARAM_STR);
        $query4->bindParam(':KadPengenalanPenjaga',$KadPengenalanPenjaga,PDO::PARAM_STR);
        $query4->bindParam(':TelefonPenjaga',$TelefonPenjaga,PDO::PARAM_STR);
        $query4->bindParam(':AlamatPenjaga',$AlamatPenjaga,PDO::PARAM_STR);
        $query4->bindParam(':pemid',$pemid,PDO::PARAM_STR);
        $query5->bindParam(':PemAsrama',$PemAsrama,PDO::PARAM_STR);
        $query5->bindParam(':JarakAsrama',$JarakAsrama,PDO::PARAM_STR);
        $query5->bindParam(':pemid',$pemid,PDO::PARAM_STR);
        $query6->bindParam(':HafazanMarkah',$HafazanMarkah,PDO::PARAM_STR);
        $query6->bindParam(':BertulisMarkah',$BertulisMarkah,PDO::PARAM_STR);
        $query6->bindParam(':LisanMarkah',$LisanMarkah,PDO::PARAM_STR);
        $query6->bindParam(':QuranMarkah',$QuranMarkah,PDO::PARAM_STR);
        $query6->bindParam(':pemid',$pemid,PDO::PARAM_STR);
        $query->execute();
        $query2->execute();
        $query3->execute();
        $query4->execute();
        $query5->execute();
        $query6->execute();
        
        $lastInsertId = $dbh->lastInsertId();
        
        if($lastInsertId) {
            echo "<script>alert('Saya mengaku segala keterangan yang dinyatakan dalam borang ini adalah betul dan benar.');</script>";
            echo "<script type='text/javascript'> document.location = 'edit-page-verify-2.php'; </script>";
        } else  {
            $error="Something went wrong. Please try again";
        }
    }
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
        
        <style>
            .active_tab1 {
                background-color:#fff;
                color:#333;
                font-weight: 600;
            }
            .inactive_tab1 {
                background-color: #f5f5f5;
                color: #333;
                cursor: not-allowed;
            }
            .has-error {
                border-color:#cc0000;
                background-color:#ffff99;
            }
            
        </style>
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
                <div class="col-md-1">
                   
                </div>
                
                <div class="col-md-10">
                    <table  width="100%">
                        <tbody>
                            <form method="post" onsubmit="return CheckForm();">
                            <tr>
                                <td>
                                    <fieldset class="scheduler-border">
                                        <legend class="scheduler-border">
                                            <h3><strong>&nbsp;&nbsp;Semakan Kelayakan Pemohonan &nbsp;&nbsp;</strong></h3>
                                        </legend>
                                        <table width="100%">
                                            <tbody>
                                                <tr>
                                                    <td width="3%">
                                                        &nbsp; 
                                                    </td>
                                                    <td width="3%">
                                                        &nbsp; 
                                                    </td>
                                                    <td width="30%">
                                                        &nbsp; 
                                                    </td>
                                                    <td width="3%">
                                                        &nbsp;  
                                                    </td>
                                                    <td>
                                                        <center>Tahun:
                                                            <select name="upsrTahun" id="Pendapatan" required>
                                                                <option value="2019">2019</option>
                                                            </select>&nbsp;&nbsp;Angka Giliran UPSR:
                                                            <input name="upsrAngka" type="text" maxlength="9" onkeydown="upperCaseF(this)" required placeholder="Contoh: JJ021K113"/>&nbsp;&nbsp;<br>Keputusan UPSR:
                                                            <input name="PPSR" type="text" maxlength="12" onkeydown="upperCaseF(this)" required placeholder="Contoh: 6A, 3A3B, 2A2B2C dan lain-lain" size="32"/>
                                                        </center>
                                                    </td>
                                                    <td width="3%">
                                                        &nbsp; 
                                                    </td>
                                                    <td width="3%">
                                                        &nbsp; 
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table width="100%">
                                            <tbody>
                                                <tr>
                                                    <td width="3%">
                                                        &nbsp;
                                                    </td>
                                                    <td width="3%">
                                                        &nbsp;
                                                    </td>
                                                    <td width="30%">
                                                        Keputusan UPSR
                                                    </td>
                                                    <td width="3%">
                                                        : 
                                                    </td>
                                                    <td>
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
                                                                      <td colspan="2">Bahasa Melayu</td>
                                                                  </tr>
                                                                  <tr>
                                                                      <td width="70%">i) Ujian Pemahaman</td>
                                                                      <td width="30%">
                                                                          <select name="upsrPemahamanBM" onchange="calculate()" id="upsrPemahamanBM">
                                                                              <option value="">Sila Pilih</option>
                                                                              <option value="5">A</option>
                                                                              <option value="4">B</option>
                                                                              <option value="3">C</option>
                                                                              <option value="2">D</option>
                                                                              <option value="1">E</option>
                                                                              <option value="0">F</option>
                                                                          </select>
                                                                      </td>
                                                                  </tr>
                                                                  <tr>
                                                                      <td  width="70%">ii) Ujian Penulisan</td>
                                                                      <td  width="30%">
                                                                          <select name="upsrPenulisanBM" onchange="calculate()" id="upsrPenulisanBM">
                                                                              <option value="">Sila Pilih</option>
                                                                              <option value="5">A</option>
                                                                              <option value="4">B</option>
                                                                              <option value="3">C</option>
                                                                              <option value="2">D</option>
                                                                              <option value="1">E</option>
                                                                              <option value="0">F</option>
                                                                          </select>
                                                                      </td>
                                                                  </tr>
                                                                  <tr>
                                                                      <td colspan="2">Bahasa Inggeris</td>
                                                                  </tr>
                                                                  <tr>
                                                                      <td width="70%">i) Ujian Pemahaman</td>
                                                                      <td width="30%">
                                                                          <select name="upsrPemahamanBI" onchange="calculate()" id="upsrPemahamanBI">
                                                                              <option value="">Sila Pilih</option>
                                                                              <option value="5">A</option>
                                                                              <option value="4">B</option>
                                                                              <option value="3">C</option>
                                                                              <option value="2">D</option>
                                                                              <option value="1">E</option>
                                                                              <option value="0">F</option>
                                                                          </select>
                                                                      </td>
                                                                  </tr>
                                                                  <tr>
                                                                      <td width="70%">ii) Ujian Penulisan</td>
                                                                      <td width="30%">
                                                                          <select name="upsrPenulisanBI" onchange="calculate()" id="upsrPenulisanBI">
                                                                              <option value="">Sila Pilih</option>
                                                                              <option value="5">A</option>
                                                                              <option value="4">B</option>
                                                                              <option value="3">C</option>
                                                                              <option value="2">D</option>
                                                                              <option value="1">E</option>
                                                                              <option value="0">F</option>
                                                                          </select>
                                                                      </td>
                                                                  </tr>
                                                                  <tr>
                                                                      <td width="70%">Matematik</td>
                                                                      <td width="30%">
                                                                          <select name="upsrMath" onchange="calculate()" id="upsrMath">
                                                                              <option value="">Sila Pilih</option>
                                                                              <option value="5">A</option>
                                                                              <option value="4">B</option>
                                                                              <option value="3">C</option>
                                                                              <option value="2">D</option>
                                                                              <option value="1">E</option>
                                                                              <option value="0">F</option>
                                                                          </select>
                                                                      </td>
                                                                  </tr>
                                                                  <tr>
                                                                      <td width="70%">Sains</td>
                                                                      <td width="30%">
                                                                          <select name="upsrSains" onchange="calculate()" id="upsrSains">
                                                                              <option value="">Sila Pilih</option>
                                                                              <option value="5">A</option>
                                                                              <option value="4">B</option>
                                                                              <option value="3">C</option>
                                                                              <option value="2">D</option>
                                                                              <option value="1">E</option>
                                                                              <option value="0">F</option>
                                                                          </select>
                                                                      </td>
                                                                  </tr>
                                                                  </tbody>
                                                        </table>
                                                    </td>
                                                    <td width="3%">
                                                        &nbsp; 
                                                    </td>
                                                    <td width="3%">
                                                        &nbsp; 
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="3%">
                                                        &nbsp; 
                                                    </td>
                                                    <td width="3%">
                                                        &nbsp; 
                                                    </td>
                                                    <td width="30%">
                                                        Jumlah Merit
                                                    </td>
                                                    <td width="3%">
                                                        : 
                                                    </td>
                                                    <td>
                                                        <input name="output" id="output" class="form-control" onchange="calculate()" placeholder="Pengiraan Merit Akan Dijana Secara Automatik" readonly>
                                                    </td>
                                                    <td width="3%">
                                                        &nbsp; 
                                                    </td>
                                                    <td width="3%">
                                                        &nbsp; 
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="3%">
                                                        &nbsp;
                                                    </td>
                                                    <td width="3%">
                                                        &nbsp;
                                                    </td>
                                                    <td width="30%" colspan="3">
                                                        &nbsp; 
                                                    </td>
                                                    <td width="3%">
                                                        &nbsp; 
                                                    </td>
                                                    <td width="3%">
                                                        &nbsp; 
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="3%">
                                                        &nbsp;
                                                    </td>
                                                    <td width="3%">
                                                        &nbsp;
                                                    </td>
                                                    <td width="30%" colspan="3">
                                                        Sekolah Yang Layak Dipohon Berdasarkan Pengiraan Merit
                                                    </td>
                                                    <td width="3%">
                                                        &nbsp; 
                                                    </td>
                                                    <td width="3%">
                                                        &nbsp; 
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="3%">
                                                        &nbsp; 
                                                    </td>
                                                    <td width="3%">
                                                        &nbsp; 
                                                    </td>
                                                    <td width="30%">
                                                        Pilihan 1
                                                    </td>
                                                    <td width="3%">
                                                        : 
                                                    </td>
                                                    <td>
                                                        <select name="SekolahKelayakan1" id="SekolahKelayakan1" class="form-control" onchange="random_function()">
                                                        </select>
                                                    </td>
                                                    <td width="3%">
                                                        &nbsp; 
                                                    </td>
                                                    <td width="3%">
                                                        &nbsp; 
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="3%">
                                                        &nbsp; 
                                                    </td>
                                                    <td width="3%">
                                                        &nbsp; 
                                                    </td>
                                                    <td width="30%">
                                                        Pilihan 2
                                                    </td>
                                                    <td width="3%">
                                                        : 
                                                    </td>
                                                    <td>
                                                        <select name="SekolahKelayakan2" id="SekolahKelayakan2" class="form-control">
                                                        </select>
                                                    </td>
                                                    <td width="3%">
                                                        &nbsp; 
                                                    </td>
                                                    <td width="3%">
                                                        &nbsp; 
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="3%">
                                                        &nbsp; 
                                                    </td>
                                                    <td width="3%">
                                                        &nbsp; 
                                                    </td>
                                                    <td width="30%">
                                                        Pusat Temuduga
                                                    </td>
                                                    <td width="3%">
                                                        : 
                                                    </td>
                                                    <td>
                                                        <select name="TemudugaKelayakan" id="TemudugaKelayakan" class="form-control">
                                                        </select>
                                                    </td>
                                                    <td width="3%">
                                                        &nbsp; 
                                                    </td>
                                                    <td width="3%">
                                                        &nbsp; 
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="3%">
                                                        &nbsp; 
                                                    </td>
                                                    <td width="3%">
                                                        &nbsp; 
                                                    </td>
                                                    <td width="30%">
                                                        &nbsp; 
                                                    </td>
                                                    <td width="3%">
                                                        &nbsp;  
                                                    </td>
                                                    <td>
                                                        <font color="#FF0000" size="-1">
                                                            <i>Pilihan Pusat Temuduga ini adalah tidak muktamad. Pihak jabatan berhak menentukan pusat temuduga yang lain.</i><br>
                                                        </font>
                                                    </td>
                                                    <td width="3%">
                                                        &nbsp; 
                                                    </td>
                                                    <td width="3%">
                                                        &nbsp; 
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="7">
                                                        &nbsp;
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </fieldset>
                                </td>
                            </tr>
                            <tr align="center">
                                <td>
                                    <!---<input value="Seterusnya" type="button" onclick="window.location='keputusan-upsr.php'">--->
                                    <input class="btn btn-danger" type="reset" value="Isi semula">
                                    <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                                </td>
                            </tr>
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
        function upperCaseF(a) {
            setTimeout(function(){
                a.value = a.value.toUpperCase();
            }, 1);
        }
        
        function calculate()
            {
                
                var a=document.getElementById("upsrPemahamanBM").value;
                var b=document.getElementById("upsrPenulisanBM").value;
                var c=document.getElementById("upsrPemahamanBI").value;
                var d=document.getElementById("upsrPenulisanBI").value;
                var e=document.getElementById("upsrMath").value;
                var f=document.getElementById("upsrSains").value;
                var total = a - (- b) - (- c) - (- d) - (- e) - (- f);
                document.getElementById("output").value=total;
                var a=document.getElementById("output").value;
                if(a==="30")
                {
                    var arr=["Pilihan Sekolah", "Maahad Tahfiz Negeri Johor, Johor Bahru (Ditempatkan di MJ - Lelaki Sahaja)","SMA Kerajaan Johor, Kluang", "Maahad Johor Lil Banat (Ditempatkan di SMAKJ - Perempuan Sahaja)", "Maahad Pontian, Pontian", "SMA Parit Raja, Batu Pahat", "SMA Bugisiah Tampok, Benut, Pontian"];
                }
                else if(a==="29")
                {
                   var arr=["Pilihan Sekolah", "Maahad Tahfiz Negeri Johor, Johor Bahru (Ditempatkan di MJ - Lelaki Sahaja)","SMA Kerajaan Johor, Kluang", "Maahad Johor Lil Banat (Ditempatkan di SMAKJ - Perempuan Sahaja)", "Maahad Pontian, Pontian", "SMA Parit Raja, Batu Pahat", "SMA Bugisiah Tampok, Benut, Pontian"];
                }
                else if(a==="28")
                {
                    var arr=["Pilihan Sekolah", "Maahad Tahfiz Negeri Johor, Johor Bahru (Ditempatkan di MJ - Lelaki Sahaja)","SMA Kerajaan Johor, Kluang", "Maahad Johor Lil Banat (Ditempatkan di SMAKJ - Perempuan Sahaja)", "Maahad Pontian, Pontian", "SMA Parit Raja, Batu Pahat", "SMA Bugisiah Tampok, Benut, Pontian"];
                }
                else if(a==="27")
                {
                    var arr=["Pilihan Sekolah", "Maahad Tahfiz Negeri Johor, Johor Bahru (Ditempatkan di MJ - Lelaki Sahaja)","SMA Kerajaan Johor, Kluang", "Maahad Johor Lil Banat (Ditempatkan di SMAKJ - Perempuan Sahaja)", "Maahad Pontian, Pontian", "SMA Parit Raja, Batu Pahat", "SMA Bugisiah Tampok, Benut, Pontian"];
                }
                else if(a==="26")
                {
                    var arr=["Pilihan Sekolah", "Maahad Tahfiz Negeri Johor, Johor Bahru (Ditempatkan di MJ - Lelaki Sahaja)","SMA Kerajaan Johor, Kluang", "Maahad Johor Lil Banat (Ditempatkan di SMAKJ - Perempuan Sahaja)", "Maahad Pontian, Pontian", "SMA Parit Raja, Batu Pahat", "SMA Bugisiah Tampok, Benut, Pontian"];
                }
                else if(a==="25")
                {
                    var arr=["Pilihan Sekolah", "Maahad Tahfiz Negeri Johor, Johor Bahru (Ditempatkan di MJ - Lelaki Sahaja)","SMA Kerajaan Johor, Kluang", "Maahad Johor Lil Banat (Ditempatkan di SMAKJ - Perempuan Sahaja)", "Maahad Pontian, Pontian", "SMA Parit Raja, Batu Pahat", "SMA Bugisiah Tampok, Benut, Pontian"];
                }
                else if(a==="24")
                {
                    var arr=["Pilihan Sekolah", "Maahad Tahfiz Negeri Johor, Johor Bahru (Ditempatkan di MJ - Lelaki Sahaja)","SMA Kerajaan Johor, Kluang", "Maahad Johor Lil Banat (Ditempatkan di SMAKJ - Perempuan Sahaja)", "Maahad Pontian, Pontian", "SMA Parit Raja, Batu Pahat", "SMA Bugisiah Tampok, Benut, Pontian"];
                }
                else
                {
                    var arr=["Pilihan Sekolah", "Maahad Pontian, Pontian", "SMA Parit Raja, Batu Pahat", "SMA Bugisiah Tampok, Benut, Pontian"];
                }
                var string="";
               
                for(i=0;i<arr.length;i++)
                {
                    string=string+"<option>"+arr[i]+"</option>";
                }
                string="<select name='any_name'>"+string+"</select>";
                document.getElementById("SekolahKelayakan1").innerHTML=string;
                string="<select name='any_name'>"+string+"</select>";
                document.getElementById("SekolahKelayakan2").innerHTML=string; 
            }
        
        function random_function()
            {
                var a=document.getElementById("SekolahKelayakan1").value;
                var b=document.getElementById("SekolahKelayakan2").value;
                if(a==="Maahad Tahfiz Negeri Johor, Johor Bahru (Ditempatkan di MJ - Lelaki Sahaja)")
                {
                    var arr=["Pilihan Pusat Temuduga", "Maahad Johor - Lelaki Sahaja"];
                }
                else if(a==="Maahad Johor Lil Banat (Ditempatkan di SMAKJ - Perempuan Sahaja)")
                {
                    var arr=["Pilihan Pusat Temuduga", "SMA Kerajaan Johor, Kluang"];
                }
                else if(a==="SMA Kerajaan Johor, Kluang")
                {
                    var arr=["Pilihan Pusat Temuduga", "SMA Kerajaan Johor, Kluang"];
                }
                else if(a==="Maahad Pontian, Pontian")
                {
                    var arr=["Pilihan Pusat Temuduga", "Maahad Pontian, Pontian"];
                }
                else if(a==="SMA Parit Raja, Batu Pahat")
                {
                    var arr=["Pilihan Pusat Temuduga", "SMA Parit Raja, Batu Pahat"];
                }
                else if(a==="SMA Bugisiah Tampok, Benut, Pontian")
                {
                    var arr=["Pilihan Pusat Temuduga", "SMA Bugisiah Tampok, Benut, Pontian"];
                }

                var string="";
               
                for(i=0;i<arr.length;i++)
                {
                    string=string+"<option>"+arr[i]+"</option>";
                }
                string="<select name='any_name'>"+string+"</select>";
                document.getElementById("TemudugaKelayakan").innerHTML=string;
            }
    </script>
</html>
<?php } ?>                            