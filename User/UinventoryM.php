<?php
include ("Udb.php");
include ("Ucredchecker.php");
echo "<link rel='stylesheet' href='userStyle.css'>";
echo "<script src='userScript.js' rel='text/javascript'></script>";
echo "<table style='padding-top: 2px;padding-left: 2px;padding-right: 2px' border='0' width='100%'>";
echo "<tr>";
echo "<td style='width: 33%;border: 2px solid green' id='usrRM'><p>Register Merchandise</p></td>";
echo "<td style='width: 33%;border: 2px solid green' id='usrRRP'><p>Register Row Products</p></td>";
echo "<td style='border:2px solid green;background-color: green;color: white;width: 33%'><p>Manage Inventory</p></td>";
echo "</tr>";
echo "</table>";
$nuis=$_SESSION['UserNuis'][0];
echo "<table width='95%' border='1' style='border:2px solid green;margin-top:10px;margin-bottom: 20px'>";
echo "<tr><th colspan='9' style='font-weight: bold;font-size: 15pt'>Merchandise</th></tr>";
echo "<tr><th>Nr:</th><th>Furnitori</th><th>Produkti</th><th>Njesia</th><th>Gjendje</th><th>Cmimi/Produkt</th><th>Cmimi Total</th><th style='border: 1px solid green;color: green'>Shto</th><th style='color: red;border: 1px solid red'>Fshi</th></tr>";
$sql="select * from merchandise where Unipt='$nuis'";
$res=$conn->query($sql);
$nr=1;
if($res->num_rows>0){
        while ($row = $res->fetch_assoc()){
                $id=$row['Mid'];
                $Sas1=$row['MsasiaMb'];
                $anim = "";
                $anim1 = "";
                if ($Sas1 == 0) {
                    $anim .= "animation: outofd 600ms infinite alternate;";
                    $anim1 .= "animation: outofa 600ms infinite alternate;";
                }
                $sql4="select * from link where Unipt='$nuis' and LIid='$id' and LIlloj='M'";
                $res4=$conn->query($sql4);
                if($row['MsasiaMb']>0||$res4->num_rows>0) {
                    echo "<tr>";
                    echo "<td style='color: green;width: 5%'>" . $nr . "</td>";
                    echo "<td style='color: green;width: 15%' title='" . $row['MemriF'] . " qyteti " . $row['MqytetF'] . "'>" . $row['Mfurnitor'] . "</td>";
                    echo "<td style='color: green;width: 20%' title='Produkti eshte regjistruar ne daten " . $row['MdataRegj'] . "'>" . $row['Memer'] . "</td>";
                    echo "<td style='color: green;width: 10%'>" . $row['Mnjesia'] . "</td>";
                    echo "<td style='color: green;width: 10%' title='Sasia ne momentin e furnizimit ka qene " . $row['MsasiaF'] . "'>" . $row['MsasiaMb'] . "</td>";
                    echo "<td style='color: green;width: 10%'>" . $row['Mcmimi'] . " ALL</td>";
                    echo "<td style='color: green;width: 10%' title='Cmimi ne momentin e furnizimit ka qene " . $row['McmimiTF'] . "'>" . $row['McmimiT'] . " ALL</td>";
                    echo "<td style='background-color: green!important;width: 10%'><div style='background-color:white;border:1px solid green;font-weight:bold;height: 100%;border-radius: 8px;" . $anim . "'><a style='text-decoration:none;color:green;" . $anim1 . "' href=UshtoI.php?mid=" . $id . ">Shto</a></div></td>";
                    echo "<td style='animation: " . $anim . ";background-color: red!important;width: 10%'><div style='background-color:white;border:1px solid red;font-weight:bold;height: 100%;border-radius: 8px'><a style='text-decoration:none;color:red' href=UfshiI.php?mid=" . $id . ">Fshi</a></div></td>";
                    echo "</tr>";
                    $nr++;
                }
        }
    }
