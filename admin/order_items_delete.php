
<?php
  include_once('include/connection.php');

  $where['id']=$_GET['id'];

  $data['updated_at']=date('Y-m-d H:i:s');
  $data['updated_by']=$_SESSION['user']->id;
  $res=$mysqli->soft_delete('order_items',$data,$where);
  if(!$res['error']){
    echo "<script>location.href='".$baseurl."/admin/order_items.php'</script>";
  }else{
    echo $res['error_msg'];
  }
?>

              