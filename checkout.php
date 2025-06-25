
<?php include 'include/header.php';?>
    
    <h1 style="display:flex;justify-content:center">Cart Page</h1>
    <?php if (!isset($_SESSION['log_user_status']) && empty($_SESSION['log_user_status'])) { ?>
        <script>
            window.location.href = 'login_user.php?url=checkout.php';
        </script>
    <?php } ?>
    
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
                            <input type="text" class="form-control" name="name" value="<?= $_SESSION['user']->name ?>" id="name">
                        </div>
                        <div class="col-sm-6">
                            <label for="contact_no">Contact no</label>
                            <input type="text" class="form-control" name="contact_no" value="<?= $_SESSION['user']->contact_no ?>" id="contact_no">
                        </div>
                        <div class="col-sm-6">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="email" id="email" value="<?= $_SESSION['user']->email ?>">
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
                
                <?php
                if ($_POST) {
                    $order['total_amount']=$_SESSION['cart']['total'];
                    $order['shipping_charge']=$_SESSION['cart']['shipping_charge'];
                    $order['discount_amount']=$_SESSION['cart']['discount_amount'];
                    $order['discount_type']=$_SESSION['cart']['discount_type'];
                    $order['discount_amount_final']=$_SESSION['cart']['discount_amount_final'];
                    $order['cupon']=$_SESSION['cart']['cupon'];
                    $order['total_item']=$_SESSION['cart']['total_item'];
                    $order['grand_total']=$order['total_amount'] + $order['shipping_charge'] - $order['discount_amount_final'];
                    $order['order_date']=date('Y-m-d');
                    $order['payment_status']=0;
                    $order['delivery_status']=0;
                    $order['cancel_request']=0;
                    $order['status']=1;
                    $order['shipping_division']=$_POST['shipping_division'];
                    $order['shipping_district']=$_POST['shipping_district'];
                    $order['shipping_address']=$_POST['shipping_address'];
                    $order['shipping_contact']=$_POST['contact_no'];
                    $order['billing_address']=$_POST['billing_address'];
                    $order['billing_contact']=$_POST['billing_contact'];
                    $order['user_id']=$_SESSION['user']->id;
                    $order['created_at']=date('Y-m-d H:i:s');
                    $order['updated_at']=date('Y-m-d H:i:s');
                    $order_id=$mysqli->common_insert('orders',$order);
                    if(!$order_id['error']){
                        foreach($_SESSION['cart']['item'] as $id=>$product){
                            $order_details['order_id']=$order_id['data'];
                            $order_details['book_id']=$id;
                            $order_details['quantity']=$product['qty'];
                            $order_details['price_per_unit']=$product['price'];
                            $order_details['status']=1;
                            $order_details['created_at']=date('Y-m-d H:i:s');
                            $order_details['updated_at']=date('Y-m-d H:i:s');
                            $order_details_id=$mysqli->common_insert('order_items',$order_details);
                        }
                        unset($_SESSION['cart']);
                        echo "<script>location.href='".$baseurl."order_success.php'</script>";
                        
                    }
                }
                ?>
                            
                            
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
                                        (<?= $_SESSION['cart']['discount_amount_final']; ?>)
                                    <?php }else{ ?>
                                        <?= $_SESSION['cart']['discount_amount_final']; ?> (<?= $_SESSION['cart']['discount_amount']; ?>%)
                                    <?php } ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">Shipping Charge</td>
                                <td><span id="shipping_charge">0</span></td>
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
grand_total();
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
                    grand_total()
                }
            }
        )
    }

    function grand_total(){
        var shipping_charge = parseInt($('#shipping_charge').text());
        let total=parseInt(<?= $_SESSION['cart']['total']; ?>);
        let discount_amount_final=parseInt(<?= $_SESSION['cart']['discount_amount_final']; ?>);
        var grand_total = total + shipping_charge - discount_amount_final;
        $('#grand_total').text(grand_total);
    }

    </script>