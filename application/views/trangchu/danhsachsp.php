<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<!-- BSTORE-BREADCRUMB START -->
			<div class="bstore-breadcrumb">
				<a href="<?php echo base_url() ?>/trangchu/main">Trang chủ</a>
				<span>
					<i class="fa fa-caret-right"></i>
				</span>
				<span><?php //echo '<pre>'; print_r($this->data); echo '</pre>';
					if(isset($this->data['tenmuc'])){ 
						echo $this->data['tenmuc'][0]['tenmuc']; 
					}else{
						echo $this->data['all'];
					}?>
				</span>
				<?php if(isset($this->data['tenloai'])){ ?>
					<span><i class="fa fa-caret-right"></i></span>
					<span><?php echo $this->data['tenloai']['tenloai']; ?></span>
				<?php } ?>
			</div>
			<!-- BSTORE-BREADCRUMB END -->
		</div>
	</div>
	<div class="row">
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
		</div>
		<div class="col-lg-12 col-md-3 col-sm-3 col-xs-3">
			<div class="right-all-product">
				<div class="product-shooting-area">
					<div class="product-shooting-bar">
						<!-- SHOORT-BY START -->
						<div class="shoort-by">
							<form name="form1" action="<?php echo current_url() ?>" method="post">
								<label for="productShort">Sắp xếp theo:</label>
								<div class="short-select-option">
									<select name="sort" id="productShort" onchange="form1.submit()" >
										<option value="5" <?php if($select == 5) echo "selected='selected'" ?>>--</option>
										<option value="1" <?php if($select == 1) echo "selected='selected'" ?>>Tên sản phẩm: A đến Z</option>
										<option value="2" <?php if($select == 2) echo "selected='selected'" ?>>Tên sản phẩm: Z to A</option>
										<option value="3" <?php if($select == 3) echo "selected='selected'" ?>>Giá thấp đến cao</option>
										<option value="4" <?php if($select == 4) echo "selected='selected'" ?>>Giá cao đến thấp</option>
									</select>
								</div>
							</form>
						</div>
						<!-- SHOORT-BY END -->
						<!-- SHOW-PAGE START -->
						<div class="show-page">
							<label for="perPage">Hiển thị:</label>
							<div class="s-page-select-option">
								<select name="show" id="perPage">
									<option value="10">10</option>
									<option value="20">20</option>
								</select>
							</div>
							<span>sản phẩm/trang</span>
						</div>
						<!-- SHOW-PAGE END -->
						<!-- VIEW-SYSTEAM START -->
						<!-- VIEW-SYSTEAM END -->
					</div>
					<!-- PRODUCT-SHOOTING-RESULT START -->
					<div class="product-shooting-result">
						<div class="showing-item">
							<span>Showing 1 - 12 of 13 items</span>
						</div>
						<div class="showing-next-prev">
							<ul class="pagination-bar">
								<li class="disabled">
									<a href="#">
										<i class="fa fa-chevron-left"></i>Previous</a>
								</li>
								<li class="active">
									<span>
										<a class="pagi-num" href="#">1</a>
									</span>
								</li>
								<li>
									<span>
										<a class="pagi-num" href="#">2</a>
									</span>
								</li>
								<li>
									<a href="#">Next
										<i class="fa fa-chevron-right"></i>
									</a>
								</li>
							</ul>
							<form action="#">
								<button class="btn showall-button">Hiển thị tất cả</button>
							</form>
						</div>
					</div>
					<!-- PRODUCT-SHOOTING-RESULT END -->
				</div>
			</div>
			<!-- ALL GATEGORY-PRODUCT START -->
			<div class="all-gategory-product">
				<div class="row">
					<ul class="gategory-product">
						<?php foreach($sanpham as $d){ if($d['hinh']!=""){ ?>
						<li class="gategory-product-list col-lg-3 col-md-4 col-sm-6 col-xs-12">
							<div class="single-product-item">
								<div class="product-image">
									<a href="single-product.html">
										<img src="<?php echo base_url();?>pp/<?php echo $d['hinh'] ?>" width="100%" height="260px" alt="product-image" />
									</a>
									<a href="single-product.html" class="new-mark-box">
										<?php if($d['giamgia']>0) echo 'Deal!'; ?>
									</a>
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
											<span>1 Review(s)</span>
										</div>
									</div>
									<a href="single-product.html">
									<?php $text = $d['tensp'];
										$a = subtext($text);
										echo $a;?></a>
									<div class="price-box">
										<span class="price"><?php $price = $d['dongia'];
										$km = $d['giamgia'];
										$price_deal= $price - ($price*$km)/100;
										 echo chendau($price_deal); ?><sup>đ</sup></span>
										<span class="old-price"><?php if($d['giamgia']>0) echo chendau($price).'<sup>đ</sup>'?></span>
									</div>
								</div>
							</div>
						</li>
						<?php } } ?>
						<!-- SINGLE ITEM END -->
					</ul>
				</div>
			</div>
			<!-- ALL GATEGORY-PRODUCT END -->
			<!-- PRODUCT-SHOOTING-RESULT START -->
			<div class="product-shooting-result product-shooting-result-border">
				<div class="showing-item">
					<span>Hiển thị 1 - 12 trên 13 sản phẩm</span>
				</div>
				<div class="showing-next-prev">
					<ul class="pagination-bar">
						<li class="disabled">
							<a href="#">
								<i class="fa fa-chevron-left"></i>Previous</a>
						</li>
						<li class="active">
							<span>
								<a class="pagi-num" href="#">1</a>
							</span>
						</li>
						<li>
							<span>
								<a class="pagi-num" href="#">2</a>
							</span>
						</li>
						<li>
							<a href="#">Next
								<i class="fa fa-chevron-right"></i>
							</a>
						</li>
					</ul>
					<form action="#">
						<button class="btn showall-button">Hiển thị tất cả</button>
					</form>
				</div>
			</div>
			<!-- PRODUCT-SHOOTING-RESULT END -->
		</div>
	</div>
</div>