<?php
include ("Udb.php");
include ("Ucredchecker.php");
?>
<script src="userScript.js" rel="text/javascript"></script>
<table style="padding-top: 2px;padding-left: 2px;padding-right: 2px" border="0" width="100%">
    <tr>
        <td style="border:2px solid white;background-color: green;color: white;width: 33%"><p>Register Merchandise</p></td>
        <td style="width: 33%" id="usrRRP"><p>Register Row Products</p></td>
        <td style="width: 33%" id="usrMI"><p>Manage Inventory</p></td>
    </tr>
</table>
<h3 class="usrH">Merchandise Entries</h3>
<form method="post" action="Ucredchecker.php">
    <p><input type="hidden" name='Mnuis' value='<?php echo $_SESSION["UserNuis"][0];?>'></p>
    <p><input type="text" name="MnrFat" placeholder="Entry Bill Nr." title="Vendosni numrin e fatures" maxlength="10"></p>
    <p><input type="text" name="MnrSer" placeholder="Entry Bill Serial Nr." title="Vendosni numrin serial te fatures" maxlength="10"></p>
    <p><input type="text" name="MdataRegj" placeholder="Entry Bill Date" title="Vendosni daten fatures(formati: dd/mm/yyyy)"></p>
    <p><input type="text" name="Mfurnitor" placeholder="Supplier Nuis" title="Vendosni nipt-in e Furnitorit" maxlength="10"></p>
    <p><input type="text" name="MemerF" placeholder="Supplier Name" title="Vendosni emrin e Furnitorit" maxlength="50"></p>
    <p><input type="text" name="MqytetF" placeholder="Supplier City" title="Vendosni qytetin e Furnitorit" maxlength="20"></p>
    <p><input type="text" name="Memer" placeholder="Product Name" title="Vendosni emrin e produktit te blere"></p>
    <p>
        <select name="Mnjesia" title="Vendosni njesimatjen e produktit te blere">
            <option>Perzgjidh Njesine</option>
            <option value="1" title="Per cfare do lloje produkti">Cope</option>
            <option value="24" title="Per pijet dhe ka sasin 4x6 cope">Arke</option>
            <option value="20" title="Per cigare dhe ka sasine 20 paketa">Steke</option>
        </select>
    </p>
    <p><input type="text" name="Msasia" placeholder="Product Quantity" title="Vendosni sasine e produktit te blere"></p>
    <p><input type="text" name="Mcmimi" placeholder="Product price" title="Vendosni cmimin e produktit te blere"></p>
    <p><input id="usrReg" type="submit" name="usrMercReg" value="Regjistro"></p>
</form>