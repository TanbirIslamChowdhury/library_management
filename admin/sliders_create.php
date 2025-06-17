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
        <h6 class="mb-4">Add New Sliders</h6>
        <div class="row g-4">
            <div class="col-sm-12">
                <div class="bg-light rounded h-100 p-4">
                    <form method="post" action="" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="title" name="title">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <input type="text" class="form-control" id="description" name="description">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="image" class="form-label">Image</label>
                                    <input type="file" class="form-control" id="image" name="image">
                                </div>
                            </div>
                            
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                    <?php

                        if ($_POST) {
                            if ($_FILES) {
                                $img = $_FILES["image"];
                                $location = "images/" . time() . rand(1111, 9999) . $img['name'];
                                $rs = move_uploaded_file($img['tmp_name'], $location);
                                if ($rs) {
                                    $_POST['image'] = $location;
                                }
                            }
                            $_POST['created_at'] = date('Y-m-d H:i:s');
                            $_POST['created_by'] = $_SESSION['user']->id;
                            $res=$mysqli->common_insert('sliders',$_POST);
                            if(!$res['error']){
                            echo "<script>location.href='".$baseurl."admin/sliders.php'</script>";
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
