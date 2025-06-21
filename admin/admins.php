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
        <h6 class="mb-4">Admins</h6>
        <a href="admins_create.php" class="btn btn-primary float-end">Add New</a>
        <table class="table text-dark">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Contact </th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>NID</th>
                    <th>Dob</th>
                    <th>Address </th>
                    <th>Password</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $admins = $mysqli->common_select("admins");
                    if (!$admins['error']) {
                        foreach ($admins['data'] as $key => $value) {
                ?>
                            <tr>
                                <th scope="row"><?= $key + 1; ?></th>
                                <td><?= $value->name; ?></td>
                                <td><?= $value->contact_no; ?></td>
                                <td><?= $value->email; ?></td>
                                <td><?= $value->gender; ?></td>
                                <td><?= $value->nid; ?></td>
                                <td><?= $value->dob; ?></td>
                                <td><?= $value->address; ?></td>
                                <td><?= $value->password; ?></td>
                                <td>
                                    <a href="admins_edit.php?id=<?= $value->id ?>" class="btn btn-primary">Edit</a>
                                    <a onclick="return confirm('Are you sure to delete this data')" href="admins_delete.php?id=<?= $value->id; ?>" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                <?php
                        }
                    }
                ?>
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>
</div>


<?php include 'include/footer.php'; ?>
