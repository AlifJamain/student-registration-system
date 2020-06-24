<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['pemlogin'])==0) {   
    header('location:index.php');
} else {
    if(isset($_POST['edit'])) {
        $pemid=$_SESSION['pid'];
        $KhatamQuran=$_POST['KhatamQuran'];
        $BilJuzukQuran=$_POST['BilJuzukQuran'];
        $BilSurahQuran=$_POST['BilSurahQuran'];
        
        $NamaPenjaga=$_POST['NamaPenjaga'];
        $KadPengenalanPenjaga=$_POST['KadPengenalanPenjaga'];  
        $TelefonPenjaga=$_POST['TelefonPenjaga'];
        $AlamatPenjaga=$_POST['AlamatPenjaga'];
    
        $sql="UPDATE daftar_penjaga SET KhatamQuran=:KhatamQuran, BilJuzukQuran=:BilJuzukQuran, BilSurahQuran=:BilSurahQuran, NamaPenjaga=:NamaPenjaga, KadPengenalanPenjaga=:KadPengenalanPenjaga, TelefonPenjaga=:TelefonPenjaga, AlamatPenjaga=:AlamatPenjaga where pemid=:pemid";
        
        $query = $dbh->prepare($sql);
        $query->bindParam(':KhatamQuran',$KhatamQuran,PDO::PARAM_STR);
        $query->bindParam(':BilJuzukQuran',$BilJuzukQuran,PDO::PARAM_STR);
        $query->bindParam(':BilSurahQuran',$BilSurahQuran,PDO::PARAM_STR);
        
        $query->bindParam(':NamaPenjaga',$NamaPenjaga,PDO::PARAM_STR);
        
        $query->bindParam(':KadPengenalanPenjaga',$KadPengenalanPenjaga,PDO::PARAM_STR);
        $query->bindParam(':TelefonPenjaga',$TelefonPenjaga,PDO::PARAM_STR);
        $query->bindParam(':AlamatPenjaga',$AlamatPenjaga,PDO::PARAM_STR);
        
        $query->bindParam(':pemid',$pemid,PDO::PARAM_STR);
        $query->execute();
        echo "<script>alert('Maklumat Telah Berjaya Di Simpan.');</script>";
        echo "<script type='text/javascript'> document.location = 'edit-page-verify-5.php'; </script>";
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
$sql = "SELECT * from daftar_penjaga where pemid=:pemid";
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
                                                <h3><strong>&nbsp;&nbsp;Pencapaian Bidang Al-Quran &nbsp;&nbsp;</strong></h3>
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
                                                                    <td width="3%">
                                                                        <center>Khatam Al-Quran</center>
                                                                    </td>
                                                                    <td width="7%">
                                                                        <select name="KhatamQuran" class="form-control">
                                                                            <option value="<?php echo htmlentities($result->KhatamQuran);?>"><?php echo htmlentities($result->KhatamQuran);?></option>
                                                                            <option value="Ya">Ya</option>
                                                                            <option value="Belum">Belum</option>
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="3%">
                                                                        <center>Hafazan Al-Quran</center>
                                                                    </td>
                                                                    <td width="7%">
                                                                        <input placeholder="Bilangan Juzuk Al-Quran" name="BilJuzukQuran" type="text" class="form-control" onkeypress="return isNumberKey(event)" value="<?php echo htmlentities($result->BilJuzukQuran);?>" required/>
                                                                        <input placeholder="Bilangan Surah Dihafaz" name="BilSurahQuran" type="text" class="form-control" onkeypress="return isNumberKey(event)" value="<?php echo htmlentities($result->BilSurahQuran);?>" required/>
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
                                                <h3><strong>&nbsp;&nbsp;Maklumat Ibu/Bapa/Penjaga&nbsp;&nbsp;</strong></h3>
                                            </legend>
                                          <table width="100%">
                                            <tbody>
                                                <tr>
                                                    <td width="3%">
                                                        &nbsp;
                                                    </td>
                                                    <td width="3%">
                                                        <font color="red">*</font>
                                                    </td>
                                                    <td width="30%">
                                                        Nama Penuh
                                                    </td>
                                                    <td width="3%">
                                                        : 
                                                    </td>
                                                    <td>
                                                        <input class="form-control" type="text"  name="NamaPenjaga" id="NamaPenjaga" maxlength="60" onkeydown="upperCaseF(this)" value="<?php echo htmlentities($result->NamaPenjaga);?>" required>
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
                                                        Nombor Kad Pengenalan
                                                    </td>
                                                    <td width="3%">
                                                        : 
                                                    </td>
                                                    <td>
                                                        <input class="form-control" type="text" name="KadPengenalanPenjaga" id="KadPengenalanPenjaga" onkeypress="return isNumberKey(event)" value="<?php echo htmlentities($result->KadPengenalanPenjaga);?>" required>
                                                        <font color="#333333" size="-2"><i>(Masukkan tanpa '-'. Contoh: 871115111111)</i></font>
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
                                                        Nombor Telefon
                                                    </td>
                                                    <td width="3%">
                                                        : 
                                                    </td>
                                                    <td>
                                                        <input class="form-control" type="text" name="TelefonPenjaga" id="TelefonPenjaga" maxlength="12" onkeypress="return isNumberKey(event)" value="<?php echo htmlentities($result->TelefonPenjaga);?>" required>
                                                        <font color="#333333" size="-2"><i>(Masukkan tanpa '-'. Contoh: 0197335072)</i></font>
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
                                                        Alamat
                                                    </td>
                                                    <td width="3%">
                                                        : 
                                                    </td>
                                                    <td>
                                                        <textarea class="form-control" type="text"  name="AlamatPenjaga" id="AlamatPenjaga" maxlength="100" onkeydown="upperCaseF(this)" required><?php echo htmlentities($result->AlamatPenjaga);?></textarea>
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