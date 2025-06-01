<?php include 'include/header.php'; ?>
<!-- Sidebar Start -->
    <?php include 'include/sidebar.php'; ?>
<!-- Sidebar End -->
<!-- Content Start -->
<!-- Navbar Start -->
    <?php include 'include/topbar.php'; ?>
<!-- Navbar End -->
<?php
$id=$_GET['id'];
$data=$mysqli->common_select('user','*',['id'=>$id]);
if($data['error']==0){
    $data=$data['data'][0];
}
?>

    <div class="row">
        <div class="col-sm-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">User Update</h6>
                <form action="" method="post">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="name" name="name" value="<?= $data->name?>" placeholder="Name">
                                <label for="name">Name</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="contact_no" name="contact_no" value="<?= $data->contact_no?>" placeholder="Name">
                                <label for="contact_no">Contact Number</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="email" name="email" value="<?= $data->email?>" placeholder="Email">
                                <label for="email">Email</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-floating mb-3">
                                <select class="form-select" name="is_active" id="is_active" aria-label="Floating label select example">
                                    <option value="1" <?= $data->is_active==1 ? "selected":"" ?>>Active</option>
                                    <option value="0" <?= $data->is_active==0 ? "selected":"" ?>>Inactive</option>
                                </select>
                                <label for="is_active">Is Active</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-floating mb-3">
                                <select class="form-select" name="status" id="status" aria-label="Floating label select example">
                                    <option value="1" <?= $data->status==1 ? "selected":"" ?>>Active</option>
                                    <option value="0" <?= $data->status==0 ? "selected":"" ?>>Blocked</option>
                                </select>
                                <label for="status">Status</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-floating mb-3">
                                <select class="form-select" name="role_id" id="role_id" aria-label="Floating label select example">
                                    <?php
                                    $role_data=$mysqli->common_select('role','*');
                                    if($role_data['error']==0){
                                            $role_data=$role_data['data'];
                                            foreach($role_data as $row){
                                                ?>
                                                <option value="<?= $row->id?>" <?= $data->role_id==$row->id ? "selected":"" ?>><?= $row->name ?></option>
                                    <?php
                                            }
                                        }
                                    ?>
                                </select>
                                <label for="status">Status</label>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary"> Update</button>
                        </div>
                    </div>
                </form>

                <?php

                if($_POST){
                    $res=$mysqli->common_update('user',$_POST,['id'=>$id]);
                    if($res['error']==0){
                        echo "<script> location.href='user_index.php'</script>";
                    }else{
                        echo $res['error_msg'];
                    }
                }
                ?>
            </div>
        </div>
    </div>

    



<?php include 'include/footer.php'; ?>