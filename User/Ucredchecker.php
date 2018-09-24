<?php
include ("Udb.php");
session_start();
if(isset($_POST["usrlog"])){
    $username=$_POST['usrnam'];
    $password=$_POST['usrpass'];
    $sql="select * from user where Uusername='$username' and Upassword='$password'";
    $res=$conn->query($sql);
    if($res->num_rows==1){
        $row=$res->fetch_assoc();
        $nuis=$row['Unipt'];
        $wifiU=$row['Uip'];
        $logo=$row['UlogoImg'];
        $userSession=array($nuis,$wifiU,$logo);
        $_SESSION['UserNuis']=$userSession;
        header("location: UserManage.php");
    }
}
if(isset($_POST["usrCreateB"])){
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
    $sql1="insert into user (Unipt,Uemer,Uqytet,Uadresa,UdataRegj,Udata,Utel,Uemail,Uusername,Upassword,Uip,Ukod) values ('$nipt','$emer','$qytet','$adresa','$regjdata','$data','$tel','$email','$un','$pass','$wifiN','$wifiP')";
    $res1=$conn->query($sql1);
    header("location: UserLogin.php");
}
if(isset($_POST["usrWaitReg"])){
    $wnuis=$_POST["Wnuis"];
    $wdata=$_POST["data"];
    $widcard=$_POST["Widcard"];
    $wemer=$_POST["Wemer"];
    $wmbiemer=$_POST["Wmbiemer"];
    $wtel=$_POST["Wtel"];
    $wpkat=$_POST['Wpkategori'];
    $wusername=$_POST["Wusername"];
    $wpassword=$_POST["Wpassword"];
    $wroga=$_POST["Wroga"];
    $sql2="insert into waiter (Unipt,Widcard,Wemer,Wmbiemer,Wtel,Wpkategori,Wusername,Wpassword,Wdata,Wroga) values ('$wnuis','$widcard','$wemer','$wmbiemer','$wtel','$wpkat','$wusername','$wpassword','$wdata','$wroga')";
    $res2=$conn->query($sql2);
    header("location: UserManage.php");
}
if(isset($_POST["Preg"])){
    $pnuis=$_POST["Pnuis"];
    $ppkategori=$_POST['Ppkategori'];
    $pkategori=$_POST["Pkategori"];
    $sql3="insert into pkategori (Unipt,ppkategori,Pkategori) values ('$pnuis','$ppkategori','$pkategori')";
    $res3=$conn->query($sql3);
    header("location: UserManage.php");
}
if(isset($_POST["usrProdReg"])){
    $pnuis1=$_POST["pnuis"];
    $pkategori1=$_POST["pkategori"];
    $sql7="select * from pkategori where Unipt='$pnuis1' and Pkategori='$pkategori1'";
    $res7=$conn->query($sql7);
    $row7=$res7->fetch_assoc();
    $ppkategori1=$row7['ppkategori'];
    $pemer=$_POST["Pemer"];
    $pnjesia=$_POST["Pnjesia"];
    $ppershkrim=$_POST["Ppershkrim"];
    $pcmimi=$_POST["Pcmimi"];
    $sql4="insert into produkt (Unipt,ppkategori,Pkategori,Pemer,Ppershkrim,Pnjesia,Pcmimi,Pgjendje) values ('$pnuis1','$ppkategori1','$pkategori1','$pemer','$ppershkrim','$pnjesia','$pcmimi','1')";
    $res4=$conn->query($sql4);
    header("location: UserManage.php");
}
if(isset($_POST["usrProdMod"])){
    $pid=$_POST["pid"];
    $pnipt=$_POST["NIPT"];
    $pemer1=$_POST["pemer"];
    $ppershkrim1=$_POST["ppershkrim"];
    $pnjesia1=$_POST["pnjesia"];
    $pcmimi1=$_POST["pcmimi"];
    $sql5="UPDATE produkt SET Pemer='$pemer1', Ppershkrim='$ppershkrim1', Pnjesia='$pnjesia1', Pcmimi='$pcmimi1' WHERE Pid='$pid'";
    $res5=$conn->query($sql5);
        $sql11 = "select * from merchandise where Unipt='$pnipt'";
        $res11 = $conn->query($sql11);
        while ($row11 = $res11->fetch_assoc()) {
            $mid = $row11['Mid'];
                $quant = $_POST["rel" . $mid . "inventM"];
                if ($quant > 0) {
                    $sql12 = "INSERT INTO link (Unipt,LPid,LIid,Lsasia,LIlloj) VALUES ('$pnipt','$pid','$mid','$quant','M')";
                    $res12 = $conn->query($sql12);
                }
        }
        $sql13 = "select * from rprod where Unipt='$pnipt'";
        $res13 = $conn->query($sql13);
        while ($row13 = $res13->fetch_assoc()) {
            $rpid = $row13['Rid'];
                $quant1 = $_POST["rel" . $rpid . "inventRP"];
                if ($quant1 > 0) {
                    $sql14 = "INSERT INTO link (Unipt,LPid,LIid,Lsasia,LIlloj) VALUES ('$pnipt','$pid','$rpid','$quant1','RP')";
                    $res14 = $conn->query($sql14);
                }
        }
    header("location: UserManage.php");
}
if(isset($_POST['wifichange'])){
    $npt=$_POST['npt'];
    $wn=$_POST['wifin'];
    $sql6="UPDATE user SET Uip='$wn' WHERE Unipt='$npt'";
    $res6=$conn->query($sql6);
    header("location: UserManage.php");
}
if(isset($_POST['usrMercReg'])||isset($_POST['usrMercShto'])){
    $mnipt=$_POST['Mnuis'];
    $mnrft=$_POST['MnrFat'];
    $mnrsr=$_POST['MnrSer'];
    $mdtft=$_POST['MdataRegj'];
    $mfur=$_POST['Mfurnitor'];
    $memf=$_POST['MemerF'];
    $mqf=$_POST['MqytetF'];
    $memer=$_POST['Memer'];
    $mnjesia=$_POST['Mnjesia'];
    $msasia=$_POST['Msasia'];
    $mcmimi=$_POST['Mcmimi'];
    $nj='cope';
    $sas=$mnjesia*$msasia;
    $cmi=$mcmimi/$sas;
    if(preg_match("/\//",$mdtft)) {
        $mdt = explode("/", $mdtft);
        $mdata = $mdt[2] . "-" . $mdt[1] . "-" . $mdt[0];
        $sql8 = "INSERT INTO merchandise (Unipt,MnrFat,MnrSer,MdataRegj,Mdata,Mfurnitor,MemriF,MqytetF,Memer,Mnjesia,MsasiaF,MsasiaMb,Mcmimi,McmimiT,McmimiTF) VALUES ('$mnipt','$mnrft','$mnrsr','$mdata','$mdata','$mfur','$memf','$mqf','$memer','$nj','$sas','$sas','$cmi','$mcmimi','$mcmimi')";
        $res8 = $conn->query($sql8);
    }
    if(isset($_POST['Mid'])){
        $mid=$_POST['Mid'];
        $sql21="select * from link where Unipt='$mnipt' and LIid='$mid' and LIlloj='M'";
        $res21=$conn->query($sql21);
        $row21=$res21->fetch_assoc();
        $pid1=$row21['LPid'];
        $sql20="select * from merchandise where Unipt='$mnipt' and Mfurnitor='$mfur' and Memer='$memer' and MsasiaMb!='0'";
        $res20=$conn->query($sql20);
        while($row20=$res20->fetch_assoc()) {
            if($mid!=$row20['Mid']) {
                $mid1=$row20['Mid'];
                $sql22 = "UPDATE link SET  LIid='$mid1' WHERE Unipt='$mnipt' and LPid='".$pid1."' and LIid='$mid' and LIlloj='M'";
                $res22 = $conn->query($sql22);
            }
        }
    }
    header("location: UserManage.php");
}
if(isset($_POST['usrRPReg'])||isset($_POST['usrRPShto'])){
    $rnipt=$_POST['Rnuis'];
    $rnrft=$_POST['RnrFat'];
    $rnrsr=$_POST['RnrSer'];
    $rdtft=$_POST['RdataRegj'];
    $rfur=$_POST['Rfurnitor'];
    $remf=$_POST['RemerF'];
    $rqf=$_POST['RqytetF'];
    $remer=$_POST['Remer'];
    $rnjesia=$_POST['Rnjesia'];
    $rsasia=$_POST['Rsasia'];
    $restsas=$_POST['RestQuant'];
    $rcmimi=$_POST['Rcmimi'];
    $nj='cope';
    if(preg_match("/\//",$rdtft)) {
        $rdt = explode("/", $rdtft);
        $rdata = $rdt[2] . "-" . $rdt[1] . "/" . $rdt[0];
        if (preg_match("/x/", $rsasia)) {
            $rsas = explode("x", $rsasia);
            $rPS = $rsas[0];
            $rPM = $rsas[1];
            $sas1 = $rPS * $rPM;
            $sas2 = $rPS * $restsas;
            $cmi1 = $rcmimi / $sas2;
            $sql9 = "insert into rprod(Unipt,RnrFat,RnrSer,RdataRegj,Rdata,Rfurnitor,RemerF,RqytetF,Remer,Rnjesia,RsubNj,RsasiaF,RsasiaMb,RsubSasF,RsubSasMb,Rcmimi,RcmimiT,RcmimiTF) values ('$rnipt','$rnrft','$rnrsr','$rdata','$rdata','$rfur','$remf','$rqf','$remer','$rnjesia','$nj','$sas1','$sas1','$sas2','$sas2','$cmi1','$rcmimi','$rcmimi')";
            $res9 = $conn->query($sql9);
        } else {
            $sas3 = $rsasia * $restsas;
            $cmi2 = $rcmimi / $sas3;
            $sql10 = "insert into rprod(Unipt,RnrFat,RnrSer,RdataRegj,Rdata,Rfurnitor,RemerF,RqytetF,Remer,Rnjesia,RsubNj,RsasiaF,RsasiaMb,RsubSasF,RsubSasMb,Rcmimi,RcmimiT,RcmimiTF) values ('$rnipt','$rnrft','$rnrsr','$rdata','$rdata','$rfur','$remf','$rqf','$remer','$rnjesia','$nj','$rsasia','$rsasia','$sas3','$sas3','$cmi2','$rcmimi','$rcmimi')";
            $res10 = $conn->query($sql10);
        }
    }
    if(isset($_POST['Rid'])){
        $rpid1=$_POST['Rid'];
        $sql24="select * from link where Unipt='$rnipt' and LIid='$rpid1' and LIlloj='RP'";
        $res24=$conn->query($sql24);
        $row24=$res24->fetch_assoc();
        $pid11=$row24['LPid'];
        $sql23="select * from rprod where Unipt='$rnipt' and Rfurnitor='$rfur' and Remer='$remer' and RsubSasMb!='0'";
        $res23=$conn->query($sql23);
        while($row23=$res23->fetch_assoc()) {
            if($rpid1!=$row23['Rid']) {
                $rpid11=$row23['Rid'];
                $sql25 = "UPDATE link SET  LIid='$rpid11' WHERE Unipt='$rnipt' and LPid='".$pid11."' and LIid='$rpid1' and LIlloj='RP'";
                $res25 = $conn->query($sql25);
            }
        }
    }
    header("location: UserManage.php");
}
if(isset($_POST['usrPrintExcelM'])){
    $enipt=$_POST['NUIS'];
    $kuf1=$_POST['Kuf1'];
    $kuf11=explode("-",$kuf1);
    $k1m=$kuf11[1];
    $k1v=$kuf11[0];
    $kuf2=$_POST['Kuf2'];
    $kuf22=explode("-",$kuf2);
    $k2m=$kuf22[1];
    $k2v=$kuf22[0];
    $muaji='';
    $viti='';
    if($k1m==$k2m){
        $muaji.=$k2m;
    }
    if($k1v==$k2v){
        $viti.=$k2v;
    }
    $kf1=strtotime($kuf1);
    $kf2=strtotime($kuf2);
    $LiberBlerje=array(
        array('Libri i Blerjeve'),
        array('Shoqeria','',''),
        array('Nipti','',$enipt),
        array('Viti','',$viti),
        array('Muaji','',$muaji),
        array('Pa veprimtari','','Ploteso PO nese gjate muajit nuk eshte bere asnje transaksion'),
        array(''),
        array('','FATURA','','','SHITESI','','','BLERJE',''),
        array('Nr Fatures','Nr Serial','Data','Emri Tregtar','Rrethi','Nipt','Totali','Vlera e Tatueshme','TVSH'),
    );
    $sql16="select * from merchandise where Unipt='$enipt'";
    $res16=$conn->query($sql16);
    $sum2=0;
    while($row16=$res16->fetch_assoc()){
        $dt=strtotime($row16['MdataRegj']);
        if($dt>=$kf1&&$dt<=$kf2) {
            $LiberBlerje = array_merge($LiberBlerje, array(array($row16['MnrFat'], $row16['MnrSer'], $row16['MdataRegj'], $row16['MemriF'], $row16['MqytetF'], $row16['Mfurnitor'], $row16['McmimiTF'], $row16['McmimiTF'] * 0.8, $row16['McmimiTF'] * 0.2),));
            $sum2+=$row16['McmimiTF'];
        }
    }
    $sql17="select * from rprod where Unipt='$enipt'";
    $res17=$conn->query($sql17);
    while($row17=$res17->fetch_assoc()){
        $dt1=strtotime($row17['RdataRegj']);
        if($dt1>=$kf1&&$dt1<=$kf2) {
            $LiberBlerje = array_merge($LiberBlerje, array(array($row17['RnrFat'], $row17['RnrSer'], $row17['RdataRegj'], $row17['RemerF'], $row17['RqytetF'], $row17['Rfurnitor'], $row17['RcmimiTF'], $row17['RcmimiTF'] * 0.8, $row17['RcmimiTF'] * 0.2),));
            $sum2+=$row17['RcmimiTF'];
        }
    }
    $LB=fopen("../FleteHyrje/Liber_Blerje_data_".$muaji."-".$viti.".csv","w");
    foreach($LiberBlerje as $field){
        fputcsv($LB,$field);
    }
    fputcsv($LB,array('','','Totali','Blerjeve','','',$sum2,$sum2*0.8,$sum2*0.2));
    fclose($LB);
    header("location: UserManage.php");
}
if(isset($_POST['usrPrintExcelS'])){
    $enipti=$_POST['NUISI'];
    $kuf11=$_POST['kuf1'];
    $kuf111=explode("-",$kuf11);
    $k11m=$kuf111[1];
    $k11v=$kuf111[0];
    $kuf22=$_POST['kuf2'];
    $kuf222=explode("-",$kuf22);
    $k22m=$kuf222[1];
    $k22v=$kuf222[0];
    $muaji1='';
    $viti1='';
    if($k11m==$k22m){
        $muaji1.=$k22m;
    }
    if($k11v==$k22v){
        $viti1.=$k22v;
    }
    $kf11=strtotime($kuf11);
    $kf22=strtotime($kuf22);
    $LiberShitje=array(
        array('Libri i Shitjeve'),
        array('Shoqeria','',''),
        array('Nipti','',$enipti),
        array('Viti','',$viti1),
        array('Muaji','',$muaji1),
        array('Pa veprimtari','','Ploteso PO nese gjate muajit nuk eshte bere asnje transaksion'),
        array(''),
        array('FATURA','','','BLERESI','','','SHITJE',''),
        array('Nr Fatures','Data','Emri','Rrethi','Nipt','Totali','Vlera e Tatueshme','TVSH'),
    );
    $sql18="select * from tavolin where Unipt='$enipti'";
    $res18=$conn->query($sql18);
    $tnrf=0;
    $sum1=0;
    while($row18=$res18->fetch_assoc()){
        $dt11=strtotime($row18['Tdata']);
        $sum=0;
        if($dt11>=$kf11&&$dt11<=$kf22) {
            if($tnrf!=$row18['TnrF']) {
                $tora=$row18['Tora'];
                $sql19="select * from tavolin where Unipt='$enipti' and Tora='$tora' and TnrF=".$row18['TnrF'];
                $res19=$conn->query($sql19);
                $tnrf=$row18['TnrF'];
                while($row19=$res19->fetch_assoc()){
                        $sum += ($row19['Tcmimi']*$row19['Tsasia']);
                }
                $LiberShitje = array_merge($LiberShitje, array(array($row18['Tid'], $row18['Tdata']=date("d/m/Y"), 'Klient', 'Tirane','-', $sum, $sum * 0.8, $sum * 0.2),));
                $sum1+=$sum;
            }
        }
    }
    $LS=fopen("../FleteDalje/Liber_Shithje_data_".$muaji1."-".$viti1.".csv","w");
    foreach($LiberShitje as $field1){
        fputcsv($LS,$field1);
    }
    fputcsv($LS,array('','','Totali Shitjeve','','',$sum1,$sum1*0.8,$sum1*0.2));
    fclose($LS);
    header("location: UserManage.php");
}
if(isset($_POST["usrLogout"])){
    unset($_SESSION["UserNuis"]);
    header("location: UserLogin.php");
}

