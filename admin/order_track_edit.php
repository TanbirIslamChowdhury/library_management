<?php include 'include/header.php'; ?>
<!-- Sidebar Start -->
<?php include 'include/sidebar.php'; ?>
<!-- Sidebar End -->

<!-- Navbar Start -->
<?php include 'include/topbar.php'; ?>
<!-- Navbar End -->
<?php
    $where['id'] = $_GET['id'];
    $order_track = $mysqli->common_select("order_track",'*',$where);
    $data=[];
    if (!$order_track['error']) {
        $data=$order_track['data'][0];
    }
    
?>

<!-- Content Start -->
<div class="col-sm-12">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4">Add New order_track</h6>
        <div class="row g-4">
            <div class="col-sm-12">
                <div class="bg-light rounded h-100 p-4">
                    <form method="post" action="">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Note</label>
                                    <input type="text" value="<?= $data->note ?>" class="form-control" id="name" name="note">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="contact_no" class="form-label">order_id</label>
                                    <input type="text" value="<?= $data->order_id ?>" class="form-control" id="contact_no" name="order_id">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">delivery_man</label>
                                    <input type="text" value="<?= $data->delivery_man ?>" class="form-control" id="email" name="delivery_man">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="address" class="form-label">track_date_time</label>
                                    <input type="text" value="<?= $data->track_date_time ?>" class="form-control" id="address" name="track_date_time">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                    <?php
                    if ($_POST) {
                        $_POST['updated_at'] = date('Y-m-d H:i:s');
                        $_POST['updated_by'] = $_SESSION['user']->id;
                        $res=$mysqli->common_update('order_track',$_POST,$where);
                        if(!$res['error']){
                          echo "<script>location.href='".$baseurl."admin/order_track.php'</script>";
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
