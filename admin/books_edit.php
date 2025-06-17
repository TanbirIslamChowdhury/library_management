<?php include 'include/header.php'; ?>
<!-- Sidebar Start -->
<?php include 'include/sidebar.php'; ?>
<!-- Sidebar End -->

<!-- Navbar Start -->
<?php include 'include/topbar.php'; ?>
<!-- Navbar End -->
<?php
    $where['id'] = $_GET['id'];
    $books = $mysqli->common_select("books",'*',$where);
    $data=[];
    if (!$books['error']) {
        $data=$books['data'][0];
    }
    
?>

<!-- Content Start -->
<div class="col-sm-12">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4">Add New Books</h6>
        <div class="row g-4">
            <div class="col-sm-12">
                <div class="bg-light rounded h-100 p-4">
                    <form method="post" action="">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="category_id" class="form-label">Category Id</label>
                                    <input type="text" value="<?= $data->category_id ?>" class="form-control" id="name" name="category_id">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="publisher_id" class="form-label">Publisher Id</label>
                                    <input type="text" value="<?= $data->publisher_id ?>" class="form-control" id="publisher_id" name="publisher_id">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" value="<?= $data->name ?>" class="form-control" id="name" name="name">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="author_id" class="form-label">Author Id</label>
                                    <input type="text" value="<?= $data->author_id ?>" class="form-control" id="author_id" name="author_id">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="is_featured" class="form-label">Is Featured</label>
                                    <input type="text" value="<?= $data->is_featured ?>" class="form-control" id="is_featured" name="is_featured">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="is_populer" class="form-label">Is Populer</label>
                                    <input type="text" value="<?= $data->is_populer ?>" class="form-control" id="is_populer" name="is_populer">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="price" class="form-label">Price</label>
                                    <input type="text" value="<?= $data->price ?>" class="form-control" id="price" name="price">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="offer_price" class="form-label">Offer Price</label>
                                    <input type="text" value="<?= $data->offer_price ?>" class="form-control" id="offer_price" name="offer_price">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <input type="text" value="<?= $data->description ?>" class="form-control" id="description" name="description">
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
                        $_POST['updated_at'] = date('Y-m-d H:i:s');
                        $_POST['updated_by'] = $_SESSION['user']->id;
                        $res=$mysqli->common_update('books',$_POST,$where);
                        if(!$res['error']){
                          echo "<script>location.href='".$baseurl."admin/books.php'</script>";
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
