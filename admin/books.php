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
                    $books = $mysqli->common_query("SELECT books.*, categories.name as cat, author.name as auth, publisher.name as pub FROM `books` JOIN categories on categories.id=books.category_id JOIN author on author.id=books.author_id JOIN publisher on publisher.id=books.publisher_id WHERE books.status=1");
                    if (!$books['error']) {
                        foreach ($books['data'] as $key => $value) {
                ?>
                            <tr>
                                <th scope="row"><?= $key + 1; ?></th>
                                <td><?= $value->cat; ?></td>
                                <td><?= $value->pub; ?></td>
                                <td><?= $value->name; ?></td>
                                <td><?= $value->auth; ?></td>
                                <td><?= $value->is_featured?"Yes":"No"; ?></td>
                                <td><?= $value->is_populer?"Yes":"No"; ?></td>
                                <td><?= $value->price; ?></td>
                                <td><?= $value->offer_price; ?></td>
                                <td><?= $value->description; ?></td>
                                <td><img src="<?= $value->image; ?>" width="100px"></td>
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
