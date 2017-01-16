 <?php include($_SERVER['DOCUMENT_ROOT'].'/ClassicModels/header.php');
////////////////
//QUESTION 2.2//
////////////////
?>
<main>
	<h2>Add New Product Line</h2>
	<form action="" method="post" id="aligned">
		<label>Name:</label>
		<input type="text" name="productLine">
		<br>

		<label>Description:</label>
		<textarea type="text" name="textDescription" ></textarea>
		<br>
		
		<input type="hidden" name="action" value="add_product_line">
		<input type="submit" value="Add Product Line">

	</form>
</main>


 <?php include($_SERVER['DOCUMENT_ROOT'].'/ClassicModels/footer.php');?>