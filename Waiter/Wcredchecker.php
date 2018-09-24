<?php
include ("Wdb.php");
session_start();
if(isset($_POST["waitlog"])){
    $usrn=$_POST["waitnam"];
    $pass=$_POST["waitpass"];
    $sql="select * from waiter where Wusername='$usrn' and Wpassword='$pass'";
    $res=$conn->query($sql);
    if($res->num_rows>0){
        $row=$res->fetch_assoc();
        $nipt=$row['Unipt'];
        $idcard=$row['Widcard'];
        $emr=$row['Wemer'];
        $mbiemr=$row['Wmbiemer'];
        $pkat=$row['Wpkategori'];
        $time=time();
        $waitlgn=array($nipt,$idcard,$emr,$mbiemr,$pkat,$time);
        $_SESSION['WaitLogin']=$waitlgn;
        header("location: WaiterManage.php");
    }
}
if(isset($_POST['waitOrder'])){
    unset($_SESSION['waitStat']);
    $_SESSION['waitOrder']="OK";
    header("location: WaiterManage.php");
}
if(isset($_POST['waitStatus'])){
    unset($_SESSION['waitOrder']);
    $_SESSION['waitStat']="OK";
    header("location: WaiterManage.php");
}
if(isset($_POST['waitLogout'])){
    unset($_SESSION['Derguar']);
    unset($_SESSION['waitStat']);
    unset($_SESSION['waitOrder']);
    $lgonipt=$_SESSION['WaitLogin'][0];
    $lgoid=$_SESSION['WaitLogin'][1];
    $lgotin=$_SESSION['WaitLogin'][5];
    $lgotout=time();
    $lgodiff=$lgotout-$lgotin;
    $wtime=$lgodiff/3600;
    $sql1="SELECT * FROM waiter WHERE Unipt='$lgonipt' and Widcard='$lgoid'";
    $res1=$conn->query($sql1);
    if($res1->num_rows==1) {
        $row1 = $res1->fetch_assoc();
        $wrktm = $row1['Wworktime'];
        $wrktm += $wtime;
        $sql2 = "UPDATE waiter SET Wworktime='$wrktm' where Unipt='$lgonipt' and Widcard='$lgoid'";
        $res2 = $conn->query($sql2);
        unset($_SESSION['WaitLogin']);
        header("location: WaiterLogin.php");
    }
}