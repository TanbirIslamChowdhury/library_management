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
        <h6 class="mb-4">Order_items</h6>
        <a href="order_items_create.php" class="btn btn-primary float-end">Add New</a>
        <table class="table text-dark">
            <thead>
                <tr>
                    <th>#</th>
                    <th>order_id</th>
                    <th>book_id </th>
                    <th>quantity</th>
                    <th>is_returned</th>
                    <th>price_per_unit</th>
                    <th>refund_amount</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $order_items = $mysqli->common_select("order_items");
                    if (!$order_items['error']) {
                        foreach ($order_items['data'] as $key => $value) {
                ?>
                            <tr>
                                <th scope="row"><?= $key + 1; ?></th>
                                <td><?= $value->order_id; ?></td>
                                <td><?= $value->book_id; ?></td>
                                <td><?= $value->quantity; ?></td>
                                <td><?= $value->is_returned; ?></td>
                                <td><?= $value->price_per_unit; ?></td>
                                <td><?= $value->refund_amount; ?></td>
                                <td>
                                    <a href="order_items_edit.php?id=<?= $value->id ?>" class="btn btn-primary">Edit</a>
                                    <a onclick="return confirm('Are you sure to delete this data')" href="order_items_delete.php?id=<?= $value->id; ?>" class="btn btn-danger">Delete</a>
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
