<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>

<!-- add -->
<?php echo form_open('finishedgood/addFinishedGood'); ?>
<h3>Add</h3>
finishedGoodID:
<input type="text" name="finishedGoodID">
finishedGoodType:
<input type="text" name="finishedGoodType">
unitWeight:
<input type="text" name="unitWeight">
packageNumberOfPallet:
<input type="text" name="packageNumberOfPallet"><br>
<input type="submit" value="add">
</form>

<!-- query -->
<?php echo form_open('finishedgood/queryFinishedGood'); ?>
<h3>Query</h3>
Item name:
<select name="queryMaterialColumn">
    <option value="finishedGoodID" selected>finishedGoodID</option>
    <option value="finishedGoodType" >finishedGoodType</option>
</select>
<input type="text" name="queryMaterialValue"><br>
<input type="submit" value="query">
</form>
