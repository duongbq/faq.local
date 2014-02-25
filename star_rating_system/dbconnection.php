<?php
/* Database config */

$db_host		= 'localhost'; //Mostly it will be localhost
$db_user		= 'root';
$db_pass		= 'root';
$db_database	= 'prathamam';

/* End config */

$link = mysql_connect($db_host,$db_user,$db_pass) or die('Unable to establish a DB connection');
mysql_select_db($db_database,$link);
mysql_query("SET names UTF8");
?>
