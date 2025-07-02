<?php
  include_once('include/connection.php');

  $where['id']=$_GET['id'];

  $data['updated_at']=date('Y-m-d H:i:s');
  $data['updated_by']=$_SESSION['delivery_man']->id;
  $res=$mysqli->soft_delete('order_track',$data,$where);
  if(!$res['error']){
    echo "<script>location.href='".$baseurl."/delivery_man/order_track.php?order_id=". $_GET['order_id']."'</script>";
  }else{
    echo $res['error_msg'];
  }
?>
