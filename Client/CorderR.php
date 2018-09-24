<?php
include ("Cdb.php");
include ("Ccredchecker.php");
echo "<meta name='viewport' content='initial-scale=1, viewport-fit=cover'>";
echo "<link rel='stylesheet' href='clientStyle.css'>";
echo "<script src='https://code.jquery.com/jquery-3.3.1.js' integrity='sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=' crossorigin='anonymous'></script>";
echo "<script src='clientScript.js' rel='text/javascript'></script>";
echo "<script type='text/javascript' src='../Assets/cookiePlugin/jquery.cookie.js'></script>";
echo "<script type='text/javascript' src='//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit'></script>";
echo "<center>";
echo "<br>";
echo "<img style='width: 400px;height: 400px;border-radius: 50%' src='../Assets/".$_SESSION['ClientConnection'][2]."' alt='Business Logo'>";
echo "<br>";
echo "<form method='post' action='Ccredchecker.php'>";
echo "<input type='hidden' name='nuis' value='".$_SESSION['ClientConnection'][0]."'>";
echo "<h1 class='cliH'>Tavolina Numer: ".$_SESSION['ClientConnection'][4]."</h1>";
echo "<br>";
echo "<h2 class='cliH' style='font-family:'Times New Roman''>Menu</h2>";
echo "<br>";
$nipt=$_SESSION['ClientConnection'][0];
$sql1="select * from pkategori where Unipt='$nipt'";
$res1=$conn->query($sql1);
if($res1->num_rows>0){
    $arr=array();
    $nr=0;
    while ($row1 = $res1->fetch_assoc()) {
        $pk = $row1['Pkategori'];
        echo "<h2 class='prodcat'>" . $pk . "</h2>";
            echo "<div id='category' class='$pk'>";
            echo "<table id='catTab' border='0' width='100%' style='text-align: center;margin-top: 10px;margin-bottom: 10px'>";
            echo "<tr><th style='color: white;text-decoration: underline;width: 10%'>Produkt</th><th style='color: white;text-decoration: underline;width: 10%'>Njesia</th><th style='color: white;text-decoration: underline;width: 10%'>Sasia</th><th style='color: white;text-decoration: underline;width: 10%'>Cmimi</th></tr>";
            $sql = "select * from produkt where Unipt='$nipt' and Pkategori='$pk'";
            $res = $conn->query($sql);
            while ($row = $res->fetch_assoc()) {
                $id = $row['Pid'];
                $arr[$nr]=$row['Pemer'];
                $arr[$nr+1]=$row['Pimg'];
                //$arr[$nr+2]=$row['Ppershkrim'];
                echo "<tr>";
                echo "<td onclick="."'"."desc(".$arr[$nr],$arr[$nr+1].")'"." style='color: white;width: 40%'>".$row['Pemer']."</td>";
                $nr++;
                if ($row['Pgjendje'] == '1') {
                    echo "<td style='color: white;width: 20%'>" . $row['Pnjesia'] . "</td>";
                    echo "<td style='width: 20%'>";
                    echo "<select style='height:100%!important' name='P" . $id . "Q'>";
                    $PorSasMax=array();
                    $i=0;
                    $sql11="select * from link where Unipt='".$_SESSION['ClientConnection'][0]."' and LPid='$id'";
                    $res11=$conn->query($sql11);
                    while($row11=$res11->fetch_assoc()){
                        $Iid=$row11['LIid'];
                        $Illoj=$row11['LIlloj'];
                        $Isas=$row11['Lsasia'];
                        if($Illoj=='M'){
                            $sql12="select * from merchandise where Mid='$Iid'";
                            $res12=$conn->query($sql12);
                            $row12=$res12->fetch_assoc();
                            $MsasMb=$row12['MsasiaMb'];
                            $PorSasMax[$i]=$MsasMb/$Isas;
                            $i++;
                        }
	                    elseif($Illoj=='RP'){
	                        $sql13="select * from rprod where Rid='$Iid'";
                            $res13=$conn->query($sql13);
                            $row13=$res13->fetch_assoc();
                            $RsasMb=$row13['RsubSasMb'];
                            $PorSasMax[$i]=$RsasMb/$Isas;
                            $i++;
                        }
                    }
                    $PorSasMin=1000;
                    if($i>1){
                        for($j=0;$j<$i;$j++){
                            if($PorSasMin>$PorSasMax[$j]){
                                $PorSasMin=$PorSasMax[$j];
                            }
                        }
                    }
                    elseif($i==1){
                        $PorSasMin=$PorSasMax[0];
                    }
                    echo "<option value='0'>Perzgjidhni Sasine</option>";
                    for($n=1;$n<=$PorSasMin;$n++){
                        echo "<option value='".$n."'>".$n."</option>";
                    }
                    echo "</select></td>";
                    echo "<td style='color: white;width: 20%'>" . $row['Pcmimi'] . " Lek</td>";
                }
                else {
                    echo "<td style='color: red;width: 60%' colspan='3'>Nuk ka gjendje</td>";
                }
                echo "</tr>";
                echo "<tr><td id='".$row['Pemer']."' colspan='4'><img src='' style='width: 0px;height: 0px'></td></tr>";
            }
            echo "</table>";
            echo "</div>";
    }
}
echo "<br>";
echo "<div id='order'><input id='ordin' type='submit' name='order' value='Porosi'></div>";
echo "</form>";
echo "<br>";
echo "</center>";

