<?php
session_start();
error_reporting(0);
include('includes/config.php');
$cid = intval($_GET['cid']);
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
			header('location:my-cart.php');
		} else {
			$message = "ID de producto inválido.";
		}
	}
}
// COde for Wishlist
if (isset($_GET['pid']) && $_GET['action'] == "wishlist") {
	if (strlen($_SESSION['login']) == 0) {
		header('location:login.php');
	} else {
		mysqli_query($con, "INSERT INTO wishlist(userId,productId) VALUES('" . $_SESSION['id'] . "','" . $_GET['pid'] . "')");
		echo "<script>alert('Producto agregado a la lista de deseos.');</script>";
		header('location:my-wishlist.php');
	}
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<!-- Meta -->
	<?php include('includes/head.php'); ?>
	<title>Categoría</title>


</head>

<body class="cnt-home">

	<header class="header-style-1">

		<!-- ============================================== TOP MENU ============================================== -->
		<?php include('includes/top-header.php'); ?>
		<!-- ============================================== TOP MENU : END ============================================== -->
		<?php include('includes/main-header.php'); ?>
		<!-- ============================================== NAVBAR ============================================== -->
		<?php include('includes/menu-bar.php'); ?>
		<!-- ============================================== NAVBAR : END ============================================== -->

	</header>
	<!-- ============================================== HEADER : END ============================================== -->
	</div><!-- /.breadcrumb -->
	<div class="body-content outer-top-xs">
		<div class='container'>

			<div id="category" class="category ">
				<div class="item">
				<h1 class="text-center">
					<?php $sql = mysqli_query($con, "SELECT categoryName  FROM category WHERE id='$cid'");
					while ($row = mysqli_fetch_array($sql)) {
					?>						
							<?php echo htmlentities($row['categoryName']); ?>
						
					<?php } ?>
					</h1>
				</div>
			</div>

			<div class="search-result-container">
				<div id="myTabContent" class="tab-content">
					<div class="tab-pane active " id="grid-container">
						<div class="category-product  inner-top-vs">
							<div class="row">
								<?php
								$ret = mysqli_query($con, "select * from products where category='$cid'");
								$num = mysqli_num_rows($ret);
								if ($num > 0) {
									while ($row = mysqli_fetch_array($ret)) { ?>
										<div class="col-sm-6 col-md-4 wow fadeInUp">
											<div class="products">
												<div class="product">
													<div class="product-image mb-3">
														<div class="image">
															<a href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"><img src="assets/images/blank.gif" data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>" alt="" width="200" height="300"></a>
														</div><!-- /.image -->
													</div><!-- /.product-image -->


													<div class="product-info text-left">
														<h3 class="name"><a href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['productName']); ?></a></h3>
														<div class="rating rateit-small"></div>
														<div class="description"></div>

														<div class="product-price">
															<span class="price">
																$. <?php echo htmlentities($row['productPrice']); ?> </span>
															<span class="price-before-discount">$. <?php echo htmlentities($row['productPriceBeforeDiscount']); ?></span>

														</div><!-- /.product-price -->

													</div><!-- /.product-info -->
													<div class="cart clearfix animate-effect">
														<div class="action">
															<ul class="list-unstyled">
																<li class="add-cart-button btn-group">
																	<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
																		<i class="fa fa-shopping-cart"></i>
																	</button>
																	<a href="category.php?page=product&action=add&id=<?php echo $row['id']; ?>">
																		<button class="btn btn-primary" type="button">Agregar a carrito</button></a>

																</li>

																<li class="lnk wishlist">
																	<a class="add-to-cart" href="category.php?pid=<?php echo htmlentities($row['id']) ?>&&action=wishlist" title="Wishlist">
																		<i class="icon fa fa-heart"></i>
																	</a>
																</li>
															</ul>
														</div><!-- /.action -->
													</div><!-- /.cart -->
												</div>
											</div>
										</div>
									<?php }
								} else { ?>

									<div class="col-sm-6 col-md-4 wow fadeInUp">
										<h3>No se encontraron productos</h3>
									</div>

								<?php } ?>
							</div>
						</div>
					</div>

				</div>

				<section>
					<?php include('includes/brands-slider.php'); ?>
				</section>

			</div>
		</div>

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