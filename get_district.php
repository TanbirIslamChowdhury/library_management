<?php
echo '<option value="">Select District</option>';
    include 'include/connection_user.php';
    $where['division_id']=$_GET['division_id'];
    $data=$mysqli->common_select('district','*',$where);
    if(!$data['error']){
        foreach($data['data'] as $d){
            echo '<option value="'.$d->id.'">'.$d->name.'</option>';
        }
    }