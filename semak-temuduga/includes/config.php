<?php 
define('DB_HOST','localhost'); //nama host
define('DB_USER','daftarsm_smanj'); //nama username
define('DB_PASS',',!J+dFm#])82'); //katalaluan
define('DB_NAME','daftarsm_smanj'); //nama database yang telah dibuat sebelumnya
//untuk penyambungan ke server
try
{
    //$dbh -> nama variable yang kita cipta sendiri. Nama yang dicipta tidak kisah, tetapi programmer mesti ingat nama variable untuk digunakan akan datang
$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}
?>