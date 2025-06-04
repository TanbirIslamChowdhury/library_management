<?php include 'include/header.php'; ?>
<!-- Sidebar Start -->
<?php include 'include/sidebar.php'; ?>
<!-- Sidebar End -->

<!-- Navbar Start -->
<?php include 'include/topbar.php'; ?>
<!-- Navbar End -->
<?php
    $where['id'] = $_GET['id'];
    $shipping_charge = $mysqli->common_select("shipping_charge",'*',$where);
    $data=[];
    if (!$shipping_charge['error']) {
        $data=$shipping_charge['data'][0];
    }
    
?>

<!-- Content Start -->
<div class="col-sm-12">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4">Add New Shipping_charge</h6>
        <div class="row g-4">
            <div class="col-sm-12">
                <div class="bg-light rounded h-100 p-4">
                    <form method="post" action="">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" value="<?= $data->name ?>" class="form-control" id="name" name="name">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="district_id" class="form-label">district_id</label>
                                    <input type="text" value="<?= $data->district_id ?>" class="form-control" id="district_id" name="district_id">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="charge" class="form-label">charge</label>
                                    <input type="text" value="<?= $data->charge ?>" class="form-control" id="charge" name="charge">
                                </div>
                            </div>
                            
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                    <?php
                    if ($_POST) {
                        $_POST['updated_at'] = date('Y-m-d H:i:s');
                        $_POST['updated_by'] = $_SESSION['user']->id;
                        $res=$mysqli->common_update('shipping_charge',$_POST,$where);
                        if(!$res['error']){
                          echo "<script>location.href='".$baseurl."admin/shipping_charge.php'</script>";
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
