<?php
include ("Adb.php");
include ("Acredandpinchecker.php");
if(empty($_SESSION["Apinlog"])){
    header("location: AdminLogin.php");
}
if(empty($_GET["nipt"])){
    header("loction AdminManage.php");
}
?>
<html>
<head>
    <title>VORW-Administrator Page</title>
    <link rel='icon' href=''>
    <link rel='stylesheet' href='AdminStylePC.css'>
    <script src='https://code.jquery.com/jquery-3.3.1.js' integrity='sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=' crossorigin='anonymous'></script>
    <script src='AdminScript.js' rel='text/javascript'></script>
</head>
<body>
<?php if(isset($_SESSION["Apinlog"])): ?>
<center>
    <img src='<?php echo "../Assets/".$_SESSION["Apinlog"][2]; ?>' alt='Administrator photo' style='margin-top: 30px;width: 100px;height: 100px;border-radius: 50%'>
    <h1 class='logoName'>Welcome</h1>
    <h2 class='logoName'><?php echo $_SESSION["Apinlog"][0]." ".$_SESSION["Apinlog"][1];?></h2>
</center>
<center>
    <div id='admMng'>
        <form method='post' action=''>
            <table border='0' width='60%'>
                <tr>
                    <td><select style="float: left" name='Qytetet'>
                            <option>City</option>
                            <option value='Tirane'>Tirane</option>
                            <option value="Durres">Durres</option>
                            <option value="Elbasan">Elbasan</option>
                            <option value="Shkoder">Shkoder</option>
                            <option value="Fier">Fier</option>
                            <option value="Berat">Berat</option>
                            <option value="Vlore">Vlore</option>
                            <option value="Gjirokaster">Gjirokaster</option>
                            <option value="Korce">Korce</option>
                            <option value="Sarande">Sarande</option>
                        </select>
                        <input id="citysub" type="submit" name="citysub" value="">
                    </td>
                    <td>
                        <select style="float: left" name="Subjektet">
                            <option>Businesses</option>
                            <?php if(isset($_SESSION["city"])) {
                                $c = $_SESSION["city"];
                                $sql = "select Unipt,Uqytet from user where Uqytet='$c'";
                                $res = $conn->query($sql);
                                if ($res->num_rows >= 0) {
                                    while ($row = $res->fetch_assoc()) {
                                        echo "<option value='" . $row['Unipt'] . "'>" . $row['Unipt'] . "</option>";
                                    }
                                }
                            }
                            ?>
                            <?php if(empty($_SESSION["city"])){
                                $sql1 = "select Unipt from user";
                                $res1 = $conn->query($sql1);
                                if ($res1->num_rows >= 0) {
                                    while ($row1 = $res1->fetch_assoc()) {
                                        echo "<option value='" . $row1['Unipt'] . "'>" . $row1['Unipt'] . "</option>";
                                    }
                                }
                            }
                            ?>
                        </select>
                        <input id="bussub" type="submit" name="bussub" value="">
                    </td>
                    <td><div id="createNB"><p>New Business</p></div></td>
                    <td><div id="busM"><p>Manage Business</p></div></td>
                    <td><input id="Alogout" type="submit" name="Alogout" value="LogOut"></td>
                </tr>
            </table>
        </form>
    </div>
    <?php endif; ?>
    <div id="admAction" style="width: inherit;height: inherit">
        <?php if(isset($_GET["nipt"])){
            $nipt=$_GET["nipt"];
            $sql="select * from user where Unipt='$nipt'";
            $res=$conn->query($sql);
            if($res->num_rows==1){
                $row=$res->fetch_assoc();
                $emer=$row['Uemer'];
                $qytet=$row["Uqytet"];
                $adresa=$row['Uadresa'];
                $percent=$row["Upercent"];
                echo "<div class='busM'>";
                echo "<form method='post' action='Acredandpinchecker.php'>";
                echo "<table width='95%' border='1' style='margin-top: 20px;border: 2px solid green'>";
                echo "<tr style='color: black'><th>Nipt</th><th>Emri Subjektit</th><th>Qyteti</th><th>Perqindja %</th><th style='border: 1px solid green;color: green'>Modifiko</th></tr>";
                echo "<tr>";
                echo "<td style='width: 20%'><input style='height: 100%;width: 100%' type='text' name='unipt' value='".$nipt."'></td>";
                echo "<td style='width: 20%'><input style='height: 100%;width: 100%' type='text' name='uemer' value='".$emer."'></td>";
                echo "<td style='width: 20%'><input style='height: 100%;width: 100%' type='text' name='uqytet' value='".$qytet."' title='".$adresa."'></td>";
                echo "<td style='width: 20%'><select style='height: 100%;width: 100%' name='upercent'>";
                echo "<option style='background-color: orange;color: white' value='".$percent."'>".($percent*100)." %</option>";
                echo "<option value='0.001'>0.1 %</option>";
                echo "<option value='0.002'>0.2 %</option>";
                echo "<option value='0.003'>0.3 %</option>";
                echo "<option value='0.004'>0.4 %</option>";
                echo "<option value='0.005'>0.5 %</option>";
                echo "<option value='0.006'>0.6 %</option>";
                echo "<option value='0.007'>0.7 %</option>";
                echo "<option value='0.008'>0.8 %</option>";
                echo "<option value='0.009'>0.9 %</option>";
                echo "<option value='0.01'>1 %</option>";
                echo "<option value='0.011'>1.1 %</option>";
                echo "<option value='0.012'>1.2 %</option>";
                echo "<option value='0.013'>1.3 %</option>";
                echo "<option value='0.014'>1.4 %</option>";
                echo "<option value='0.015'>1.5 %</option>";
                echo "<option value='0.016'>1.6 %</option>";
                echo "<option value='0.017'>1.7 %</option>";
                echo "<option value='0.018'>1.8 %</option>";
                echo "<option value='0.019'>1.9 %</option>";
                echo "<option value='0.02'>2 %</option>";
                echo "<option value='0.021'>2.1 %</option>";
                echo "<option value='0.022'>2.2 %</option>";
                echo "<option value='0.023'>2.3 %</option>";
                echo "<option value='0.024'>2.4 %</option>";
                echo "<option value='0.025'>2.5 %</option>";
                echo "<option value='0.026'>2.6 %</option>";
                echo "<option value='0.027'>2.7 %</option>";
                echo "<option value='0.028'>2.8 %</option>";
                echo "<option value='0.029'>2.9 %</option>";
                echo "<option value='0.03'>3 %</option>";
                echo "</select></td>";
                echo "<td style='width: 20%'><input style='border:none;height: 100%;width: 100%;background-color: green;color: white;font-weight: bold' type='submit' name='percMod' value='Modifiko'></td>";
                echo "</tr></table>";
                echo "</form>";
                echo "</div>";
            }}
        ?>
    </div>
</center>
</body>
</html>

