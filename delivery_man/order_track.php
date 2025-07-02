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
        <h6 class="mb-4">Order Track</h6>
        <a href="order_track_create.php?order_id=<?= $_GET['order_id'] ?>" class="btn btn-primary float-end">Add New</a>
        <table class="table text-dark">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Note</th>
                    <th>Track Date Time</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $delivery_man = $mysqli->common_select("order_track",'*',['order_id'=>$_GET['order_id']]);
                    if (!$delivery_man['error']) {
                        foreach ($delivery_man['data'] as $key => $value) {
                ?>
                            <tr>
                                <th scope="row"><?= $key + 1; ?></th>
                                <td><?= $value->note; ?></td>
                                <td><?= $value->track_date_time; ?></td>
                                <td>
                                    <a href="order_track_edit.php?id=<?= $value->id; ?>&order_id=<?= $_GET['order_id'] ?>" class="btn btn-primary">Edit</a>
                                    <a onclick="return confirm('Are you sure to delete this data')" href="order_track_delete.php?id=<?= $value->id; ?>&order_id=<?= $_GET['order_id'] ?>" class="btn btn-danger">Delete</a>
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
