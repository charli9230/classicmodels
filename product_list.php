 <?php include($_SERVER['DOCUMENT_ROOT'].'/ClassicModels/header.php');?>
<main>
	<ul>
		<?php foreach ($product_line_list as $pro_l_list):?>
			<li>
				<a href="?action=product_list&tdesc=<?php echo ($pro_l_list['productLine']); ?>"> 
				<?php echo ($pro_l_list['productLine']); ?>
				</a>
			</li>
		<?php endforeach; ?>
	</ul>

	<h1><?php echo htmlspecialchars($currently_selected_product); ?></h1>

		<!-- display a table of products -->
		<table>
			<tr>
				<th>Code</th>
				<th>Name</th>
				<th>Scale</th>
				<th>Price</th>
				<th>Total Sold</th>
				<th>&nbsp;</th>
			</tr>
			<?php foreach ($product_list as $pro_list):?>
			<tr>
				<td><?php echo htmlspecialchars($pro_list['productCode']); ?></td>
				<td><?php echo htmlspecialchars($pro_list['productName']); ?></td>
				<td><?php echo htmlspecialchars($pro_list['productScale']); ?></td>
				<td><?php echo htmlspecialchars($pro_list['buyPrice']); ?></td>
				<td><p>Total Sold muust be calculated your job</p></td>
				<td><form action="." method="post">
					<input type="hidden" name="action" value="get_product_infos">
					<input type="hidden" name="productCode" value="<?php echo htmlspecialchars($pro_list['productCode']); ?>">
					<input type="submit" value="Update">
				</form>
			</td>
		</tr>
	<?php endforeach; ?>
</table>
<p><a href="?action=add_product_line_form">Add New Product</a></p>

</main>

 <?php include($_SERVER['DOCUMENT_ROOT'].'/ClassicModels/footer.php');?>
