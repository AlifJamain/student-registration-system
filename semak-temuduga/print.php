<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style>
#invoice{
    padding: 30px;
}

.invoice {
    position: relative;
    background-color: #FFF;
    min-height: 680px;
    padding: 15px
}

.invoice header {
    padding: 10px 0;
    margin-bottom: 5px;
}

.invoice .company-details {
    text-align: right
}

.invoice .company-details .name {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .contacts {
    margin-bottom: 5px
}

.invoice .invoice-to {
    text-align: left
}

.invoice .invoice-to .to {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .invoice-details {
    text-align: right
}

.invoice .invoice-details .invoice-id {
    margin-top: 0;
    color: #3989c6
}

.invoice main {
    padding-bottom: 50px
}

.invoice main .thanks {
    margin-top: -100px;
    font-size: 2em;
    margin-bottom: 50px
}

.invoice main .notices {
    padding-left: 6px;
    border-left: 6px solid #3989c6
}

.invoice main .notices .notice {
    font-size: 1.2em
}

.invoice table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
    margin-bottom: 20px
}

.invoice table td,.invoice table th {
    border-bottom: 1px solid #fff
}

.invoice table th {
    white-space: nowrap;
    font-weight: 400;
    font-size: 16px
}

.invoice table td h3 {
    margin: 0;
    font-weight: 400;
    color: #3989c6;
    font-size: 1.2em
}

.invoice table .qty,.invoice table .total,.invoice table .unit {
    text-align: right;
    font-size: 1.2em
}

.invoice table .no {
    color: #fff;
    font-size: 1.6em;
    background: #3989c6
}

.invoice table .unit {
    background: #ddd
}

.invoice table .total {
    background: #3989c6;
    color: #fff
}

.invoice table tbody tr:last-child td {
    border: none
}

.invoice table tfoot td {
    background: 0 0;
    border-bottom: none;
    white-space: nowrap;
    text-align: right;
    padding: 10px 20px;
    font-size: 1.2em;
    border-top: 1px solid #aaa
}

.invoice table tfoot tr:first-child td {
    border-top: none
}

.invoice table tfoot tr:last-child td {
    color: #3989c6;
    font-size: 1.4em;
    border-top: 1px solid #3989c6
}

.invoice table tfoot tr td:first-child {
    border: none
}

.invoice footer {
    width: 100%;
    text-align: center;
    color: #777;
    border-top: 1px solid #aaa;
    padding: 8px 0
}

@media print {
    .invoice {
        font-size: 11px!important;
        overflow: hidden!important
    }

    .invoice footer {
        position: absolute;
        bottom: 10px;
        page-break-after: always
    }

    .invoice>div:last-child {
        page-break-before: always
    }
}
</style>
<style type="text/css">
    @media print {
  #printPageButton {
    display: none;
  }
}
</style>
<!------ Include the above in your HEAD tag ---------->

<!--Author      : @arboshiki-->
<div id="invoice">

    <div class="toolbar hidden-print">
        <div class="text-right">
            <button id="printPageButton" onClick="window.print();" class="btn btn-primary">Print</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-danger" href="index.php" id="printPageButton">Kembali</a>
        </div>
        <hr>
    </div>
    <div class="invoice overflow-auto">
        <div style="min-width: 600px">
            <?php
// code Student Data
    $NamaPemohon=$_SESSION['NamaPemohon'];
$KadPengenalanPemohon=$_SESSION['KadPengenalanPemohon'];

