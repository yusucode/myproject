<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/v/dt/dt-1.13.6/fc-4.3.0/fh-3.4.0/r-2.5.0/datatables.min.css"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <title>Inventory</title>

    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
</head>

<body>

    <!-- Add Product -->
    <div class="modal fade" id="saveProductModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="saveProduct" enctype="multipart/form-data">
                        <div class="modal-body">

                            <div class="input-group mb-3">
                                <span class="input-group-text">Product Name</span>
                                <input type="text" name="productName" id="productName" class="form-control"
                                    placeholder="Product Name" aria-label="Product Name"
                                    aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">Product Unit</span>
                                <input type="text" name="productUnit" id="productUnit" class="form-control"
                                    placeholder="Product Unit" aria-label="Product Unit"
                                    aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">Product Price</span>
                                <input type="text" name="productPrice" id="productPrice" class="form-control"
                                    placeholder="Product Price" aria-label="Product Price"
                                    aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">Expiration Date</span>
                                <input type="date" name="productDate" id="productDate" class="form-control"
                                    placeholder="Expiration Date" aria-label="Expiration Date"
                                    aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">Product Available</span>
                                <input type="text" name="productAvail" id="productAvail" class="form-control"
                                    placeholder="Product Available" aria-label="Product Available"
                                    aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                                <input type="file" name="productImage" id="productImage" accept=".jpg, .jpeg, .png">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add Product</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <!-- Edit Product Modal -->
    <div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="updateProduct" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Product Name</span>
                            <input type="type" name="products_id" id="products_id" class="form-control"
                                placeholder="ID" aria-label="Product Name" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Product Name</span>
                            <input type="text" name="productNameEdit" id="productNameEdit" class="form-control"
                                placeholder="Product Name" aria-label="Product Name" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Product Unit</span>
                            <input type="text" name="productUnitEdit" id="productUnitEdit" class="form-control"
                                placeholder="Product Unit" aria-label="Product Unit" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Product Price</span>
                            <input type="text" name="productPriceEdit" id="productPriceEdit" class="form-control"
                                placeholder="Product Price" aria-label="Product Price" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Expiration Date</span>
                            <input type="date" name="productDateEdit" id="productDateEdit" class="form-control"
                                placeholder="Expiration Date" aria-label="Expiration Date"
                                aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Product Available</span>
                            <input type="text" name="productAvailEdit" id="productAvailEdit" class="form-control"
                                placeholder="Product Available" aria-label="Product Available"
                                aria-describedby="basic-addon1">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- View Product Modal -->
    <div class="modal fade" id="viewProductModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">View Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="col">
                        <div class="card mx-auto" style="width: 18rem;">
                            <img id="view_productimage" src="" alt="Product Image" class="card-img-top mx-auto d-block"
                                style="width: 100px; height: 100px;">
                            <ul class="list-group list-group-flush">
                                <label for="view_productname" class="form-label text-center">Product Name</label>
                                <li id="view_productname" class="list-group-item"></li>
                                <label for="view_productunit" class="form-label text-center">Product Unit</label>
                                <li id="view_productunit" class="list-group-item"></li>
                                <label for="view_productprice" class="form-label text-center">Product Price</label>
                                <li id="view_productprice" class="list-group-item"></li>
                                <label for="view_productdate" class="form-label text-center">Expiry Date</label>
                                <li id="view_productdate" class="list-group-item"></li>
                                <label for="view_productavail" class="form-label text-center">Product Available</label>
                                <li id="view_productavail" class="list-group-item"></li>
                                <label for="view_productavail" class="form-label text-center">Total Available Inventory
                                    Cost</label>
                                <li id="totalCostValue" class="list-group-item"></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mt-2">Inventory</h4>
                        <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal"
                            data-bs-target="#saveProductModal">
                            Add Product
                        </button>
                    </div>
                    <div class="table-responsive">
                        <table id="example" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Product Name</th>
                                    <th>Product Unit</th>
                                    <th>Product Price</th>
                                    <th>Expiry Date</th>
                                    <th>Product Available</th>
                                    <th>Product Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require 'dbcon.php';

                                $query = "SELECT * FROM products";
                                $query_run = mysqli_query($con, $query);

                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $products) {
                                        ?>
                                        <tr>
                                            <td>
                                                <?= $products['id'] ?>
                                            </td>
                                            <td>
                                                <?= $products['productName'] ?>
                                            </td>
                                            <td>
                                                <?= $products['productUnit'] ?>
                                            </td>
                                            <td>
                                                <?= $products['productPrice'] ?>
                                            </td>
                                            <td>
                                                <?= $products['productDate'] ?>
                                            </td>
                                            <td>
                                                <?= $products['productAvail'] ?>
                                            </td>
                                            <td>
                                                <?php
                                                // Assuming the BLOB column is named 'productImage'
                                                $blobData = $products['productImage'];

                                                if (!empty($blobData)) {
                                                    // Display the image using base64 encoding with width and height attributes
                                                    echo '<img src="data:image/jpeg;base64,' . base64_encode($blobData) . '" width="100" height="100" />';
                                                } else {
                                                    // Display a default image
                                                    echo '<img src="img/Untitled.jpg" width="100" height="100" />';
                                                }
                                                ?>
                                            </td>

                                            <td>
                                                <button type="button" value="<?= $products['id']; ?>"
                                                    class="viewProductBtn btn btn-success btn-sm d-sm-inline d-md-none">View</button>
                                                <button type="button" value="<?= $products['id']; ?>"
                                                    class="editProductBtn btn btn-primary btn-sm d-sm-inline d-md-none">Edit</button>
                                                <button type="button" value="<?= $products['id']; ?>"
                                                    class="deleteProductBtn btn btn-danger btn-sm d-sm-inline d-md-none">Delete</button>

                                                <!-- Display these buttons on medium (md) screens and larger -->
                                                <button type="button" value="<?= $products['id']; ?>"
                                                    class="viewProductBtn btn btn-success btn-sm d-none d-md-inline">View</button>
                                                <button type="button" value="<?= $products['id']; ?>"
                                                    class="editProductBtn btn btn-primary btn-sm d-none d-md-inline">Edit</button>
                                                <button type="button" value="<?= $products['id']; ?>"
                                                    class="deleteProductBtn btn btn-danger btn-sm d-none d-md-inline">Delete</button>
                                            </td>

                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Product Name</th>
                                    <th>Product Unit</th>
                                    <th>Product Price</th>
                                    <th>Expiry Date</th>
                                    <th>Product Available</th>
                                    <th>Product Image</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script src="https://cdn.datatables.net/v/dt/dt-1.13.6/fc-4.3.0/fh-3.4.0/r-2.5.0/datatables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="script.js"></script>
    <script>

        $(document).on('submit', '#saveProduct', function (e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("save_product", true);

            console.log(formData);
            // Add the image input to formData
            var imageInput = $('#productImage')[0].files[0]; // Assuming the file input has an ID of 'productImage'
            formData.append('productImage', imageInput);

            $.ajax({
                type: "POST",
                url: "code.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    var res = jQuery.parseJSON(response);
                    if (res.status == 422) {

                        // Display SweetAlert error dialog
                        Swal.fire({
                            title: 'Error!',
                            text: res.message,
                            icon: 'error',
                        });
                    } else if (res.status == 200) {

                        $('#saveProductModal').modal('hide');
                        $('#saveProduct')[0].reset();

                        $('#example').load(location.href + " #example");

                        // Display SweetAlert success dialog
                        Swal.fire({
                            title: 'Success!',
                            text: 'Your operation was successful.',
                            icon: 'success',
                        });
                    }
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);

                    // Display SweetAlert error dialog for AJAX error
                    Swal.fire({
                        title: 'Error!',
                        text: 'An error occurred while uploading the image.',
                        icon: 'error',
                    });
                }
            });

        });

        $(document).on('click', '.editProductBtn', function () {
            var products_id = $(this).val();

            $.ajax({
                type: "GET",
                url: "code.php?products_id=" + products_id,
                success: function (response) {
                    var res = jQuery.parseJSON(response);

                    console.log(res);
                    if (res.status == 404) {
                        alert(res.message);
                    } else if (res.status == 200) {
                        // Corrected selector for setting the product ID
                        $('#products_id').val(products_id);
                        $('#productNameEdit').val(res.data.productName);
                        $('#productUnitEdit').val(res.data.productUnit);
                        $('#productPriceEdit').val(res.data.productPrice);
                        $('#productDateEdit').val(res.data.productDate);
                        $('#productAvailEdit').val(res.data.productAvail);

                        $('#editProductModal').modal('show');

                    }
                }
            });
        });



        $(document).on('submit', '#updateProduct', function (e) {
            e.preventDefault();
            var formData = new FormData(this);
            formData.append("update_product", true);
            console.log(formData);

            $.ajax({
                type: "POST",
                url: "code.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    var res = JSON.parse(response);

                    console.log(res);
                    if (res.status === 200) {
                        // Product updated successfully
                        Swal.fire({
                            title: 'Success!',
                            text: 'Your operation was successful.',
                            icon: 'success',
                        });
                        // Close the modal and reset the form
                        $('#editProductModal').modal('hide');
                        $('#updateProduct')[0].reset();

                        // Reload the table or relevant part of the page
                        $('#example').load(location.href + " #example");
                    } else if (res.status === 422) {
                        // Validation error
                        Swal.fire({
                            title: 'Error!',
                            text: 'An error occurred while uploading the image.',
                            icon: 'error',
                        });
                    } else if (res.status === 500) {
                        // Server error
                        alert(res.message);
                    }
                },
                error: function () {
                    // AJAX request failed
                    alert('An error occurred during the request.');
                }
            });
        });


        $(document).on('click', '.viewProductBtn', function () {
            var products_id = $(this).val();
            $.ajax({
                type: "GET",
                url: "code.php?products_id=" + products_id,
                success: function (response) {
                    var res = jQuery.parseJSON(response);
                    if (res.status == 404) {
                        alert(res.message);
                    } else if (res.status == 200) {
                        $('#view_productimage').attr('src', 'data:image/jpeg;base64,' + res.data.productImage);
                        $('#view_productname').text(res.data.productName);
                        $('#view_productunit').text(res.data.productUnit);
                        $('#view_productprice').text(res.data.productPrice);
                        $('#view_productdate').text(res.data.productDate);
                        $('#view_productavail').text(res.data.productAvail);

                        // Calculate the total cost and set it
                        var totalCost = parseFloat(res.data.productPrice) * parseFloat(res.data.productAvail);
                        $('#totalCostValue').text(totalCost.toFixed(2)); // Display it with two decimal places
                        $('#viewProductModal').modal('show');
                    }
                }

            });
        });

        $(document).on('click', '.deleteProductBtn', function (e) {
            e.preventDefault();

            // Use SweetAlert for confirmation
            Swal.fire({
                title: 'Are you sure?',
                text: 'You are about to delete this data.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel',
            }).then((result) => {
                if (result.isConfirmed) {
                    var products_id = $(this).val();
                    $.ajax({
                        type: "POST",
                        url: "code.php",
                        data: {
                            'delete_product': true,
                            'products_id': products_id
                        },
                        success: function (response) {
                            var res = jQuery.parseJSON(response);
                            if (res.status == 500) {
                                alert(res.message);
                            } else {
                                Swal.fire({
                                    title: 'Success!',
                                    text: 'Deleted successfully.',
                                    icon: 'success',
                                });
                                $('#example').load(location.href + " #example");
                            }
                        }
                    });
                }
            });
        });


    </script>

</body>

</html>