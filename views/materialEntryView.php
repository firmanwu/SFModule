<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php echo form_open('materialentry/addMaterialEntry'); ?>
<h3>Add</h3>
Material entry ID:<br>
<input type="text" name="materialEntryID"><br>
Serial number:<br>
<input type="text" name="serialNumber"><br>
purchaseOrder:<br>
<input type="text" name="purchaseOrder"><br>
storedArea:<br>
<input type="text" name="storedArea"><br>
QRCode:<br>
material:<br>
<input type="text" name="material"><br>
batchNumber:<br>
<input type="text" name="batchNumber"><br>
storedDate:<br>
<input type="text" name="storedDate"><br>
Supplier:<br>
<input type="text" name="supplier"><br>
packageNumberOfPallet:<br>
<input type="text" name="packageNumberOfPallet"><br>
palletNumber:<br>
<input type="text" name="palletNumber"><br>
<input type="submit" value="add">
</form>

<!-------------------------------------- -->
<?php echo form_open('materialentry/queryMaterialEntry'); ?>
<h3>Query</h3>
Item name:
<select name="queryMaterialEntryColumn">
    <option value="materialEntryID" selected>materialEntryID</option>
    <option value="serialNumber" selected>serialNumber</option>
</select>
<input type="text" name="queryMaterialEntryValue"><br>
<input type="submit" value="query">
</form>
