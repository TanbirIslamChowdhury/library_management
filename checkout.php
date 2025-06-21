
<?php include 'include/header.php';?>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        .container {
            display: flex;
            gap: 20px;
        }
        .products {
            flex: 2;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 15px;
        }
        .product {
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 5px;
        }
        .product img {
            max-width: 100%;
            height: auto;
        }
        .cart {
            flex: 1;
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 5px;
            position: sticky;
            top: 20px;
            height: fit-content;
        }
        .cart-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            padding-bottom: 10px;
            border-bottom: 1px solid #eee;
        }
        .cart-total {
            font-weight: bold;
            font-size: 1.2em;
            margin-top: 15px;
            padding-top: 10px;
            border-top: 1px solid #ddd;
        }
        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        .quantity-controls {
            display: flex;
            align-items: center;
            gap: 5px;
        }
        .quantity-controls button {
            padding: 2px 8px;
        }
    </style>


    
    <h1 style="display:flex;justify-content:center">Cart Page</h1>
    <?php
        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    ?>
        
    <div class="container">
        <form action="" method="post">
    <label for="user">User</label>
    <input type="text" name="" id="user">

    <label for="contact">Contact no</label>
    <input type="text" name="" id="contact">

    <label for="mail">Email</label>
    <input type="text" name="" id="mail">

    <label for="division">Shiping Division</label>
    <input type="text" name="" id="division">

    <label for="district">Shiping District</label>
    <input type="text" name="" id="district">

    <label for="address">Shiping Address</label>
    <input type="text" name="" id="address">

    <label for="billingAdd">Billing Address</label>
    <input type="text" name="" id="billingAdd">

    <label for="billingCon">Billing Contact</label>
    <input type="text" name="" id="billingCon">
    
</form>

        <div class="products" id="products">
            

<!-- <form action="" method="post">
    <label for="user">User</label>
    <input type="text" name="" id="user">

    <label for="contact">Contact no</label>
    <input type="text" name="" id="contact">

    <label for="mail">Email</label>
    <input type="text" name="" id="mail">

    <label for="division">Shiping Division</label>
    <input type="text" name="" id="division">

    <label for="district">Shiping District</label>
    <input type="text" name="" id="district">

    <label for="address">Shiping Address</label>
    <input type="text" name="" id="address">

    <label for="billingAdd">Billing Address</label>
    <input type="text" name="" id="billingAdd">

    <label for="">Billing Contact
    <input type="text" name="" id="">
    </label>
</form> -->




       
        </div>
        
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
            </tfoot>
        </table>
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

    </script>