<?php 
  session_start();

  $id=$_GET['id'];
  $type=$_GET['type'];
  if(isset($_SESSION['cart']['item'][$id])){
    if($type=='in')
      $_SESSION['cart']['item'][$id]['qty']= $_SESSION['cart']['item'][$id]['qty'] + 1;
    else{
      if($_SESSION['cart']['item'][$id]['qty'] > 1){
        $_SESSION['cart']['item'][$id]['qty']= $_SESSION['cart']['item'][$id]['qty'] - 1;
      }
    }
  }
cal_total();
  function cal_total(){
    
    $total_price=$total_qty=0;
    if(isset($_SESSION['cart']['item']) and $_SESSION['cart']['item']){
      foreach($_SESSION['cart']['item'] as $item){
        $total_price+=$item['price'] * $item['qty'];
      }
    }
    $_SESSION['cart']['total']=$total_price;
    $_SESSION['cart']['shipping_charge']=0;
    $_SESSION['cart']['discount_amount']=0;
    $_SESSION['cart']['discount_type']=1;
    $_SESSION['cart']['cupon']="";
    $_SESSION['cart']['other_charge']= count($_SESSION['cart']['item']) * 20;
    $_SESSION['cart']['total_item']=count($_SESSION['cart']['item']);
  }
  echo json_encode($_SESSION['cart']);
  
?>