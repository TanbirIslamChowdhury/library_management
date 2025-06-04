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
        <h6 class="mb-4">Shipping_charge</h6>
        <a href="shipping_charge_create.php" class="btn btn-primary float-end">Add New</a>
        <table class="table text-dark">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>district_id </th>
                    <th>charge</th>
                  
                </tr>
            </thead>
            <tbody>
                <?php
                    $shipping_charge = $mysqli->common_select("shipping_charge");
                    if (!$shipping_charge['error']) {
                        foreach ($shipping_charge['data'] as $key => $value) {
                ?>
                            <tr>
                                <th scope="row"><?= $key + 1; ?></th>
                                <td><?= $value->name; ?></td>
                                <td><?= $value->district_id; ?></td>
                                <td><?= $value->charge; ?></td>
                               
                                <td>
                                    <a href="shipping_charge_edit.php?id=<?= $value->id ?>" class="btn btn-primary">Edit</a>
                                    <a onclick="return confirm('Are you sure to delete this data')" href="shipping_charge_delete.php?id=<?= $value->id; ?>" class="btn btn-danger">Delete</a>
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
