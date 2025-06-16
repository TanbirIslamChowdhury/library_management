<?php include 'include/header.php'; ?>
<!-- Sidebar Start -->
<?php include 'include/sidebar.php'; ?>
<!-- Sidebar End -->

<!-- Navbar Start -->
<?php include 'include/topbar.php'; ?>
<!-- Navbar End -->
<?php
    $where['id'] = $_GET['id'];
    $book_purchase_items = $mysqli->common_select("book_purchase_items",'*',$where);
    $data=[];
    if (!$book_purchase_items['error']) {
        $data=$book_purchase_items['data'][0];
    }
    
?>

<!-- Content Start -->
<div class="col-sm-12">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4">Add New Book Purchase Items</h6>
        <div class="row g-4">
            <div class="col-sm-12">
                <div class="bg-light rounded h-100 p-4">
                    <form method="post" action="">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="book_purchase_id" class="form-label">Book Purchase Id</label>
                                    <input type="text" value="<?= $data->book_purchase_id ?>" class="form-control" id="book_purchase_id" name="book_purchase_id">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="book_id" class="form-label">Book Id</label>
                                    <input type="text" value="<?= $data->book_id ?>" class="form-control" id="book_id" name="book_id">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="quantity" class="form-label">Quantity</label>
                                    <input type="text" value="<?= $data->quantity ?>" class="form-control" id="quantity" name="quantity">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="price" class="form-label">Price</label>
                                    <input type="text" value="<?= $data->price ?>" class="form-control" id="price" name="price">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                    <?php
                    if ($_POST) {
                        $_POST['updated_at'] = date('Y-m-d H:i:s');
                        $_POST['updated_by'] = $_SESSION['user']->id;
                        $res=$mysqli->common_update('book_purchase_items',$_POST,$where);
                        if(!$res['error']){
                          echo "<script>location.href='".$baseurl."admin/book_purchase_items.php'</script>";
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
