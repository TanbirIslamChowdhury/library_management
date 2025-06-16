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
        <h6 class="mb-4">Order_track</h6>
        <a href="order_track_create.php" class="btn btn-primary float-end">Add New</a>
        <table class="table text-dark">
            <thead>
                <tr>
                    <th>#</th>
                    <th>note</th>
                    <th>order_id </th>
                    <th>delivery_man</th>
                    <th>track_date_time</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $order_track = $mysqli->common_select("order_track");
                    if (!$order_track['error']) {
                        foreach ($order_track['data'] as $key => $value) {
                ?>
                            <tr>
                                <th scope="row"><?= $key + 1; ?></th>
                                <td><?= $value->note; ?></td>
                                <td><?= $value->order_id; ?></td>
                                <td><?= $value->delivery_man; ?></td>
                                <td><?= $value->track_date_time; ?></td>
                                <td>
                                    <a href="order_track_edit.php?id=<?= $value->id ?>" class="btn btn-primary">Edit</a>
                                    <a onclick="return confirm('Are you sure to delete this data')" href="order_track_delete.php?id=<?= $value->id; ?>" class="btn btn-danger">Delete</a>
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
