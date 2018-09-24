<?php
include ("Udb.php");
if(isset($_GET['mid'])) {
    $sql = "delete from merchandise where Mid='$_GET[mid]'";
    $res = $conn->query($sql);
    $sql1="delete from link where LIlloj='M' and LIid='$_GET[mid]'";
    $res1 = $conn->query($sql1);
    header("Location: UserManage.php");
}
if(isset($_GET['rpid'])) {
    $sql = "delete from rprod where Rid='$_GET[rpid]'";
    $res = $conn->query($sql);
    $sql1="delete from link where LIlloj='RP' and LIid='$_GET[rpid]'";
    $res1 = $conn->query($sql1);
    header("Location: UserManage.php");
}
