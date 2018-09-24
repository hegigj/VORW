<?php
include ("Udb.php");
include ("Ucredchecker.php");
?>
<title>VORW-Business Page</title>
<link rel="icon" href="">
<link rel="stylesheet" href="userStyle.css">
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
<script src="userScript.js" rel="text/javascript"></script>
<center>
    <h3 class="usrhh"><?php echo $_SESSION['UserNuis'][0]." Account Management";?></h3>
    <br>
    <h4 style="font-style: italic" class="usrhh">For the client interface you should mail me the <span style="text-decoration: underline">BACKGROUND</span> and <span style="text-decoration: underline">LOGO Photo's</span> of your business</h4>
    <a href="mailto:hgjoka15@epoka.edu.al"><img class="usracc" style="width: 60px!important;height: 60px!important;" src="../Assets/mailicon.png" title="hgjoka15@epoka.edu.al"></a>
    <?php echo "<a href=https://api.whatsapp.com/send?text=".$_SESSION['UserNuis'][0]."&phone=355696952094><img class='usracc' src='../Assets/whatsapp.png' title='+355696952094'></a>"; ?>
    <?php if(isset($_SESSION['UserNuis'])): ?>
    <hr>
    <form method="post" action="">
        <h4 style="font-style: italic" class="usrhh">If you have change router, you need to change IP</h4>
        <input type="hidden" name="npt" value="<?php echo $_SESSION['UserNuis'][0]; ?>">
        <p><input style="width: 30%!important;border: 2px solid green" type="text" name="wifin" value="<?php echo $_SESSION['UserNuis'][1]; ?>" title="Kjo eshte ip-ja e vjeter, per ta ndyshuar duhet te klikoni dhe te shtypni ip-ne e re"></p>
        <p><input style="width: 30%!important;font-size: 13pt;font-weight: bold;background-color: green;color: white" type="submit" name="wifichange" value="Change"></p>
    </form>
    <?php endif; ?>
</center>


