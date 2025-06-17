<?php include 'LibraryLinks.php';?>
<?php include 'LibraryHeader.php';?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce Cart</title>
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
</head>
<body>



 <!-- <div class="sticky-top">



<a href="LibraryIndex.php">
<button type="button" class="btn btn-outline-danger">

<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
  <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z"/>
</svg>


</button>


</a>  

</div>  -->

    



    
    <h1 style="display:flex;justify-content:center">Cart Page</h1>
    
    <div class="container">
        <div class="products" id="products">
            <!-- Products will be added here by JavaScript -->
        </div>
        
        <div class="cart">
            <h2>Your Cart</h2>
            <div id="cart-items">
                <!-- Cart items will be added here by JavaScript -->
            </div>
            <div class="cart-total" id="cart-total">
                Total: $0.00
            </div>
            <button id="checkout-btn">Proceed to Checkout</button>
        </div>
    </div>

    <script>
        // Sample product data
        const products = [
            { id: 1, name: "Smartphone", price: 599.99, image: "images/product-item1.jpg" },
            { id: 2, name: "Laptop", price: 999.99, image: "images/product-item2.jpg" },
            { id: 3, name: "Headphones", price: 149.99, image: "images/product-item6.jpg" },
            { id: 4, name: "Smart Watch", price: 249.99, image: "images/product-item3.jpg" },
            { id: 5, name: "Tablet", price: 349.99, image: "images/product-item4.jpg" },
            { id: 6, name: "Bluetooth Speaker", price: 79.99, image: "images/product-item5.jpg" }
        ];

        // Cart state
        let cart = [];

        // DOM elements
        const productsContainer = document.getElementById('products');
        const cartItemsContainer = document.getElementById('cart-items');
        const cartTotalElement = document.getElementById('cart-total');
        const checkoutButton = document.getElementById('checkout-btn');

        // Initialize the app
        function init() {
            renderProducts();
            loadCart();
            renderCart();
            setupEventListeners();
        }

        // Render products to the page
        function renderProducts() {
            productsContainer.innerHTML = '';
            products.forEach(product => {
                const productElement = document.createElement('div');
                productElement.className = 'product';
                productElement.innerHTML = `
                    <img src="${product.image}" alt="${product.name}">
                    <h3>${product.name}</h3>
                    <p>$${product.price.toFixed(2)}</p>
                    <button class="add-to-cart" data-id="${product.id}">Add to Cart</button>
                `;
                productsContainer.appendChild(productElement);
            });
        }

        // Set up event listeners
        function setupEventListeners() {
            // Add to cart buttons
            document.querySelectorAll('.add-to-cart').forEach(button => {
                button.addEventListener('click', (e) => {
                    const productId = parseInt(e.target.getAttribute('data-id'));
                    addToCart(productId);
                });
            });

            // Checkout button
            checkoutButton.addEventListener('click', () => {
                alert('Checkout functionality would go here!');
            });
        }

        // Add a product to the cart
        function addToCart(productId) {
            const product = products.find(p => p.id === productId);
            if (!product) return;

            const existingItem = cart.find(item => item.id === productId);
            
            if (existingItem) {
                existingItem.quantity += 1;
            } else {
                cart.push({
                    id: product.id,
                    name: product.name,
                    price: product.price,
                    quantity: 1
                });
            }

            saveCart();
            renderCart();
        }

        // Remove an item from the cart
        function removeFromCart(productId) {
            cart = cart.filter(item => item.id !== productId);
            saveCart();
            renderCart();
        }

        // Update item quantity in the cart
        function updateQuantity(productId, newQuantity) {
            if (newQuantity < 1) {
                removeFromCart(productId);
                return;
            }

            const item = cart.find(item => item.id === productId);
            if (item) {
                item.quantity = newQuantity;
                saveCart();
                renderCart();
            }
        }

        // Calculate the cart total
        function calculateTotal() {
            return cart.reduce((total, item) => total + (item.price * item.quantity), 0);
        }

        // Render the cart
        function renderCart() {
            cartItemsContainer.innerHTML = '';
            
            if (cart.length === 0) {
                cartItemsContainer.innerHTML = '<p>Your cart is empty</p>';
                cartTotalElement.textContent = 'Total: $0.00';
                return;
            }

            cart.forEach(item => {
                const cartItemElement = document.createElement('div');
                cartItemElement.className = 'cart-item';
                cartItemElement.innerHTML = `
                    <div>
                        <h4>${item.name}</h4>
                        <p>$${item.price.toFixed(2)}</p>
                    </div>
                    <div class="quantity-controls">
                        <button class="decrease" data-id="${item.id}">-</button>
                        <span>${item.quantity}</span>
                        <button class="increase" data-id="${item.id}">+</button>
                        <button class="remove" data-id="${item.id}">×</button>
                    </div>
                `;
                cartItemsContainer.appendChild(cartItemElement);
            });

            // Update total
            cartTotalElement.textContent = `Total: $${calculateTotal().toFixed(2)}`;

            // Add event listeners to cart buttons
            document.querySelectorAll('.decrease').forEach(button => {
                button.addEventListener('click', (e) => {
                    const productId = parseInt(e.target.getAttribute('data-id'));
                    const item = cart.find(item => item.id === productId);
                    if (item) {
                        updateQuantity(productId, item.quantity - 1);
                    }
                });
            });

            document.querySelectorAll('.increase').forEach(button => {
                button.addEventListener('click', (e) => {
                    const productId = parseInt(e.target.getAttribute('data-id'));
                    const item = cart.find(item => item.id === productId);
                    if (item) {
                        updateQuantity(productId, item.quantity + 1);
                    }
                });
            });

            document.querySelectorAll('.remove').forEach(button => {
                button.addEventListener('click', (e) => {
                    const productId = parseInt(e.target.getAttribute('data-id'));
                    removeFromCart(productId);
                });
            });
        }

        // Save cart to localStorage
        function saveCart() {
            localStorage.setItem('cart', JSON.stringify(cart));
        }

        // Load cart from localStorage
        function loadCart() {
            const savedCart = localStorage.getItem('cart');
            if (savedCart) {
                cart = JSON.parse(savedCart);
            }
        }

        // Initialize the application
        init();
    </script>
</body>
</html>