<?php

require 'dbcon.php';

if (isset($_POST['save_product'])) {
    // Assuming you have already established a database connection ($con)

    // Retrieve and sanitize form data
    $productName = mysqli_real_escape_string($con, $_POST['productName']);
    $productUnit = mysqli_real_escape_string($con, $_POST['productUnit']);
    $productPrice = mysqli_real_escape_string($con, $_POST['productPrice']);
    $productDate = mysqli_real_escape_string($con, $_POST['productDate']);
    $productAvail = mysqli_real_escape_string($con, $_POST['productAvail']);

    // Check if any of the fields are empty (except for the image, which is optional)
    if (empty($productName) || empty($productUnit) || empty($productPrice) || empty($productDate) || empty($productAvail)) {
        $res = [
            'status' => 422,
            'message' => 'Fields empty'
        ];
        echo json_encode($res);
        return false;
    }

    // Image handling
    if (isset($_FILES['productImage']) && $_FILES['productImage']['error'] == 0) {
        $imageData = file_get_contents($_FILES['productImage']['tmp_name']);
        $productImage = mysqli_real_escape_string($con, $imageData);


        // Construct SQL query for image insertion
        $query = "INSERT INTO products (productName, productUnit, productPrice, productDate, productAvail, productImage) VALUES ('$productName', '$productUnit', '$productPrice', '$productDate', '$productAvail', '$productImage')";

        // Execute the query
        $query_run = mysqli_query($con, $query);

        if ($query_run) {
            $res = [
                'status' => 200,
                'message' => 'Added successfully'

            ];
            echo json_encode($res);
        } else {
            $res = [
                'status' => 500,
                'message' => 'Failed to insert data'
            ];
            echo json_encode($res);
        }
    } else {
        // Handle image upload failure or if no image was provided
        $res = [
            'status' => 422,
            'message' => 'Image upload failed or no image provided'
        ];
        echo json_encode($res);
    }

    // Retrieve product information from the database
    $query = "SELECT productPrice, productAvail FROM products";
    $result = mysqli_query($con, $query);
    
    if ($result) {
        $totalCost = 0;
    
        while ($row = mysqli_fetch_assoc($result)) {
            $productPrice = $row['productPrice'];
            $productAvail = $row['productAvail'];
    
            // Calculate the cost of each product
            $productCost = $productPrice * $productAvail;
    
            // Add the product cost to the total cost
            $totalCost += $productCost;
        }

    } 

    // Close the database connection if necessary
    mysqli_close($con);
}

if (isset($_POST['update_product'])) {
    $products_id = mysqli_real_escape_string($con, $_POST['products_id']);
    
    $productName = mysqli_real_escape_string($con, $_POST['productNameEdit']);
    $productUnit = mysqli_real_escape_string($con, $_POST['productUnitEdit']);
    $productPrice = mysqli_real_escape_string($con, $_POST['productPriceEdit']);
    $productDate = mysqli_real_escape_string($con, $_POST['productDateEdit']);
    $productAvail = mysqli_real_escape_string($con, $_POST['productAvailEdit']);

    if ($productName == NULL || $productUnit == NULL || $productPrice == NULL || $productDate == NULL || $productAvail == NULL) {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }
    // Handle file upload if a new image is provided
else {
        // No new image was provided, update only product details without changing the image in the database
        $query = "UPDATE products SET productName='$productName', productUnit='$productUnit', productPrice='$productPrice', productDate='$productDate', productAvail='$productAvail' WHERE id='$products_id'";
    }

    if (mysqli_query($con, $query)) {
        $res = [
            'status' => 200,
            'message' => 'Product Updated Successfully'
        ];
        echo json_encode($res);
        exit;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Product Not Updated'
        ];
        echo json_encode($res);
        exit;
    }
}




if (isset($_GET['products_id'])) {
    $products_id = mysqli_real_escape_string($con, $_GET['products_id']);
    
    $query = "SELECT * FROM products WHERE id='$products_id'";
    $query_run = mysqli_query($con, $query);
    
    if (!$query_run) {
        // Query execution error
        $res = [
            'status' => 500,
            'message' => 'Database error: ' . mysqli_error($con)
        ];
        echo json_encode($res);
        return;
    }

    if (mysqli_num_rows($query_run) == 1) {
        $products = mysqli_fetch_array($query_run);

        // Check if the product has an image
        $imageData = null;
        if (!empty($products['productImage'])) {
            $imageData = base64_encode($products['productImage']);
        }

        $res = [
            'status' => 200,
            'message' => 'Product Fetch Successfully',
            'data' => [
                'productName' => $products['productName'],
                'productUnit' => $products['productUnit'],
                'productPrice' => $products['productPrice'],
                'productDate' => $products['productDate'],
                'productAvail' => $products['productAvail'],
                'productImage' => $imageData,
            ],
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 404,
            'message' => 'Product Id Not Found',
        ];
        echo json_encode($res);
        return;
    }
}



if (isset($_POST['delete_product'])) {
    $products_id = mysqli_real_escape_string($con, $_POST['products_id']);

    $query = "DELETE FROM products WHERE id='$products_id'";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'Product Deleted Successfully'
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Product Not Deleted'
        ];
        echo json_encode($res);
        return;
    }
}

?>