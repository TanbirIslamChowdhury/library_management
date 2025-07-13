<?php include 'include/header.php';?>
<html>
    <head>
        <title>Search page</title>
    </head>
    <body>
        <div class="row">
			<?php
			$id = $_GET['id'];
			
			$books = $mysqli->common_query("SELECT books.*, categories.name as cat, author.name as auth, publisher.name as pub FROM `books` JOIN categories on categories.id=books.category_id JOIN author on author.id=books.author_id JOIN publisher on publisher.id=books.publisher_id WHERE books.status=1 and books.id = $id");
			if (!$books['error']) {
				foreach ($books['data'] as $d) {
			?>
				<div class="col-md-3">
					<div class="product-item">
						<figure class="product-style">
							<img src="<?= $baseurl ?>admin/<?= $d->image ?>" alt="Books" class="product-item">
							<button type="button" onclick="addToCartAJAX(<?= $d->id ?>,'<?= $d->name ?>','<?= $d->price ?>')" class="add-to-cart" data-product-tile="add-to-cart">Add to Cart</button>
						</figure>
						<figcaption>
							<h3><?= $d->name ?></h3>
							<span><?= $d->auth ?></span><br>
							<?php if($d->offer_price >0){ ?>
							<span class="item-price">BDT<?= $d->offer_price ?> </span><del><?= $d->price ?></del>
							<?php }else{ ?>
								<div class="item-price">BDT<?= $d->price ?></div>
							<?php } ?>
						</figcaption>
					</div>
				</div>
			<?php } } ?>
		</div>
    </body>
</html>
<?php include 'include/footer.php';?>