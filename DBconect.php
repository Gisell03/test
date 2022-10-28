<?php
$db_host="b7ebj5x4vmkrzjzxbsyb-mysql.services.clever-cloud.com"; //localhost server 
$db_user="uq7biqqrwvtadijq";	//database username
$db_password="TOlllRkGcFgCy9TtKkdz";	//database password   
$db_name="b7ebj5x4vmkrzjzxbsyb";	//database name

try
{
	$db=new PDO("mysql:host={$db_host};dbname={$db_name}",$db_user,$db_password);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOEXCEPTION $e)
{
	$e->getMessage();
}

?>



