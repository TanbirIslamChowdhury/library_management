<?php include 'include/header.php'; ?>
<!-- Sidebar Start -->
<?php include 'include/sidebar.php'; ?>
<!-- Sidebar End -->

<!-- Navbar Start -->
<?php include 'include/topbar.php'; ?>
<!-- Navbar End -->
<?php
    $where['id'] = $_GET['id'];
    $delivery_man = $mysqli->common_select("delivery_man",'*',$where);
    $data=[];
    if (!$delivery_man['error']) {
        $data=$delivery_man['data'][0];
    }
    
?>

<!-- Content Start -->
<div class="col-sm-12">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4">Add New Delivery Man</h6>
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
                                    <label for="contact_no" class="form-label">Contact Number</label>
                                    <input type="text" value="<?= $data->contact_no ?>" class="form-control" id="contact_no" name="contact_no">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" value="<?= $data->email ?>" class="form-control" id="email" name="email">
                                </div>
                            </div>
                           <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="gender" class="form-label">Gender</label>
                                    <input type="text" value="<?= $data->gender ?>"class="form-control" id="gender" name="gender">
                                </div>
                            </div>
                             <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="nid" class="form-label">Nid</label>
                                    <input type="text" value="<?= $data->nid ?>"class="form-control" id="nid" name="nid">
                                </div>
                            </div>
                             <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="dob" class="form-label">Dob</label>
                                    <input type="date" value="<?= $data->dob ?>"class="form-control" id="dob" name="dob">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" value="<?= $data->address ?>"class="form-control" id="address" name="address">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="text" value="<?= $data->password ?>"class="form-control" id="password" name="password">
                                </div>
                            </div>
                         </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                    <?php
                    if ($_POST) {
                        $_POST['updated_at'] = date('Y-m-d H:i:s');
                        $_POST['updated_by'] = $_SESSION['user']->id;
                        $res=$mysqli->common_update('delivery_man',$_POST,$where);
                        if(!$res['error']){
                          echo "<script>location.href='".$baseurl."admin/delivery_man.php'</script>";
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
