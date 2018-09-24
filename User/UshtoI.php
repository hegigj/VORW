<?php
include ("Udb.php");
include ("Ucredchecker.php");
if(empty($_SESSION['UserNuis'])){
    header("loction UserLogin.php");
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
    <?php if(isset($_SESSION["UserNuis"])): ?>
        <img src='<?php echo "../Assets/".$_SESSION['UserNuis'][3]; ?>' alt='Business Logo' style='margin-top: 30px;width: 100px;height: 100px;border-radius: 50%'>
        <h1 class='usrH'>Welcome</h1>
        <h2 class='usrH'><?php echo $_SESSION["UserNuis"][0];?></h2>
        <div id="usrMng">
            <form method="post" action="">
                <table border="0" width="100%">
                    <tr>
                        <td><div id="usrWait">Waiters</div></td>
                        <td><div id="usrProd">Products</div></td>
                        <td><div id="usrInvent">Inventory</div></td>
                        <td><div id="usrSales">Sales</div></td>
                        <td><div id="usrAcco">Account</div></td>
                        <td><input class="usrLogout" type="submit" name="usrLogout" value="LogOut"></td>
                    </tr>
                </table>
            </form>
        </div>
        <div style="width: 30%!important;height: inherit!important;background-color: green!important;border-radius: 10px!important;" id="usrAction">
            <?php if(isset($_GET['mid'])){
                echo "<table style='padding-top: 2px;padding-left: 2px;padding-right: 2px' border='0' width='100%'>";
                echo "<tr>";
                    echo "<td style='border:2px solid white;background-color: green;color: white;width: 33%'><p>Register Merchandise</p></td>";
                    echo "<td style='width: 33%' id='usrRRP'><p>Register Row Products</p></td>";
                    echo "<td style='width: 33%' id='usrMI'><p>Manage Inventory</p></td>";
                echo "</tr>";
                echo "</table>";
                echo "<h3 class='usrH'>Merchandise Entries</h3>";
                echo "<form method='post' action='Ucredchecker.php'>";
                $sql="select * from merchandise where Mid=".$_GET['mid'];
                $res=$conn->query($sql);
                $row=$res->fetch_assoc();
                    echo "<p><input type='hidden' name='Mid' value='".$_GET['mid']."'></p>";
                    echo "<p><input type='hidden' name='Mnuis' value='".$_SESSION["UserNuis"][0]."'></p>";
                    echo "<p><input type='text' name='MnrFat' placeholder='Entry Bill Nr.' title='Vendosni numrin e fatures' maxlength='10'></p>";
                    echo "<p><input type='text' name='MnrSer' placeholder='Entry Bill Serial Nr.' title='Vendosni numrin serial te fatures' maxlength='10'></p>";
                    echo "<p><input type='text' name='MdataRegj' value='".date('d/m/Y')."' title='Vendosni daten fatures(formati: dd/mm/yyyy)'></p>";
                    echo "<p><input type='text' name='Mfurnitor' value='".$row['Mfurnitor']."' maxlength='10'></p>";
                    echo "<p><input type='text' name='MemerF' value='".$row['MemriF']."' maxlength='50'></p>";
                    echo "<p><input type='text' name='MqytetF' value='".$row['MqytetF']."' maxlength='20'></p>";
                    echo "<p><input type='text' name='Memer' value='".$row['Memer']."''></p>";
                    echo "<p>";
                        echo "<select name='Mnjesia' title='Vendosni njesimatjen e produktit te blere'>";
                            echo "<option>Perzgjidh Njesine</option>";
                            echo "<option value='1' title='Per cfare do lloje produkti'>Cope</option>";
                            echo "<option value='24' title='Per pijet dhe ka sasin 4x6 cope'>Arke</option>";
                            echo "<option value='20' title='Per cigare dhe ka sasine 20 paketa'>Steke</option>";
                        echo "</select>";
                    echo "</p>";
                    echo "<p><input type='text' name='Msasia' placeholder='Product Quantity' title='Vendosni sasine e produktit te blere'></p>";
                    echo "<p><input type='text' name='Mcmimi' placeholder='Product price' title='Vendosni cmimin e produktit te blere'></p>";
                    echo "<p><input style='margin-bottom: 15px!important;' id='usrReg' type='submit' name='usrMercShto' value='Shto'></p>";
                echo "</form>";
            }
            if(isset($_GET['rpid'])){
                echo "<table style='padding-top: 2px;padding-left: 2px;padding-right: 2px' border='0' width='100%'>";
                    echo "<tr>";
                        echo "<td style='width: 33%' id='usrRM'><p>Register Merchandise</p></td>";
                        echo "<td style='border:2px solid white;background-color: green;color: white;width: 33%'><p>Register Row Products</p></td>";
                        echo "<td style='width: 33%' id='usrMI'><p>Manage Inventory</p></td>";
                    echo "</tr>";
                echo "</table>";
                echo "<h3 class='usrH'>Row Product Entries</h3>";
                echo "<form method='post' action=''>";
                $sql1="select * from rprod where Rid=".$_GET['rpid'];
                $res1=$conn->query($sql1);
                $row1=$res1->fetch_assoc();
                    echo "<p><input type='hidden' name='Rid' value='".$_GET['rpid']."'></p>";
                    echo "<p><input type='hidden' name='Rnuis' value='".$_SESSION['UserNuis'][0]."'></p>";
                    echo "<p><input type='text' name='RnrFat' placeholder='Entry Bill Nr.' title='Vendosni numrin e fatures' maxlength='10'></p>";
                    echo "<p><input type='text' name='RnrSer' placeholder='Entry Bill Serial Nr.' title='Vendosni numrin serial te fatures' maxlength='10'></p>";
                    echo "<p><input type='text' name='RdataRegj' value='".date('d/m/Y')."'></p>";
                    echo "<p><input type='text' name='Rfurnitor' value='".$row1['Rfurnitor']."'></p>";
                    echo "<p><input type='text' name='RemerF' value='".$row1['RemerF']."'></p>";
                    echo "<p><input type='text' name='RqytetF' value='".$row1['RqytetF']."'></p>";
                    echo "<p><input type='text' name='Remer' value='".$row1['Remer']."'></p>";
                    echo "<p>";
                        echo "<select name='Rnjesia' title='Vendosni njesimatjen e produktit te blere'>";
                            echo "<option>Perzgjidh Njesine</option>";
                            echo "<option value='cope' title='Per cfare do lloje produkti'>Cope</option>";
                            echo "<option value='kg' title='Per cfare do lloje produkti'>KG</option>";
                            echo "<option value='lt' title='Per pijet dhe ka sasin 4x6 cope'>LT</option>";
                        echo "</select>";
                    echo "</p>";
                    echo "<p><input type='text' name='Rsasia' placeholder='Product Quantity' title='Vendosni sasine e produktit te blere(psh. 2x25, dmth: 2 thase nga 25 kg)'></p>";
                    echo "<p><input type='text' name='RestQuant' placeholder='Estimate Quantity per Unit' title='Vendosni sasine qe mund te derivoje nga produkti i blere'></p>";
                    echo "<p><input type='text' name='Rcmimi' placeholder='Product price' title='Vendosni cmimin e produktit te blere'></p>";
                    echo "<p><input style='margin-bottom: 15px' id='usrReg' type='submit' name='usrRPShto' value='Shto'></p>";
                echo "</form>";
            }
            ?>
        </div>
    <?php endif; ?>
</center>
</body>
</html>
