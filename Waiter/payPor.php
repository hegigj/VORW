<?php
include ("Wdb.php");
include ("Wcredchecker.php");
$waiter=$_GET['waiter'];
$tnr=$_GET['tnr'];
$tnrf=$tnr*1000;
$nipt=$_GET['nipt'];
$wshitje=$_GET['totali'];
$sql="UPDATE tavolin SET Tnr='', TnrF='$tnrf' where Tnr='$tnr'";
$res=$conn->query($sql);
$sql2="select * from waiter where Widcard='$waiter'";
$res2=$conn->query($sql2);
$row2=$res2->fetch_assoc();
$tsh=$row2['Wshitje'];
$Wshitje=$tsh+$wshitje;
$sql1="UPDATE waiter SET Wshitje='$Wshitje' WHERE Widcard='$waiter'";
$res1=$conn->query($sql1);
if(isset($_SESSION['Derguar'])&&$tnr==$_SESSION['Derguar'][0]&&$nipt==$_SESSION['Derguar'][1]) {
    unset($_SESSION['Derguar']);
}
header("location: WaiterManage.php");