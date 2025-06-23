<?php
    $charge=0;
    include 'include/connection_user.php';
    $where['district_id']=$_GET['district_id'];
    $data=$mysqli->common_select('shipping_charge','*',$where);
    if(!$data['error']){
        $charge=$data['data'][0]->charge;
        $_SESSION['cart']['shipping_charge']=$charge;
    }
    echo $charge;