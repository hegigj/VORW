<?php
include ("Wdb.php");
include ("Wcredchecker.php");
?>
<html>
<head>
    <title>VORW-Waiter Login</title>
    <link rel="icon" href="">
    <link rel="stylesheet" href="waiterStyle.css">
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="waiterScript.js" rel="text/javascript"></script>
</head>
<body>
<center>
    <div class="waitLog">
        <h3 class="waitH">Waiter Login</h3>
        <form method="post" action="">
            <p><input type="text" name="waitnam" placeholder="Username" title="Ventosni Username-in tuaj"></p>
            <p><input type="password" name="waitpass" placeholder="Password" title="Ventosni Password-in tuaj"></p>
            <p><input style="font-size: 13pt;font-weight: bold;background-color: white" type="submit" name="waitlog" value="Login"></p>
        </form>
    </div>
</center>
</body>
</html>
