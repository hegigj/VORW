<?php
include ("Udb.php");
include ("Ucredchecker.php");
?>
<script src="userScript.js" rel="text/javascript"></script>
<table style="padding-top: 2px;padding-left: 2px;padding-right: 2px" border="0" width="100%">
    <tr>
        <td style="border:2px solid white;background-color: green;color: white"><p>Register Waiter</p></td>
        <td id="usrMW"><p>Manage Waiter</p></td>
    </tr>
</table>
<h3 class="usrH">New Waiter Registration</h3>
<form method="post" action="">
    <p><input type="hidden" name='Wnuis' value='<?php echo $_SESSION["UserNuis"][0];?>'></p>
    <p><input type="hidden" name='data' value='<?php echo date("Y-m-d");?>'></p>
    <p><input type="text" name="Widcard" placeholder="ID Card Number" title="Vendosni numrin e kartes se identitetit te kamarierit(psh:J12345678N)"></p>
    <p><input type="text" name="Wemer" placeholder="Name" title="Vendosni emrin e kamarierit"></p>
    <p><input type="text" name="Wmbiemer" placeholder="Surname" title="Vendosni mbiemrin e kamarierit"></p>
    <p><input type="text" name="Wtel" placeholder="Phone/Mobile Number" title="Vendosni numrin e tel/mob te kamarierit"></p>
    <p>
        <select name="Wpkategori" title="Vendosni njesimatjen e produktit">
            <option value="ALL">All Orders</option>
            <?php if(isset($_SESSION["UserNuis"][0])) {
                $nipt = $_SESSION["UserNuis"][0];
                $sql = "select * from pkategori where Unipt='$nipt'";
                $res = $conn->query($sql);
                if ($res->num_rows >= 0) {
                    while ($row = $res->fetch_assoc()) {
                        if ($pkat != $row['ppkategori']) {
                            $pkat = $row['ppkategori'];
                            if ($pkat == 'BAR') {
                                $val = 'Bar';
                            } else {
                                $val = 'Restaurant';
                            }
                            echo "<option value='" . $pkat . "'>Only for " . $val . " Orders</option>";
                        }
                    }
                }
            }
            ?>
        </select>
    </p>
    <p><input type="text" name="Wusername" placeholder="Create New Username" title="Vendosni nje userneme per kamarierin, sa me te thjesht(psh: shkronja e par e emrit, mbiemrin, turnin)"></p>
    <p><input type="text" name="Wpassword" placeholder="Create New Password" title="Vendosni nje password per kamarierin, sa me te thjesht, qe te mos te humb kohe duke u loguar"></p>
    <p><input type="text" name="Wroga" placeholder="Salary/month" title="Vendosni nje roge baze mujore per kamarierin"></p>
    <p><input id="usrReg" type="submit" name="usrWaitReg" value="Regjistro"></p>
</form>