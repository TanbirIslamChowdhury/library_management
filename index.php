
<?php include 'include/header.php';?>
<?php include 'LibraryBillboard.php';?>
<?php include 'LibraryFeaturedBooks.php';?>
<?php include 'LibraryBestSelling.php';?>
<?php include 'LibraryPopular.php';?>
<?php include 'LibraryQuote.php';?>
<?php include 'LibraryOffer.php';?>
<?php include 'LibraryLatest.php';?>
<?php include 'include/footer.php';?>

<script>
  function addToCartAJAX(book_id,name,price){
    $.get('cart_add.php',
      { book_id : book_id,price:price,name:name},
      function(data){
        if(data){
          console.log(data)
        }
      }
    )
  }
</script>