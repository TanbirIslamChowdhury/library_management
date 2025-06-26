<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Order History</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #ffffff;
      color: #333;
      padding: 40px;
    }

    h2 {
      margin-bottom: 20px;
      color: #555;
    }

    .table thead {
      background-color: #fdf9e5; /* subtle yellow */
    }

    .table-hover tbody tr:hover {
      background-color: #fffdeb; /* even fainter yellow hover */
    }

    .status-completed {
      color: green;
    }

    .status-pending {
      color: #c2a300; /* soft mustard yellow */
    }

    .status-cancelled {
      color: red;
    }
  </style>
</head>
<body>
    <?php include 'include/header.php';?>

  <div class="container">
    <h2>Your Order History</h2>
    <div class="table-responsive">
      <table class="table table-hover align-middle">
        <thead>
          <tr>
            <th>Order ID</th>
            <th>Date</th>
            <th>Book Title</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>#10234</td>
            <td>2025-06-21</td>
            <td>The Art of Thinking Clearly</td>
            <td>1</td>
            <td>$18.99</td>
            <td class="status-completed">Completed</td>
          </tr>
          <tr>
            <td>#10212</td>
            <td>2025-06-10</td>
            <td>Atomic Habits</td>
            <td>2</td>
            <td>$37.98</td>
            <td class="status-pending">Pending</td>
          </tr>
          <tr>
            <td>#10185</td>
            <td>2025-05-30</td>
            <td>Deep Work</td>
            <td>1</td>
            <td>$15.49</td>
            <td class="status-cancelled">Cancelled</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <?php include 'include/footer.php';?>

</body>
</html>
