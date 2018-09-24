<?php
include ("Udb.php");
$sql="delete from produkt where Pid='$_GET[id]'";
$res=$conn->query($sql);
header("Location: UserManage.php");