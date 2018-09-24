<?php
include ("Cdb.php");
include ("Ccredchecker.php");
?>
<html>
<head>
    <title><?php echo $_SERVER['REMOTE_ADDR'];?></title>
    <meta name="viewport" content="initial-scale=1, viewport-fit=cover">
    <link rel="stylesheet" href="clientStyle.css">
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../Assets/cookiePlugin/jquery.cookie.js"></script>
    <script src="clientScript.js" rel="text/javascript"></script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</head>
<?php if(isset($_SESSION['ClientConnection'])): ?>
<body style="background-image: url('<?php echo "../Assets/".$_SESSION['ClientConnection'][3]; ?>')">
<center>
    <div id="content">
        <div id="AL" style="width: 450px!important;height: 450px!important;background: url('../Assets/albania.png')"></div>
        <div id="EN" style="background: url('../Assets/english.png')"></div>
        <div id="EL" style="background: url('../Assets/greek.png')"></div>
        <div id="IT" style="background: url('../Assets/italian.png')"></div>
        <div id="TR" style="background: url('../Assets/turkish.jpg')"></div>
        <script type="text/javascript">
            function googleTranslateElementInit() {
                new google.translate.TranslateElement({
                        pageLanguage: 'sq',
                        layout: google.translate.TranslateElement.InlineLayout.SIMPLE
                    },
                    'google_translate_element');
            }
        </script>
    </div>
</center>
</body>
<?php endif; ?>
</html>
