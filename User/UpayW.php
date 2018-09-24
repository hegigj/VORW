<?php
include ("Udb.php");
$id=$_GET['id'];
$today=date("Y-m-d");
$sql="UPDATE waiter SET Wdata='$today', Wworktime=0, Wshitje=0 WHERE Wid='$id'";
$res=$conn->query($sql);
header("Location: UserManage.php");