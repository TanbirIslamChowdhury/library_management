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
                                    <label for="payment_status" class="form-label"> Payment Status</label>
                                    <select class="form-control" id="payment_status" name="payment_status">
                                        <option value="">Select Status</option>
                                        <option value="1" <?= $data->payment_status==1?"selected":"" ?>>Paid</option>
                                        <option value="0" <?= $data->payment_status==0?"selected":"" ?>>Unpaid</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <?php $delivery_status = array("Not Approved","Pending", "Processing","On The Way", "Delivered","Canceled"); ?>
                                    <label for="delivery_status" class="form-label">Delivery Status</label>
                                    <select class="form-control" id="delivery_status" name="delivery_status">
                                        <option value="">Select Status</option>
                                        <?php foreach ($delivery_status as $key => $value) { ?>
                                            <option value="<?= $key ?>" <?= $data->delivery_status==$key?"selected":"" ?>><?= $value ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            
                            
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                    <?php
                    if ($_POST) {
                        $_POST['updated_at'] = date('Y-m-d H:i:s');
                        $_POST['updated_by'] = $_SESSION['delivery_man']->id;
                        $res=$mysqli->common_update('orders',$_POST,$where);
                        if(!$res['error']){
                          echo "<script>location.href='".$baseurl."delivery_man/orders.php'</script>";
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
