<?php
include ("Udb.php");
include ("Ucredchecker.php");
?>
<script src="userScript.js" rel="text/javascript"></script>
<table style="padding-top: 2px;padding-left: 2px;padding-right: 2px" border="0" width="100%">
    <tr>
        <td style="width: 33%" id="usrRM"><p>Register Merchandise</p></td>
        <td style="border:2px solid white;background-color: green;color: white;width: 33%"><p>Register Row Products</p></td>
        <td style="width: 33%" id="usrMI"><p>Manage Inventory</p></td>
    </tr>
</table>
<h3 class="usrH">Row Product Entries</h3>
<form method="post" action="">
    <p><input type="hidden" name='Rnuis' value='<?php echo $_SESSION["UserNuis"][0];?>'></p>
    <p><input type="text" name="RnrFat" placeholder="Entry Bill Nr." title="Vendosni numrin e fatures" maxlength="10"></p>
    <p><input type="text" name="RnrSer" placeholder="Entry Bill Serial Nr." title="Vendosni numrin serial te fatures" maxlength="10"></p>
    <p><input type="text" name="RdataRegj" placeholder="Entry Bill Date" title="Vendosni daten fatures(formati: dd/mm/yyyy)"></p>
    <p><input type="text" name="Rfurnitor" placeholder="Supplier Nuis" title="Vendosni nipt-in e Furnitorit" maxlength="10"></p>
    <p><input type="text" name="RemerF" placeholder="Supplier Name" title="Vendosni emrin e Furnitorit" maxlength="50"></p>
    <p><input type="text" name="RqytetF" placeholder="Supplier City" title="Vendosni qytetin e Furnitorit" maxlength="20"></p>
    <p><input type="text" name="Remer" placeholder="Product Name" title="Vendosni emrin e produktit te blere"></p>
    <p>
        <select name="Rnjesia" title="Vendosni njesimatjen e produktit te blere">
            <option>Perzgjidh Njesine</option>
            <option value="cope" title="Per cfare do lloje produkti">Cope</option>
            <option value="kg" title="Per cfare do lloje produkti">KG</option>
            <option value="lt" title="Per pijet dhe ka sasin 4x6 cope">LT</option>
        </select>
    </p>
    <p><input type="text" name="Rsasia" placeholder="Product Quantity" title="Vendosni sasine e produktit te blere(psh. '2x25', dmth: 2 thase nga 25 kg)"></p>
    <p><input type="text" name="RestQuant" placeholder="Estimate Quantity per Unit" title="Vendosni sasine qe mund te derivoje nga produkti i blere"></p>
    <p><input type="text" name="Rcmimi" placeholder="Product price" title="Vendosni cmimin e produktit te blere"></p>
    <p><input id="usrReg" type="submit" name="usrRPReg" value="Regjistro"></p>
</form>