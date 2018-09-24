<?php
include ("Adb.php");
include ("Acredandpinchecker.php");
if(empty($_SESSION["Apinlog"])){
    header("location: AdminLogin.php");
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
    <div id="admAction" style="width: inherit;height: inherit"></div>
</center>
</body>
</html>

