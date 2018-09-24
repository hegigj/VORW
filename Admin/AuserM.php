<?php
include("Adb.php");
include("Acredandpinchecker.php");
echo "<script src='https://code.jquery.com/jquery-3.3.1.js' integrity='sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=' crossorigin='anonymous'></script>";
echo "<link rel='stylesheet' href='AdminStylePC.css'>";
echo "<script src='AdminScript.js' rel='text/javascript'></script>";
if (empty($_SESSION["city"]) && empty($_SESSION["nuis"])) {
    echo "<div class='busM'>";
    echo "<table width='50%' border='0' style='margin-top: 10px'><tr><td style='text-align:center;border-radius:8px;background-color: green;width: 50%;color: white' title='Biznesi e ka kryer pagesen mujore'>Biznesi e ka kryer pagesen</td><td style='text-align:center;border-radius:8px;background-color: red;width: 50%;color: white' title='Biznesi duhet te kryej pagesen mujore qe shfaqet tek Pagesa Mujore!!!'>Biznesi duhet te kryej pagesen</td></tr></table>";
    echo "<table width='90%' border='1' style='margin-bottom: 10px'>";
    echo "<tr><th style='color: black'>Nr:</th><th style='color: black'>Nipt</th><th style='color: black'>Emeri Subjektit</th><th style='color: black'>Qyteti</th><th style='color: black'>Nr. Tel/Mob</th><th style='color: black'>Username</th><th style='color: black'>Password</th><th style='border: 1px solid orangered;color: orangered'>Pagesa Mujore</th><th style='border: 1px solid green;color: green'>Paguaj</th><th style='border: 1px solid red;color: red'>Crregjistro</th></tr>";
    $sql2 = "SELECT Uid, Unipt, Uemer, Uqytet, Uadresa, Utel, Udata, Uusername, Upassword, Ushitje FROM user";
    $res2 = $conn->query($sql2);
    $nr = 1;
    $today = date("Y-m-d");
    $today1 = strtotime($today);
    if ($res2->num_rows > 0) {
        while ($row2 = $res2->fetch_assoc()) {
            $id = $row2['Uid'];
            $nipt = $row2['Unipt'];
            $date = strtotime($row2["Udata"]);
            $status = $today1 - $date;
            $status1 = floor($status / (60 * 60 * 24));
            $link = "";
            if ($status1 < 30) {
                $col = "green";
            } else {
                $col = "red";
                $link .= "ApayB.php?id=$id";
            }

            echo "<tr style='text-align:center;background-color: $col'>";
            echo "<td>" . $nr . "</td>";
            echo "<td>" . $row2['Unipt'] . "</td>";
            echo "<td>" . $row2['Uemer'] . "</td>";
            echo "<td title='" . $row2['Uadresa'] . "'>" . $row2['Uqytet'] . "</td>";
            echo "<td>" . $row2['Utel'] . "</td>";
            echo "<td>" . $row2['Uusername'] . "</td>";
            echo "<td>" . $row2['Upassword'] . "</td>";
            echo "<td><a style='text-decoration:none;color:white' href=AdminPercent.php?nipt=" . $nipt . " title='Klikoni ketu per te modifikuar perqindjen mujore te biznesit'>" . $row2['Ushitje'] . " ALL" . "</a></td>";
            echo "<td style='background-color:white;border:2px solid green;font-weight:bold'><a style='color:green;text-decoration:none' href=" . $link . ">Paguaj</a></td>>";
            echo "<td style='background-color:white;border:2px solid red;font-weight:bold'><a style='text-decoration:none;color:red' href=AdeleteB.php?nipt=" . $nipt . ">Cregjistro</a></td>";
            echo "</tr>";
            $nr++;
        }
    } else {
        echo "";
    }
    echo "</table>";
    echo "</div>";
}
if (isset($_SESSION["city"]) && empty($_SESSION["nuis"])) {
    echo "<div class='busM'>";
    echo "<table width='50%' border='0' style='margin-top: 10px'><tr><td style='text-align:center;border-radius:8px;background-color: green;width: 50%;color: white' title='Biznesi e ka kryer pagesen mujore'>Biznesi e ka kryer pagesen</td><td style='text-align:center;border-radius:8px;background-color: red;width: 50%;color: white' title='Biznesi duhet te kryej pagesen mujore qe shfaqet tek Pagesa Mujore!!!'>Biznesi duhet te kryej pagesen</td></tr></table>";
    echo "<table width='90%' border='1' style='margin-top: 10px;margin-bottom: 10px'>";
    echo "<tr><th style='color: black'>Nr:</th><th style='color: black'>Nipt</th><th style='color: black'>Emeri Subjektit</th><th style='color: black'>Qyteti</th><th style='color: black'>Nr. Tel/Mob</th><th style='color: black'>Username</th><th style='color: black'>Password</th><th style='border: 1px solid orangered;color: orangered'>Pagesa Mujore</th><th style='border: 1px solid green;color: green'>Paguaj</th><th style='border: 1px solid red;color: red'>Crregjistro</th></tr>";
    $c = $_SESSION["city"];
    $sql2 = "select Uid,Unipt,Uemer,Uqytet,Uadresa,Utel,Udata,Uusername,Upassword,Ushitje from user where Uqytet='$c'";
    $res2 = $conn->query($sql2);
    $nr = 1;
    $today = date("Y-m-d");
    $today1 = strtotime($today);
    if ($res2->num_rows > 0) {
        while ($row2 = $res2->fetch_assoc()) {
            $id = $row2['Uid'];
            $nipt = $row2['Unipt'];
            $date = strtotime($row2["Udata"]);
            $status = $today1 - $date;
            $status1 = floor($status / (60 * 60 * 24));
            $link = "";
            if ($status1 < 30) {
                $col = "green";
            } else {
                $col = "red";
                $link .= "ApayB.php?id=$id";
            }
            echo "<tr style='text-align:center;background-color: $col'>";
            echo "<td>" . $nr . "</td>";
            echo "<td>" . $row2['Unipt'] . "</td>";
            echo "<td>" . $row2['Uemer'] . "</td>";
            echo "<td title='" . $row2['Uadresa'] . "'>" . $row2['Uqytet'] . "</td>";
            echo "<td>" . $row2['Utel'] . "</td>";
            echo "<td>" . $row2['Uusername'] . "</td>";
            echo "<td>" . $row2['Upassword'] . "</td>";
            echo "<td><a style='text-decoration:none;color:white' href=AdminPercent.php?nipt=" . $nipt . " title='Klikoni ketu per te modifikuar perqindjen mujore te biznesit'>" . $row2['Ushitje'] . " ALL" . "</a></td>";
            echo "<td style='background-color:white;border:2px solid green;font-weight:bold'><a style='color:green;text-decoration:none' href=" . $link . ">Paguaj</a></td>>";
            echo "<td style='background-color:white;border:2px solid red;font-weight:bold'><a style='text-decoration:none;color:red' href=AdeleteB.php?nipt=" . $nipt . ">Cregjistro</a></td>";
            echo "</tr>";
            $nr++;
        }
    } else {
        echo "";
    }
    echo "</table>";
    echo "</div>";
}
if (empty($_SESSION["city"]) && isset($_SESSION["nuis"])) {
    echo "<div class='busM'>";
    echo "<table width='50%' border='0' style='margin-top: 10px'><tr><td style='text-align:center;border-radius:8px;background-color: green;width: 50%;color: white' title='Biznesi e ka kryer pagesen mujore'>Biznesi e ka kryer pagesen</td><td style='text-align:center;border-radius:8px;background-color: red;width: 50%;color: white' title='Biznesi duhet te kryej pagesen mujore qe shfaqet tek Pagesa Mujore!!!'>Biznesi duhet te kryej pagesen</td></tr></table>";
    echo "<table width='90%' border='1' style='margin-top: 10px;margin-bottom: 10px'>";
    echo "<tr><th style='color: black'>Nr:</th><th style='color: black'>Nipt</th><th style='color: black'>Emeri Subjektit</th><th style='color: black'>Qyteti</th><th style='color: black'>Nr. Tel/Mob</th><th style='color: black'>Username</th><th style='color: black'>Password</th><th style='border: 1px solid orangered;color: orangered'>Pagesa Mujore</th><th style='border: 1px solid green;color: green'>Paguaj</th><th style='border: 1px solid red;color: red'>Crregjistro</th></tr>";
    $n = $_SESSION["nuis"];
    $sql2 = "select Uid,Unipt,Uemer,Uqytet,Uadresa,Utel,Udata,Uusername,Upassword,Ushitje from user where Uqytet='$n'";
    $res2 = $conn->query($sql2);
    $nr = 1;
    $today = date("Y-m-d");
    $today1 = strtotime($today);
    if ($res2->num_rows > 0) {
        while ($row2 = $res2->fetch_assoc()) {
            $id = $row2['Uid'];
            $nipt = $row2['Unipt'];
            $date = strtotime($row2["Udata"]);
            $status = $today1 - $date;
            $status1 = floor($status / (60 * 60 * 24));
            $link = "";
            if ($status1 < 30) {
                $col = "green";
            } else {
                $col = "red";
                $link .= "ApayB.php?id=$id";
            }
            echo "<tr style='text-align:center;background-color: $col'>";
            echo "<td>" . $nr . "</td>";
            echo "<td>" . $row2['Unipt'] . "</td>";
            echo "<td>" . $row2['Uemer'] . "</td>";
            echo "<td title='" . $row2['Uadresa'] . "'>" . $row2['Uqytet'] . "</td>";
            echo "<td>" . $row2['Utel'] . "</td>";
            echo "<td>" . $row2['Uusername'] . "</td>";
            echo "<td>" . $row2['Upassword'] . "</td>";
            echo "<td><a style='text-decoration:none;color:white' href=AdminPercent.php?nipt=" . $nipt . " title='Klikoni ketu per te modifikuar perqindjen mujore te biznesit'>" . $row2['Ushitje'] . " ALL" . "</a></td>";
            echo "<td style='background-color:white;border:2px solid green;font-weight:bold'><a style='color:green;text-decoration:none' href=" . $link . ">Paguaj</a></td>>";
            echo "<td style='background-color:white;border:2px solid red;font-weight:bold'><a style='text-decoration:none;color:red' href=AdeleteB.php?nipt=" . $nipt . ">Cregjistro</a></td>";
            echo "</tr>";
            $nr++;
        }
    } else {
        echo "";
    }
    echo "</table>";
    echo "</div>";
}
if (isset($_SESSION["city"]) && isset($_SESSION["nuis"])) {
    echo "<div class='busM'>";
    echo "<table width='50%' border='0' style='margin-top: 10px'><tr><td style='text-align:center;border-radius:8px;background-color: green;width: 50%;color: white' title='Biznesi e ka kryer pagesen mujore'>Biznesi e ka kryer pagesen</td><td style='text-align:center;border-radius:8px;background-color: red;width: 50%;color: white' title='Biznesi duhet te kryej pagesen mujore qe shfaqet tek Pagesa Mujore!!!'>Biznesi duhet te kryej pagesen</td></tr></table>";
    echo "<table width='90%' border='1' style='margin-top: 10px;margin-bottom: 10px'>";
    echo "<tr><th style='color: black'>Nr:</th><th style='color: black'>Nipt</th><th style='color: black'>Emeri Subjektit</th><th style='color: black'>Qyteti</th><th style='color: black'>Nr. Tel/Mob</th><th style='color: black'>Username</th><th style='color: black'>Password</th><th style='border: 1px solid orangered;color: orangered'>Pagesa Mujore</th><th style='border: 1px solid green;color: green'>Paguaj</th><th style='border: 1px solid red;color: red'>Crregjistro</th></tr>";
    $c = $_SESSION["city"];
    $n = $_SESSION["nuis"];
    $sql2 = "select Uid,Unipt,Uemer,Uqytet,Uadresa,Utel,Udata,Uusername,Upassword,Ushitje from user where Unipt='$n' and Uqytet='$c'";
    $res2 = $conn->query($sql2);
    $nr = 1;
    $today = date("Y-m-d");
    $today1 = strtotime($today);
    if ($res2->num_rows > 0) {
        while ($row2 = $res2->fetch_assoc()) {
            $id = $row2['Uid'];
            $nipt = $row2['Unipt'];
            $date = strtotime($row2["Udata"]);
            $status = $today1 - $date;
            $status1 = floor($status / (60 * 60 * 24));
            $link = "";
            if ($status1 < 30) {
                $col = "green";
            } else {
                $col = "red";
                $link .= "ApayB.php?id=$id";
            }
            echo "<tr style='text-align:center;background-color: $col'>";
            echo "<td>" . $nr . "</td>";
            echo "<td>" . $row2['Unipt'] . "</td>";
            echo "<td>" . $row2['Uemer'] . "</td>";
            echo "<td title='" . $row2['Uadresa'] . "'>" . $row2['Uqytet'] . "</td>";
            echo "<td>" . $row2['Utel'] . "</td>";
            echo "<td>" . $row2['Uusername'] . "</td>";
            echo "<td>" . $row2['Upassword'] . "</td>";
            echo "<td><a style='text-decoration:none;color:white' href=AdminPercent.php?nipt=" . $nipt . " title='Klikoni ketu per te modifikuar perqindjen mujore te biznesit'>" . $row2['Ushitje'] . " ALL" . "</a></td>";
            echo "<td style='background-color:white;border:2px solid green;font-weight:bold'><a style='color:green;text-decoration:none' href=" . $link . ">Paguaj</a></td>";
            echo "<td style='background-color:white;border:2px solid red;font-weight:bold'><a style='text-decoration:none;color:red' href=AdeleteB.php?nipt=" . $nipt . ">Cregjistro</a></td>";
            echo "</tr>";
            $nr++;
        }
    } else {
        echo "";
    }
    echo "</table>";
    echo "</div>";
}

