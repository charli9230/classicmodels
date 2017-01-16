<?php
////////////////
//QUESTION 1.3//
////////////////


require($_SERVER['DOCUMENT_ROOT'].'/ClassicModels/database.php');
require('../model/dbmodel.php');

$action = filter_input(INPUT_POST, 'action');
if(isset($_GET['action'])){
	$action = $_GET['action'];
}

if ($action === NULL) {
	$action = filter_input(INPUT_GET, 'action');
	if ($action === NULL) {
		$action = 'product_list';
	}
}

//instantiate variable(s)
$product_line_list = array();
$product_list = array();
$productLine_desc = 'Trains';
$currently_selected_product='Trains';



switch ($action) {

	case 'product_list':

	if(isset($_GET['tdesc'])){
   		$tdesc = $_GET['tdesc'];
	}
	
	$productLine = filter_input(INPUT_POST, 'productLine');

	if (empty($tdesc)) {

		$product_line_list = get_product_line_list();
		$product_list = get_product_list($productLine_desc);
		$currently_selected_product = $productLine_desc;
		include('../product_list.php');

	}else{

		$product_line_list = get_product_line_list();
		$product_list = get_product_list($tdesc);
		$currently_selected_product = $productLine;
		include('../product_list.php');
	}

	break;   



	case 'add_product_line_form':
	include ('../add_product_line.php');
	break;

	case 'add_product_line':
	 // Get data from POST request
	$productLine = filter_input(INPUT_POST, 'productLine');
	$textDescription = filter_input(INPUT_POST, 'textDescription');

	add_product_line($productLine,$textDescription);

	$product_line_list = get_product_line_list();
	$product_list = get_product_list($productLine_desc);
	$currently_selected_product = $productLine_desc;
	include('../product_list.php');
	break;





	case 'get_product_infos':
	$productCode = filter_input(INPUT_POST, 'productCode');
	$product_line_list = get_product_line_list();
	$productInfos = get_product_infos($productCode);
	include ('../product_update.php');
	break;



	case 'product_update':
	// Get data from POST request
	$productCode = filter_input(INPUT_POST, 'productCode');
	$productName = filter_input(INPUT_POST, 'productName');
	$productLine = filter_input(INPUT_POST, 'productLine');
	$productScale = filter_input(INPUT_POST, 'productScale');
	$productVendor = filter_input(INPUT_POST, 'productVendor');
	$productDescription = filter_input(INPUT_POST, 'productDescription');
	$quantityInStock =  filter_input(INPUT_POST, 'quantityInStock', FILTER_VALIDATE_INT);
	$buyPrice = filter_input(INPUT_POST, 'buyPrice', FILTER_VALIDATE_FLOAT);
	$MSRP = filter_input(INPUT_POST, 'MSRP', FILTER_VALIDATE_FLOAT);



	update_product($productCode,$productName,$productLine,$productScale,
		$productVendor,$productDescription,
		$quantityInStock,$buyPrice,$MSRP);


	$product_line_list = get_product_line_list();
	$product_list = get_product_list($productLine);
	$currently_selected_product = $productLine;
	include('../product_list.php');

	break;

}
?>