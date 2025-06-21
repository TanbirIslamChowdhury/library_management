<?php 
  session_start();

  $id=$_GET['id'];
  if(isset($_SESSION['cart']['item'][$id])){
    unset($_SESSION['cart']['item'][$id]);
  }
  if(count($_SESSION['cart']['item'])==0){
    unset($_SESSION['cart']);
    session_destroy();
  }
  cal_total();
  function cal_total(){
    
    $total_price=$total_qty=0;
    if(isset($_SESSION['cart']['item']) and $_SESSION['cart']['item']){
      foreach($_SESSION['cart']['item'] as $item){
        $total_price+=$item['price'];
      }
    }
    $_SESSION['cart']['total']=$total_price;
    $_SESSION['cart']['discount']=0;
    $_SESSION['cart']['cupon']="";
    $_SESSION['cart']['other_charge']= count($_SESSION['cart']['item']) * 20;
    $_SESSION['cart']['total_item']=count($_SESSION['cart']['item']);
  }


  
  echo json_encode($_SESSION['cart']);
  
?>