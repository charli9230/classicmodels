<?php
////////////////
//QUESTION 1.4//
////////////////


function get_product_infos($productCode) {
    global $db;
    $query = 'SELECT * FROM products
    WHERE productCode = :pro_code';
    $statement = $db->prepare($query);
    $statement->bindValue(':pro_code', $productCode);
    $statement->execute();
    $result = $statement->fetch();
    $statement->closeCursor();
    return $result;

}

function get_product_line_list() {
    global $db;
    $query = 'SELECT * FROM productline';
    $statement = $db->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $statement->closeCursor();
    return $result;

}


function get_product_list($productLine) {
    global $db;
    $query = '
    SELECT * FROM products
    WHERE productLine = :pro_line';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':pro_line', $productLine);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
    }
}

function add_product_line($productLine,$textDescription) {

    global $db;
    $query = 'INSERT INTO productline
    (productLine,textDescription)
    VALUES
    (:pro_line ,:t_desc)';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':pro_line', $productLine);
        $statement->bindValue(':t_desc', $textDescription);
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function update_product($productCode,$productName,$productLine,$productScale,
        $productVendor,$productDescription,
        $quantityInStock,$buyPrice,$MSRP) {

    global $db;
    $query = 'UPDATE products
            SET productName = :pro_name,
                productLine = :pro_line,
                productScale = :pro_scale,
                productVendor = :pro_vend,
                productDescription = :pro_desc,
                quantityInStock = :qty_stock,
                buyPrice = :b_price,
                MSRP = :msrp
            WHERE productCode = :pro_code';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':pro_name', $productName);
        $statement->bindValue(':pro_line', $productLine);
        $statement->bindValue(':pro_scale', $productScale);
        $statement->bindValue(':pro_vend', $productVendor);
        $statement->bindValue(':pro_desc', $productDescription);
        $statement->bindValue(':qty_stock', $quantityInStock);
        $statement->bindValue(':b_price', $buyPrice);
        $statement->bindValue(':msrp', $MSRP);
        $statement->bindValue(':pro_code', $productCode);
      

        $row_count = $statement->execute();
        $statement->closeCursor();
        return $row_count;


    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}
?>