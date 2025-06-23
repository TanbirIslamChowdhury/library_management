
<?php include 'include/header.php';?>
    
    <h1 style="display:flex;justify-content:center">Cart Page</h1>
    <?php
        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    ?>
        
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="name">Full Name</label>
                            <input type="text" class="form-control" name="name" id="name">
                        </div>
                        <div class="col-sm-6">
                            <label for="contact_no">Contact no</label>
                            <input type="text" class="form-control" name="contact_no" id="contact_no">
                        </div>
                        <div class="col-sm-6">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="email" id="email">
                        </div>
                        <div class="col-sm-6">
                            <label for="shipping_division">Shiping Division</label>
                            <select class="form-control" onchange="get_district(this.value)" id="shipping_division" name="shipping_division">
                                <option value="">Select Division</option>  
                                <?php
                                $data=$mysqli->common_select('division');
                                if(!$data['error']){
                                    foreach($data['data'] as $d){
                                ?>
                                <option value="<?= $d->id ?>"><?= $d->name ?></option>
                                <?php } } ?>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="shipping_district">Shiping District</label>
                            <select class="form-control" onchange="shipping_charge(this.value)" id="shipping_district" name="shipping_district">  
                               <option value="">Select District</option>  
                            </select>
                        </div>
                        
                        <div class="col-sm-6">
                            <label for="shipping_address">Shiping Address</label>
                            <input type="text" name="shipping_address" id="shipping_address">
                        </div>
                        <div class="col-sm-6">
                            <label for="billing_address">Billing Address</label>
                            <input type="text" name="billing_address" id="billing_address">
                        </div>
                        <div class="col-sm-6">
                            <label for="billing_contact">Billing Contact</label>
                            <input type="text" name="billing_contact" id="billing_contact">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <button class="btn btn-primary" type="submit">Checkout</button>
                        </div>
                    </div>
    
                </form>
            </div>
            <div class="col-sm-6">
                <div class="cart">
                    <h2>Your Cart</h2>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $total = 0;
                            foreach ($_SESSION['cart']['item'] as $id=>$product) {
                                $total += $product['price'] * $product['qty'];
                            ?>
                                <tr>
                                    <td><?php echo $product['name']; ?></td>
                                    <td><?php echo $product['price']; ?></td>
                                    <td><?php echo $product['qty']; ?></td>
                                    <td><?php echo $product['price'] * $product['qty']; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3">Total</td>
                                <td><?= $_SESSION['cart']['total']; ?></td>
                            </tr>
                            <tr>
                                <td colspan="3">Discount</td>
                                <td>
                                    <?php if($_SESSION['cart']['discount_type']==1){ ?>
                                        (<?= $_SESSION['cart']['discount_amount']; ?>)
                                    <?php }else{ ?>
                                        <?= $_SESSION['cart']['discount_amount_final']; ?> (<?= $_SESSION['cart']['discount_amount']; ?>%)
                                    <?php } ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">Shipping Charge</td>
                                <td><span id="shipping_charge"></span></td>
                            </tr>
                            <tr>
                                <td colspan="3">Grand Total</td>
                                <td><span id="grand_total"></span></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    

    <?php }else{ ?>
        <h1>
            Your cart is empty
        </h1>
    <?php } ?>
<?php include 'include/footer.php';?>

<script>

    // Remove an item from the cart
    function removeFromCart(book_id) {
        $.get('cart_delete.php',
            { id : book_id},
            function(data){
                if(data){
                    window.location.reload();
                }
            }
        )
    }

    function get_district(division_id){
        $.get('get_district.php',
            { division_id : division_id},
            function(data){
                if(data){
                    $('#shipping_district').html(data);
                }
            }
        )
    }
    function shipping_charge(district_id){
        $.get('shipping_charge.php',
            { district_id : district_id},
            function(data){
                if(data){
                    $('#shipping_charge').text(data);
                }
            }
        )
    }

    </script>