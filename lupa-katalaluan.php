<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['submit'])) {
    $KataLaluanBaru=$_POST['KataLaluanBaru'];   
    $KadPengenalanPemohon=$_SESSION['KadPengenalanPemohon'];
    
    $con="update pemohon set KataLaluanPemohon=:KataLaluanBaru where IdPemohon=:KadPengenalanPemohon";
    
    $chngpwd1 = $dbh->prepare($con);
    $chngpwd1-> bindParam(':KadPengenalanPemohon', $KadPengenalanPemohon, PDO::PARAM_STR);
    $chngpwd1-> bindParam(':KataLaluanBaru', $KataLaluanBaru, PDO::PARAM_STR);
    $chngpwd1->execute();
    $msg="Kata Laluan Telah Berjaya Ditukar";
}
?>
<!DOCTYPE html>
<html lang="en">
    <!--- HEADER --->
    <head>
        <meta charset="utf-8">
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
                } else if (document.getElementById('KewarganegaraanPemohon').value!="MALAYSIA") {
                    alert("Tidak Layak Memohon Kerana Bukan Rakyat Malaysia");
                    document.getElementById("KewarganegaraanPemohon").focus();
                    return false;
                } else if (document.getElementById('sdka').value!="ADA") {
                    alert("Tidak Layak Memohon Kerana Tiada Sijil");
                    document.getElementById("sdka").focus();
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
            <?php include ('includes/nav-bar.php'); ?>
            <!--- NAVBAR --->
            <!--- ROW 1 --->
            <div class="row">
                <div class="col-md-1">
                    
                </div>
                
                <div class="col-md-10">
                    <?php if($msg){?>
<div class="alert alert-success left-icon-alert" role="alert">
 <strong>Tahniah! </strong><?php echo htmlentities($msg); ?>
 </div><?php } 
else if($error){?>
    <div class="alert alert-danger left-icon-alert" role="alert">
                                            <strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
                                        </div>
                                        <?php } ?>
                    <table  width="100%">
                        <tbody>
                            <form id="form1" name="form1" method="post" onsubmit="return CheckForm();">
                            <tr>
                                <td>
                                    <font color="#FF0000" size="-1">
                                        <i>Maklumat bertanda (*) wajib dimasukkan.</i><br>
                                    </font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <fieldset class="scheduler-border">
                                        <legend class="scheduler-border">
                                            <h3><strong>&nbsp;&nbsp;Lupa Kata Laluan &nbsp;&nbsp;</strong></h3>
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
                                                        Nama Pemohon
                                                    </td>
                                                    <td width="3%">
                                                        : 
                                                    </td>
                                                    <td>
                                                        <input class="form-control" type="text"  name="NamaPemohon" id="NamaPemohon" maxlength="60" onkeydown="upperCaseF(this)" >
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
                                                        Nombor Kad Pengenalan Pemohon
                                                    </td>
                                                    <td width="3%">
                                                        : 
                                                    </td>
                                                    <td>
                                                        <input class="form-control" type="text" name="KadPengenalanPemohon" id="KadPengenalanPemohon" maxlength="12" onkeypress="return isNumberKey(event)" >
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
                                                        &nbsp;
                                                    </td>
                                                    <td width="30%">
                                                        &nbsp;
                                                    </td>
                                                    <td width="3%">
                                                        &nbsp;
                                                    </td>
                                                    <td>
                                                        <font color="#FF0000" size="-1"><i>Nombor Kad Pengenalan Digunakan Sebagai ID Pengguna. </i></font>
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
                                    <input value="Kembali" type="button" onclick="window.location='index.php'" class="btn btn-danger">
                                    <input type="submit" name="reset" id="btndaftar" value="Reset" class="btn btn-primary">
                                    <input name="txtaction" type="hidden" id="txtaction" value="daftarpengguna">
                                    <input type="reset" value="Isi semula" class="btn btn-success">
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
            <?php if(isset($_POST['reset']))
{
$NamaPemohon=$_POST['NamaPemohon'];
$KadPengenalanPemohon=$_POST['KadPengenalanPemohon'];
$sql ="SELECT IdPemohon FROM pemohon WHERE NamaPemohon=:NamaPemohon and KadPengenalanPemohon=:KadPengenalanPemohon";
$query= $dbh -> prepare($sql);
$query-> bindParam(':NamaPemohon', $NamaPemohon, PDO::PARAM_STR);
$query-> bindParam(':KadPengenalanPemohon', $KadPengenalanPemohon, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach ($results as $result) {
    $_SESSION['KadPengenalanPemohon']=$result->IdPemohon;
  } 
    ?>
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <form class="col s12" name="udatepwd" method="post">
                <fieldset class="scheduler-border">
                                        <legend class="scheduler-border">
                                            <h3><strong>&nbsp;&nbsp;Tukar Kata Laluan &nbsp;&nbsp;</strong></h3>
                                        </legend>
                                        <table width="100%">
                                            <tbody>
                                                <tr>
                                                    <td colspan="7">
                                                        <div style="background-color:#FFFFCC">
                                                            <font size="-2">
                                                                Sila masukkan <b>8 Aksara Yang Terdiri Dari Huruf Dan Nombor (sekurang-kurangnya 1 huruf dan nombor)</b> (contoh: BP1ja1nj).
                                                            </font>
                                                        </div>
                                                        <br>
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
                                                        Katalaluan Baru
                                                    </td>
                                                    <td width="3%">
                                                        : 
                                                    </td>
                                                    <td>
                                                        <input class="form-control"  type="password" name="KataLaluanBaru" id="KataLaluanBaru" maxlength="12" onChange="checkpassword()">
                                                        <font color="#333333" size="-2"> <i>(8 aksara sahaja)</i></font>
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
                                                        Sahkan Katalaluan
                                                    </td>
                                                    <td width="3%">
                                                        : 
                                                    </td>
                                                    <td>
                                                        <input class="form-control" type="password" name="SahkanKataLaluanBaru" id="SahkanKataLaluanPemohon" maxlength="12">
                                                        <font color="#333333" size="-2"> <i>(Pastikan sama dengan katalaluan)</i></font>
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
                                                        <input value="Kembali" type="button" onclick="window.location='index.php'" class="btn btn-danger">
                                    <input type="submit" name="submit" id="btndaftar" value="Reset" class="btn btn-primary">
                                    <input name="txtaction" type="hidden" id="txtaction" value="daftarpengguna">
                                    <input type="reset" value="Isi semula" class="btn btn-success">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </fieldset>
                </form>
            </div>
            <div class="col-md-1">  
                </div>
<?php } else{ ?>
<div class="errorWrap" style="margin-left: 2%; font-size:22px;">
 <strong>ERROR</strong> : <?php echo htmlentities("Invalid details");
}?></div>
<?php } ?>
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
                if(a==="MALAYSIA")
                {
                    var arr=["Layak Memohon"];
                } else {
                    var arr=["Tidak Layak Memohon"];
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