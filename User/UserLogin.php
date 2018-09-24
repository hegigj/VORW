<?php
include ("Udb.php");
include ("Ucredchecker.php");
?>
<html>
<head>
    <title>VORW-Business Login</title>
    <link rel="icon" href="">
    <link rel="stylesheet" href="userStyle.css">
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="userScript.js" rel="text/javascript"></script>
</head>
<body>
<center>
    <div id="userLogin">
        <table style="padding-top: 2px;padding-left: 2px;padding-right: 2px" border="0" width="100%">
            <tr>
                <td id="regUsr" style="border:2px solid white;background-color: green;color: white"><p>Register User</p></td>
                <td id="logUsr"><p>User Login</p></td>
            </tr>
        </table>
        <h3 class="usrH">New User Registration</h3>
        <form method="post" action="">
            <p><input type="text" name="nipt" placeholder="Nipt" title="Vendosni niptin e biznesit tuaj"></p>
            <p><input type="text" name="emer" placeholder="Subjekti" title="Vendosni emrin e subjektit(biznesit) tuaj"></p>
            <p><select name="qytet" title="Perzgjidhni qytetin ku ndodhet biznesit juaj">
                    <option>Perzgjidh Qytetin</option>
                    <option value="Tirane">Tirane</option>
                    <option value="Durres">Durres</option>
                    <option value="Elbasan">Elbasan</option>
                    <option value="Shkoder">Shkoder</option>
                    <option value="Fier">Fier</option>
                    <option value="Berat">Berat</option>
                    <option value="Vlore">Vlore</option>
                    <option value="Gjirokaster">Gjirokaster</option>
                    <option value="Korce">Korce</option>
                    <option value="Sarande">Sarande</option>
                </select></p>
            <p><textarea name="adresa" placeholder="Adresa" cols="10" rows="4" title="Vendosni adresen e sakte te biznesit tuaj"></textarea> </p>
            <p><input type="text" name="email" placeholder="E-Mail" title="Vendosni emailin e biznesit tuaj ose ate personal"></p>
            <p><input type="text" name="tel" placeholder="Numri Tel/Mob" title="Vendosni numrin e tel/mob te biznesit tuaj ose ate personal"></p>
            <p><input type="text" name="username" placeholder="Krijoni nje Username" title="Vendosni nje userneme per biznesin tuaj"></p>
            <p><input type="text" name="password" placeholder="Krijoni nje Password" title="Vendosni nje password per biznesin tuaj"></p>
            <p><input type="text" name="wifiname" placeholder="Default Getway i Wifi Router" title="Vendosni default getway-in e ruterit te wifi-se tuaj"></p>
            <p><input type="text" name="wifipass" placeholder="Kodi Unik i URL-se" title="Vendosni nje kod unik qe do identifikoj biznesin tuaj(psh 'h1e2g3i1238GJ0k')"></p>
            <p><input id="usrReg" type="submit" name="usrCreateB" value="Regjistro"></p>
        </form>
    </div>
</center>
</body>
</html>
