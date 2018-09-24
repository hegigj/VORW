<?php
include ("Udb.php");
include ("Ucredchecker.php");
if(empty($_SESSION['UserNuis'])){
    header("loction UserLogin.php");
}
if(empty($_GET["id"])){
    header("loction UserManage.php");
}
?>
<html>
<head>
    <title>VORW-Business Page</title>
    <link rel="icon" href="">
    <link rel="stylesheet" href="userStyle.css">
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="userScript.js" rel="text/javascript"></script>
</head>
<body>
<center>
    <?php if(isset($_SESSION["UserNuis"][0])): ?>
        <img src='<?php echo "../Assets/".$_SESSION['UserNuis'][3]; ?>' alt='Business Logo' style='margin-top: 30px;width: 100px;height: 100px;border-radius: 50%'>
        <h1 class='usrH'>Welcome</h1>
        <h2 class='usrH'><?php echo $_SESSION["UserNuis"][0];?></h2>
        <div id="usrMng">
            <form method="post" action="">
                <table border="0" width="100%">
                    <tr>
                        <td><div id="usrWait">Waiters</div></td>
                        <td><div id="usrProd">Products</div></td>
                        <td><div id="usrSales">Sales</div></td>
                        <td><div id="usrAcco">Account</div></td>
                        <td><input class="usrLogout" type="submit" name="usrLogout" value="LogOut"></td>
                    </tr>
                </table>
            </form>
        </div>
        <div id="usrAction" style="background-color:white;width: 60%;height:inherit;border-radius: 10px;border: 2px solid green">
            <?php if(isset($_GET["id"])) {
                $id = $_GET["id"];
                $nipt = $_SESSION['UserNuis'][0];
                $sql = "select * from produkt where Pid='$id'";
                $res = $conn->query($sql);
                if ($res->num_rows == 1) {
                    $row = $res->fetch_assoc();
                    $pid = $row['Pid'];
                    $emer = $row['Pemer'];
                    $pershkrim = $row["Ppershkrim"];
                    $njesia = $row["Pnjesia"];
                    $cmimi = $row['Pcmimi'];
                    echo "<form method='post' action='Ucredchecker.php'>";
                    echo "<table width='95%' border='1' style='margin-top: 20px;border: 2px solid green'>";
                    echo "<tr><th>Emri</th><th>Pershkrimi</th><th>Njesia</th><th>Cmimi</th><th style='border: 1px solid green;color: green'>Modifiko</th></tr>";
                    echo "<tr>";
                    echo "<input type='hidden' name='NIPT' value='".$nipt."'>";
                    echo "<input type='hidden' name='pid' value='".$pid."'>";
                    echo "<td style='width: 20%'><input style='height: 100%;width: 100%' type='text' name='pemer' value='" . $emer . "'></td>";
                    echo "<td style='width: 50%'><input style='height: 100%;width: 100%' type='text' name='ppershkrim' value='" . $pershkrim . "'></td>";
                    echo "<td style='width: 10%'><select style='height: 100%;width: 100%' name='pnjesia'>";
                    echo "<option value='" . $njesia . "'>" . $njesia . "</option>";
                    echo "<option value='cope'>Cope</option>";
                    echo "<option value='gram'>Gram</option>";
                    echo "<option value='litra'>Litra</option>";
                    echo "<option value='mililitra'>Mililitra</option>";
                    echo "<option value='shishe'>Shishe</option>";
                    echo "</select></td>";
                    echo "<td style='width: 10%'><input style='height: 100%;width: 100%' type='text' name='pcmimi' value='" . $cmimi . "'></td>";
                    echo "<td style='width: 10%'><input style='border:none;height: 100%;width: 100%;background-color: green;color: white;font-weight: bold' type='submit' name='usrProdMod' value='Modifiko'></td>";
                    echo "</table>";
                    $sql2 = "select * from link where LPid='$pid'";
                    $res2 = $conn->query($sql2);
                    if ($res2->num_rows == 0) {
                        echo "<h2 style='color: green;font-weight: bold;font-style: italic'>Relate product with one or more inventory products</h2>";
                        echo "<h4 style='color: green;font-weight: bold;font-style: italic'>'One(1) <span style='text-decoration: underline'>" . $row['Pemer'] . "</span> equals how much of inventory products'</h4>";
                        $nuis = $_SESSION['UserNuis'][0];
                        echo "<table width='95%' border='1' style='border:2px solid green;margin-top:10px;margin-bottom: 20px'>";
                        echo "<tr><th colspan='9' style='font-weight: bold;font-size: 15pt'>Merchandise</th></tr>";
                        echo "<tr><th>Nr:</th><th>Furnitori</th><th>Produkti</th><th>Njesia</th><th>Lidhet me:</th></tr>";
                        $sql = "select * from merchandise where Unipt='$nuis'";
                        $res = $conn->query($sql);
                        $nr = 1;
                        if ($res->num_rows > 0) {
                            while ($row = $res->fetch_assoc()) {
                                if($row['MsasiaMb']>0) {
                                    $id = $row['Mid'];
                                    echo "<tr>";
                                    echo "<td style='color: green;width: 5%'>" . $nr . "</td>";
                                    echo "<td style='color: green;width: 15%'>" . $row['Mfurnitor'] . "</td>";
                                    echo "<td style='color: green;width: 20%'>" . $row['Memer'] . "</td>";
                                    echo "<td style='color: green;width: 10%'>" . $row['Mnjesia'] . "</td>";
                                    echo "<td>";
                                    echo "<select style='width:100%!important;height:100%!important' name='rel" . $id . "inventM'>";
                                    echo "<option value='0'>Select Related Quantity</option>";
                                    echo "<option value='1'>1</option>";
                                    echo "<option value='2'>2</option>";
                                    echo "<option value='3'>3</option>";
                                    echo "<option value='4'>4</option>";
                                    echo "<option value='5'>5</option>";
                                    echo "<option value='6'>6</option>";
                                    echo "<option value='7'>7</option>";
                                    echo "<option value='8'>8</option>";
                                    echo "<option value='9'>9</option>";
                                    echo "<option value='10'>10</option>";
                                    echo "</select>";
                                    echo "</td>";
                                    echo "</tr>";
                                    $nr++;
                                }
                            }
                        }
                        echo "</table>";
                        echo "<table width='95%' border='1' style='border:2px solid green;margin-top:10px;margin-bottom: 20px'>";
                        echo "<tr><th colspan='9' style='font-weight: bold;font-size: 15pt'>Row Products</th></tr>";
                        echo "<tr><th>Nr:</th><th>Furnitori</th><th>Produkti</th><th>Njesia</th><th>Lidhet me:</th></tr>";
                        $sql1 = "select * from rprod where Unipt='$nuis'";
                        $res1 = $conn->query($sql1);
                        $nr1 = 1;
                        if ($res1->num_rows > 0) {
                            while ($row1 = $res1->fetch_assoc()) {
                                if($row1['RsubSasMb']>0) {
                                    $id1 = $row1['Rid'];
                                    echo "<tr>";
                                    echo "<td style='color: green;width: 5%'>" . $nr1 . "</td>";
                                    echo "<td style='color: green;width: 15%'>" . $row1['Rfurnitor'] . "</td>";
                                    echo "<td style='color: green;width: 20%'>" . $row1['Remer'] . "</td>";
                                    echo "<td style='color: green;width: 10%'>" . $row1['Rnjesia'] . "</td>";
                                    echo "<td>";
                                    echo "<select style='width:100%!important;height:100%!important' name='rel" . $id1 . "inventRP'>";
                                    echo "<option value='0'>Select Related Quantity</option>";
                                    echo "<option value='1'>1</option>";
                                    echo "<option value='2'>2</option>";
                                    echo "<option value='3'>3</option>";
                                    echo "<option value='4'>4</option>";
                                    echo "<option value='5'>5</option>";
                                    echo "<option value='6'>6</option>";
                                    echo "<option value='7'>7</option>";
                                    echo "<option value='8'>8</option>";
                                    echo "<option value='9'>9</option>";
                                    echo "<option value='10'>10</option>";
                                    echo "</select>";
                                    echo "</td>";
                                    echo "</tr>";
                                    $nr1++;
                                }
                            }
                        }
                        echo "</table>";
                        echo "</form>";
                    }
                }
            }
            ?>
        </div>
    <?php endif; ?>
</center>
</body>
</html>
