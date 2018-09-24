<?php
include("Adb.php");
include("Acredandpinchecker.php");
?>
<html>
<head>
    <title>VORW-Administrator Login</title>
    <link rel="icon" href="">
    <link rel="stylesheet" href="AdminStylePC.css">
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="AdminScript.js" rel="text/javascript"></script>
</head>
<body>
<form method="post" action="">
    <center>
        <?php if(empty($_SESSION["Acred"])&&empty($_SESSION["Apinlog"])): ?>
        <div class="admLog">
            <p><img src="" alt="Virtual.Order.Retriever.Waiter"></p>
            <p><h3 class="logoName">V.O.R.W</h3></p>
            <p><input type="text" placeholder="Administrator Name" title="Vendosni emrin tuaj" name="Aemer"></p>
            <p><input type="text" placeholder="Administrator Surname" title="Vendosni mbiemrin tuaj" name="Ambiemer"></p>
            <p><input type="text" placeholder="Administrator Username" title="Vendosni username-in tuaj" name="Ausername"></p>
            <p><input type="password" placeholder="Administrator Password" title="Vendosni password-in tuaj" name="Apassword"></p>
            <p><input class="Alogsub butColor" type="submit" name="Acredsub" value="Verify"></p>
        </div>
        <?php elseif(isset($_SESSION["Acred"])&&$_SESSION["Acred"]=="OK"): ?>
            <div class="admLog">
                <p><img src="" alt="Virtual.Order.Retriever.Waiter"></p>
                <p><h3 class="logoName">V.O.R.W</h3></p>
                <p><input type="text" placeholder="Administrator Name" title="Vendosni emrin tuaj" name="Aemer"></p>
                <p><input type="text" placeholder="Administrator Surname" title="Vendosni mbiemrin tuaj" name="Ambiemer"></p>
                <p><input type="text" placeholder="Administrator Username" title="Vendosni username-in tuaj" name="Ausername"></p>
                <p><input type="password" placeholder="Administrator Password" title="Vendosni password-in tuaj" name="Apassword"></p>
                <p><input class="Alogsub butColor" type="submit" name="Aconpin" value="Enter Pin"></p>
            </div>
        <?php elseif(isset($_SESSION["Acred"])&&$_SESSION["Acred"]=="NO"): ?>
            <div class="admLog">
                <p><img src="" alt="Virtual.Order.Retriever.Waiter"></p>
                <p><h3 class="logoName">V.O.R.W</h3></p>
                <p><input type="text" placeholder="Administrator Name" title="Vendosni emrin tuaj" name="Aemer"></p>
                <p><input type="text" placeholder="Administrator Surname" title="Vendosni mbiemrin tuaj" name="Ambiemer"></p>
                <p><input type="text" placeholder="Administrator Username" title="Vendosni username-in tuaj" name="Ausername"></p>
                <p><input type="password" placeholder="Administrator Password" title="Vendosni password-in tuaj" name="Apassword"></p>
                <p><input class="Alogsub butColor" type="submit" name="Acredsub" value="Reverify"></p>
            </div>
        <?php elseif(isset($_SESSION["Apinlog"])&&$_SESSION["Apinlog"]=="OK"): ?>
            <div class="admLog Apini">
                <p><img src="" alt="Virtual.Order.Retriever.Waiter"></p>
                <p><h3 class="logoName">V.O.R.W</h3></p>
                <h2 class="logoName">For Further Security</h2>
                <p><input type="password" name="Apin" maxlength="4" placeholder="Administrator Pin"></p>
                <p><input class="Alogsub" type="submit" name="Apinsub" value="Log In"></p>
            </div>
        <?php endif; ?>
    </center>
</form>
</body>
</html>
