<?php
/**
 * wwwest_solution functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package wwwest_solution
 */

if ( ! function_exists( 'wwwest_solution_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function wwwest_solution_setup() {

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'wwwest_solution' )
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'wwwest_solution_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'wwwest_solution_setup' );

/**
 * Enqueue scripts and styles.
 */
function wwwest_solution_scripts() {
	wp_enqueue_style( 'wwwest_solution-style', get_stylesheet_uri() );
	wp_enqueue_style( 'wwwest_solution-bootstrap-css',  'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' );
	wp_enqueue_style( 'wwwest_solution-main-style', get_template_directory_uri() . '/css/main.css' );
	wp_enqueue_style( 'wwwest_solution-hero-style', get_template_directory_uri() . '/css/hero.css' );
	wp_enqueue_style( 'wwwest_solution-latest-posts-style', get_template_directory_uri() . '/css/latest-posts.css' );
	wp_enqueue_style( 'wwwest_solution-what-we-do-style', get_template_directory_uri() . '/css/what-we-do.css' );
	wp_enqueue_style( 'wwwest_solution-team-style', get_template_directory_uri() . '/css/team.css' );
	wp_enqueue_style( 'wwwest_solution-kaushanscript-style', get_template_directory_uri() . '/fonts/kaushanscript.css' );
	wp_enqueue_style( 'wwwest_solution-montserrat-style', get_template_directory_uri() . '/fonts/montserrat.css' );
	wp_enqueue_style( 'wwwest_solution-font-style',  'https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap' );
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js');
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'wwwest_solution-popper-js', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js' );
	wp_enqueue_script( 'wwwest_solution-nicescroll-js', 'https://cdn.jsdelivr.net/npm/jquery.nicescroll@3.7.6/jquery.nicescroll.min.js' );
	wp_enqueue_script( 'wwwest_solution-bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js' );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wwwest_solution_scripts' );



add_action('wp_head', 'wwwest_postviews');
function wwwest_postviews() {

$meta_key       = 'views';            // key
$who_count      = 0;            // Whose to count 0 - all users. 1 - guests only. 2 - registred.
$exclude_bots   = 1;            // exclude bots, robots, spiders and other? 0 - no. 1 - yes.

global $user_ID, $post;
	if(is_singular()) {
		$id = (int)$post->ID;
		static $post_views = false;
		if($post_views) return true; //  1 time
		$post_views = (int)get_post_meta($id,$meta_key, true);
		$should_count = false;
		switch( (int)$who_count ) {
			case 0: $should_count = true;
				break;
			case 1:
				if( (int)$user_ID == 0 )
					$should_count = true;
				break;
			case 2:
				if( (int)$user_ID > 0 )
					$should_count = true;
				break;
		}
		if( (int)$exclude_bots==1 && $should_count ){
			$useragent = $_SERVER['HTTP_USER_AGENT'];
			$notbot = "Mozilla|Opera"; //Chrome|Safari|Firefox|Netscape
			$bot = "Bot/|robot|Slurp/|yahoo";
			if ( !preg_match("/$notbot/i", $useragent) || preg_match("!$bot!i", $useragent) )
				$should_count = false;
		}

		if($should_count)
			if( !update_post_meta($id, $meta_key, ($post_views+1)) ) add_post_meta($id, $meta_key, 1, true);
	}
	return true;
}

function register_my_cpts_team() {
	$labels = [
		"name" => __( "Our team", "root" ),
		"singular_name" => __( "team", "root" ),
		"menu_name" => __( "Our team", "root" ),
		"all_items" => __( "All team", "root" ),
		"add_new" => __( "Add new", "root" ),
		"add_new_item" => __( "Add new team item", "root" ),
		"edit_item" => __( "Edit team item", "root" ),
		"new_item" => __( "New team item", "root" ),
		"view_item" => __( "View team item", "root" ),
		"view_items" => __( "View Our team", "root" ),
		"search_items" => __( "Search team item", "root" ),
		"not_found" => __( "No team items found", "root" ),
		"not_found_in_trash" => __( "No team items found in trash", "root" ),
		"parent" => __( "Parent team item:", "root" ),
		"featured_image" => __( "Featured image for this team item", "root" ),
		"set_featured_image" => __( "Set featured image for this team item", "root" ),
		"remove_featured_image" => __( "Remove featured image for this team item", "root" ),
		"use_featured_image" => __( "Use as featured image for this team item", "root" ),
		"archives" => __( "team archives", "root" ),
		"insert_into_item" => __( "Insert into team item", "root" ),
		"uploaded_to_this_item" => __( "Upload to this team item", "root" ),
		"filter_items_list" => __( "Filter team list", "root" ),
		"items_list_navigation" => __( "Our team items list navigation", "root" ),
		"items_list" => __( "Our team items list", "root" ),
		"attributes" => __( "Our team items attributes", "root" ),
		"name_admin_bar" => __( "team", "root" ),
		"item_published" => __( "team published", "root" ),
		"item_published_privately" => __( "team published privately.", "root" ),
		"item_reverted_to_draft" => __( "team reverted to draft.", "root" ),
		"item_scheduled" => __( "team scheduled", "root" ),
		"item_updated" => __( "team updated.", "root" ),
		"parent_item_colon" => __( "Parent team item:", "root" ),
	];
	$args = [
		"label" => __( "Our team", "root" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "team", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "editor", "thumbnail" ],
	];
	register_post_type( "team", $args );
}
add_action( 'init', 'register_my_cpts_team' );


add_shortcode( 'list-posts', 'rmcc_post_listing_parameters_shortcode' );
function rmcc_post_listing_parameters_shortcode( $atts ) {
	ob_start();
	extract( shortcode_atts( array (
		'type' => 'team',
		'order' => 'date',
		'orderby' => 'title',
		'posts' => -1,
	), $atts ) );
	$options = array(
		'post_type' => $type,
		'order' => $order,
		'orderby' => $orderby,
		'posts_per_page' => $posts
	);
	$query = new WP_Query( $options );
	$count = $query->found_posts;
	if ( $query->have_posts() ) { ?>
			<?php while ( $query->have_posts() ) : $query->the_post();?>
			<div class="col-sm-12 col-md-4 col-lg-4 team-item">
				<div class="img-wrap">
					<div class="img-block">
						<?php echo get_the_post_thumbnail($post); ?>
						<div class="bg-block"></div>
						<div class="social-block">
							<div class="social-item">
								<a href="<?php the_field('facebook');?>">
									<i class="fab fa-facebook-f"></i>
								</a>
							</div>
							<div class="social-item">
								<a href="<?php the_field('twitter');?>">
									<i class="fab fa-twitter"></i>
								</a>
							</div>
							<div class="social-item">
								<a href="<?php the_field('pinterest');?>">
									<i class="fab fa-pinterest-p"></i>
								</a>
							</div>
							<div class="social-item">
								<a href="<?php the_field('instagram');?>">
									<i class="fab fa-instagram"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="desc-block">
					<div class="name">
						<?php the_title(); ?>
					</div>
					<div class="position">
						<?php the_field('position');?>
					</div>
				</div>
			</div>
			
			<?php endwhile;
			if ($count>$posts){ ?>
			<div class="read-more-block">
				<a href="/<?php echo $type; ?>">Read more</a>
			</div>
			<?php } 
			wp_reset_postdata(); ?>
	<?php $myvariable = ob_get_clean();
	return $myvariable;
	}	
}