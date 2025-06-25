<?php 
  include 'include/connection_user.php';
  $where['status']=1;
  $where['coupon_code']=$_GET['code'];
  $where['validity_date >']=date('Y-m-d');
    $coupon_data=$mysqli->common_select('coupon','*',$where);
    if($coupon_data['error']){
      echo "Coupon Code Expired";
      return false;
    }else{
      if($coupon_data['data'][0]->amount_type==1){
        $discount_amount=$coupon_data['data'][0]->amount;
        $discount_type=1;
      }else{
        $discount_amount= ($_SESSION['cart']['total'] * ($coupon_data['data'][0]->amount / 100));
        $discount_type=2;
      }
      cal_total($discount_amount,$discount_type,$coupon_data['data'][0]->amount);
    }
  
    
  function cal_total($discount_amount,$discount_type,$amount){
    
    $total_price=$total_qty=0;
    if(isset($_SESSION['cart']['item']) and $_SESSION['cart']['item']){
      foreach($_SESSION['cart']['item'] as $item){
        $total_price+=$item['price'] * $item['qty'];
      }
    }
    $_SESSION['cart']['total']=$total_price;
    $_SESSION['cart']['shipping_charge']=0;
    $_SESSION['cart']['discount_amount']=$amount;
    $_SESSION['cart']['discount_type']=$discount_type;
    $_SESSION['cart']['discount_amount_final']=$discount_amount;
    $_SESSION['cart']['cupon']="";
    $_SESSION['cart']['total_item']=count($_SESSION['cart']['item']);
  }
  echo "Coupon applied successfully";
  
?>