<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (isset($_GET['action']) && $_GET['action'] == "add") {
	$id = intval($_GET['id']);
	if (isset($_SESSION['cart'][$id])) {
		$_SESSION['cart'][$id]['quantity']++;
	} else {
		$sql_p = "SELECT * FROM products WHERE id={$id}";
		$query_p = mysqli_query($con, $sql_p);
		if (mysqli_num_rows($query_p) != 0) {
			$row_p = mysqli_fetch_array($query_p);
			$_SESSION['cart'][$row_p['id']] = array("quantity" => 1, "price" => $row_p['productPrice']);
			header('location:index.php');
		} else {
			$message = "Product ID is invalid";
		}
	}
}


?>
<!DOCTYPE html>
<html lang="es">

<head>
	<!-- Meta -->
	<?php include('includes/head.php'); ?>
	<title>e-Commerce PHP & MYSQL Platea21 - Pagina principal</title>


</head>

<body class="cnt-home">



	<!-- ============================================== HEADER ============================================== -->
	<header class="header-style-1">
		<?php include('includes/top-header.php'); ?>
		<?php include('includes/main-header.php'); ?>
		<?php include('includes/menu-bar.php'); ?>
	</header>
	<main>
		<section class="slider">
			<div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
				<div class="carousel-inner">
					<div class="carousel-item active " data-bs-interval="2000">
						<img src="./img/banner2.jpg" class="d-block w-100" alt="">
					</div>
					<div class="carousel-item active " data-bs-interval="2000">
						<img src="./img/banner2.jpg" class="d-block w-100" alt="">
					</div>
					<div class="carousel-item active " data-bs-interval="2000">
						<img src="./img/banner2.jpg" class="d-block w-100" alt="">
					</div>
				</div>
			</div>
		</section>
		<section class="info-boxes container wow fadeInUp mt-5">
			<div class="row">
				<article class="col-12 col-md-4 ">
					<div class="card">
						<div class="card-body">
							<h6 class="card-subtitle mb-2 t"><i class="icon fa fa-truck"></i></h6>
							<h5 class="card-title">Atencion Personalizada</h5>
							<p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, accusantium.</p>
						</div>
					</div>
				</article>
				<article class="col-12 col-md-4 ">
					<div class="card">
						<div class="card-body">
							<h6 class="card-subtitle mb-2 t"><i class="icon fa fa-truck"></i></h6>
							<h5 class="card-title">Excelente Calidad</h5>
							<p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, accusantium.</p>
						</div>
					</div>
				</article>
				<article class="col-12 col-md-4 ">
					<div class="card">
						<div class="card-body">
							<h6 class="card-subtitle mb-2 t"><i class="icon fa fa-truck"></i></h6>
							<h5 class="card-title">Ofertas Siempre</h5>
							<p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, accusantium.</p>
						</div>
					</div>
				</article>
			</div>
		</section>
		<section class="container scroll-tabs-slider mt-5">
			<article class="more-info-tab clearfix">
				<h3 class="new-product-title pull-left">Productos Destacados</h3>
				<div id="product-tabs-slider" class=" wow fadeInUp">
					<div class="tab-content outer-top-xs">
						<div class="tab-pane in active" id="all">
							<div class="product-slider">
								<div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
									<?php
									$ret = mysqli_query($con, "SELECT * FROM products");
									while ($row = mysqli_fetch_array($ret)) {
									?>
										<div class="item item-carousel">
											<div class="products">
												<div class="product">
													<div class="product-image">
														<div class="image mb-3">
															<a href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
																<img src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>" data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>" width="180" height="300" alt=""></a>
														</div><!-- /.image -->
													</div><!-- /.product-image -->
													<div class="product-info text-left">
														<h3 class="name"><a href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['productName']); ?></a></h3>
														<div class="rating rateit-small"></div>
														<div class="description"></div>
														<div class="product-price">
															<span class="price">
																$.<?php echo htmlentities($row['productPrice']); ?> </span>
															

														</div><!-- /.product-price -->

													</div><!-- /.product-info -->
													<div class="action"><a href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>" class="lnk btn btn-primary">Agregar a carrito</a></div>
												</div><!-- /.product -->

											</div><!-- /.products -->
										</div><!-- /.item -->
									<?php } ?>

								</div><!-- /.home-owl-carousel -->
							</div><!-- /.product-slider -->
						</div>




						<div class="tab-pane" id="books">
							<div class="product-slider">
								<div class="owl-carousel home-owl-carousel custom-carousel owl-theme">
									<?php
									$ret = mysqli_query($con, "select * from products where category=3");
									while ($row = mysqli_fetch_array($ret)) {
										# code...


									?>


										<div class="item item-carousel">
											<div class="products">

												<div class="product">
													<div class="product-image">
														<div class="image">
															<a href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
																<img src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>" data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>" width="180" height="300" alt=""></a>
														</div><!-- /.image -->


													</div><!-- /.product-image -->


													<div class="product-info text-left">
														<h3 class="name"><a href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['productName']); ?></a></h3>
														<div class="rating rateit-small"></div>
														<div class="description"></div>

														<div class="product-price">
															<span class="price">
																$. <?php echo htmlentities($row['productPrice']); ?> </span>
															<span class="price-before-discount">$.<?php echo htmlentities($row['productPriceBeforeDiscount']); ?></span>

														</div><!-- /.product-price -->

													</div><!-- /.product-info -->
													<div class="action"><a href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>" class="lnk btn btn-primary">Agregar a carrito</a></div>
												</div><!-- /.product -->

											</div><!-- /.products -->
										</div><!-- /.item -->
									<?php } ?>


								</div><!-- /.home-owl-carousel -->
							</div><!-- /.product-slider -->
						</div>






						<div class="tab-pane" id="furniture">
							<div class="product-slider">
								<div class="owl-carousel home-owl-carousel custom-carousel owl-theme">
									<?php
									$ret = mysqli_query($con, "select * from products where category=5");
									while ($row = mysqli_fetch_array($ret)) {
									?>


										<div class="item item-carousel">
											<div class="products">

												<div class="product">
													<div class="product-image">
														<div class="image">
															<a href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
																<img src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>" data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>" width="180" height="300" alt=""></a>
														</div>


													</div>


													<div class="product-info text-left">
														<h3 class="name"><a href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['productName']); ?></a></h3>
														<div class="rating rateit-small"></div>
														<div class="description"></div>

														<div class="product-price">
															<span class="price">
																$.<?php echo htmlentities($row['productPrice']); ?> </span>
															<span class="price-before-discount">$.<?php echo htmlentities($row['productPriceBeforeDiscount']); ?></span>

														</div>

													</div>
													<div class="action"><a href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>" class="lnk btn btn-primary">Agregar a carrito</a></div>
												</div>

											</div>
										</div>
									<?php } ?>


								</div>
							</div>
						</div>
					</div>
				</div>
			</article>
		</section>
		<section class="burbles-info-top container wow fadeInUp mt-5">
										<div class="row">
						<article class="col-md-6">
							<div class="section">
								<h3 class="section-title">Damas</h3>
								<div class="owl-carousel homepage-owl-carousel custom-carousel outer-top-xs owl-theme" data-item="2">

									<?php
									$ret = mysqli_query($con, "select * from products where category=7 and subCategory=13");
									while ($row = mysqli_fetch_array($ret)) {
									?>



										<div class="item item-carousel">
											<div class="products">

												<div class="product">
													<div class="product-image mb-3">
														<div class="image">
															<a href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"><img src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>" data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>" width="180" height="300"></a>
														</div><!-- /.image -->
													</div><!-- /.product-image -->


													<div class="product-info text-left">
														<h3 class="name"><a href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['productName']); ?></a></h3>
														<div class="rating rateit-small"></div>
														<div class="description"></div>

														<div class="product-price">
															<span class="price">
																$. <?php echo htmlentities($row['productPrice']); ?> </span>
															<span class="price-before-discount">$.<?php echo htmlentities($row['productPriceBeforeDiscount']); ?></span>

														</div>

													</div>
													<div class="action"><a href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>" class="lnk btn btn-primary">Agregar a carrito</a></div>
												</div>
											</div>
										</div>
									<?php } ?>
								</div>
							</div>
						</article>
						<article class="col-md-6">
							<div class="section">
								<h3 class="section-title">Hombres</h3>
								<div class="owl-carousel homepage-owl-carousel custom-carousel outer-top-xs owl-theme" data-item="2">
									<?php
									$ret = mysqli_query($con, "select * from products where category=8 and subCategory=14");
									while ($row = mysqli_fetch_array($ret)) {
									?>


										<div class="item item-carousel">
											<div class="products">

												<div class="product">
													<div class="product-image mb-3">
														<div class="image">
															<a href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"><img src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>" data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>" width="300" height="300"></a>
														</div><!-- /.image -->
													</div><!-- /.product-image -->


													<div class="product-info text-left">
														<h3 class="name"><a href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['productName']); ?></a></h3>
														<div class="rating rateit-small"></div>
														<div class="description"></div>

														<div class="product-price">
															<span class="price">
																$ .<?php echo htmlentities($row['productPrice']); ?> </span>
															<span class="price-before-discount">$.<?php echo htmlentities($row['productPriceBeforeDiscount']); ?></span>

														</div>

													</div>
													<div class="action"><a href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>" class="lnk btn btn-primary">Agregar a carrito</a></div>
												</div>
											</div>
										</div>
									<?php } ?>



								</div>
							</div>

						</article>
					</div>
		</section>
		<section class="burbles-info-bottom container wow fadeInUp mt-5">
										<h3 class="section-title">Corpiños</h3>
					<div class="owl-carousel best-seller custom-carousel owl-theme outer-top-xs">
						<?php
						$ret = mysqli_query($con, "select * from products where category=7");
						while ($row = mysqli_fetch_array($ret)) {
							# code...


						?>
							<div class="item">
								<div class="products">
									<div class="product">
										<div class="product-micro">
											<div class="row product-micro-row">
												<div class="col col-xs-6">
													<div class="product-image ">
														<div class="image">
															<a href="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>" data-lightbox="image-1" data-title="<?php echo htmlentities($row['productName']); ?>">
																<img data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>" width="170" height="174" alt="">
																<div class="zoom-overlay"></div>
															</a>
														</div><!-- /.image -->

													</div><!-- /.product-image -->
												</div><!-- /.col -->
												<div class="col col-xs-6">
													<div class="product-info">
														<h3 class="name"><a href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['productName']); ?></a></h3>
														<div class="rating rateit-small"></div>
														<div class="product-price">
															<span class="price">
																$. <?php echo htmlentities($row['productPrice']); ?>
															</span>

														</div><!-- /.product-price -->
														<div class="action"><a href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>" class="lnk btn btn-primary">Agregar a carrito</a></div>
													</div>
												</div><!-- /.col -->
											</div><!-- /.product-micro-row -->
										</div><!-- /.product-micro -->
									</div>


								</div>
							</div><?php } ?>
					</div>
		</section>
		<section class="brand-sponsers mt-5">
		<?php include('includes/brands-slider.php'); ?>
		</section>
	</main>

		<?php include('includes/footer.php'); ?>
		<?php include('includes/scripts.php'); ?>

		

		<script>
			$(document).ready(function() {
				$(".changecolor").switchstylesheet({
					seperator: "color"
				});
				$('.show-theme-options').click(function() {
					$(this).parent().toggleClass('open');
					return false;
				});
			});

			$(window).bind("load", function() {
				$('.show-theme-options').delay(2000).trigger('click');
			});
		</script>
		<!-- For demo purposes – can be removed on production : End -->



</body>

</html>