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
        <h6 class="mb-4">Books Table</h6>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Contact No</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>NID</th>
                    <th>DOB</th>
                    <th>Address</th>
                    <th>Password</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Book Title</td>
                    <td>1</td>
                    <td>2</td>
                    <td>Yes</td>
                    <td>No</td>
                    <td>$19.99</td>
                    <td>$14.99</td>
                    <td>This is a sample book description.</td>
                    <td><img src="path/to/image.jpg" alt="Book Image" width="50"></td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Another Book</td>
                    <td>2</td>
                    <td>5</td>
                    <td>No</td>
                    <td>Yes</td>
                    <td>$24.99</td>
                    <td>$18.99</td>
                    <td>Another sample description.</td>
                    <td><img src="path/to/image2.jpg" alt="Book Image" width="50"></td>
                </tr>
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>
</div>
        


    <!--footer-->
<?php include 'include/footer.php'; ?>