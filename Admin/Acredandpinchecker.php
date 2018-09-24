<?php
session_start();
include ("Adb.php");
//Admin Login sessions
if(isset($_POST["Acredsub"])){
    $emer=mysqli_real_escape_string($conn,$_POST["Aemer"]);
    $mbiemer=mysqli_real_escape_string($conn,$_POST["Ambiemer"]);
    $username=mysqli_real_escape_string($conn,$_POST["Ausername"]);
    $password=mysqli_real_escape_string($conn,$_POST["Apassword"]);
    $sql="select Aemer, Ambiemer, Ausername, Apassword from admin where Aemer='$emer' and Ambiemer='$mbiemer' and Ausername='$username' and Apassword='$password'";
    $result=$conn->query($sql);
    if($result->num_rows==1){
        $_SESSION["Acred"]="OK";
        header("Location: AdminLogin.php");
    }
    elseif($result->num_rows==0){
        $_SESSION['Acred']="NO";
        header("Location: AdminLogin.php");
    }
}
if(isset($_POST["Aconpin"])){
    unset($_SESSION["Acred"]);
    $_SESSION["Apinlog"]="OK";
}
if(isset($_POST['Apinsub'])){
    $pin=$_POST['Apin'];
    $sql1="SELECT Aid,Aemer,Ambiemer,Aimg,Apin FROM admin WHERE Apin='$pin'";
    $result1=$conn->query($sql1);
    if($result1->num_rows==1){
            $Adm=$result1->fetch_assoc();
            $Aem=$Adm["Aemer"];
            $Amb=$Adm["Ambiemer"];
            $Aimg=$Adm["Aimg"];
            $admlog=array($Aem,$Amb,$Aimg);
            $_SESSION['Apinlog']=$admlog;
            header("Location: AdminManage.php");
    }
}
//Admin Page Sessions
if(isset($_POST["Alogout"])){
    unset($_SESSION["Apinlog"]);
    unset($_SESSION["city"]);
    unset($_SESSION["nuis"]);
    header("location: AdminLogin.php");
}
if(isset($_POST["createB"])){
    $nipt=$_POST["nipt"];
    $emer=$_POST["emer"];
    $qytet=$_POST["qytet"];
    $adresa=$_POST["adresa"];
    $regjdata=date("Y-m-d");
    $data=date("Y-m-d");
    $tel=$_POST["tel"];
    $email=$_POST["email"];
    $un=$_POST["username"];
    $pass=$_POST["password"];
    $wifiN=$_POST["wifiname"];
    $wifiP=$_POST["wifipass"];
    $sql3="insert into user (Unipt,Uemer,Uqytet,Uadresa,UdataRegj,Udata,Utel,Uemail,Uusername,Upassword,Uip,Ukod) values ('$nipt','$emer','$qytet','$adresa','$regjdata','$data','$tel','$email','$un','$pass','$wifiN','$wifiP')";
    $res=$conn->query($sql3);
    header("location: AdminManage.php");
}
if(isset($_POST["citysub"])){
    $c=$_POST["Qytetet"];
    $_SESSION["city"]=$c;
    header("Location: AdminManage.php");
}
if(isset($_POST["bussub"])){
    $b=$_POST["Subjektet"];
    $_SESSION["nuis"]=$b;
    header("Location: AdminManage.php");
}
if(isset($_POST['percMod'])){
    $unipt=$_POST['unipt'];
    $percent=$_POST['upercent'];
    $sql2="UPDATE user SET Upercent='$percent' WHERE Unipt='$unipt'";
    $res2=$conn->query($sql2);
    header("Location: AdminManage.php");
}