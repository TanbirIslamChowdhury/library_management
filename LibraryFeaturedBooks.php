<section id="featured-books" class="py-5 my-5">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="section-header align-center">
					<div class="title">
						<span>Some quality items</span>
					</div>
					<h2 class="section-title">Featured Books</h2>
				</div>

				<div class="product-list aos-init aos-animate" data-aos="fade-up">
					<div class="row">
						<?php
						
						$books = $mysqli->common_query("SELECT books.*, categories.name as cat, author.name as auth, publisher.name as pub FROM `books` JOIN categories on categories.id=books.category_id JOIN author on author.id=books.author_id JOIN publisher on publisher.id=books.publisher_id WHERE books.status=1 and books.is_featured =1");
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
						

					</div><!--ft-books-slider-->
				</div><!--grid-->


			</div><!--inner-content-->
		</div>

		<div class="row">
			<div class="col-md-12">

				<div class="btn-wrap align-right">
					<a href="#" class="btn-accent-arrow">View all products <i class="icon icon-ns-arrow-right"></i></a>
				</div>

			</div>
		</div>
	</div>
</section>