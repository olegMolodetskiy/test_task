<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head();?>
	<script src="https://kit.fontawesome.com/6506a0b722.js" crossorigin="anonymous"></script>
</head>
<body <?php body_class(); ?>>
	<header>
		<div class="container">
			<div class="row">
				<nav class="navbar navbar-expand-lg">
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
						<i class="fas fa-bars"></i>
					</button>
					<div class="navbar-brand"><?php the_custom_logo(); ?></div>
					<div class="collapse navbar-collapse" id="navbar">
						<ul class="navbar-nav right-nav">
							<?php wp_nav_menu( array(
							'theme_location' => 'menu-1',
							'container'     => false,
							'items_wrap' => '%3$s',
							'list_item_class'=>'nav-item',
							'link_class'=>'nav-link'
							) ); ?>
							<li class="icons"><a href="/cart"><img src="<?php echo get_template_directory_uri(); ?>/img/cart.png" alt="cart-icon"></a></li>
							<li class="icons"><a href="/search"><img src="<?php echo get_template_directory_uri(); ?>/img/search.png" alt="search-icon"></a></li>
						</ul>
					</div>
				</nav>
			</div>
		</div>
	</header>