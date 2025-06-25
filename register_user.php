<?php
include 'include/connection_user.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['password'] !== $_POST['c_password']) {
        echo "<script>alert('Passwords do not match');</script>";
    } else {
        $_POST['password'] = sha1($_POST['password']);
        unset($_POST['c_password']);

        $res = $mysqli->common_insert('users', $_POST);
        if ($res['error'] == 0) {
            header('Location: login_user.php');
            exit();
        } else {
            echo "<script>alert('Registration failed: " . $res['error_msg'] . "');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Register - Library Management</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <link href="admin/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="admin/assets/css/style.css" rel="stylesheet">
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
                    <h3 class="mb-4">Register</h3>
                    <form method="post">
                        <div class="form-floating mb-3">
                            <input type="text" name="name" class="form-control" required>
                            <label>Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="contact_no" class="form-control" required>
                            <label>Contact Number</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" name="email" class="form-control" required>
                            <label>Email</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" name="password" class="form-control" required>
                            <label>Password</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" name="c_password" class="form-control" required>
                            <label>Confirm Password</label>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Sign Up</button>
                        <p class="text-center mt-3">Already have an account? <a href="login_user.php">Login</a></p>
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
