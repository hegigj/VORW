<?php
include ("Adb.php");
$nipt=$_GET['nipt'];
$sql="delete from user where Unipt='$nipt'";
$sql1="delete from waiter where Unipt='$nipt'";
$sql2="delete from produkt where Unipt='$nipt'";
$sql3="delete from pkategori where Unipt='$nipt'";
$sql4="delete from merchandise where Unipt='$nipt'";
$sql5="delete from rprod where Unipt='$nipt'";
$sql6="delete from link where Unipt='$nipt'";
$sql7="delete from tavolin where Unipt='$nipt'";
$res=$conn->query($sql);
$res1=$conn->query($sql1);
$res2=$conn->query($sql2);
$res3=$conn->query($sql3);
$res4=$conn->query($sql4);
$res5=$conn->query($sql5);
$res6=$conn->query($sql6);
$res7=$conn->query($sql7);
header("Location: AdminManage.php");