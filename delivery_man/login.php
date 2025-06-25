<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
include 'include/connection.php';

if ($_POST) {
    $where = [
        'email' => $_POST['email'],
        'password' => $_POST['password']
    ];
    $res = $mysqli->common_select('delivery_man', '*', $where);
    if ($res['error'] == 0 && count($res['data']) > 0) {
        $_SESSION['delivery_man'] = $res['data'][0];
        $_SESSION['log_delivery_man_status'] = true;
        header('Location: dashboard.php');
        exit();
    } else {
        echo "<script>alert('Login Failed. Please check your email and password.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Login - Library Management</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
<div class="container-xxl position-relative bg-white d-flex p-0">
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status"></div>
    </div>

    <div class="container-fluid">
        <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
            <div class="col-md-6 col-lg-4">
                <div class="bg-light rounded p-4">
                    <h3 class="mb-4">Login</h3>
                    <form method="post">
                        <div class="form-floating mb-3">
                            <input type="email" name="email" class="form-control" required>
                            <label>Email address</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" name="password" class="form-control" required>
                            <label>Password</label>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Sign In</button>
                        <p class="text-center mt-3">Don't have an account? <a href="register.php">Register</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    window.addEventListener('load', function () {
        document.getElementById('spinner').classList.remove('show');
    });
</script>
</body>
</html>
