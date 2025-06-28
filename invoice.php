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

<?php
    $id = $_GET['id'];
    $orders = $mysqli->common_select('orders','*',['id'=>$id]);
    $orders = $orders['data'][0];
    $order_items = $mysqli->common_select('order_items','*',['id'=>$id]);
    $order_items = $order_items;['data'];
    $users = $mysqli->common_select('users','*',['id'=>$orders->user_id]);
    $users = $users['data'][0];
    $division = $mysqli->common_select('division','*',['id'=>$orders->shipping_division]);
    $division = $division['data'][0];
    $district = $mysqli->common_select('district','*',['id'=>$orders->shipping_district]);
    $district = $district['data'][0];
    $order_items =$mysqli->common_select('order_items','*',['order_id'=>$id]);
    $order_items = $order_items['data'];
    $books =$mysqli->common_select('books','*',['id'=>$order_items->book_id]);
    $books = $books['data'];
  ?>


  <div class="container">
    <div class="invoice-header d-flex justify-content-between align-items-center">
      <div>
        <h1 class="invoice-title">Invoice</h1>
        <p for="orders_id"><b>Order ID : #</b> <?= str_pad($orders->id,4,'0',STR_PAD_LEFT) ?></p>
      </div>
      <div class="text-end">
        <p><strong>Date:</strong> <?= date('d-m-Y', strtotime($orders->order_date)) ?></p>
        <p><strong>Due Date:</strong><b>yet to be done</b></p>
      </div>
    </div>

    <div class="row mb-4">
      <div class="col-md-6">
        <h5>Bill To:</h5>
        <p>
          <?= $users->name ?><br />
          <?= $orders->billing_address ?><br />
          <?= $district->name ?>, <?= $division->name ?><br />
          <?= $orders->billing_contact ?>
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
            <td><?= print_r($order_items) ?></td>
            <td><?= print_r($books) ?></td>
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
