<?php
include ("Wdb.php");
include ("Wcredchecker.php");
if(empty($_SESSION['WaitLogin'])){
    header("loction WaiterLogin.php");
}
?>
<html>
<head>
    <title>VORW-Waiter Page</title>
    <link rel="icon" href="">
    <link rel="stylesheet" href="waiterStyle.css">
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="waiterScript.js" rel="text/javascript"></script>
    <meta http-equiv="refresh" content="30">
</head>
<body>
<center>
    <?php if(isset($_SESSION["WaitLogin"])): ?>
        <h1 style="margin-top: 50px" class='waitH'>Welcome</h1>
        <h2 class='waitH'><?php echo $_SESSION["WaitLogin"][2]." ".$_SESSION["WaitLogin"][3]; ?></h2>
        <h5 class='waitH'>Waiter of: <?php echo $_SESSION["WaitLogin"][0];?></h5>
        <div id="waitMng">
            <form method="post" action="">
                <table border="0" width="100%">
                    <tr>
                        <td><input type="submit" name="waitOrder" value="Orders"></td>
                        <td><input type="submit" name="waitStatus" value="Product Status"></td>
                        <td><input class="waitLogout" type="submit" name="waitLogout" value="LogOut"></td>
                    </tr>
                </table>
            </form>
        </div>
        <div id="waitAction">
        <?php
        if(isset($_SESSION['waitOrder'])&&isset($_SESSION['WaitLogin'])){
            echo "<table border='1' width='95%' style='margin-top: 10px;margin-bottom: 10px;text-align: center'>";
            echo "<tr><th>Nr:</th><th>Nr. Tavoline</th><th>Produkti</th><th>Njesia</th><th>Sasia</th><th>Cmimi</th><th style='border: 1px solid orange;color: orange'>Dergo</th><th style='border: 1px solid green;color: green'>Paguaj</th></tr>";
            $nipt=$_SESSION['WaitLogin'][0];
            $pkat=$_SESSION['WaitLogin'][4];
            if($pkat=='ALL'){
                $sql="select * from tavolin where Unipt='$nipt' and Tnr!=''";
                $res=$conn->query($sql);
                if($res->num_rows>0){
                    $nr=1;
                    $cmimiSum=0;
                    $sasiaSum=0;
                    $totSum=0;
                    $nrTav=0;
                    while($row=$res->fetch_assoc()){
                        if($nrTav!=$row['Tnr']){
                            if(isset($_SESSION['Derguar'])&&$row['Tnr']==$_SESSION['Derguar']['0']&&$nipt==$_SESSION['Derguar'][1]){
                                $colo='orange';
                            }
                            elseif($row['Tporosi']==1){
                                $colo='orange';
                            }
                            else{
                                $colo='transparent';
                            }
                            $tid=$row['Tid'];
                            $nrTav=$row['Tnr'];
                            $sasiaSum=$row['Tsasia'];
                            $cmimiSum=$row['Tcmimi'];
                            echo "<tr style='background-color: $colo'>";
                            echo "<td style='width: 5%;border-radius: 8px;border: 1px solid blue'>".$nr."</td>";
                            echo "<td style='width: 10%;border-radius: 8px;border: 1px solid blue'>".$nrTav."</td>";
                            echo "<td style='width: 20%;border-radius: 8px;border: 1px solid blue'>".$row['Tprodukt']."</td>";
                            echo "<td style='width: 10%;border-radius: 8px;border: 1px solid blue'>".$row['Tnjesia']."</td>";
                            echo "<td style='width: 5%;border-radius: 8px;border: 1px solid blue'>".$sasiaSum."</td>";
                            echo "<td style='width: 30%;border-radius: 8px;border: 1px solid blue'>".$cmimiSum."</td>";
                            echo "<td style='width: 20%;border-radius: 8px;border: 1px solid blue' colspan='2'>ALL</td>";
                            echo "</tr>";
                            $totSum=$cmimiSum*$sasiaSum;
                            $sql1="SELECT * FROM tavolin WHERE Tid!='$tid' and Tnr='$nrTav' and Unipt='$nipt'";
                            $res1=$conn->query($sql1);
                            if($res1->num_rows>0){
                                while($row1=$res1->fetch_assoc()){
                                    $sasiaSum=$row1['Tsasia'];
                                    $cmimiSum=$row1['Tcmimi'];
                                    echo "<tr style='background-color: $colo'>";
                                    echo "<td colspan='2'></td>";
                                    echo "<td style='width: 20%;border-radius: 8px;border: 1px solid blue'>".$row1['Tprodukt']."</td>";
                                    echo "<td style='width: 10%;border-radius: 8px;border: 1px solid blue'>".$row1['Tnjesia']."</td>";
                                    echo "<td style='width: 5%;border-radius: 8px;border: 1px solid blue'>".$sasiaSum."</td>";
                                    echo "<td style='width: 30%;border-radius: 8px;border: 1px solid blue'>".$cmimiSum."</td>";
                                    echo "<td style='width: 20%;border-radius: 8px;border: 1px solid blue' colspan='2'>ALL</td>";
                                    echo "</tr>";
                                    $totSum+=$cmimiSum*$sasiaSum;
                                }
                            }
                            echo "<tr style='background-color: $colo'>";
                            echo "<td style='width: 50%;border-radius: 8px;border: 1px solid blue;font-weight: bold' colspan='5'>Totali i fatures</td>";
                            echo "<td style='width: 30%;border-radius: 8px;border: 1px solid blue;font-weight: bold'>".$totSum." ALL</td>";
                            echo "<td  style='width: 10%;border: 2px solid orange;background-color: white!important;'><a style='font-weight: bold;text-decoration: none;color: orange' href=drgPor.php?tnr=".$nrTav."&nipt=".$nipt.">Porosi</a></td>";
                            echo "<td  style='width: 10%;border: 2px solid green;background-color: white!important;'><a style='font-weight: bold;text-decoration: none;color: green' href=payPor.php?waiter=".$_SESSION['WaitLogin'][1]."&tnr=".$nrTav."&nipt=".$nipt."&totali=".$totSum.">Porosi</a></td>";
                            $nr++;

                        }
                    }
                }
                else{
                    echo "<tr><th colspan='8' style='border: 2px solid red;color: red'>Nuk ka asnje porosi</th></tr>";
                }
            }
            else {
                $sql = "select * from tavolin where Unipt='$nipt' and Tnr!='' and Tpkategori='$pkat'";
                $res = $conn->query($sql);
                if ($res->num_rows > 0) {
                    $nr = 1;
                    $cmimiSum = 0;
                    $sasiaSum = 0;
                    $totSum = 0;
                    $nrTav = 0;
                    while ($row = $res->fetch_assoc()) {
                            if ($nrTav != $row['Tnr']) {
                                if (isset($_SESSION['Derguar']) && $row['Tnr'] == $_SESSION['Derguar']['0'] && $nipt == $_SESSION['Derguar'][1] && $pkat == $_SESSION['Derguar'][2]) {
                                    $colo = 'orange';
                                } elseif ($row['Tporosi'] == 1) {
                                    $colo = 'orange';
                                } else {
                                    $colo = 'transparent';
                                }
                                $tid = $row['Tid'];
                                $nrTav = $row['Tnr'];
                                $sasiaSum = $row['Tsasia'];
                                $cmimiSum = $row['Tcmimi'];
                                echo "<tr style='background-color: $colo'>";
                                echo "<td style='width: 5%;border-radius: 8px;border: 1px solid blue'>" . $nr . "</td>";
                                echo "<td style='width: 10%;border-radius: 8px;border: 1px solid blue'>" . $nrTav . "</td>";
                                echo "<td style='width: 20%;border-radius: 8px;border: 1px solid blue'>" . $row['Tprodukt'] . "</td>";
                                echo "<td style='width: 10%;border-radius: 8px;border: 1px solid blue'>" . $row['Tnjesia'] . "</td>";
                                echo "<td style='width: 5%;border-radius: 8px;border: 1px solid blue'>" . $sasiaSum . "</td>";
                                echo "<td style='width: 30%;border-radius: 8px;border: 1px solid blue'>" . $cmimiSum . "</td>";
                                echo "<td style='width: 20%;border-radius: 8px;border: 1px solid blue' colspan='2'>ALL</td>";
                                echo "</tr>";
                                $totSum = $cmimiSum * $sasiaSum;
                                $sql1 = "SELECT * FROM tavolin WHERE Tid!='$tid' and Tnr='$nrTav' and Unipt='$nipt' and Tpkategori='$pkat'";
                                $res1 = $conn->query($sql1);
                                if ($res1->num_rows > 0) {
                                    while ($row1 = $res1->fetch_assoc()) {
                                        $sasiaSum = $row1['Tsasia'];
                                        $cmimiSum = $row1['Tcmimi'];
                                        echo "<tr style='background-color: $colo'>";
                                        echo "<td colspan='2'></td>";
                                        echo "<td style='width: 20%;border-radius: 8px;border: 1px solid blue'>" . $row1['Tprodukt'] . "</td>";
                                        echo "<td style='width: 10%;border-radius: 8px;border: 1px solid blue'>" . $row1['Tnjesia'] . "</td>";
                                        echo "<td style='width: 5%;border-radius: 8px;border: 1px solid blue'>" . $sasiaSum . "</td>";
                                        echo "<td style='width: 30%;border-radius: 8px;border: 1px solid blue'>" . $cmimiSum . "</td>";
                                        echo "<td style='width: 20%;border-radius: 8px;border: 1px solid blue' colspan='2'>ALL</td>";
                                        echo "</tr>";
                                        $totSum += $cmimiSum * $sasiaSum;
                                    }
                                }
                                echo "<tr style='background-color: $colo'>";
                                echo "<td style='width: 50%;border-radius: 8px;border: 1px solid blue;font-weight: bold' colspan='5'>Totali i fatures</td>";
                                echo "<td style='width: 30%;border-radius: 8px;border: 1px solid blue;font-weight: bold'>" . $totSum . " ALL</td>";
                                echo "<td  style='width: 10%;border: 2px solid orange;background-color: white!important;'><a style='font-weight: bold;text-decoration: none;color: orange' href=drgPor.php?tnr=" . $nrTav . "&nipt=" . $nipt . "&kategori=" . $pkat . ">Porosi</a></td>";
                                echo "<td  style='width: 10%;border: 2px solid green;background-color: white!important;'><a style='font-weight: bold;text-decoration: none;color: green' href=payPor.php?waiter=" . $_SESSION['WaitLogin'][1] . "&tnr=" . $nrTav . "&nipt=" . $nipt . "&kategori=" . $pkat . "&totali=" . $totSum . ">Porosi</a></td>";
                                $nr++;

                            }
                    }
                }
                else{
                    echo "<tr><th colspan='8' style='border: 2px solid red;color: red'>Nuk ka asnje porosi</th></tr>";
                }
            }
        }
        if(isset($_SESSION['waitStat'])&&isset($_SESSION['WaitLogin'])){
            $nuis=$_SESSION['WaitLogin'][0];
            $pkat1=$_SESSION['WaitLogin'][4];
            if($pkat1=='ALL'){
                $sql1="select * from pkategori where Unipt='$nuis'";
                $res1=$conn->query($sql1);
                if($res1->num_rows>0){
                    while ($row1 = $res1->fetch_assoc()) {
                        $pk=$row1['Pkategori'];
                        echo "<table width='95%' border='1' style='text-align: center;border:2px solid green;margin-top:10px;margin-bottom: 20px'>";
                        echo "<tr><th colspan='8' style='font-weight: bold;font-size: 15pt'>Kategorite e Produkteve</th></tr>";
                        echo "<tr><td colspan='8'>".$pk."</td></tr>";
                        echo "<tr><th>Nr:</th><th>Emri</th><th>Njesia</th><th>Cmimi</th><th style='border: 1px solid green;color: green'>Ka Gjendje</th><th style='color: red;border: 1px solid red'>Nuk Ka Gjendje</th></tr>";
                        $nr=1;
                        $sql="select * from produkt where Unipt='$nuis' and Pkategori='$pk'";
                        $res=$conn->query($sql);
                        while ($row = $res->fetch_assoc()){
                            $id = $row['Pid'];
                            if($row['Pgjendje']=='1'){
                                $col='green';
                            }
                            else{
                                $col='red';
                            }
                            echo "<tr style='background-color: $col!important;'>";
                            echo "<td style='color: white;width: 10%'>".$nr . "</td>";
                            echo "<td style='color: white;width: 30%' title='".$row['Ppershkrim']."'>".$row['Pemer'] ."</td>";
                            echo "<td style='color: white;width: 10%'>".$row['Pnjesia']."</td>";
                            echo "<td style='color: white;width: 10%'>".$row['Pcmimi'] ." ALL</td>";
                            echo "<td style='border-radius:8px;background-color: green!important;width: 20%'><div style='background-color:green;border:1px solid green;font-weight:bold;height: 100%;border-radius: 8px'><a style='text-decoration:none;color:white' href=KGJ.php?id=".$id.">Ka Gjendje</a></div></td>";
                            echo "<td style='border-radius:8px;background-color: red!important;width: 20%'><div style='background-color:red;border:1px solid red;font-weight:bold;height: 100%;border-radius: 8px'><a style='text-decoration:none;color:white' href=NKGJ.php?id=".$id.">Nuk Ka Gjendje</a></div></td>";
                            echo "</tr>";
                            $nr++;
                        }
                        echo "</table>";
                    }
                }
            }
            $sql1="select * from pkategori where Unipt='$nuis' and ppkategori='$pkat1'";
            $res1=$conn->query($sql1);
            if($res1->num_rows>0){
                while ($row1 = $res1->fetch_assoc()) {
                    $pk=$row1['Pkategori'];
                    echo "<table width='95%' border='1' style='text-align: center;border:2px solid green;margin-top:10px;margin-bottom: 20px'>";
                    echo "<tr><th colspan='8' style='font-weight: bold;font-size: 15pt'>Kategorite e Produkteve</th></tr>";
                    echo "<tr><td colspan='8'>".$pk."</td></tr>";
                    echo "<tr><th>Nr:</th><th>Emri</th><th>Njesia</th><th>Cmimi</th><th style='border: 1px solid green;color: green'>Ka Gjendje</th><th style='color: red;border: 1px solid red'>Nuk Ka Gjendje</th></tr>";
                    $nr=1;
                    $sql="select * from produkt where Unipt='$nuis' and Pkategori='$pk' and ppkategori='$pkat1'";
                    $res=$conn->query($sql);
                    while ($row = $res->fetch_assoc()){
                        $id = $row['Pid'];
                        if($row['Pgjendje']=='1'){
                            $col='green';
                        }
                        else{
                            $col='red';
                        }
                        echo "<tr style='background-color: $col!important;'>";
                        echo "<td style='color: white;width: 10%'>".$nr . "</td>";
                        echo "<td style='color: white;width: 30%' title='".$row['Ppershkrim']."'>".$row['Pemer'] ."</td>";
                        echo "<td style='color: white;width: 10%'>".$row['Pnjesia']."</td>";
                        echo "<td style='color: white;width: 10%'>".$row['Pcmimi'] ." ALL</td>";
                        echo "<td style='border-radius:8px;background-color: green!important;width: 20%'><div style='background-color:green;border:1px solid green;font-weight:bold;height: 100%;border-radius: 8px'><a style='text-decoration:none;color:white' href=KGJ.php?id=".$id.">Ka Gjendje</a></div></td>";
                        echo "<td style='border-radius:8px;background-color: red!important;width: 20%'><div style='background-color:red;border:1px solid red;font-weight:bold;height: 100%;border-radius: 8px'><a style='text-decoration:none;color:white' href=NKGJ.php?id=".$id.">Nuk Ka Gjendje</a></div></td>";
                        echo "</tr>";
                        $nr++;
                    }
                    echo "</table>";
                }
            }
        }
        ?>
        </div>
    <?php endif; ?>
</center>
</body>
</html>
