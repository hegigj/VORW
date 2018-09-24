<?php
include ("Adb.php");
$today=date("Y-m-d");
$sql2="update user set Udata='$today', Ushitje=0 where Uid='$_GET[id]'";
$res2=$conn->query($sql2);
$sql="select * from user where Uid='$_GET[id]'";
$res=$conn->query($sql);
$row=$res->fetch_assoc();
$nipt=$row['Unipt'];
$sql1="UPDATE produkt SET Psasia=0 Pshitje=0 WHERE Unipt='$nipt'";
$res1=$conn->query($sql1);
header("Location: AdminManage.php");