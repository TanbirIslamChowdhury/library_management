<?php include 'include/header.php'; ?>
<!-- Sidebar Start -->
<?php include 'include/sidebar.php'; ?>
<!-- Sidebar End -->

<!-- Navbar Start -->
<?php include 'include/topbar.php'; ?>
<!-- Navbar End -->
<?php
    $where['id'] = $_GET['id'];
    $orders = $mysqli->common_select("orders",'*',$where);
    $data=[];
    if (!$orders['error']) {
        $data=$orders['data'][0];
    }
    
?>

<!-- Content Start -->
<div class="col-sm-12">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4">Add New Orders</h6>
        <div class="row g-4">
            <div class="col-sm-12">
                <div class="bg-light rounded h-100 p-4">
                    <form method="post" action="">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="user_id" class="form-label">User_id</label>
                                    <input type="text" class="form-control" id="user_id" name="user_id">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="total_amount" class="form-label"> Total Amount</label>
                                    <input type="text" class="form-control" id="total_amount" name="total_amount">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="order_date" class="form-label">Order Date</label>
                                    <input type="text" class="form-control" id="order_date" name="order_date">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="payment_status" class="form-label">Payment Status</label>
                                    <input type="text" class="form-control" id="payment_status" name="payment_status">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                    <?php
                    if ($_POST) {
                        $_POST['updated_at'] = date('Y-m-d H:i:s');
                        $_POST['updated_by'] = $_SESSION['user']->id;
                        $res=$mysqli->common_update('orders',$_POST,$where);
                        if(!$res['error']){
                          echo "<script>location.href='".$baseurl."admin/orders.php'</script>";
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
