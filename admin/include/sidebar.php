<!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>DASHMIN</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="assets/img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                    <h6 class="mb-0"><?= $_SESSION['user']->name ?></h6>
                    <span>Admin</span>

                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="dashboard.php" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-cog me-2"></i>Settings</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="author.php" class="nav-item nav-link ">Author</a>
                            <a href="publisher.php" class="nav-item nav-link ">Publisher</a>
                            <a href="categories.php" class="nav-item nav-link ">category</a>
                            <a href="books.php" class="nav-item nav-link ">Books</a>
                            <a href="book_purchase.php" class="nav-item nav-link ">Book Purchase</a>
                            <a href="book_purchase_items.php" class="nav-item nav-link ">Book Purchase Items</a>
                            <a href="Stock.php" class="nav-item nav-link ">Stocks</a>
                            <a href="shipping_charge.php" class="nav-item nav-link">Shipping Charge</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-users me-2"></i>Accounts</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="admins.php" class="nav-item nav-link "></i>Admins</a>
                            <a href="users.php" class="nav-item nav-link ">User</a>
                            <a href="delivery_man.php" class="nav-item nav-link ">Delivery Man</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-map me-2"></i>location</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="district.php" class="nav-item nav-link">District</a>
                            <a href="division.php" class="nav-item nav-link">Division</a>
                        </div>
                    </div>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-shopping-bag me-2"></i>Order menue</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="orders.php" class="nav-item nav-link"></i>Orders</a>
                            <a href="order_track.php" class="nav-item nav-link">Order Track</a>
                            <a href="coupon.php" class="nav-item nav-link">Coupon</a>
                        </div>
                    </div>
                    
                    
                    <a href="sliders.php" class="nav-item nav-link"><i class="fa fa-image me-2"></i>Sliders</a>

                    
                    
                        
                    
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->