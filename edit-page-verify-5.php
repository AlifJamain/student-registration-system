<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['pemlogin'])==0) {   
    header('location:index.php');
} else {
    if(isset($_POST['edit'])) {
        $pemid=$_SESSION['pid'];
        $PemAsrama=$_POST['PemAsrama'];
        $JarakAsrama=$_POST['JarakAsrama'];
        $Status=0;

        $sql="UPDATE daftar_muatnaik SET PemAsrama=:PemAsrama, JarakAsrama=:JarakAsrama WHERE pemid=:pemid";
        
        $sql2="UPDATE pemohon SET Status=:Status WHERE IdPemohon=:pemid";
        
        $query = $dbh->prepare($sql);
        $query2 = $dbh->prepare($sql2);
    
        $query->bindParam(':PemAsrama',$PemAsrama,PDO::PARAM_STR);
        $query->bindParam(':JarakAsrama',$JarakAsrama,PDO::PARAM_STR);
        $query->bindParam(':pemid',$pemid,PDO::PARAM_STR);
        $query2->bindParam(':Status',$Status,PDO::PARAM_STR);
        $query2->bindParam(':pemid',$pemid,PDO::PARAM_STR);
        $query->execute();
        $query2->execute();
        echo "<script>alert('Permohonan Telah Dihantar. Keputusan Panggilan Temuduga boleh disemak pada 5 Disember, selepas jam 5 petang');</script>";
        echo "<script type='text/javascript'> document.location = 'edit-page-print.php'; </script>";
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
                            <form method="post" onsubmit="return CheckForm();" enctype="multipart/form-data">
                                <tr>
                                    <td>
                                        <fieldset class="scheduler-border">
                                            <legend class="scheduler-border">
                                                <h3><strong>&nbsp;&nbsp;Pemohonan Asrama&nbsp;&nbsp;</strong></h3>
                                            </legend>
                                          <table width="100%">
                                            <tbody>
                                                <?php 
                                                        $pemid=$_SESSION['pid'];
                                                        $sql = "SELECT * from kelayakan where pemid=:pemid";
                                                        $query = $dbh->prepare($sql);
                                                        $query -> bindParam(':pemid', $pemid, PDO::PARAM_STR);
                                                        $query->execute();
                                                        $results=$query->fetchAll(PDO::FETCH_OBJ);
                                                        $cnt=1;
                                                        if($query->rowCount() > 0) {
                                                            foreach($results as $result)
                                                            {	
                                                    ?>
                                                <tr>
                                                    <td width="3%">
                                                        &nbsp;
                                                    </td>
                                                    <td width="3%">
                                                        <font color="red">*</font>
                                                    </td>
                                                    <td width="30%">
                                                        Pilihan Sekolah 1
                                                    </td>
                                                    <td width="3%">
                                                        : 
                                                    </td>
                                                    <td>
                                                       <input class="form-control" type="text" name="SekolahKelayakan1" id="SekolahKelayakan1" maxlength="60" size="50" onkeydown="upperCaseF(this)" value="<?php echo htmlentities($result->SekolahKelayakan1); ?>" readonly>
                                                        <!---<input class="textbox" type="text" name="txtnamapengguna" id="txtnamapengguna" maxlength="60" size="50" placeholder="Masukkan nama" onkeydown="upperCaseF(this)">--->
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
                                                        <font color="red">*</font>
                                                    </td>
                                                    <td width="30%">
                                                        Pilihan Sekolah 2
                                                    </td>
                                                    <td width="3%">
                                                        : 
                                                    </td>
                                                    <td>
                                                       <input class="form-control" type="text" name="SekolahKelayakan2" id="SekolahKelayakan2" maxlength="60" size="50" onkeydown="upperCaseF(this)" value="<?php echo htmlentities($result->SekolahKelayakan2); ?>" readonly>
                                                        <!---<input class="textbox" type="text" name="txtnamapengguna" id="txtnamapengguna" maxlength="60" size="50" placeholder="Masukkan nama" onkeydown="upperCaseF(this)">--->
                                                    </td>
                                                    <td width="3%">
                                                        &nbsp; 
                                                    </td>
                                                    <td width="3%">
                                                        &nbsp; 
                                                    </td>
                                                </tr>
                                                <?php }} ?>
                                                <?php 
                                                        $pemid=$_SESSION['pid'];
                                                        $sql = "SELECT * from daftar_muatnaik where pemid=:pemid";
                                                        $query = $dbh->prepare($sql);
                                                        $query -> bindParam(':pemid', $pemid, PDO::PARAM_STR);
                                                        $query->execute();
                                                        $results=$query->fetchAll(PDO::FETCH_OBJ);
                                                        $cnt=1;
                                                        if($query->rowCount() > 0) {
                                                            foreach($results as $result)
                                                            {	
                                                    ?>
                                                <tr>
                                                    <td width="3%">
                                                        &nbsp;
                                                    </td>
                                                    <td width="3%">
                                                        <font color="red">*</font>
                                                    </td>
                                                    <td width="30%">
                                                        Pemohonan Asrama
                                                    </td>
                                                    <td width="3%">
                                                        : 
                                                    </td>
                                                    <td>
                                                       <select name="PemAsrama" class="form-control">
                                                           <option value="<?php echo htmlentities($result->PemAsrama); ?>"><?php echo htmlentities($result->PemAsrama); ?></option>
                                                           <option value="Ya">Ya</option>
                                                           <option value="Tidak">Tidak</option>
                                                        </select>
                                                        <!---<input class="textbox" type="text" name="txtnamapengguna" id="txtnamapengguna" maxlength="60" size="50" placeholder="Masukkan nama" onkeydown="upperCaseF(this)">--->
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
                                                        <font color="red">*</font>
                                                    </td>
                                                    <td width="30%">
                                                        Jarak Kediaman Ke Sekolah Yang Dipohon
                                                    </td>
                                                    <td width="3%">
                                                        : 
                                                    </td>
                                                    <td>
                                                        <select name="JarakAsrama" class="form-control">
                                                            <option value="<?php echo htmlentities($result->JarakAsrama); ?>"><?php echo htmlentities($result->JarakAsrama); ?></option>
                                                           <option value="Kurang 5KM">Kurang 5KM</option>
                                                           <option value="Lebih 10KM">Lebih 10KM</option>
                                                        </select>
                                                    </td>
                                                    <td width="3%">
                                                        Kilometer
                                                    </td>
                                                    <td width="3%">
                                                        &nbsp; 
                                                    </td>
                                                </tr>
                                                <?php }} ?>
                                            </tbody>
                                        </table>
                                        </fieldset>
                                    </td>
                                </tr>
                                <tr align="center">
                                    <td colspan="7">
                                        <button type="submit" class="btn btn-primary" name="edit">Hantar</button>
                                        <!---<input value="Seterusnya" type="button" onclick="window.location='keputusan-upsr.php'">--->
                                        <input class="btn btn-danger" type="reset" value="Isi semula">
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