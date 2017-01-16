 <?php include($_SERVER['DOCUMENT_ROOT'].'/ClassicModels/header.php');
////////////////
//QUESTION 2.2//
////////////////
?>
<main>
	<h2>View/Update Product</h2>
	<form action="" method="post" id="aligned">
		<label>Name:</label>
		<input type="text" name="productName" value="<?php echo $productInfos['productName']; ?>">
		<br>

		<label>Product Line:</label>
		<select name="productLine">
			<?php foreach ($product_line_list as $pro_llist):?>

				<?php if (($pro_llist['productLine']) == $productInfos['productLine']):?>

					<option selected value="<?php echo ($pro_llist['productLine']);?>" ><?php echo ($pro_llist['productLine']);?></option>

				<?php else: ?>

					<option  value="<?php echo ($pro_llist['productLine']);?>"><?php echo ($pro_llist['productLine']);?></option>

				<?php endif; ?>

			<?php endforeach; ?>
		</select>
		<br>

		<label>Scale:</label>
		<input type="text" name="productScale" value="<?php echo $productInfos['productScale']; ?>">
		<br>

		<label>Vendor:</label>
		<input type="text" name="productVendor" value="<?php echo $productInfos['productVendor']; ?>">
		<br>

		<label>Description:</label>
		<textarea type="text" name="productDescription" ><?php echo $productInfos['productDescription']; ?></textarea>
		<br>

		<label>QTY in Stock:</label>
		<input type="text" name="quantityInStock" value="<?php echo $productInfos['quantityInStock']; ?>">
		<br>

		<label>Selling Price:</label>
		<input type="text" name="buyPrice" value="<?php echo $productInfos['buyPrice'];?>">
		<br>

		<label>Manufacturer Price:</label>
		<input type="text" name="MSRP" value="<?php echo $productInfos['MSRP']; ?>">
		<br>
		
		<input type="hidden" name="action" value="product_update">
		<input type="hidden" name="productCode" value="<?php echo $productCode; ?>">
		<input type="submit" value="Update Product">

	</form>
</main>


 <?php include($_SERVER['DOCUMENT_ROOT'].'/ClassicModels/footer.php');?>