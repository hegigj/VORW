<?php
include ("Udb.php");
include ("Ucredchecker.php");
echo "<link rel='stylesheet' href='userStyle.css'>";
echo "<script src='userScript.js' rel='text/javascript'></script>";
echo "<table style='padding-top: 2px;padding-left: 2px;padding-right: 2px' border='0' width='100%'>";
echo "<tr>";
echo "<td id='usrCP' style='border: 2px solid green'><p>Register Products</p></td>";
echo "<td style='border:2px solid green;background-color: green;color: white'><p>Manage Products</p></td>";
echo "</tr>";
echo "</table>";
$nuis=$_SESSION['UserNuis'][0];
$sql1="select * from pkategori where Unipt='$nuis'";
$res1=$conn->query($sql1);
if($res1->num_rows>0){
    while ($row1 = $res1->fetch_assoc()) {
        $pk=$row1['Pkategori'];
        echo "<table width='95%' border='1' style='border:2px solid green;margin-top:10px;margin-bottom: 20px'>";
        echo "<tr><th colspan='8' style='font-weight: bold;font-size: 15pt'>Kategorite e Produkteve</th></tr>";
        echo "<tr><td colspan='8'>".$pk."</td></tr>";
        echo "<tr><th>Nr:</th><th>Emri</th><th>Njesia</th><th>Sasia e Shitur</th><th>Cmimi</th><th>Totali i Shitjeve</th><th style='border: 1px solid green;color: green'>Modifiko</th><th style='color: red;border: 1px solid red'>Fshi</th></tr>";
        $nr=1;
        $sql="select * from produkt where Unipt='$nuis' and Pkategori='$pk'";
        $res=$conn->query($sql);
        while ($row = $res->fetch_assoc()){
            $id = $row['Pid'];
            echo "<tr>";
            echo "<td style='color: green;width: 5%'>".$nr . "</td>";
            echo "<td style='color: green;width: 15%' title='".$row['Ppershkrim']."'>".$row['Pemer'] ."</td>";
            echo "<td style='color: green;width: 10%'>".$row['Pnjesia']."</td>";
            echo "<td style='color: green;width: 10%'>".$row['Psasia'] ."</td>";
            echo "<td style='color: green;width: 10%'>".$row['Pcmimi'] ." ALL</td>";
            echo "<td style='color: green;width: 30%'>".$row['Pshitje'] ." ALL</td>";
            echo "<td style='background-color: green!important;width: 10%'><div style='background-color:white;border:1px solid green;font-weight:bold;height: 100%;border-radius: 8px'><a style='text-decoration:none;color:green' href=UmodifikoP.php?id=".$id.">Modifiko</a></div></td>";
            echo "<td style='background-color: red!important;width: 10%'><div style='background-color:white;border:1px solid red;font-weight:bold;height: 100%;border-radius: 8px'><a style='text-decoration:none;color:red' href=UfshiP.php?id=".$id.">Fshi</a></div></td>";
            echo "</tr>";
            $nr++;
        }
        echo "</table>";
    }
}
echo "<form method='post' action='Ucredchecker.php'>";
echo "<input type='hidden' name='NUISI' value='$nuis'>";
echo "<table style='width: 60%;text-align: center' border='0'>";
echo "<tr>";
echo "<td style='width: 20%'><input style='width: 100%!important;height: 100%;border: 2px solid green' type='date' name='kuf1'></td>";
echo "<td style='width: 20%'><input style='width: 100%!important;height: 100%!important;background-color: green;color: white;font-weight: bold' type='submit' name='usrPrintExcelS' value='Printoni Flete Daljet'></td>";
echo "<td style='width: 20%'><input style='width: 100%!important;height: 100%;border: 2px solid green' type='date' name='kuf2'></td>";
echo "</tr>";
echo "</table>";
echo "</form>";