<?php
include ("Wdb.php");
$id=$_GET['id'];
$sql="UPDATE produkt SET Pgjendje='0' where Pid='$id'";
$res=$conn->query($sql);
header("location: WaiterManage.php");