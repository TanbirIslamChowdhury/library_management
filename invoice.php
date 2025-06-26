<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Invoice - BookPurchase Online</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body {
      background-color: #fff;
      color: #333;
      padding: 40px;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .invoice-header {
      background-color: #fdf9e5; /* subtle yellow */
      padding: 20px;
      margin-bottom: 30px;
      border-radius: 6px;
      box-shadow: 0 1px 4px rgb(0 0 0 / 0.1);
    }

    .invoice-title {
      font-weight: 700;
      font-size: 1.8rem;
      color: #555;
    }

    .table thead {
      background-color: #fdf9e5; /* subtle yellow */
    }

    .table td, .table th {
      vertical-align: middle;
    }

    .total-row {
      font-weight: 600;
      font-size: 1.1rem;
      background-color: #fffdeb; /* faint yellow */
    }

    .footer-text {
      color: #777;
      font-size: 0.9rem;
      margin-top: 50px;
      text-align: center;
    }
  </style>
</head>
<body>

<?php include 'include/header.php';?>


  <div class="container">
    <div class="invoice-header d-flex justify-content-between align-items-center">
      <div>
        <h1 class="invoice-title">Invoice</h1>
        <p>Order #10234</p>
      </div>
      <div class="text-end">
        <p><strong>Date:</strong> 2025-06-21</p>
        <p><strong>Due Date:</strong> 2025-07-05</p>
      </div>
    </div>

    <div class="row mb-4">
      <div class="col-md-6">
        <h5>Bill To:</h5>
        <p>
          Jane Doe<br />
          123 Main Street<br />
          Cityville, CA 90001<br />
          jane.doe@example.com
        </p>
      </div>
      <div class="col-md-6 text-md-end">
        <h5>From:</h5>
        <p>
          BookPurchase Online<br />
          456 Book St.<br />
          Readtown, NY 10012<br />
          support@bookpurchaseonline.com
        </p>
      </div>
    </div>

    <div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Book Title</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Subtotal</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>The Art of Thinking Clearly</td>
            <td>1</td>
            <td>$18.99</td>
            <td>$18.99</td>
          </tr>
          <tr>
            <td>Atomic Habits</td>
            <td>2</td>
            <td>$18.99</td>
            <td>$37.98</td>
          </tr>
          <tr>
            <td>Deep Work</td>
            <td>1</td>
            <td>$15.49</td>
            <td>$15.49</td>
          </tr>
          <tr class="total-row">
            <td colspan="3" class="text-end">Total</td>
            <td>$72.46</td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="text-center footer-text">
      <p>Thank you for your purchase! If you have any questions about this invoice, please contact support@bookpurchaseonline.com.</p>
    </div>
  </div>

<?php include 'include/footer.php';?>

</body>
</html>
