<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- add -->
<?php echo form_open('supplier/addSupplier'); ?>
<h3>Add</h3>
Supplier ID:<br>
<input type="text" name="supplierID"><br>
Supplier name:<br>
<input type="text" name="supplierName"><br>
Product:<br>
<input type="text" name="product"><br>
Packaging:<br>
<input type="text" name="packaging"><br>
Unit weight:<br>
<input type="text" name="unitWeight"><br>
Price:<br>
<input type="text" name="price"><br>
<input type="submit" value="add">
</form>

<!-- query -->
<?php echo form_open('supplier/querySupplier'); ?>
<h3>Query</h3>
Item name:
<select name="querySupplierColumn">
    <option value="supplierName">supplierName</option>
    <option value="product">product</option>
    <option value="packaging">packaging</option>
    <option value="unitWeight">unitWeight</option>
    <option value="price">price</option>
</select>
<input type="text" name="querySupplierValue"><br>
<input type="submit" value="query">
</form>