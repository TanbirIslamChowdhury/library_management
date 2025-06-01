<?php 
require_once('class/crud.php');
$mysqli= new crud();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>round64 php</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @media (min-width: 1025px) {
            .h-custom {
                height: 100vh !important;
            }
        }
    </style>
</head>
<body>
    <section class="h-100 h-custom" style="background-color: #8fc4b7;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-8 col-xl-6">
        <div class="card rounded-3">
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 px-md-2">Registration Info</h3>

            <form method="post" action="" class="px-md-2">

              <div data-mdb-input-init class="form-outline mb-4">
                <label class="form-label" for="name">Name</label>
                <input type="text" id="name" name="name" class="form-control" />
              </div>
              <div data-mdb-input-init class="form-outline mb-4">
                <label class="form-label" for="contact_no">Contact Number</label>
                <input type="text" id="contact_no" name="contact_no" class="form-control" />
              </div>
              <div data-mdb-input-init class="form-outline mb-4">
                <label class="form-label" for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" />
              </div>
              <div data-mdb-input-init class="form-outline mb-4">
                <label class="form-label" for="name">Password</label>
                <input type="password" id="password" name="password" class="form-control" />
              </div>
              <div data-mdb-input-init class="form-outline mb-4">
                <label class="form-label" for="c_password">Confirm Password</label>
                <input type="text" id="c_password" name="c_password" class="form-control" />
              </div>
              <div data-mdb-input-init class="form-outline mb-4">
                <label class="form-label" for="role_id">Role</label>
                <select id="role_id" name="role_id" class="form-control" >
                    <?php
                        $data=$mysqli->common_select('role','id,name');
                        print_r($data);
                        if(!$data['error']){
                            foreach($data['data'] as $d){
                    ?>
                        <option value="<?= $d->id?>"><?= $d->name?></option>
                    <?php   }
                        }
                    ?>
                </select>
              </div>

              <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-success btn-lg mb-1">Submit</button>

            </form>
            <?php
                if($_POST){
                    if($_POST['c_password'] !== $_POST['password']){
                        echo "Password and confirm password are not same";
                        return false;
                    }
                    $_POST['password']=sha1($_POST['password']);
                    unset($_POST['c_password']);
                    $res=$mysqli->common_insert('user',$_POST);
                    print_r($res);
                }

            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</html>