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
        <h6 class="mb-4">Update Order Track</h6>
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
                        $_POST['updated_by'] = $_SESSION['delivery_man']->id;
                        $res=$mysqli->common_update('order_track',$_POST,$where);
                        if(!$res['error']){
                          echo "<script>location.href='".$baseurl."/delivery_man/order_track.php?order_id=". $_GET['order_id']."'</script>";
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
