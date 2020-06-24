<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['bugisiahlogin'])=="") {   
    header("Location: index.php"); 
} else {
    $pid=$_SESSION['bugisiahlogin'];
    $lid=intval($_GET['IdPemohon']);
    if(isset($_POST['submit']))
    { 
        $BertulisMarkah=$_POST['BertulisMarkah'];
        $QuranMarkah=$_POST['QuranMarkah'];
        $output=$_POST['output'];
        $sql="UPDATE markah SET BertulisMarkah=:BertulisMarkah, QuranMarkah=:QuranMarkah, output=:output WHERE pemid=:lid";
        $query = $dbh->prepare($sql);
        $query->bindParam(':BertulisMarkah',$BertulisMarkah,PDO::PARAM_STR);
        $query->bindParam(':QuranMarkah',$QuranMarkah,PDO::PARAM_STR);
        $query->bindParam(':output',$output,PDO::PARAM_STR);
        $query->bindParam(':lid',$lid,PDO::PARAM_STR);
        $query->execute();
        $msg="Tambah Markah Berjaya";
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
                                        
                     <div class="main-page">
                        <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-md-12">
                                    <h2 class="title">Sekolah Menengah Agama Bugisiah</h2>
                                </div>
                                
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
            							<li><a href="dashboard.php"><i class="fa fa-home"></i> Utama</a></li>
            							<li><a href="#">Markah</a></li>
            							<li class="active">Sekolah Menengah Agama Bugisiah</li>
            						</ul>
                                </div>
                               
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.container-fluid -->

                        <section class="section">
                            <div class="container-fluid">

                             

                              

                                <div class="row">
                                    <div class="col-md-8 col-md-offset-2">
                                        <div class="panel">
                                            <div class="panel-heading">
                                            </div>
           <?php if($msg){?>
<div class="alert alert-success left-icon-alert" role="alert">
 <strong>Well done!</strong><?php echo htmlentities($msg); ?>
 </div><?php } 
else if($error){?>
    <div class="alert alert-danger left-icon-alert" role="alert">
                                            <strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
                                        </div>
                                        <?php } ?>
  
                                            <div class="panel-body">

                                                <form method="post">
                                                       <div class="form-group has-success">
                                                        <label for="success" class="control-label">Markah Bertulis</label>
                                                        <div class="">
                                                            <input type="text" name="BertulisMarkah" required="required" class="form-control" id="BertulisMarkah" onchange="calculate()" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group has-success">
                                                        <label for="success" class="control-label">Markah Quran</label>
                                                        <div class="">
                                                            <input type="text" name="QuranMarkah" class="form-control" required="required" id="QuranMarkah" onchange="calculate()" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group has-success">
                                                        <label for="success" class="control-label">Markah Keseluruhan (%)</label>
                                                        <div class="">
                                                            <input type="text" name="output" class="form-control" required="required" id="output" onchange="calculate()" readonly>
                                                        </div>
                                                    </div>
  <div class="form-group has-success">

                                                        <div class="">
                                                           <button type="submit" name="submit" class="btn btn-success btn-labeled">Submit<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
                                                            <a href="pemohonan-bugisiah.php" class="btn btn-danger btn-labeled">Kembali<span class="btn-label btn-label-right"><i class="fa fa-close"></i></span></a>
                                                    </div>


                                                    
                                                </form>

                                              
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.col-md-8 col-md-offset-2 -->
                                </div>
                                <!-- /.row -->

                               
                               

                            </div>
                            <!-- /.container-fluid -->
                        </section>
                        <!-- /.section -->

                    </div>
                                        <!-- /.panel -->
                                    </div>
                                    <!-- /.col-md-6 -->

                                </div>
                                <!-- /.row -->

                            </div>
                            <!-- /.container-fluid -->
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
        <script>

function calculate()
            {
                var b=document.getElementById("BertulisMarkah").value;
                var c=document.getElementById("QuranMarkah").value;
                //var total = ((a/1) - (- (b/1)) - (- (d/1)));
                var total2 = ((b * 50) / 100);
                var total3 = ((c * 50) / 100);
                //var total4 = a / 50;
                //var total5 = b / 50;
                //var total6 = c / 50;
                var total7 = (total2 - ( - total3)).toFixed(1);
                document.getElementById("output").value=total7;
                var a=document.getElementById("output").value;
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
</script>
    </body>
</html>
<?php } ?>

