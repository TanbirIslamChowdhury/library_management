<?php include 'include/header.php'; ?>
<!-- Sidebar Start -->
    <?php include 'include/sidebar.php'; ?>
<!-- Sidebar End -->
<!-- Content Start -->
<!-- Navbar Start -->
    <?php include 'include/topbar.php'; ?>
<!-- Navbar End -->

    <div class="row">
        <div class="col-sm-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Add New User</h6>
                <form action="" method="post">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                                <label for="name">Name</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="contact_no" name="contact_no" placeholder="Contact Number">
                                <label for="contact_no">Contact Number</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                                <label for="email">Email</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-floating mb-3">
                                <select class="form-select" name="is_active" id="is_active" aria-label="Floating label select example">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                                <label for="is_active">Is Active</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-floating mb-3">
                                <select class="form-select" name="status" id="status" aria-label="Floating label select example">
                                    <option value="1">Active</option>
                                    <option value="0">Blocked</option>
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
                                                <option value="<?= $row->id?>" ><?= $row->name ?></option>
                                    <?php
                                            }
                                        }
                                    ?>
                                </select>
                                <label for="status">Status</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                <label for="password">Password</label>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary"> Save</button>
                        </div>
                    </div>
                </form>

                <?php

                if($_POST){
                    $_POST['password']=sha1($_POST['password']);
                    $res=$mysqli->common_insert('user',$_POST);
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