<?php include 'include/header.php'; ?>
<!-- Sidebar Start -->
<?php include 'include/sidebar.php'; ?>
<!-- Sidebar End -->
<!-- Navbar Start -->
<?php include 'include/topbar.php'; ?>
<!-- Navbar End -->


<!-- Content Start -->
<div class="col-sm-12">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4">Stock</h6>
        <a href="stock_create.php" class="btn btn-primary float-end">Add New</a>
        <table class="table text-dark">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Book Id </th>
                    <th>Order Id </th>
                    <th>Purchase Id </th>
                    <th>Price</th>
                    <th>Stock Quantity </th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $stock = $mysqli->common_select("stock");
                    if (!$stock['error']) {
                        foreach ($stock['data'] as $key => $value) {
                ?>
                            <tr>
                                <th scope="row"><?= $key + 1; ?></th>
                                <td><?= $value->book_id; ?></td>
                                <td><?= $value->order_id; ?></td>
                                <td><?= $value->purchase_id; ?></td>
                                <td><?= $value->price; ?></td>
                                 <td><?= $value->stock_quantity; ?></td>
                                <td>
                                    <a href="stock_edit.php?id=<?= $value->id ?>" class="btn btn-primary">Edit</a>
                                    <a onclick="return confirm('Are you sure to delete this data')" href="stock_delete.php?id=<?= $value->id; ?>" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                <?php
                        }
                    }
                ?>
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>
</div>


<?php include 'include/footer.php'; ?>
