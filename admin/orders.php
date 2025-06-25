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
        <h6 class="mb-4">Orders</h6>
        <a href="orders_create.php" class="btn btn-primary float-end">Add New</a>
        <table class="table text-dark">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Customer</th>
                    <th>Total Amount  </th>
                    <th>Order Date</th>
                    <th>Payment Status</th>
                    <th>Delivery Status</th>
                    <th>Delivery Man</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                    $delivery_status = array("Not Approved","Pending", "Processing","On The Way", "Delivered","Canceled");
                    $orders = $mysqli->common_query("SELECT orders.*,users.name,users.contact_no,delivery_man.name as deli_name,delivery_man.contact_no as deli_contact_no FROM `orders` left join delivery_man on delivery_man.id=orders.delivery_man_id JOIN users on users.id=orders.user_id WHERE orders.status=1;");
                    if (!$orders['error']) {
                        foreach ($orders['data'] as $key => $value) {
                ?>
                            <tr>
                                <th scope="row"><?= $key + 1; ?></th>
                                <td><?= $value->name; ?> (<?= $value->contact_no; ?>)</td>
                                <td><?= $value->total_amount; ?></td>
                                <td><?= $value->order_date; ?></td>
                                <td><?= $value->payment_status?"Paid":"Unpaid"; ?></td>
                                <td><?= $delivery_status[$value->delivery_status]; ?></td>
                                <td><?= $value->deli_name; ?> (<?= $value->deli_contact_no; ?>)</td>
                                <td>
                                    <a href="orders_edit.php?id=<?= $value->id ?>" class="btn btn-primary">Edit</a>
                                    <a onclick="return confirm('Are you sure to delete this data')" href="orders_delete.php?id=<?= $value->id; ?>" class="btn btn-danger">Delete</a>
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
