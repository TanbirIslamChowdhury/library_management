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
        <h6 class="mb-4">Add New Stock</h6>
        <div class="row g-4">
            <div class="col-sm-12">
                <div class="bg-light rounded h-100 p-4">
                    <form method="post" action="">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="book_id" class="form-label">Book Id</label>
                                    <input type="text" class="form-control" id="book_id" name="book_id">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="order_id" class="form-label">Order Id</label>
                                    <input type="text" class="form-control" id="order_id" name="order_id">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="purchase_id" class="form-label">Purchase Id</label>
                                    <input type="text" class="form-control" id="purchase_id" name="purchase_id">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="price" class="form-label">Price</label>
                                    <input type="text" class="form-control" id="price" name="price">
                                </div>
                            </div>
                             <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="stock_quantity" class="form-label">Stock Quantity</label>
                                    <input type="text" class="form-control" id="stock_quantity" name="stock_quantity">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                    <?php
                    if ($_POST) {
                        $_POST['created_at'] = date('Y-m-d H:i:s');
                        $_POST['created_by'] = $_SESSION['user']->id;
                        $res=$mysqli->common_insert('stock',$_POST);
                        if(!$res['error']){
                          echo "<script>location.href='".$baseurl."admin/stock.php'</script>";
                        }else{
                          echo $res['error_msg'];
                        }
                        
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include 'include/footer.php'; ?>
