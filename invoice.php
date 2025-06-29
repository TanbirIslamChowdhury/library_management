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
    $items =$mysqli->common_query("SELECT order_items.*,books.name,orders.discount_amount,orders.discount_amount_final,orders.grand_total,orders.total_amount FROM `order_items` JOIN books on books.id=order_items.book_id JOIN orders on orders.id=order_items.order_id WHERE orders.id=$id");
    $data = $items['data'];
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
          <?php foreach ($data as $datas): ?>
          <tr>
            <td><?= $datas->name ?></td>
            <td><?= $datas->quantity ?></td>
            <td><?= $datas->price_per_unit ?></td>
            <td><?= $datas->price_per_unit * $datas->quantity ?></td>
          </tr>
          <?php endforeach; ?>
          <tr>
            <td>Total</td>
            <td></td>
            <td></td>
            <td><?= $datas->total_amount ?></td>
          </tr>
          <tr>
            <td>Discount Amount</td>
            <td></td>
            <td></td>
            <td><?= $datas->discount_amount_final ?></td>
          </tr>
          <tr>
            <td>Discounted Total</td>
            <td></td>
            <td></td>
            <td><?= $datas->total_amount - $datas->discount_amount_final ?></td>
          </tr>
          <tr>
            <td>Shipping Charge</td>
            <td></td>
            <td></td>
            <td><?= $orders->shipping_charge ?></td>
          </tr>
          <tr class="total-row">
            <td colspan="3" class="text-end">Grand Total</td>
            <td><?= $datas->grand_total ?></td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="text-center footer-text no-print">
      <p>Thank you for your purchase! If you have any questions about this invoice, please contact support@bookpurchaseonline.com.</p>
    </div>
    <button type="button" class="btn btn-primary float-right  no-print" onclick="print_btn()">Print Now</button>
  </div>

<?php include 'include/footer.php';?>
<script>
    function print_btn(){
        window.print();
    }
</script>

</body>
</html>