echo "</table>";
echo "<table width='95%' border='1' style='border:2px solid green;margin-top:10px;margin-bottom: 20px'>";
echo "<tr><th colspan='9' style='font-weight: bold;font-size: 15pt'>Row Products</th></tr>";
echo "<tr><th>Nr:</th><th>Furnitori</th><th>Produkti</th><th>Njesia</th><th>Derivat Gjendje</th><th>Cmimi/Produkt</th><th>Cmimi Total</th><th style='border: 1px solid green;color: green'>Shto</th><th style='color: red;border: 1px solid red'>Fshi</th></tr>";
$sql1="select * from rprod where Unipt='$nuis'";
$res1=$conn->query($sql1);
$nr1=1;
if($res1->num_rows>0){
    while ($row1 = $res1->fetch_assoc()){
            $id1=$row1['Rid'];
            $sas1=$row1['RsubSasMb'];
            $anim2 = "";
            $anim3 = "";
            if ($sas1 == 0) {
                $anim2 .= "animation: outofd 600ms infinite alternate;";
                $anim3 .= "animation: outofa 600ms infinite alternate;";
            }
            $sql5="select * from link where Unipt='$nuis' and LIid='$id1' and LIlloj='RP'";
            $res5=$conn->query($sql5);
            if($row1['RsubSasMb']>0||$res5->num_rows>0) {
                echo "<tr>";
                echo "<td style='color: green;width: 5%'>" . $nr1 . "</td>";
                echo "<td style='color: green;width: 15%' title='" . $row1['RemerF'] . " qyteti " . $row1['RqytetF'] . "'>" . $row1['Rfurnitor'] . "</td>";
                echo "<td style='color: green;width: 20%' title='Produkti eshte regjistruar ne daten " . $row1['RdataRegj'] . "'>" . $row1['Remer'] . "</td>";
                echo "<td style='color: green;width: 10%'>" . $row1['Rnjesia'] . "</td>";
                echo "<td style='color: green;width: 10%' title='Sasia ne momentin e furnizimit ka qene " . $row1['RsasiaF'] . " " . $row1['Rnjesia'] . " e derivuar ne " . $row1['RsubSasF'] . " cope'>" . $row1['RsubSasMb'] . "</td>";
                echo "<td style='color: green;width: 10%' title='Cmimi per cope ne baze te derivatit te sasise(" . $row1['RsubSasF'] . ")'>" . $row1['Rcmimi'] . " ALL</td>";
                echo "<td style='color: green;width: 10%' title='Cmimi ne momentin e furnizimit ka qene " . $row1['RcmimiTF'] . "'>" . $row1['RcmimiT'] . " ALL</td>";
                echo "<td style='background-color: green!important;width: 10%'><div style='background-color:white;border:1px solid green;font-weight:bold;height: 100%;border-radius: 8px;" . $anim2 . "'><a id='usrShtoM' style='text-decoration:none;color:green;" . $anim3 . "' href=UshtoI.php?rpid=" . $id1 . ">Shto</a></div></td>";
                echo "<td style='background-color: red!important;width: 10%'><div style='background-color:white;border:1px solid red;font-weight:bold;height: 100%;border-radius: 8px'><a style='text-decoration:none;color:red' href=UfshiI.php?rpid=" . $id1 . ">Fshi</a></div></td>";
                echo "</tr>";
                $nr1++;
            }
    }
}
echo "</table>";
echo "<form method='post' action='Ucredchecker.php'>";
echo "<input type='hidden' name='NUIS' value='$nuis'>";
echo "<table style='width: 60%;text-align: center' border='0'>";
echo "<tr>";
echo "<td style='width: 20%'><input style='width: 100%!important;height: 100%;border: 2px solid green' type='date' name='Kuf1'></td>";
echo "<td style='width: 20%'><input style='width: 100%!important;height: 100%!important;background-color: green;color: white;font-weight: bold' type='submit' name='usrPrintExcelM' value='Printoni Flete Hyrjet'></td>";
echo "<td style='width: 20%'><input style='width: 100%!important;height: 100%;border: 2px solid green' type='date' name='Kuf2'></td>";
echo "</tr>";
echo "</table>";
echo "</form>";

