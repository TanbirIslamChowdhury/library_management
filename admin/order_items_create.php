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
        <h6 class="mb-4">Add New order_items</h6>
        <div class="row g-4">
            <div class="col-sm-12">
                <div class="bg-light rounded h-100 p-4">
                    <form method="post" action="">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-2">
                                    <label for="order_id" class="form-label">order_id</label>
                                    <input type="text" class="form-control" id="order_id" name="order_id">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-2">
                                    <label for="contact_no" class="form-label">book_id</label>
                                    <input type="text" class="form-control" id="contact_no" name="contact_no">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-2">
                                    <label for="email" class="form-label">quantity</label>
                                    <input type="text" class="form-control" id="email" name="email">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-2">
                                    <label for="address" class="form-label">is_returned</label>
                                    <input type="text" class="form-control" id="address" name="address">
                                </div>
                            <div class="col-sm-6">
                                <div class="mb-2">
                                    <label for="address" class="form-label">price_per_unit</label>
                                    <input type="text" class="form-control" id="address" name="address">
                                </div>
                            <div class="col-sm-6">
                                <div class="mb-2">
                                    <label for="address" class="form-label">refund_amount</label>
                                    <input type="text" class="form-control" id="address" name="address">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                    <?php
                    if ($_POST) {
                        $_POST['created_at'] = date('Y-m-d H:i:s');
                        $_POST['created_by'] = $_SESSION['user']->id;
                        $res=$mysqli->common_insert('order_items',$_POST);
                        if(!$res['error']){
                          echo "<script>location.href='".$baseurl."admin/order_items.php'</script>";
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
