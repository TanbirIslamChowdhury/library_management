<?php
    include 'include/connection.php';
    $where['id']=$_GET['id'];
    $mysqli->common_delete('user',$where);
    header('location:user_index.php');
?>