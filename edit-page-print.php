<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['pemlogin'])==0) {   
    header('location:index.php');
} else {
    
?>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<style type="text/css">
    @media print {
  #printPageButton {
    display: none;
  }
}
</style>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <div class="row">
        <div class="col-xs-12">
    		<div class="invoice-title">
    			<center><h2>Slip Pengesahan Permohonan</h2></center>
    		</div>
    		<hr>
    		<div class="row">
    			<div class="col-xs-12">
    				<address>
                        <?php 
                            $pemid=$_SESSION['pid'];
                            $sql = "SELECT * from pemohon where IdPemohon=:pemid";
                            $query = $dbh->prepare($sql);
                            $query -> bindParam(':pemid', $pemid, PDO::PARAM_STR);
                            $query->execute();
                            $results=$query->fetchAll(PDO::FETCH_OBJ);
                            $cnt=1;
                            if($query->rowCount() > 0) {
                                foreach($results as $result)
                                {
                        ?>
    					Nama Pemohon: <?php echo htmlentities ($result->NamaPemohon); ?><br>
    					Kad Pengenalan Pemohon: <?php echo htmlentities ($result->KadPengenalanPemohon); ?><br>
    				</address>
                        <?php }} ?>
    			</div>
    		</div>
    	</div>
    </div>
    
    <div class="row">
    	<div class="col-md-12">
    					<table class="table table-bordered" width="100%">
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
    								<td colspan="2">Sekolah Yang Dipohon</td>
    							</tr>
                                <tr>
        							<td width="3%">Pilihan 1</td>
    								<td width="7%"><?php echo htmlentities ($result->SekolahKelayakan1); ?></td>
    							</tr>
                                <tr>
            						<td>Pilihan 2</td>
    								<td><?php echo htmlentities ($result->SekolahKelayakan2); ?></td>
    							</tr>
                                <tr>
            						<td>Pilihan Pusat Temuduga</td>
    								<td><?php echo htmlentities ($result->TemudugaKelayakan); ?></td>
    							</tr>
                                <?php }} ?>
    						</tbody>
    					</table>
            <div>
    				<div>
    					<table width="100%">
    						<tbody>
    							<tr>
    								<td colspan="2"><font color="red">*</font> Sila Semak Keputusan Panggilan Temuduga Pada 5 Disember, Selepas Jam 5 Petang.</td>
                                    
    							</tr>
                                <tr>
    								<td colspan="2"><font color="red">*</font> Pilihan Pusat Temuduga ini adalah tidak muktamad. Pihak jabatan berhak menentukan pusat temuduga yang lain.</td>
    							</tr>
    							<tr>
    								<td colspan="2"><font color="red">*</font> Sila cetak Slip Pengesahan Permohonan untuk bukti pendaftaran.</td>
    							</tr>
    							<tr>
    								<td colspan="2">&nbsp;</td>
    							</tr>
                                <tr>
    								<td colspan="2"><b>Ini adalah cetakan komputer, tidak perlu tandatangan.</b></td>
    							</tr>
                                <tr>
    								<td colspan="2"></td>
    							</tr>
                                <tr>
    								<td colspan="2"></td>
    							</tr>
    						</tbody>
    					</table>
    				</div>
    		</div>
            <div>
    				<div>
    					<table width="100%">
    						<tbody>
    							<tr>
    								<td colspan="2">&nbsp;</td>
    							</tr>
    						</tbody>
    					</table>
    				</div>
    		</div>
            <button id="printPageButton" onClick="window.print();" class="btn btn-primary">Cetak</button>
            <a class="btn btn-danger" href="edit-page-verify-1.php" id="printPageButton">Kembali</a>
    	</div>
    </div>
</div>
<?php } ?>