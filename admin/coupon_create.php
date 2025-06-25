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
        <h6 class="mb-4">Add New Coupon</h6>
        <div class="row g-4">
            <div class="col-sm-12">
                <div class="bg-light rounded h-100 p-4">
                    <form method="post" action="">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="coupon_code" class="form-label">Coupon Code</label>
                                    <input type="text" class="form-control" id="coupon_code" name="coupon_code">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="validity_date" class="form-label">Validity Date</label>
                                    <input type="date" class="form-control" id="validity_date" name="validity_date">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="amount_type" class="form-label">Amount Type</label>
                                    <input type="text" class="form-control" id="amount_type" name="amount_type">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="amount" class="form-label">Amount</label>
                                    <input type="text" class="form-control" id="amount" name="amount">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                    <?php
                    if ($_POST) {
                        $_POST['created_at'] = date('Y-m-d H:i:s');
                        $_POST['created_by'] = $_SESSION['user']->id;
                        $_POST['status']=1;
                        $res=$mysqli->common_insert('coupon',$_POST);
                        if(!$res['error']){
                          echo "<script>location.href='".$baseurl."admin/coupon.php'</script>";
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
