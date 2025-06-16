<?php include 'include/header.php'; ?>
<!-- Sidebar Start -->
<?php include 'include/sidebar.php'; ?>
<!-- Sidebar End -->

<!-- Navbar Start -->
<?php include 'include/topbar.php'; ?>
<!-- Navbar End -->
<?php
    $where['id'] = $_GET['id'];
    $order_items = $mysqli->common_select("order_items",'*',$where);
    $data=[];
    if (!$order_items['error']) {
        $data=$order_items['data'][0];
    }
    
?>

<!-- Content Start -->
<div class="col-sm-12">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4">Add New Order_items</h6>
        <div class="row g-4">
            <div class="col-sm-12">
                <div class="bg-light rounded h-100 p-4">
                    <form method="post" action="">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">order_id</label>
                                    <input type="text" value="<?= $data->order_id ?>" class="form-control" id="name" name="order_id">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="contact_no" class="form-label">book_id</label>
                                    <input type="text" value="<?= $data->book_id ?>" class="form-control" id="contact_no" name="book_id">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">quantity</label>
                                    <input type="text" value="<?= $data->quantity ?>" class="form-control" id="email" name="quantity">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="is_returned" class="form-label">is_returned</label>
                                    <input type="text" value="<?= $data->is_returned ?>" class="form-control" id="is_returned" name="is_returned">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="is_returned" class="form-label">price_per_unit</label>
                                    <input type="text" value="<?= $data->price_per_unit ?>" class="form-control" id="is_returned" name="price_per_unit">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="is_returned" class="form-label">refund_amount</label>
                                    <input type="text" value="<?= $data->refund_amount ?>" class="form-control" id="is_returned" name="refund_amount">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                    <?php
                    if ($_POST) {
                        $_POST['updated_at'] = date('Y-m-d H:i:s');
                        $_POST['updated_by'] = $_SESSION['user']->id;
                        $res=$mysqli->common_update('order_items',$_POST,$where);
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
