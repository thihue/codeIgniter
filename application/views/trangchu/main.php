<div class="container">
	<div class="row">
		<!-- MAIN-SLIDER-AREA START -->
		<div class="main-slider-area">
			<!-- SLIDER-AREA START -->
			<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
				<div class="slider-area">
					<div id="wrapper">
						<div class="slider-wrapper">
							<div id="mainSlider" class="nivoSlider">
								<img src="<?php echo base_url();?>assets/img/slider/2.jpg" alt="main slider" title="#htmlcaption" />
								<img src="<?php echo base_url();?>assets/img/slider/1.jpg" alt="main slider" title="#htmlcaption2" />
							</div>
							<div id="htmlcaption" class="nivo-html-caption slider-caption">
								<div class="slider-progress"></div>
								<div class="slider-cap-text slider-text1">
									<div class="d-table-cell">
										<h2 class="animated bounceInDown">FAHSIONISTA</h2>
										<p class="animated bounceInUp">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod ut laoreet dolore magna
											aliquam erat volutpat.</p>
										<a class="wow zoomInDown" data-wow-duration="1s" data-wow-delay="1s" href="#">Read More
											<i class="fa fa-caret-right"></i>
										</a>
									</div>
								</div>
							</div>
							<div id="htmlcaption2" class="nivo-html-caption slider-caption">
								<div class="slider-progress"></div>
								<div class="slider-cap-text slider-text2">
									<div class="d-table-cell">
										<h2 class="animated bounceInDown">BEST THEMES</h2>
										<p class="animated bounceInUp">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod ut laoreet dolore magna
											aliquam erat volutpat.</p>
										<a class="wow zoomInDown" data-wow-duration="1s" data-wow-delay="1s" href="#">Read More
											<i class="fa fa-caret-right"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- SLIDER-AREA END -->
			<!-- SLIDER-RIGHT START -->
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
				<div class="slider-right zoom-img m-top">
					<a href="#">
						<img class="img-responsive" src="<?php echo base_url();?>assets/img/product/cms11.jpg" alt="sidebar left" />
					</a>
				</div>
			</div>
			<!-- SLIDER-RIGHT END -->
		</div>
		<!-- MAIN-SLIDER-AREA END -->
	</div>
	<!-- TOW-COLUMN-PRODUCT START -->
	<div class="row tow-column-product">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<!-- NEW-PRODUCT-AREA START -->
			<div class="new-product-area">
				<div class="left-title-area">
					<h2 class="left-title">Sản phẩm mới</h2>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<div class="row">
							<!-- NEW-PRO-CAROUSEL START -->
							<div class="new-pro-carousel">
								<!-- NEW-PRODUCT-SINGLE-ITEM START -->
								<?php foreach($sanphammoi as $spm){
								if($spm['hinh']!=""){ 
								?>
								<div class="item">
									<div class="new-product">
										<div class="single-product-item">
											<div class="product-image">
												<a href="#">
													<img src="<?php echo base_url();?>pp/<?php echo $spm['hinh'] ?>" alt="product-image" />
												</a>
												<a href="#" class="new-mark-box">new</a>
												<div class="overlay-content">
													<ul>
														<li>
															<a href="#" title="Quick view">
																<i class="fa fa-search"></i>
															</a>
														</li>
														<li>
															<a href="#" title="Quick view">
																<i class="fa fa-shopping-cart"></i>
															</a>
														</li>
														<!-- <li>
															<a href="#" title="Quick view">
																<i class="fa fa-retweet"></i>
															</a>
														</li> -->
														<li>
															<a href="#" title="Quick view">
																<i class="fa fa-heart-o"></i>
															</a>
														</li>
													</ul>
												</div>
											</div>
											<div class="product-info">
												<div class="customar-comments-box">
													<div class="rating-box">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star-half-empty"></i>
														<i class="fa fa-star-half-empty"></i>
													</div>
													<div class="review-box">
														<span>1 Review (s)</span>
													</div>
												</div>
												<a href="single-product.html"><?php echo $spm['tensp']?></a>
												<div class="price-box">
													<span class="price"><?php echo $spm['dongia'] ?></span>
												</div>
											</div>
										</div>
									</div>
								</div>
								<?php } } ?>
							</div>
							<!-- NEW-PRO-CAROUSEL END -->
						</div>
					</div>
				</div>
			</div>
			<!-- NEW-PRODUCT-AREA END -->
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<!-- SALE-PRODUCTS START -->
			<div class="Sale-Products">
				<div class="left-title-area">
					<h2 class="left-title">Sản phẩm giảm giá</h2>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<div class="row">
							<!-- SALE-CAROUSEL START -->
							<div class="sale-carousel">
							<?php foreach($sanphamgiamgia as $spgg){ ?>
								<div class="item">
									<div class="new-product">
										<div class="single-product-item">
											<div class="product-image">
												<a href="#">
													<img src="<?php echo base_url();?>pp/<?php echo $spgg['hinh'] ?>" alt="product-image" />
												</a>
												<a href="#" class="new-mark-box">Deal!</a>
												<div class="overlay-content">
													<ul>
														<li>
															<a href="#" title="Quick view">
																<i class="fa fa-search"></i>
															</a>
														</li>
														<li>
															<a href="#" title="Quick view">
																<i class="fa fa-shopping-cart"></i>
															</a>
														</li>
														<li>
															<a href="#" title="Quick view">
																<i class="fa fa-heart-o"></i>
															</a>
														</li>
													</ul>
												</div>
											</div>
											<div class="product-info">
												<div class="customar-comments-box">
													<div class="rating-box">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star-half-empty"></i>
														<i class="fa fa-star-half-empty"></i>
													</div>
													<div class="review-box">
														<span>1 Review (s)</span>
													</div>
												</div>
												<a href="single-product.html"><?php echo $spgg['tensp'] ?></a>
												<div class="price-box">
													<span class="price"><?php $price = $spgg['dongia']; 
													$km = $spgg['giamgia'];
													$price_deal = $price-($price*$km)/100; echo chendau($price_deal); ?><sup>đ</sup></span>
													<span class="old-price"><?php echo chendau($price); ?><sup>đ</sup></span>
												</div>
											</div>
										</div>
									</div>
								</div>
							<?php } ?>
							</div>
							<!-- SALE-CAROUSEL END -->
						</div>
					</div>
				</div>
			</div>
			<!-- SALE-PRODUCTS END -->
		</div>
	</div>
	<!-- TOW-COLUMN-PRODUCT END -->
	<div class="row">
		<!-- ADD-TWO-BY-ONE-COLUMN START -->
		<div class="add-two-by-one-column">
			<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
				<div class="tow-column-add zoom-img">
					<a href="#">
						<img src="<?php echo base_url();?>assets/img/product/shope-add1.jpg" alt="shope-add" />
					</a>
				</div>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<div class="one-column-add zoom-img">
					<a href="#">
						<img src="<?php echo base_url();?>assets/img/product/shope-add2.jpg" alt="shope-add" />
					</a>
				</div>
			</div>
		</div>
		<!-- ADD-TWO-BY-ONE-COLUMN END -->
	</div>
	<div class="row">
		<!-- FEATURED-PRODUCTS-AREA START -->
		<?php if(count($this->data['sanphamnoibat']) > 4){?>
		<div class="featured-products-area">
			<div class="center-title-area">
				<h2 class="center-title">Sản phẩm nổi bật</h2>
			</div>
			<div class="col-xs-12">
				<div class="row">
					<!-- FEARTURED-CAROUSEL START -->
					<div class="feartured-carousel">
						<!-- SINGLE-PRODUCT-ITEM START -->
						<?php foreach($sanphamnoibat as $spnb){ ?>
						<div class="item">
							<div class="single-product-item">
								<div class="product-image">
									<a href="#">
										<img src="<?php echo base_url();?>pp/<?php echo $spnb['hinh'] ?>" alt="product-image" />
									</a>
									<a href="#" class="new-mark-box">Hot deal!</a>
									<div class="overlay-content">
										<ul>
											<li>
												<a href="#" title="Quick view">
													<i class="fa fa-search"></i>
												</a>
											</li>
											<li>
												<a href="#" title="Quick view">
													<i class="fa fa-shopping-cart"></i>
												</a>
											</li>
											<li>
												<a href="#" title="Quick view">
													<i class="fa fa-heart-o"></i>
												</a>
											</li>
										</ul>
									</div>
								</div>
								<div class="product-info">
									<div class="customar-comments-box">
										<div class="rating-box">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star-half-empty"></i>
										</div>
										<div class="review-box">
											<span>1 Review (s)</span>
										</div>
									</div>
									<a href="single-product.html"><?php echo $spnb['tensp']?></a>
									<div class="price-box">
										<span class="price"><?php $price = $spnb['dongia'];
										$km = $spnb['giamgia'];
										$price_deal = $price - ($price*$km)/100; echo chendau($price_deal);
										?><sup>đ</sup></span>
										<span class="old-price"><?php echo chendau($price); ?><sup>đ</sup></span>
									</div>
								</div>
							</div>
						</div>	
						<?php } ?>
					</div>
					<!-- FEARTURED-CAROUSEL END -->
				</div>
			</div>
		</div>
		<?php } ?>
		<!-- FEATURED-PRODUCTS-AREA END -->
	</div>
	<div class="row">
		<div class="col-xs-12">
			<!-- TAB-BG-PRODUCT-AREA START -->
			<div class="tab-bg-product-area">
				<!-- TAB PANES START -->
				<div class="tab-content bg-tab-content">
					<!-- TABS ONE START-->
					<div role="tabpanel" class="tab-pane active" id="women-tab">
						<div class="bg-tab-content-area tab-carousel-1">
							<!-- TAB-SINGLE-ITEM START -->
							<div class="item">
								<div class="single-product-item">
									<div class="product-image">
										<a href="#">
											<img src="<?php echo base_url();?>assets/img/product/sale/3.jpg" alt="product-image" />
										</a>
										<a href="#" class="new-mark-box">new</a>
										<div class="overlay-content">
											<ul>
												<li>
													<a href="#" title="Quick view">
														<i class="fa fa-search"></i>
													</a>
												</li>
												<li>
													<a href="#" title="Quick view">
														<i class="fa fa-shopping-cart"></i>
													</a>
												</li>
												<li>
													<a href="#" title="Quick view">
														<i class="fa fa-retweet"></i>
													</a>
												</li>
												<li>
													<a href="#" title="Quick view">
														<i class="fa fa-heart-o"></i>
													</a>
												</li>
											</ul>
										</div>
									</div>
									<div class="product-info">
										<div class="customar-comments-box">
											<div class="rating-box">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star-half-empty"></i>
											</div>
											<div class="review-box">
												<span>1 Review(s)</span>
											</div>
										</div>
										<a href="single-product.html">Short Sleeves T-shirt</a>
										<div class="price-box">
											<span class="price">$16.51</span>
										</div>
									</div>
								</div>
							</div>
							<!-- TAB-SINGLE-ITEM END -->
						</div>
					</div>
					<!-- TABS ONE END-->
					<!-- TABS TWO START-->
					<div role="tabpanel" class="tab-pane" id="tops-tab">
						<div class="bg-tab-content-area tab-carousel-2">
							<!-- TAB-SINGLE-ITEM START -->
							<div class="item">
								<div class="single-product-item">
									<div class="product-image">
										<a href="#">
											<img src="<?php echo base_url();?>assets/img/product/sale/9.jpg" alt="product-image" />
										</a>
										<a href="#" class="new-mark-box">sale!</a>
										<div class="overlay-content">
											<ul>
												<li>
													<a href="#" title="Quick view">
														<i class="fa fa-search"></i>
													</a>
												</li>
												<li>
													<a href="#" title="Quick view">
														<i class="fa fa-shopping-cart"></i>
													</a>
												</li>
												<li>
													<a href="#" title="Quick view">
														<i class="fa fa-heart-o"></i>
													</a>
												</li>
											</ul>
										</div>
									</div>
									<div class="product-info">
										<div class="customar-comments-box">
											<div class="rating-box">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star-half-empty"></i>
												<i class="fa fa-star-half-empty"></i>
											</div>
											<div class="review-box">
												<span>1 Review(s)</span>
											</div>
										</div>
										<a href="single-product.html">Printed Dress</a>
										<div class="price-box">
											<span class="price">$23.40</span>
											<span class="old-price">$26.00</span>
										</div>
									</div>
								</div>
							</div>
							<!-- TAB-SINGLE-ITEM END -->
						</div>
					</div>
					<!-- TABS TWO END-->
					<!-- TABS THREE START-->
					<div role="tabpanel" class="tab-pane" id="t-shirts">
						<div class="bg-tab-content-area tab-carousel-3">
							<!-- TAB-SINGLE-ITEM START -->
							<div class="item">
								<div class="single-product-item">
									<div class="product-image">
										<a href="#">
											<img src="<?php echo base_url();?>assets/img/product/sale/5.jpg" alt="product-image" />
										</a>
										<a href="#" class="new-mark-box">new</a>
										<div class="overlay-content">
											<ul>
												<li>
													<a href="#" title="Quick view">
														<i class="fa fa-search"></i>
													</a>
												</li>
												<li>
													<a href="#" title="Quick view">
														<i class="fa fa-shopping-cart"></i>
													</a>
												</li>
												<li>
													<a href="#" title="Quick view">
														<i class="fa fa-retweet"></i>
													</a>
												</li>
												<li>
													<a href="#" title="Quick view">
														<i class="fa fa-heart-o"></i>
													</a>
												</li>
											</ul>
										</div>
									</div>
									<div class="product-info">
										<div class="customar-comments-box">
											<div class="rating-box">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star-half-empty"></i>
											</div>
											<div class="review-box">
												<span>1 Review(s)</span>
											</div>
										</div>
										<a href="single-product.html">Printed Dress</a>
										<div class="price-box">
											<span class="price">$50.99</span>
										</div>
									</div>
								</div>
							</div>
							<!-- TAB-SINGLE-ITEM END -->
						</div>
					</div>
					<!-- TABS THREE END-->
				</div>
				<!-- TAB PANES END -->
				<!-- TABS MENU START-->
				<div class="tab-carousel-menu">
					<ul class="nav nav-tabs product-bg-nav">
						<li class="active">
							<a href="#women-tab" data-toggle="tab">Women</a>
						</li>
						<li>
							<a href="#tops-tab" data-toggle="tab">tops</a>
						</li>
						<li>
							<a href="#t-shirts" data-toggle="tab">t-shirts</a>
						</li>
					</ul>
				</div>
				<!-- TABS MENU END-->
			</div>
			<!-- TAB-BG-PRODUCT-AREA END -->
		</div>
	</div>
	<div class="row">
		<!-- BESTSELLER-PRODUCTS-AREA START -->
		<div class="bestseller-products-area">
			<div class="center-title-area">
				<h2 class="center-title">Sản phẩm bán chạy</h2>
			</div>
			<div class="col-xs-12">
			<?php //echo '<pre>'; print_r($this->data); echo '</pre>'; ?>
				<div class="row">
					<!-- BESTSELLER-CAROUSEL START -->
					<div class="bestseller-carousel">
						<!-- BESTSELLER-SINGLE-ITEM START -->
						
						<?php foreach($sanphambanchay as $spbc){ ?>
						<div class="item">
							<div class="single-product-item">
								<div class="product-image">
									<a href="#">
										<img src="<?php echo base_url();?>pp/<?php echo $spbc['hinh']?>" width="100%" height="220px" alt="product-image" />
									</a>
									<a href="#" class="new-mark-box">sale!</a>
									<div class="overlay-content">
										<ul>
											<li>
												<a href="#" title="Quick view">
													<i class="fa fa-search"></i>
												</a>
											</li>
											<li>
												<a href="#" title="Quick view">
													<i class="fa fa-shopping-cart"></i>
												</a>
											</li>
											<li>
												<a href="#" title="Quick view">
													<i class="fa fa-retweet"></i>
												</a>
											</li>
											<li>
												<a href="#" title="Quick view">
													<i class="fa fa-heart-o"></i>
												</a>
											</li>
										</ul>
									</div>
								</div>
								<div class="product-info">
									<div class="customar-comments-box">
										<div class="rating-box">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
										</div>
										<div class="review-box">
											<span>1 Review (s)</span>
										</div>
									</div>
									<a href="single-product.html"><?php //echo $spbc['tensp']
										$text = $spbc['tensp'];
										$a = subtext($text);
										echo $a;?></a>
									<div class="price-box">
										<span class="price">
										<?php $price = $spbc['dongia']; 
											$km = $spbc['giamgia'];
											$price_deal = $price-($price*$km)/100; echo chendau($price_deal); ?></span>
										<span class="old-price"><?php echo chendau($price) ?><sup>đ</sup></span>
									</div>
								</div>
							</div>
						</div>
						<?php } ?>
						<!-- BESTSELLER-SINGLE-ITEM END -->
					</div>
					<!-- BESTSELLER-CAROUSEL END -->
				</div>
			</div>
		</div>
		<!-- BESTSELLER-PRODUCTS-AREA END -->
	</div>
	<div class="row">
		<!-- IMAGE-ADD-AREA START -->
		<div class="image-add-area">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<!-- ONEHALF-ADD START -->
				<div class="onehalf-add-shope zoom-img">
					<a href="#">
						<img src="<?php echo base_url();?>assets/img/product/one-helf1.jpg" alt="shope-add" />
					</a>
				</div>
				<!-- ONEHALF-ADD END -->
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<!-- ONEHALF-ADD START -->
				<div class="onehalf-add-shope zoom-img">
					<a href="#">
						<img src="<?php echo base_url();?>assets/img/product/one-helf2.jpg" alt="shope-add" />
					</a>
				</div>
				<!-- ONEHALF-ADD END -->
			</div>
		</div>
		<!-- IMAGE-ADD-AREA END -->
	</div>
</div>
