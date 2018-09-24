<?php
include ("Cdb.php");
include ("Ccredchecker.php");
?>
<meta name="viewport" content="initial-scale=1, viewport-fit=cover">
<link rel="stylesheet" href="clientStyle.css">
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
<script type="text/javascript" src="../Assets/cookiePlugin/jquery.cookie.js"></script>
<script src="clientScript.js" rel="text/javascript"></script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<center>
    <h1 class="cliH">Mire se vini ne:</h1>
    <br>
    <img src="<?php echo "../Assets/".$_SESSION['ClientConnection'][2]; ?>" alt="Business Logo">
    <br>
    <video controls>
        <source src="../Assets/description.MP4" type="video/mp4">
    </video>
    <br>
    <h1 style="color: white;font-weight: bold;font-family: 'Arial Black'">Manuali i Aplikacionit dhe lehtesira</h1>
    <br>
    <div id="proceed">Vazhdoj</div>
    <br>
</center>
