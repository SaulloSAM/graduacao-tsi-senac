<?php
$db_host = "foxtrot-pi.database.windows.net";
$db_name = "foxtrot";
$user = "TSI";
$password = "SistemasInternet123";
$dsn = "Driver={SQL Server};Server=$db_host;Port=1433;Database=$db_name;";

if(!$db = odbc_connect(	$dsn, $user, $password)){
	echo "Não foi possível acessar o banco de dados";
	exit;
}
?>