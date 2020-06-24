<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])=="") {   
    header("Location: index.php"); 
} else {
    if(isset($_POST['submit'])){
        if(isset($_POST['IdPemohon'])) {
		foreach ($_POST['IdPemohon'] as $IdPemohon) {
            $TarikhTemuduga=$_POST['TarikhTemuduga'];
            $HariTemuduga=$_POST['HariTemuduga'];
            $Status=1;
            $sql="UPDATE kelayakan SET TarikhTemuduga=:TarikhTemuduga, HariTemuduga=:HariTemuduga where pemid=:IdPemohon";
            $sql1="UPDATE pemohon SET Status=:Status where IdPemohon=:IdPemohon";
            $query = $dbh->prepare($sql);
            $query1 = $dbh->prepare($sql1);
            $query->bindParam(':TarikhTemuduga',$TarikhTemuduga,PDO::PARAM_STR);
            $query->bindParam(':HariTemuduga',$HariTemuduga,PDO::PARAM_STR);
            $query1->bindParam(':Status',$Status,PDO::PARAM_STR);
            $query->bindParam(':IdPemohon',$IdPemohon,PDO::PARAM_STR);
            $query1->bindParam(':IdPemohon',$IdPemohon,PDO::PARAM_STR);
            $query->execute();
            $query1->execute();
            $msg="Kemaskini Berjaya";
        }
        }
    }
    if(isset($_POST['reject'])){
        if(isset($_POST['IdPemohon'])) {
		foreach ($_POST['IdPemohon'] as $IdPemohon) {
            $Status=2;
            $sql1="UPDATE pemohon SET Status=:Status where IdPemohon=:IdPemohon";
            $query1 = $dbh->prepare($sql1);
            $query1->bindParam(':Status',$Status,PDO::PARAM_STR);
            $query1->bindParam(':IdPemohon',$IdPemohon,PDO::PARAM_STR);
            $query1->execute();
            $msg="Kemaskini Berjaya";
        }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sistem Pendaftaran Pelajar</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" >
        <link rel="stylesheet" href="css/prism/prism.css" media="screen" > <!-- USED FOR DEMO HELP - YOU CAN REMOVE IT -->
        <link rel="stylesheet" type="text/css" href="js/DataTables/datatables.min.css"/>
        <link rel="stylesheet" href="css/main.css" media="screen">
        <script src="js/modernizr/modernizr.min.js"></script>
        <style>
            .errorWrap {
                padding: 10px;
                margin: 0 0 20px 0;
                background: #fff;
                border-left: 4px solid #dd3d36;
                -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
                box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
            }
            
            .succWrap{
                padding: 10px;
                margin: 0 0 20px 0;
                background: #fff;
                border-left: 4px solid #5cb85c;
                -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
                box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
            }
        </style>
    </head>
    
    <body class="top-navbar-fixed">
        <div class="main-wrapper">
            <!-- ========== TOP NAVBAR ========== -->
            <?php include('includes/topbar.php');?> 
            <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
            
            <div class="content-wrapper">
                <div class="content-container">
                    
                    <?php include('includes/leftbar.php');?>  
                    <div class="main-page">
                        <form method="post">
                        <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-md-12">
                                    <h2 class="title">Maahad Johor Lil Banat</h2>
                                </div>
                            </div>
                            <div class="row breadcrumb-div">
                                <div class="col-md-12">
                                    <ul class="breadcrumb">
                                        <li><a href="dashboard.php"><i class="fa fa-home"></i> Utama</a></li>
                                        <li> Senarai Pemohonan</li>
            							<li class="active">Maahad Johor Lil Banat</li>
            						</ul>
                                </div>
                            </div>
                            <div class="row breadcrumb-div">
                                <div class="col-md-3">
                                    <input type="date" name="TarikhTemuduga" class="form-control" placeholder="TarikhTemuduga">
                                </div>
                                <div class="col-md-3">
                                    <input type="text" name="HariTemuduga" class="form-control" placeholder="Hari Temuduga" onkeydown="upperCaseF(this)">
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" name="submit" class="btn btn-primary">Terima</button>&nbsp;&nbsp;
                                    <button type="submit" name="reject" class="btn btn-danger">Tolak</button>
                                </div>
                            </div>
                        </div>
                        <section class="section">
                            
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel">
                                            <?php if($msg){?>
                                            <div class="alert alert-success left-icon-alert" role="alert">
                                                <strong>Tahniah! </strong><?php echo htmlentities($msg); ?>
                                            </div><?php } else if($error){?>
                                            <div class="alert alert-danger left-icon-alert" role="alert">
                                            <strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
                                            </div>
                                            <?php } ?>
                                            
                                            <div class="panel-body p-20">
                                                
                                                    
                                                <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th><input type="checkbox" id="checkBoxAll" class="form-control"></th>
                                                            <th>Nama Pemohon</th>
                                                            <th>Kad Pengenalan Pemohon</th>
                                                            <th>Merit</th>
                                                            <th>UPSR</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
<?php 
        $sql = "SELECT kelayakan.IdKelayakan as lid, pemohon.NamaPemohon, pemohon.KadPengenalanPemohon,pemohon.IdPemohon, pemohon.Status, kelayakan.output, kelayakan.TemudugaKelayakan, kelayakan.SekolahKelayakan1, kelayakan.PPSR from kelayakan join pemohon on kelayakan.pemid=pemohon.IdPemohon where kelayakan.TemudugaKelayakan='SMA Kerajaan Johor, Kluang' and kelayakan.SekolahKelayakan1='Maahad Johor Lil Banat (Ditempatkan di SMAKJ - Perempuan Sahaja)' order by lid asc";
        
$query = $dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{   ?>
<tr>
 <td><?php echo htmlentities($cnt);?></td>
    <td><input type="checkbox" class="chkCheckBoxId" value="<?php echo $result->IdPemohon;?>" name="IdPemohon[]"></td>
                                                            <td><?php echo htmlentities($result->NamaPemohon);?></td>
                                                            <td><?php echo htmlentities($result->KadPengenalanPemohon);?></td>
    <td><?php echo htmlentities($result->output);?></td>
    <td><?php echo htmlentities($result->PPSR);?></td>
    <td><?php $stats=$result->Status;
if($stats==1){
                                             ?>
                                                 <span style="color: green">Berjaya</span>
                                                 <?php } if($stats==2)  { ?>
                                                <span style="color: red">Gagal</span>
                                                 <?php } if($stats==0)  { ?>
 <span style="color: blue">Belum Disahkan</span>
 <?php } ?>


                                             </td>
</tr>
<?php $cnt=$cnt+1;}} ?>
                                                       
                                                    
                                                    </tbody>
                                                </table>

                                         
                                                <!-- /.col-md-12 -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                                <!-- /.col-md-12 -->
                            </div>
                                        <!-- /.panel -->
                                    <!-- /.col-md-6 -->

                                <!-- /.row -->

                            <!-- /.container-fluid -->
                
                        </section>
                        <!-- /.section -->
                        </form>
                    </div>
                    
                    <!-- /.main-page -->

                    

                </div>
                <!-- /.content-container -->
            </div>
            <!-- /.content-wrapper -->

        </div>
        <!-- /.main-wrapper -->
    </body>
        <!-- ========== COMMON JS FILES ========== -->
        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>

        <!-- ========== PAGE JS FILES ========== -->
        <script src="js/prism/prism.js"></script>
        <script src="js/DataTables/datatables.min.js"></script>

        <!-- ========== THEME JS ========== -->
        <script src="js/main.js"></script>
        <script>
            $(function($) {
                $('#example').DataTable();

                $('#example2').DataTable( {
                    "scrollY":        "300px",
                    "scrollCollapse": true,
                    "paging":         false
                } );

                $('#example3').DataTable();
            });
        </script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#checkBoxAll').click(function() {
			if ($(this).is(":checked"))
				$('.chkCheckBoxId').prop('checked', true);
			else
				$('.chkCheckBoxId').prop('checked', false);
		});
	});
</script>
<script>
function upperCaseF(a) {
            setTimeout(function(){
                a.value = a.value.toUpperCase();
            }, 1);
        }
</script>
</html>
<?php } ?>

