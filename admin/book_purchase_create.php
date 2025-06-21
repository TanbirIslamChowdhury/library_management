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
        <h6 class="mb-4">Add New book_purchase</h6>
        <div class="row g-4">
            <div class="col-sm-12">
                <div class="bg-light rounded h-100 p-4">
                    <form method="post" action="">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">publisher_id</label>
                                    <select class="form-control" id="publisher_id" name="publisher_id">  
                                        <?php
                                        $data=$mysqli->common_select('publisher');
                                        if(!$data['error']){
                                            foreach($data['data'] as $d){
                                        ?>
                                        <option value="<?= $d->id ?>"><?= $d->name ?></option>
                                        <?php } } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="purchase_date" class="form-label">purchase_date</label>
                                    <input type="date" class="form-control" id="purchase_date" name="purchase_date">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <strong>Book</strong>
                            </div>
                            <div class="col-sm-3">
                                <strong>Qty</strong>
                            </div>
                            <div class="col-sm-3">
                                <strong>Price</strong>
                            </div>
                            <div class="col-sm-3">
                                <strong>Total</strong>
                            </div>
                        </div>
                        <div class="book_rows">
                            <div class="row mt-2">
                                <div class="col-sm-3">
                                    <select class="form-control" id="book_id" name="book_id[]">  
                                        <?php
                                        $data=$mysqli->common_select('books');
                                        if(!$data['error']){
                                            foreach($data['data'] as $d){
                                        ?>
                                        <option value="<?= $d->id ?>"><?= $d->name ?></option>
                                        <?php } } ?>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control qty" onkeyup="calc_price(this)" id="qty" name="qty[]">
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control price" onkeyup="calc_price(this)" id="price" name="price[]">
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control sub_total" id="sub_total" name="sub_total[]">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-sm-12">
                                <button type="button" class="btn btn-primary float-end" onclick="add_book_rows()">Add Row</button>
                            </div>
                        </div>
                        

                        <div class="row mt-3">
                            <div class="col-sm-6">
                            </div>
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="price" class="form-label">grand Total</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="grand_total" name="grand_total">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                    <?php
                    if ($_POST) {
                        $pur['publisher_id']=$_POST['publisher_id'];
                        $pur['purchase_date']=$_POST['purchase_date'];
                        $pur['price']=$_POST['grand_total'];
                        $pur['created_at'] = date('Y-m-d H:i:s');
                        $pur['created_by'] = $_SESSION['user']->id;
                        $pur['status'] = 1;
                        $res=$mysqli->common_insert('book_purchase',$pur);
                        if(!$res['error']){
                            $pur_id = $res['data'];
                            foreach($_POST['book_id'] as $k=>$v){
                                $items['book_purchase_id'] = $pur_id;
                                $items['book_id'] = $v;
                                $items['quantity'] = $_POST['qty'][$k];
                                $items['price'] = $_POST['price'][$k];
                                $items['created_at'] = date('Y-m-d H:i:s');
                                $items['created_by'] = $_SESSION['user']->id;
                                $items['status'] = 1;
                                $res=$mysqli->common_insert('book_purchase_items',$items);
                                if(!$res['error']){
                                    $stock['book_id'] = $v;
                                    $stock['purchase_id'] = $pur_id;
                                    $stock['price'] = $_POST['price'][$k];
                                    $stock['stock_quantity'] =$_POST['qty'][$k];
                                    $stock['created_at'] = date('Y-m-d H:i:s');
                                    $stock['created_by'] = $_SESSION['user']->id;
                                    $stock['status'] = 1;
                                    $res=$mysqli->common_insert('stock',$stock);
                                }
                            }
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
<script>
    function add_book_rows(){
        var html = `<div class="row ext_row mt-2">
        <div class="col-sm-3">
        <select class="form-control" id="book_id" name="book_id[]">
        <?php   $data=$mysqli->common_select('books');  
                if(!$data['error']){
                    foreach($data['data'] as $d){
        ?>
            <option value="<?= $d->id ?>"><?= $d->name ?></option>
        <?php } } ?>
        </select>
            </div>
        <div class="col-sm-3">
        <input type="text" class="form-control qty"  onkeyup="calc_price(this)" id="qty" name="qty[]">
        </div>
        <div class="col-sm-3">
        <input type="text" class="form-control price" onkeyup="calc_price(this)" id="price" name="price[]">
        </div>
        <div class="col-sm-3">
            <div class="row">
                <div class="col-sm-8">
                    <input type="text" class="form-control sub_total" onkeyup="calc_price(this)" id="sub_total" name="sub_total[]">
                </div>
                <div class="col-sm-4">
                    <button type="button" class="btn btn-danger" onclick="remove_row(this)"><i class="fa fa-trash"></i></button>
                </div>
            </div>
        </div>
        </div>`;
        $('.book_rows').append(html);
    }

    function remove_row(e){
        $(e).closest('.ext_row').remove();
    }
    function calc_price(e){
        var qty = $(e).closest('.row').find('.qty').val();
        var price = $(e).closest('.row').find('.price').val();
        var sub_total = qty * price;
        $(e).closest('.row').find('.sub_total').val(sub_total);
        grand_total();
    }

    function grand_total(){
        var grand_total = 0;
        $('.sub_total').each(function(){
            grand_total += parseFloat($(this).val());
        });
        $('#grand_total').val(grand_total);
    }   
</script>