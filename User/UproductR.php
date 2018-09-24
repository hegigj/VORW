<?php
include ("Udb.php");
include ("Ucredchecker.php");
?>
<script src="userScript.js" rel="text/javascript"></script>
<table style="padding-top: 2px;padding-left: 2px;padding-right: 2px" border="0" width="100%">
    <tr>
        <td style="border:2px solid white;background-color: green;color: white"><p>Register Products</p></td>
        <td id="usrMP"><p>Manage Products</p></td>
    </tr>
</table>
<h3 class="usrH">New Product Category Registration</h3>
<form method="post" action="">
    <p><input type="hidden" name='Pnuis' value='<?php echo $_SESSION["UserNuis"][0];?>'></p>
    <input style="height: 15px!important;width: 15px!important;" type="radio" name='Ppkategori' value='BAR'><span style="color: white">...for Bar</span>
    <input style="height: 15px!important;width: 15px!important;" type="radio" name='Ppkategori' value='RES'><span style="color: white">...for Restaurant</span>
    <p><input type="text" name="Pkategori" placeholder="Create Product Category" title="Krijoni nje kategori menuje(psh: Pije Freskuse)"></p>
    <p><input id="usrReg" type="submit" name="Preg" value="Create"></p>
    <hr>
    <h3 class="usrH">New Product Registration</h3>
    <!--Regjistrim produktesh-->
        <p><input type="hidden" name='pnuis' value='<?php echo $_SESSION["UserNuis"][0];?>'></p>
        <?php
        $pnuis=$_SESSION["UserNuis"][0];
        $sql="select * from pkategori where Unipt='$pnuis'";
        $res=$conn->query($sql);
        echo "<select name='pkategori'>";
        if($res->num_rows>0){
            echo "<option>Perzgjidh Kategorine</option>";
            while($row=$res->fetch_assoc()){
                echo "<option name='".$row['Pkategori']."'>".$row['Pkategori']."</option>";
            }
        }
        else{
            echo "<option>Krijoni kategori</option>";
        }
        echo "</<select>";
        ?>
        <p><input style="margin-top: 10px" type="text" name="Pemer" placeholder="Product Name" title="Vendosni emrin e produktit"></p>
        <p><textarea name="Ppershkrim" placeholder="Product Description" cols="10" rows="4" title="Vendosni nje pershkrim per produktin sa me shkurt"></textarea> </p>
        <p>
            <select name="Pnjesia" title="Vendosni njesimatjen e produktit">
                <option>Perzgjidh Njesine</option>
                <option value="cope">Cope</option>
                <option value="gram">Gram</option>
                <option value="litra">Litra</option>
                <option value="mililitra">Mililitra</option>
                <option value="shishe">Shishe</option>
            </select>
        </p>
        <p><input type="text" name="Pcmimi" placeholder="Product price" title="Vendosni cmimin e produktit"></p>
        <p><input id="usrReg" type="submit" name="usrProdReg" value="Regjistro"></p>
    </form>