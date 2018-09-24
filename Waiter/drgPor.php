<?php
session_start();
include ("Wdb.php");
$tnr=$_GET['tnr'];
$nipt=$_GET['nipt'];
$pkat=$_GET['kategori'];
$_SESSION["Derguar"]=array($tnr,$nipt,$pkat);
$sql="UPDATE tavolin SET Tporosi=1 WHERE Tnr='$tnr' AND Unipt='$nipt'";
$res=$conn->query($sql);
header("location: WaiterManage.php");