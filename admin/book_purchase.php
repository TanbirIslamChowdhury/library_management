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
        <h6 class="mb-4">book_purchase</h6>
        <a href="book_purchase_create.php" class="btn btn-primary float-end">Add New</a>
        <table class="table text-dark">
            <thead>
                <tr>
                    <th>#</th>
                    <th>publisher_id</th>
                    <th>purchase_date </th>
                    <th>Price</th>
                    <th>quantity</th>
                  
                </tr>
            </thead>
            <tbody>
                <?php
                    $book_purchase = $mysqli->common_select("book_purchase");
                    if (!$book_purchase['error']) {
                        foreach ($book_purchase['data'] as $key => $value) {
                ?>
                            <tr>
                                <th scope="row"><?= $key + 1; ?></th>
                                <td><?= $value->publisher_id; ?></td>
                                <td><?= $value->purchase_date; ?></td>
                                <td><?= $value->price; ?></td>
                                <td><?= $value->quantity; ?></td>
                                <td>
                                    <a href="book_purchase_edit.php?id=<?= $value->id ?>" class="btn btn-primary">Edit</a>
                                    <a onclick="return confirm('Are you sure to delete this data')" href="book_purchase_delete.php?id=<?= $value->id; ?>" class="btn btn-danger">Delete</a>
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
