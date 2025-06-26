<?php include 'include/header.php';?>
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">


<div class="untree_co-section">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center pt-5">

        <!-- Stylish Thank You text, no SVG -->
        <h1 class="display-3 fw-bold-warning" style="font-family: 'Dancing Script', cursive; font-size: 5rem; color:#C5A992; text-shadow: 1px 1px 2px rgba(0,0,0,0.1);">
          Thank you!
        </h1>

        <p class="lead mb-5 text-dark">Your order has been successfully placed.</p>
        
        <p>
          <a href="invoice.php?txnid=<?= $_GET['txnid'] ?? "" ?>" class="btn btn-lg btn-warning mb-3">
            Print Invoice
          </a>
        </p>

      </div>
    </div>
  </div>
</div>


<!-- Start Footer Section -->
<?php include 'include/footer.php';?>