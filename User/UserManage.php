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
        <img src='<?php echo "../Assets/".$_SESSION['UserNuis'][2]; ?>' alt='Business Logo' style='margin-top: 30px;width: 100px;height: 100px;border-radius: 50%'>
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
        <div id="usrAction"></div>
    <?php endif; ?>
</center>
</body>
</html>
