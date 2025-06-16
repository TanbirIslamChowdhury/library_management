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
        <h6 class="mb-4">Books</h6>
        <a href="books_create.php" class="btn btn-primary float-end">Add New</a>
        <table class="table text-dark">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Category Id</th>
                    <th>Publisher Id </th>
                    <th>Name</th>
                    <th>Author Id</th>
                    <th>Is Featured</th>
                    <th>Is Populer</th>
                    <th>Price</th>
                    <th>Offer Price</th>
                    <th>Description</th>
                    <th>Image</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $books = $mysqli->common_select("books");
                    if (!$books['error']) {
                        foreach ($books['data'] as $key => $value) {
                ?>
                            <tr>
                                <th scope="row"><?= $key + 1; ?></th>
                                <td><?= $value->category_id; ?></td>
                                <td><?= $value->publisher_id; ?></td>
                                <td><?= $value->name; ?></td>
                                <td><?= $value->author_id; ?></td>
                                <td><?= $value->is_featured; ?></td>
                                <td><?= $value->is_populer; ?></td>
                                <td><?= $value->price; ?></td>
                                <td><?= $value->offer_price; ?></td>
                                 <td><?= $value->description; ?></td>
                                <td><?= $value->image; ?></td>
                                <td>
                                    <a href="books_edit.php?id=<?= $value->id ?>" class="btn btn-primary">Edit</a>
                                    <a onclick="return confirm('Are you sure to delete this data')" href="books_delete.php?id=<?= $value->id; ?>" class="btn btn-danger">Delete</a>
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
