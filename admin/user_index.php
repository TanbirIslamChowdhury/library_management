<?php include 'include/header.php'; ?>
<!-- Sidebar Start -->
    <?php include 'include/sidebar.php'; ?>
<!-- Sidebar End -->
<!-- Content Start -->
    <!-- Navbar Start -->
        <?php include 'include/topbar.php'; ?>
    <!-- Navbar End -->


    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Users list</h6>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Contact Number</th>
                            <th scope="col">Email</th>
                            <th scope="col">Active</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $data=$mysqli->common_select('user','*');
                            if($data['error']==0){
                                $data=$data['data'];
                                foreach($data as $i=>$d){
                                    ?>
                                    <tr>
                                        <th scope="row"><?= ++$i ?></th>
                                        <td><?= $d->name; ?></td>
                                        <td><?= $d->contact_no; ?></td>
                                        <td><?= $d->email; ?></td>
                                        <td><?= $d->is_active ?"Active":"Inactive" ?></td>
                                        <td><?= $d->status ? "Active":"Blocked"; ?></td>
                                        <td>
                                            <a href="user_update.php?id=<?= $d->id; ?>" class="btn btn-sm btn-primary">Edit</a>
                                            <a href="user_delete.php?id=<?= $d->id; ?>" class="btn btn-sm btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                        ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>



<?php include 'include/footer.php'; ?>