<?php 
  session_start();
$book_id=$_GET['book_id'];
$price=$_GET['price'];
$name=$_GET['name'];

if(isset($_SESSION['cart']['item'][$book_id])){
  $_SESSION['cart']['item'][$book_id]['qty']=$_SESSION['cart']['item'][$book_id]['qty'] + 1;
}else{
  $_SESSION['cart']['item'][$book_id]['book_id']=$book_id;
  $_SESSION['cart']['item'][$book_id]['name']=$name;
  $_SESSION['cart']['item'][$book_id]['price']=$price;
  $_SESSION['cart']['item'][$book_id]['qty']=1;
}

cal_total();
echo json_encode($_SESSION['cart']);

  function cal_total(){
    
    $total_price=$total_qty=0;
    if(isset($_SESSION['cart']['item']) and $_SESSION['cart']['item']){
      foreach($_SESSION['cart']['item'] as $item){
        $total_price+=$item['price'] * $item['qty'];
      }
    }
    $_SESSION['cart']['total']=$total_price;
    $_SESSION['cart']['shipping_charge']=0;
    $_SESSION['cart']['discount_amount']=20;
    $_SESSION['cart']['discount_type']=2;
    $_SESSION['cart']['discount_amount_final']=20;
    $_SESSION['cart']['cupon']="";
    $_SESSION['cart']['total_item']=count($_SESSION['cart']['item']);
  }
?>
