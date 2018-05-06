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
    <option value="materialID" selected>materialID</option>
    <option value="materialName" selected>materialName</option>
</select>
<input type="text" name="queryMaterialValue"><br>
<input type="submit" value="query">
</form>
