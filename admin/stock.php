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
                    <th>Book</th>
                    <th>Stock Quantity </th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $stock = $mysqli->common_query("SELECT sum(stock.stock_quantity) as balance, books.name FROM `stock` JOIN books on books.id=stock.book_id GROUP by stock.book_id");
                    if (!$stock['error']) {
                        foreach ($stock['data'] as $key => $value) {
                ?>
                            <tr>
                                <th scope="row"><?= $key + 1; ?></th>
                                <td><?= $value->name; ?></td>
                                <td><?= $value->balance; ?></td>
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
