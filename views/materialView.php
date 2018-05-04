<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>

<!-- add -->
<?php echo form_open('material/addMaterial'); ?>
<h3>Add</h3>
Material ID:
<input type="text" name="materialID">
Material name:
<input type="text" name="materialName">
Purchase condition:
<select name="purchaseCondition">
    <option value="normal" selected>一般</option>
    <option value="special">特採</option>
</select>
<br>
Using department:
<input type="text" name="usingDepartment">
Total package number:
<input type="text" name="totalPackageNumber">
Total weight:
<input type="text" name="totalWeight"><br>
<input type="submit" value="add">
</form>

<!-- query -->
<?php echo form_open('material/queryMaterial'); ?>
<h3>Query</h3>
Item name:
<select name="queryMaterialColumn">
    <option value="materialName" selected>materialName</option>
    <option value="purchaseCondition">purchaseCondition</option>
    <option value="usingDepartment">usingDepartment</option>
</select>
<input type="text" name="queryMaterialValue"><br>
<input type="submit" value="query">
</form>
