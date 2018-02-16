<?php 
function connect($base,$param)
{
include_once($param.".inc.php");
$dsn="mysql:host=".MYHOST.";dbname=".$base;

try{
$idc=new PDO($dsn,USER,PASSWORD);
return $idc;
}
catch(PDOException $e)
{ return FALSE;}
}
 ?>