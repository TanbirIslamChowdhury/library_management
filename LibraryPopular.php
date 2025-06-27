

<section id="popular-books" class="bookshelf py-5 my-5">
		<div class="container">
			<div class="row">
				<div class="col-md-12">

					<div class="section-header align-center">
						<div class="title">
							<span>Some quality items</span>
						</div>
						<h2 class="section-title">Popular Books</h2>
					</div>

					<ul class="tabs">
						<li data-tab-target="#all-genre" class="active tab">All Genre</li>
						<li data-tab-target="#business" class="tab">Business</li>
						<li data-tab-target="#technology" class="tab">Technology</li>
						<li data-tab-target="#romantic" class="tab">Romantic</li>
						<li data-tab-target="#adventure" class="tab">Adventure</li>
						<li data-tab-target="#fictional" class="tab">Fictional</li>
					</ul>

					<div class="tab-content">
						<div id="all-genre" data-tab-content="" class="active">
							<div class="row">
								<?php
								
								$books = $mysqli->common_query("SELECT books.*, categories.name as cat, author.name as auth, publisher.name as pub FROM `books` JOIN categories on categories.id=books.category_id JOIN author on author.id=books.author_id JOIN publisher on publisher.id=books.publisher_id WHERE books.status=1 and books.is_populer =1");
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
                         </div>
						<div id="business" data-tab-content="">
							<div class="row">
								<?php
								
								$books = $mysqli->common_query("SELECT books.*, categories.name as cat, author.name as auth, publisher.name as pub FROM `books` JOIN categories on categories.id=books.category_id JOIN author on author.id=books.author_id JOIN publisher on publisher.id=books.publisher_id WHERE books.status=1 and books.is_populer =1 and categories.id=1");
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
						</div>

						<div id="technology" data-tab-content="">
							<div class="row">
								<?php
								
								$books = $mysqli->common_query("SELECT books.*, categories.name as cat, author.name as auth, publisher.name as pub FROM `books` JOIN categories on categories.id=books.category_id JOIN author on author.id=books.author_id JOIN publisher on publisher.id=books.publisher_id WHERE books.status=1 and books.is_populer =1 and categories.id=2");
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
						</div>

						<div id="romantic" data-tab-content="">
							<div class="row">
								<?php
								
								$books = $mysqli->common_query("SELECT books.*, categories.name as cat, author.name as auth, publisher.name as pub FROM `books` JOIN categories on categories.id=books.category_id JOIN author on author.id=books.author_id JOIN publisher on publisher.id=books.publisher_id WHERE books.status=1 and books.is_populer =1 and categories.id=3");
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
						</div>

						<div id="adventure" data-tab-content="">
							<div class="row">
							<?php
								
								$books = $mysqli->common_query("SELECT books.*, categories.name as cat, author.name as auth, publisher.name as pub FROM `books` JOIN categories on categories.id=books.category_id JOIN author on author.id=books.author_id JOIN publisher on publisher.id=books.publisher_id WHERE books.status=1 and books.is_populer =1 and categories.id=4");
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
						</div>

						<div id="fictional" data-tab-content="">
							<div class="row">
							<?php
								
								$books = $mysqli->common_query("SELECT books.*, categories.name as cat, author.name as auth, publisher.name as pub FROM `books` JOIN categories on categories.id=books.category_id JOIN author on author.id=books.author_id JOIN publisher on publisher.id=books.publisher_id WHERE books.status=1 and books.is_populer =1 and categories.id=5");
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
						</div>
                    </div>
                 </div><!--inner-tabs-->
                 </div>
		     </div>
	     </section>