$qery = "SELECT   pemohon.NamaPemohon,pemohon.KadPengenalanPemohon,pemohon.IdPemohon,pemohon.Status, daftar_penjaga.*, kelayakan.* from pemohon join kelayakan on pemohon.IdPemohon=kelayakan.pemid join daftar_penjaga on daftar_penjaga.pemid=pemohon.IdPemohon  where pemohon.NamaPemohon=:NamaPemohon and pemohon.KadPengenalanPemohon=:KadPengenalanPemohon";
$stmt = $dbh->prepare($qery);
$stmt->bindParam(':NamaPemohon',$NamaPemohon,PDO::PARAM_STR);
$stmt->bindParam(':KadPengenalanPemohon',$KadPengenalanPemohon,PDO::PARAM_STR);
$stmt->execute();
$resultss=$stmt->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($stmt->rowCount() > 0)
{
foreach($resultss as $row)
{   ?>
            <header><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
                <div class="row">
                    <div class="col">
                        &nbsp;
                    </div>
                    
                    <div class="col company-details">
                        <table>
                            <thead>
                                <td class="text-right" width="55%">Rujukan Kami</td>
                                <td class="text-right" width="2%">:</td>
                                <td class="text-right" width="40%">JAINJ.BPI.301.02/177/13 Jld 4(25)</td>
                            </thead>
                            <tbody>
                                <td class="text-right">Tarikh</td>
                                <td class="text-right">:</td>
                                <td class="text-right">05 Disember 2019</td>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p><b><?php echo htmlentities($row->NamaPemohon);?></b><br>
                        <?php echo htmlentities($row->AlamatPenjaga);?></p>
                    </div>
                    
                    <div class="col company-details">
                        &nbsp;
                    </div>
                </div>
            </header>
            <main>
                <div class="row contacts">
                    <div class="col invoice-to">
                        <div>Tuan,</div>
                        <p><b>UJIAN KELAYAKAN KEMASUKAN PELAJAR KE SEKOLAH MENENGAH AGAMA NEGERI JOHOR TAHUN 2020</b></p>
                        <p>Sukacita dimaklumkan saudara/saudari telah terpilih untuk menghadiri ujian kelayakan ke SMA Negeri Johor Tingkatan 1 tahun 2020.</p>
                    </div>
                </div>
                <div class="row contacts">
                    <div class="col invoice-to">
                        <div>2. Sehubungan dengan itu, saudara/saudari dikehendaki hadir sebagaimana ketetapan berikut: </div>
                        <div>
                        <table width="100%">
                            <thead>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>2.1</td>
                                    <td>&nbsp;</td>
                                    <td>Tarikh</td>
                                    <td >:</td>
                                    <td><b><?php echo htmlentities($row->TarikhTemuduga);?> (<?php echo htmlentities($row->HariTemuduga);?>)</b></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>2.2</td>
                                    <td>&nbsp;</td>
                                    <td>Masa</td>
                                    <td>:</td>
                                    <td><b>8.00 pagi</b></td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>2.3</td>
                                    <td>&nbsp;</td>
                                    <td>Tempat</td>
                                    <td>:</td>
                                    <td><b><?php echo htmlentities($row->TemudugaKelayakan);?></b></td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>2.5</td>
                                    <td>&nbsp;</td>
                                    <td>Pakaian</td>
                                    <td>:</td>
                                    <td><b>Pakaian Seragam Sekolah (Bersongkok dan Bertudung)</b></td>
                                </tr>
                            </tbody>
                        </table></div>
                    </div>
                </div>
                 <div class="row contacts">
                    <div class="col invoice-to">
                        <div>3. Saudara/saudari dikehendaki hadir dengan membawa keperluan seperti berikut: </div>
                        <div>
                         <table width="100%">
                            <thead>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>3.1</td>
                                    <td>&nbsp;</td>
                                    <td><b>Kad Pengenalan ASAL</b></td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>3.2</td>
                                    <td>&nbsp;</td>
                                    <td><b>Slip Keputusan UPSR ASAL</b></td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>3.3</td>
                                    <td>&nbsp;</td>
                                    <td><b>Al Quran</b></td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>3.4</td>
                                    <td>&nbsp;</td>
                                    <td><b>Alat Tulis</b></td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>3.5</td>
                                    <td>&nbsp;</td>
                                    <td><b>Surat Panggil Temuduga</b></td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
                <div class="row contacts">
                    <div class="col invoice-to">
                        <div>4. Untuk makluman saudara/saudari soalan ujian kelayakan merangkumi pemahaman <b>Bahasa Melayu, Bahasa Inggeris, Matematik, Sains, Tajwid, Bahasa Arab dan Kemahiran Berfikir Aras Tinggi (KBAT).</b></div>
                        <div></div>
                    </div>
                </div>
                <div class="row contacts">
                    <div class="col invoice-to">
                        <div>5. Kegagalan menghadiri Ujian Kelayakan adalah dianggap menolak tawaran ini. Calon yang lewat hadir selepas jam 1.00 tengahhari <b>tidak dibenarkan</b> menduduki ujian kelayakan ini.</div>
                        <div></div>
                    </div>
                </div>
                <div class="row contacts">
                    <div class="col invoice-to">
                        <div>6. Keputusan temuduga dan ujian kelayakan boleh disemak bermula <b>15 Disember 2019 sepelas jam 2 petang</b> melalui laman web.</div>
                        <div></div>
                    </div>
                </div>
                <div class="row contacts">
                    <div class="col invoice-to">
                        <div><b>Sekian, untuk makluman dan tindakan saudara/saudari selanjutnya. Terima kasih.</b></div>
                        <div></div>
                    </div>
                </div>
            </main>
            <footer>
                Ini adalah cetakan komputer, tanda tangan tidak diperlukan
            </footer>
            <?php }

    ?>
        </div>
        <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
        <div></div>
    </div>
</div>
<?php } ?>
<script>
     $('#printInvoice').click(function(){
            Popup($('.invoice')[0].outerHTML);
            function Popup(data) 
            {
                window.print();
                return true;
            }
        });
</script>