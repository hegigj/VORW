<?php
session_start();
include ("Cdb.php");
/*-------------------------------------------------------------------------------------------------------------------------------*/
/*nese ka kod dhe numer tavoline*/
if(isset($_GET['kod'])&&$_GET['tnr']) {
    $kod = $_GET['kod'];
    /*konfirmo kodin*/
    $sql11 = "select * from user where Ukod='$kod'";
    $res11 = $conn->query($sql11);
    if($res11->num_rows==1) {
        $row11=$res11->fetch_assoc();
        /*gjej ip e clientit*/
        $uip=$row11['Uip'];
        $ip=$_SERVER['REMOTE_ADDR'];
        $ipdg = explode('.', $ip);
        $DG = $ipdg[0] . "." . $ipdg[1] . "." . $ipdg[2] . ".1";
        /*nese default getway eshte i njejt me ate te regjistruar ne server*/
        if ($DG == $uip) {
            $sql = "select * from user where Ukod='$kod' and Uip='$uip'";
            $res = $conn->query($sql);
            if($res->num_rows==1) {
                $row = $res->fetch_assoc();
                $nipt = $row['Unipt'];
                $emer = $row['Uemer'];
                $logo = $row['UlogoImg'];
                $sfond = $row['UsfondImg'];
                $tnr = $_GET['tnr'];
                /*gjenerimi i nje vonese prej 5 min pasi klienti kryen porosine*/
                $sql111="select * from tavolin where Tnr='$tnr' and Unipt='$nipt' and Tip='$ip'";
                $res111=$conn->query($sql111);
                $s='';
                if($res111->num_rows>1) {
                    $dat=array();
                    $n=0;
                    while($row111=$res111->fetch_assoc()) {
                        $dat[$n]=strtotime($row111['Tora']);
                        $n++;
                    }
                    $dattn = strtotime(date("H:i"));
                    $stat = ($dattn - $dat[$n-1]);
                }
                else{
                    $s.="NOB";
                }
                /*nese kan kaluar 5 min ose nuk ka kryer me para porosi*/
                if($stat>300 || $s=="NOB") {
                    $_SESSION['ClientConnection'] = array($nipt, $emer, $logo, $sfond, $tnr);
                    header("location: ClanguageS.php");
                }
                /*nese nuk kan kaluar 5 min ose nuk ka kryer me para porosi*/
                else{
                    header("location: http://192.168.0.198/VORW/Client/C5minDelay.html");
                }
            }
        }
    }
    else{
        header("location: https://google.al/");
    }
    //http://192.168.0.198/VORW/Client/Ccredchecker.php?kod=h1e2g3i1238GJ0k&tnr=1
}
/*-------------------------------------------------------------------------------------------------------------------------------*/
if(isset($_POST["order"])){
    $nuis=$_POST['nuis'];
    $IP=$_SERVER['REMOTE_ADDR'];
    if(isset($_SESSION['ClientConnection'][4])) {
        $table = $_SESSION['ClientConnection'][4];
        $ktd = date("d-m-Y");
        $kto = date("H;i");
        $kuponTatimor = fopen("../KuponTatimor/Kupon_Tatimor_" . $ktd . "_" . $kto . ".txt", "w") or die("E pamundur te printoj kuponin tatimor");
        $sql5 = "select * from user where Unipt='$nuis'";
        $res5 = $conn->query($sql5);
        $row5 = $res5->fetch_assoc();
        $ktkviz="---------------------------------------------\r\n\r\n\r\n\r\n";
        $ktem = "\t\t".$row5['Uemer'] . "\r\n";
        $ktad = " ".substr($row5['Uadresa'],0,43) . "\r\n";
        $ktqy = "\t\t   ".$row5['Uqytet'] . "\r\n";
        $ktfal = "\t       JU FALEMINDERIT!\r\n";
        $ktn = "\t       NIPT: " . $nuis . "\r\n\r\n";
        $kt = "\t\tKUPON TATIMOR\r\n\r\n\r\n";
        fwrite($kuponTatimor, $ktkviz);
        fwrite($kuponTatimor, $ktem);
        fwrite($kuponTatimor, $ktad);
        fwrite($kuponTatimor, $ktqy);
        fwrite($kuponTatimor, $ktfal);
        fwrite($kuponTatimor, $ktn);
        fwrite($kuponTatimor, $kt);
        $sql4 = "select * from produkt where Unipt='$nuis'";
        $res4 = $conn->query($sql4);
        $ktsum = 0;
        while ($row4 = $res4->fetch_assoc()) {
            $id = $row4['Pid'];
            if (isset($_POST['P' . $id . 'Q'])) {
                $psasia = $_POST['P' . $id . 'Q'];
                if ($psasia > 0) {
                    $sum = 0;
                    $sas = 0;
                    $data = date("Y-m-d");
                    $ora = date("H:i");
                    $sql1 = "select * from produkt where Pid='$id'";
                    $res1 = $conn->query($sql1);
                    $row1 = $res1->fetch_assoc();
                    $pkat = $row1['ppkategori'];
                    $pname = $row1["Pemer"];
                    $pnjesia = $row1["Pnjesia"];
                    $psas = $row1['Psasia'];
                    $pcmimi = $row1["Pcmimi"];
                    $pshitje = $row1['Pshitje'];
                    $sql6 = "select * from link where LPid='$id'";
                    $res6 = $conn->query($sql6);
                    while ($row6 = $res6->fetch_assoc()) {
                        $lloj = $row6['LIlloj'];
                        $sass = $row6['Lsasia'];
                        $invent = $row6['LIid'];
                        if ($lloj == 'M') {
                            $sql7 = "select * from merchandise where Mid='$invent'";
                            $res7 = $conn->query($sql7);
                            $row7 = $res7->fetch_assoc();
                            $sasmb = $row7['MsasiaMb'];
                            if ($sasmb >= ($psasia * $sass)) {
                                $cmi = $row7['Mcmimi'];
                                $cmimb = $row7['McmimiT'];
                                $sasmb -= ($psasia * $sass);
                                $cmimb -= ($cmi * $psasia * $sass);
                                $sql8 = "UPDATE merchandise SET MsasiaMb='$sasmb', McmimiT='$cmimb' where Mid='$invent'";
                                $res8 = $conn->query($sql8);
                                if($sasmb==0){
                                    $sql21 = "UPDATE produkt SET Pgjendje='0' WHERE Pid='$id'";
                                    $res21 = $conn->query($sql21);
                                }
                            }
                        } elseif ($lloj == 'RP') {
                            $sql9 = "select * from rprod where Rid='$invent'";
                            $res9 = $conn->query($sql9);
                            $row9 = $res9->fetch_assoc();
                            $sasmb1 = $row9['RsubSasMb'];
                            if ($sasmb1 >= ($psasia * $sass)) {
                                $cmi1 = $row9['Rcmimi'];
                                $cmimb1 = $row9['RcmimiT'];
                                $sasmb1 -= ($psasia * $sass);
                                $cmimb1 -= ($cmi1 * $psasia * $sass);
                                $sql10 = "UPDATE rprod SET RsubSasMb='$sasmb1', RcmimiT='$cmimb1' where Rid='$invent'";
                                $res10 = $conn->query($sql10);
                                if($sasmb1==0){
                                    $sql22 = "UPDATE produkt SET Pgjendje='0' WHERE Pid='$id'";
                                    $res22 = $conn->query($sql22);
                                }
                            }
                        }
                    }
                    $ktsas = $psasia . " X " . $pcmimi . "\r\n";
                    $ktprod = substr($pname,0,11) . "\t" . "\t" . "\t" . "\t" . ($psasia * $pcmimi) . " B\r\n";
                    fwrite($kuponTatimor, $ktsas);
                    fwrite($kuponTatimor, $ktprod);
                    $ktsum += ($psasia * $pcmimi);
                    $sql2 = "insert into tavolin (Unipt,Tnr,Tdata,Tora,Tpkategori,Tprodukt,Tnjesia,Tsasia,Tcmimi,Tporosi,Tip) values ('$nuis','$table','$data','$ora','$pkat','$pname','$pnjesia',$psasia,'$pcmimi',0,'$IP')";
                    $res2 = $conn->query($sql2);
                    $sas = $psas + $psasia;
                    $sum = $pshitje + ($psasia * $pcmimi);
                    $sql3 = "UPDATE produkt SET Psasia='$sas', Pshitje='$sum' WHERE Pid='$id'";
                    $res3 = $conn->query($sql3);
                }
            }
        }
        $sql20 = "select * from tavolin where Tnr='$table'";
        $res20 = $conn->query($sql20);
        $row20 = $res20->fetch_assoc();
        $tid = $row20['Tid'];
        $ktnen = "\r\nNENTOTALE\r\n";
        $kttot = "TOTALE LEK" . "\t" . "\t" . "\t" . "\t" . $ktsum . "\r\n";
        $ktpnd = "PARA NE DORE\r\n\r\n";
        $ktpt = "VLERA PA TVSH B 20%" . "\t" . "\t" . "\t" . ($ktsum * 0.8) . "\r\n";
        $ktt = "TVSH B 20%" . "\t" . "\t" . "\t" . "\t" . ($ktsum * 0.2) . "\r\n\r\n";
        $ktdo = "DATA: " . date("d/m/Y") . " ORA: " . date("H:i") . "\r\n";
        $ktnt = "NUMRI I TAVOLINES: " . $table . "\r\n";
        $ktnr = "KUPONI TATIMOR NR: " . $tid."\r\n\r\n\r\n\r\n\r\n";
        $ktfviz="---------------------------------------------";
        fwrite($kuponTatimor, $ktnen);
        fwrite($kuponTatimor, $kttot);
        fwrite($kuponTatimor, $ktpnd);
        fwrite($kuponTatimor, $ktpt);
        fwrite($kuponTatimor, $ktt);
        fwrite($kuponTatimor, $ktdo);
        fwrite($kuponTatimor, $ktnt);
        fwrite($kuponTatimor, $ktnr);
        fwrite($kuponTatimor, $ktfviz);
        fclose($kuponTatimor);
    }
    unset($_SESSION['ClientConnection']);
    header("location: location: http://192.168.0.198/VORW/Client/C5minDelay.html");
}