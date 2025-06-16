<?php include 'include/header.php'; ?>
<!-- Sidebar Start -->
<?php include 'include/sidebar.php'; ?>
<!-- Sidebar End -->

<!-- Navbar Start -->
<?php include 'include/topbar.php'; ?>
<!-- Navbar End -->
<?php
    $where['id'] = $_GET['id'];
    $book_purchase = $mysqli->common_select("book_purchase",'*',$where);
    $data=[];
    if (!$book_purchase['error']) {
        $data=$book_purchase['data'][0];
    }
    
?>

<!-- Content Start -->
<div class="col-sm-12">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4">Add New book_purchase</h6>
        <div class="row g-4">
            <div class="col-sm-12">
                <div class="bg-light rounded h-100 p-4">
                    <form method="post" action="">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">publisher_id</label>
                                    <input type="text" value="<?= $data->name ?>" class="form-control" id="name" name="name">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="contact_no" class="form-label">purchase_date</label>
                                    <input type="text" value="<?= $data->contact_no ?>" class="form-control" id="contact_no" name="contact_no">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">price	</label>
                                    <input type="text" value="<?= $data->email ?>" class="form-control" id="email" name="email">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="address" class="form-label">quantity</label>
                                    <input type="text" value="<?= $data->address ?>" class="form-control" id="address" name="address">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                    <?php
                    if ($_POST) {
                        $_POST['updated_at'] = date('Y-m-d H:i:s');
                        $_POST['updated_by'] = $_SESSION['user']->id;
                        $res=$mysqli->common_update('book_purchase',$_POST,$where);
                        if(!$res['error']){
                          echo "<script>location.href='".$baseurl."admin/book_purchase.php'</script>";
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
