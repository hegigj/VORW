<?php
include ("Udb.php");
include ("Ucredchecker.php");
echo "<link rel='stylesheet' href='userStyle.css'>";
echo "<script src='userScript.js' rel='text/javascript'></script>";
echo "<table style='padding-top: 2px;padding-left: 2px;padding-right: 2px' border='0' width='100%'>";
    echo "<tr>";
        echo "<td id='usrCW' style='border: 2px solid green'><p>Register Waiter</p></td>";
        echo "<td style='border:2px solid green;background-color: green;color: white'><p>Manage Waiter</p></td>";
    echo "</tr>";
echo "</table>";
$nuis=$_SESSION['UserNuis'][0];
$sql="select * from waiter where Unipt='$nuis'";
$res=$conn->query($sql);
$nr=1;
$today=date("Y-m-d");
$today1=strtotime($today);
echo "<table width='50%' border='0' style='margin-top: 10px'><tr><td style='background-color: green;width: 50%;color: white' title='Ju e keni paguar kamarierin per kete muaj'>Kamarieri eshte paguar</td><td style='background-color: red;width: 50%;color: white' title='Ju nuk e keni paguar kamarierin per kete muaj dhe duhet ta paguani!!!'>Kamarieri duhet paguar</td></tr></table>";
echo "<table class='usrMWT' width='95%' border='1' style='margin-top:10px;margin-bottom: 10px'>";
echo "<tr><th>Nr:</th><th>Nr. ID</th><th>Emer</th><th>Mbiemer</th><th>Nr. Tel/Mob</th><th>Username</th><th>Password</th><th>Roga ALL</th><th>Ore pune</th><th>Shitje ALL</th><th style='border: 1px solid green;color: green'>Paguaj</th><th style='border: 1px solid red;color: red'>Pusho</th></tr>";
if($res->num_rows>0){
    while($row=$res->fetch_assoc()){
        $id=$row['Wid'];
        $date=strtotime($row["Wdata"]);
        $status=$today1-$date;
        $status1=floor($status/(60*60*24));
        $link="";
        if($status1<30) {
            $col = "green";
        }
        else{
            $col="red";
            $link.="UpayW.php?id=$id";
        }
        echo "<tr>";
        echo "<td style='background-color: $col!important;color: white;width: 2%'>".$nr."</td>";
        echo "<td style='background-color: $col!important;color: white;width: 10%'>".$row['Widcard']."</td>";
        echo "<td style='background-color: $col!important;color: white;width: 9%'>".$row['Wemer']."</td>";
        echo "<td style='background-color: $col!important;color: white;width: 9%'>".$row['Wmbiemer']."</td>";
        echo "<td style='background-color: $col!important;color: white;width: 10%'>".$row['Wtel']."</td>";
        echo "<td style='background-color: $col!important;color: white;width: 10%'>".$row['Wusername']."</td>";
        echo "<td style='background-color: $col!important;color: white;width: 10%'>".$row['Wpassword']."</td>";
        echo "<td style='background-color: $col!important;color: white;width: 8%'>".$row['Wroga']."</td>";
        echo "<td style='background-color: $col!important;color: white;width: 8%'>".$row['Wworktime']."</td>";
        echo "<td style='background-color: $col!important;color: white;width: 10%' title='".$row['Wpkategori']."'>".$row['Wshitje']."</td>";
        echo "<td style='background-color: green!important;width: 8%'><div style='background-color:white;border:1px solid green;font-weight:bold;height: 100%;border-radius: 8px'><a style='text-decoration:none;color:green' href=".$link.">Paguaj</a></div></td>";
        echo "<td style='background-color: red!important;width: 8%'><div style='background-color:white;border:1px solid red;font-weight:bold;height: 100%;border-radius: 8px'><a style='text-decoration:none;color:red' href=UfireW.php?id=".$id.">Pusho</a></div></td>";
        echo "</tr>";
        $nr++;
    }
}
echo "</table>";