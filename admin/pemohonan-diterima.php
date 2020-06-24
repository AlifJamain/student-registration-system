<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])=="") {   
    header("Location: index.php"); 
} else {
    if(isset($_GET['IdPemohon']))
    {
        $IdPemohon=intval($_GET['IdPemohon']);
        $Status=0;
        $sql="update pemohon set Status=:Status where IdPemohon=:IdPemohon ";
        $query = $dbh->prepare($sql);
        $query->bindParam(':Status',$Status,PDO::PARAM_STR);
        $query->bindParam(':IdPemohon',$IdPemohon,PDO::PARAM_STR);
        $query->execute();
    }
    
    if(isset($_GET['pemid']))
    {
        $pemid=intval($_GET['pemid']);
        $Status=2;
        $sql="update pemohon set Status=:Status where IdPemohon=:pemid ";
        $query = $dbh->prepare($sql);
        $query->bindParam(':Status',$Status,PDO::PARAM_STR);
        $query->bindParam(':pemid',$pemid,PDO::PARAM_STR);
        $query->execute();
    }

?>
<!DOCTYPE html>
<html lang="en">
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
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
        <script src="filtable.js"></script>

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
            .filterable {
    margin-top: 15px;
}
.filterable .panel-heading .pull-right {
    margin-top: -20px;
}
.filterable .filters input[disabled] {
    background-color: transparent;
    border: none;
    cursor: auto;
    box-shadow: none;
    padding: 0;
    height: auto;
}
.filterable .filters input[disabled]::-webkit-input-placeholder {
    color: #333;
}
.filterable .filters input[disabled]::-moz-placeholder {
    color: #333;
}
.filterable .filters input[disabled]:-ms-input-placeholder {
    color: #333;
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
                        <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-md-12">
                                    <h2 class="title">Senarai Nama Pemohon</h2>
                                </div>
                            </div>
                            
                            <div class="row breadcrumb-div">
                                <div class="col-md-12">
                                    <ul class="breadcrumb">
                                        <li><a href="dashboard.php"><i class="fa fa-home"></i> Utama</a></li>
                                        <li> Senarai Nama</li>
            							<li class="active">Senarai Nama Pemohon</li>
            						</ul>
                                </div>
                            </div>
                        </div>
                        <section class="section">
                            <form method="post">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel">
                                            <?php if($msg){?>
                                            <div class="alert alert-success left-icon-alert" role="alert">
                                                <strong>Tahniah!</strong><?php echo htmlentities($msg); ?>
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
                                                            <th>Nama Pemohon</th>
                                                            <th>Kad Pengenalan Pemohon</th>
                                                            <th>Merit</th>
                                                            <th>PPSR</th>
                                                            <th>Pilihan Sekolah 1</th>
                                                            <th>Pilihan Sekolah 2</th>
                                                            <th>Pusat Temuduga</th>
                                                            <th>Jumlah</th>
                                                            <th>Tindakan</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Nama Pemohon</th>
                                                            <th>Kad Pengenalan Pemohon</th>
                                                            <th>Merit</th>
                                                            <th>PPSR</th>
                                                            <th>Pilihan Sekolah 1</th>
                                                            <th>Pilihan Sekolah 2</th>
                                                            <th>Pusat Temuduga</th>
                                                            <th>Jumlah</th>
                                                            <th>Tindakan</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
<?php 
        $sql = "SELECT pemohon.*, kelayakan.*, markah.output as result from pemohon join kelayakan on pemohon.IdPemohon=kelayakan.pemid join markah on markah.pemid=pemohon.IdPemohon where pemohon.Status=0";
        
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
                                                            <td><?php echo htmlentities($result->NamaPemohon);?></td>
                                                            <td><?php echo htmlentities($result->KadPengenalanPemohon);?></td>
    <td><?php echo htmlentities($result->output);?></td>
    <td><?php echo htmlentities($result->PPSR);?></td>
    <td><?php echo htmlentities($result->SekolahKelayakan1);?></td>
    <td><?php echo htmlentities($result->SekolahKelayakan2);?></td>
    <td><?php echo htmlentities($result->TemudugaKelayakan);?></td>
    <td><?php echo htmlentities($result->result);?></td>
<td>
<a href="pemohonan-diterima.php?IdPemohon=<?php echo htmlentities($result->IdPemohon);?>" onclick="confirm('Permohonan Diterima');"><i class="fa fa-check" title="Acticvate Record"></i></a>&nbsp;&nbsp;&nbsp;<a href="pemohonan-diterima.php?pemid=<?php echo htmlentities($result->IdPemohon);?>" onclick="confirm('Permohonan Ditolak');"><i class="fa fa-times" title="Deactivate Record"></i> </a>
</td>
</tr>
<?php $cnt=$cnt+1;}} ?>
                                                       
                                                    
                                                    </tbody>
                                                </table>

                                         
                                                <!-- /.col-md-12 -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.col-md-6 -->

                                                               
                                                </div>
                                                <!-- /.col-md-12 -->
                                            </div>
                                        </div>
                                        <!-- /.panel -->
                                    </div>
                                    <!-- /.col-md-6 -->

                                </div>
                                <!-- /.row -->

                            </div>
                            <!-- /.container-fluid -->
                </form>
                        </section>
                        <!-- /.section -->

                    </div>
                    <!-- /.main-page -->

                    

                </div>
                <!-- /.content-container -->
            </div>
            <!-- /.content-wrapper -->

        </div>
        <!-- /.main-wrapper -->

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
    </body>
</html>
<?php } ?>

