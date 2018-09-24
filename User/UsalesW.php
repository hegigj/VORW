<?php
include ("Udb.php");
include ("Ucredchecker.php");
echo "<link rel='stylesheet' href='userStyle.css'>";
echo "<script src='userScript.js' rel='text/javascript'></script>";
$nuis=$_SESSION['UserNuis'][0];
$sum=0;
$sum1=0;
$sum2=0;
$sql1="select * from pkategori where Unipt='$nuis'";
$res1=$conn->query($sql1);
if($res1->num_rows>0){
    echo "<h1 style='color: green;font-weight: bold;text-decoration: underline'>SHITJET(muaji ".date('m').")</h1>";
    while ($row1 = $res1->fetch_assoc()) {
        $pk=$row1['Pkategori'];
        echo "<table width='95%' border='1' style='border:2px solid green;margin-top:10px;margin-bottom: 20px'>";
        echo "<tr><th colspan='8' style='font-weight: bold;font-size: 15pt'>Kategorite e Produkteve</th></tr>";
        echo "<tr><td colspan='8'>".$pk."</td></tr>";
        echo "<tr><th>Nr:</th><th>Emri</th><th>Njesia</th><th>Sasia e Shitur</th><th>Cmimi</th><th>Totali i Shitjeve</th><th style='border: 1px solid green;color: green'>Vlera</th></tr>";
        $nr=1;
        $sql="select * from produkt where Unipt='$nuis' and Pkategori='$pk'";
        $res=$conn->query($sql);
        while ($row = $res->fetch_assoc()){
            $id = $row['Pid'];
            echo "<tr>";
            echo "<td style='background-color:;color: green;width: 5%'>".$nr . "</td>";
            echo "<td style='background-color:;color: green;width: 15%' title='".$row['Ppershkrim']."'>".$row['Pemer'] ."</td>";
            echo "<td style='background-color:;color: green;width: 10%'>".$row['Pnjesia']."</td>";
            echo "<td style='background-color:;color: green;width: 10%'>".$row['Psasia'] ."</td>";
            echo "<td style='background-color:;color: green;width: 10%'>".$row['Pcmimi'] ." ALL</td>";
            echo "<td style='background-color:;color: green;width: 30%'>".$row['Pshitje'] ."</td>";
            echo "<td style='background-color:;color: green;width: 20%'>ALL</td>";
            echo "</tr>";
            $nr++;
        }
        echo "</table>";
    }
}
echo "<table width='95%' border='1' style='border:2px solid green;margin-top:10px;margin-bottom: 20px'>";
$sql2="select Pshitje from produkt where Unipt='$nuis'";
$res2=$conn->query($sql2);
if($res2->num_rows>0){
    while($row2=$res2->fetch_assoc()){
        $sum+=$row2['Pshitje'];
    }
    $sql5="update user set Ushitje='$sum'";
    $res5=$conn->query($sql5);
    echo "<tr><th style='width: 50%;color: green;font-weight: bold;font-size: 20pt'>Totali i Shitjeve</th><th style='width: 30%;color: green'>".$sum."</th><th style='color: green;border: none;width: 20%;font-weight: bold;font-size: 20pt'>ALL</th></tr>";
}
echo "</table>";
echo "<table width='95%' border='1' style='border:2px solid red;margin-top:10px;margin-bottom: 20px'>";
echo "<tr><th style='width: 50%;color: red;font-weight: bold;font-size: 20pt'>TVSH per tu paguar</th><th style='width: 30%;color: red'>".($sum*0.2)."</th><th style='color: red;border: none;width: 20%;font-weight: bold;font-size: 20pt'>ALL</th></tr>";
echo "</table>";
echo "<hr>";
echo "<h1 style='margin-right: 90%;font-size: 20pt;font-weight: bold;color: red'>-</h1>";
echo "<hr>";
echo "<h1 style='color: red;font-weight: bold;text-decoration: underline'>INVENTARI PERDORUR(muaji ".date('m').")</h1>";
echo "<table width='95%' border='1' style='border:2px solid red;margin-top:10px;margin-bottom: 20px'>";
echo "<tr><th colspan='9' style='font-weight: bold;font-size: 15pt'>Merchandise</th></tr>";
echo "<tr><th>Nr:</th><th>Furnitori</th><th>Produkti</th><th>Njesia</th><th>Sasia e Perdorur</th><th>Cmimi Total</th><th>Vlera</th></tr>";
$sql="select * from merchandise where Unipt='$nuis'";
$res=$conn->query($sql);
$nr=1;
if($res->num_rows>0){
    while ($row = $res->fetch_assoc()){
        $id = $row['Mid'];
        echo "<tr>";
        echo "<td style='color: red;width: 5%'>".$nr . "</td>";
        echo "<td style='color: red;width: 15%'>".$row['Mfurnitor'] ."</td>";
        echo "<td style='color: red;width: 20%'>".$row['Memer']."</td>";
        echo "<td style='color: red;width: 10%'>".$row['Mnjesia'] ."</td>";
        echo "<td style='color: red;width: 10%'>".($row['MsasiaF']-$row['MsasiaMb'])."</td>";
        echo "<td style='color: red;width: 20%'>".($row['Mcmimi']*($row['MsasiaF']-$row['MsasiaMb']))."</td>";
        echo "<td style='color: red;width: 20%'>ALL</td>";
        echo "</tr>";
        $nr++;
        $sum2+=($row['Mcmimi']*($row['MsasiaF']-$row['MsasiaMb']));
    }
}
echo "</table>";
echo "<table width='95%' border='1' style='border:2px solid red;margin-top:10px;margin-bottom: 20px'>";
echo "<tr><th colspan='9' style='font-weight: bold;font-size: 15pt'>Row Products</th></tr>";
echo "<tr><th>Nr:</th><th>Furnitori</th><th>Produkti</th><th>Njesia</th><th>Sasia e Perdorur</th><th>Cmimi Total</th><th>Vlera</th></tr>";
$sql1="select * from rprod where Unipt='$nuis'";
$res1=$conn->query($sql1);
$nr1=1;
if($res1->num_rows>0){
    while ($row1 = $res1->fetch_assoc()){
        $id1 = $row1['Rid'];
        echo "<tr>";
        echo "<td style='color: red;width: 5%'>".$nr1 . "</td>";
        echo "<td style='color: red;width: 15%'>".$row1['Rfurnitor'] ."</td>";
        echo "<td style='color: red;width: 20%'>".$row1['Remer']."</td>";
        echo "<td style='color: red;width: 10%' title='".$row1['Rnjesia'] ."'>cope</td>";
        echo "<td style='color: red;width: 10%'>".($row1['RsubSasF']-$row1['RsubSasMb'])."</td>";
        echo "<td style='color: red;width: 20%'>".($row1['Rcmimi']*($row1['RsubSasF']-$row1['RsubSasMb']))."</td>";
        echo "<td style='color: red;width: 20%'>ALL</td>";
        echo "</tr>";
        $nr1++;
        $sum2+=($row1['Rcmimi']*($row1['RsubSasF']-$row1['RsubSasMb']));
    }
}
echo "</table>";
echo "<table width='95%' border='1' style='border:2px solid red;margin-top:10px;margin-bottom: 20px'>";
echo "<tr><th style='width: 50%;color: red;font-weight: bold;font-size: 20pt'>Totali i Inventarit</th><th style='width: 30%;color: red'>".$sum2."</th><th style='color: red;border: none;width: 20%;font-weight: bold;font-size: 20pt'>ALL</th></tr>";
echo "</table>";
echo "<table width='95%' border='1' style='border:2px solid green;margin-top:10px;margin-bottom: 20px'>";
echo "<tr><th style='width: 50%;color: green;font-weight: bold;font-size: 20pt'>TVSH e zbritshme</th><th style='width: 30%;color: green'>".($sum2*0.2)."</th><th style='color: green;border: none;width: 20%;font-weight: bold;font-size: 20pt'>ALL</th></tr>";
echo "</table>";
echo "<hr>";
echo "<h1 style='margin-right: 90%;font-size: 20pt;font-weight: bold;color: red'>-</h1>";
echo "<hr>";
echo "<h1 style='color: red;font-weight: bold;text-decoration: underline'>KAMARIERET(muaji ".date('m').")</h1>";
echo "<table width='95%' border='1' style='border:2px solid red;margin-top:10px;margin-bottom: 20px'>";
echo "<tr><th>Nr:</th><th>ID Card Nr</th><th>Emer</th><th>Mbiemer</th><th>Roga</th><th>Vlera</th></tr>";
$sql3="select * from waiter where Unipt='$nuis'";
$res3=$conn->query($sql3);
if($res3->num_rows>0){
    $nr1=1;
    while($row3=$res3->fetch_assoc()) {
        echo "<tr>";
        echo "<td style='width: 5%;color: red'>" . $nr1 . "</td>";
        echo "<td style='width: 15%;color: red'>" . $row3['Widcard'] . "</td>";
        echo "<td style='width: 15%;color: red'>" . $row3['Wemer'] . "</td>";
        echo "<td style='width: 15%;color: red'>" . $row3['Wmbiemer'] . "</td>";
        echo "<td style='width: 30%;color: red'>" . $row3['Wroga'] . "</td>";
        echo "<td style='width: 20%;color: red'>ALL</td>";
        echo "</tr>";
        $sum1 += $row3['Wroga'];
        $nr1++;
    }
    echo "<tr><th colspan='4' style='color: red;font-weight: bold;font-size: 20pt'>Totali i Rogave</th><th style='color: red'>".$sum1."</th><th style='color: red;border: none;font-weight: bold;font-size: 20pt'>ALL</th></tr>";
}
echo "</table>";
echo "<hr>";
echo "<h1 style='margin-right: 90%;font-size: 20pt;font-weight: bold;color: blue'>=</h1>";
echo "<hr>";
echo "<h1 style='color: blue;font-weight: bold;text-decoration: underline'>FITIMI/(HUMBJE)(muaji ".date('m').")</h1>";
echo "<table width='95%' border='1' style='border:2px solid ;color: blue;margin-top:10px;margin-bottom: 20px'>";
echo "<tr><th style='font-weight: bold;font-size: 14pt'>Totali i Xhiros</th><th style='font-weight: bold;font-size: 14pt'>Totali i Inventarit Perdorur</th><th style='font-weight: bold;font-size: 14pt'>Totali i Rogave</th><th style='font-weight: bold;font-size: 14pt'>TVSH</th><th style='font-weight: bold;font-size: 14pt'>Fitimi/(Humbje)</th><th style='font-weight: bold;font-size: 14pt'>Perqindja</th><th style='font-weight: bold;font-size: 14pt'>Detyrimi ndaj V.O.R.W</th></tr>";
$sql4="select Upercent from user where Unipt='$nuis'";
$res4=$conn->query($sql4);
$row4=$res4->fetch_assoc();
$percent=$row4['Upercent'];
$tvsh=($sum*0.2)-($sum2*0.2);
$tot=$sum-$sum1-$sum2-$tvsh-($sum*$percent);
echo "<tr><td style='width: 20%;color: blue'>".$sum." ALL</td><td style='width: 20%;color: blue'>".$sum2." ALL</td><td style='width: 15%;color: blue'>".$sum1." ALL</td><td style='width: 10%;color: blue'>".$tvsh." ALL</td><td style='width: 10%;color: blue'>".$tot." ALL</td><td style='width: 10%;color: blue'>".($percent*100)." %</td><td style='width: 15%;color: blue'>".$sum*$percent." ALL</tr></tr>";
$sql6="UPDATE user SET Ushitje='".$sum*$percent."' WHERE Unipt='$nuis'";
$res6=$conn->query($sql6);
echo "</table>";

