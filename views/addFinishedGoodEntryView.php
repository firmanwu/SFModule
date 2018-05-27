<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php echo form_open('finishedgoodentry/addFinishedGoodEntry'); ?>
<h3>Add</h3>
finishedGoodEntryID:<br>
<input type="text" name="finishedGoodEntryID"><br>
Serial number:<br>
<input type="text" name="serialNumber"><br>
status:<br>
<input type="text" name="status"><br>
storedArea:<br>
<input type="text" name="storedArea"><br>
product:<br>
<input type="text" name="product"><br>
batchNumber:<br>
<input type="text" name="batchNumber"><br>
storedDate:<br>
<input type="text" name="storedDate"><br>
storedPackageNumber:<br>
<input type="text" name="storedPackageNumber"><br>
<input type="submit" value="add">
</form>

<!-------------------------------------- -->
<?php echo form_open('finishedgoodentry/queryFinishedGoodEntry'); ?>
<h3>Query</h3>
Item name:
<select name="queryMaterialEntryColumn">
    <option value="materialEntryID" selected>materialEntryID</option>
    <option value="serialNumber" selected>serialNumber</option>
</select>
<input type="text" name="queryMaterialEntryValue"><br>
<input type="submit" value="query">
</form>
