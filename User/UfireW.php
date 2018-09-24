<?php
include ("Udb.php");
$sql="delete from waiter where Wid='$_GET[id]'";
$res=$conn->query($sql);
header("Location: UserManage.php");