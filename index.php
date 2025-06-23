
<?php include 'include/header.php';?>
<?php include 'LibraryBillboard.php';?>
<?php include 'LibraryFeaturedBooks.php';?>
<?php include 'LibraryBestSelling.php';?>
<?php include 'LibraryPopular.php';?>
<?php include 'LibraryQuote.php';?>
<?php include 'LibraryOffer.php';?>
<?php include 'LibraryLatest.php';?>
<?php include 'include/footer.php';?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
  function addToCartAJAX(book_id,name,price){
    $.get('cart_add.php',
      { book_id : book_id,price:price,name:name},
      function(data){
        data=JSON.parse(data);
        if(data){
          $('.car-total').text(data.total);
          toastr.success(name+' added to cart')
        }
      }
    )
  }
</script>