<?php get_header();?>
<?php get_template_part( 'template-parts/hero' ); ?>
<section class="latest-blog">
	<div class="container">
		<div class="row">
			<div class="title-block">
				<span class="top-txt">Our stories</span>
				<h2 class="latest-title">Latest blog</h2>
				<span class="red-line"></span>
			</div>
			<?php  
				$args=array(
					'posts_per_page' => 3,
					'post_status' => 'publish',
					'post_type' => 'post',
					'order' => 'DESC'
				);
				$query = new WP_Query($args);
				if ($query->have_posts()):
				while ($query->have_posts()): $query->the_post();
				$id = get_the_ID();
				$comments_count= get_comment_count( $id );
			?>
			<article class="col-sm-12 col-md-4 col-lg-4">
				<a href="<?php echo  get_permalink(); ?>">
					<div class="img-block">
						<?php echo get_the_post_thumbnail($post); ?>
					</div>
					<div class="desc-block">
						<div class="date-block"><span class="day"><?php the_time('j'); ?></span><?php the_time('M'); ?></div>
						<h3 class="title"><?php the_title(); ?></h3>
						<p class="post-exc"><?php echo get_the_excerpt(); ?></p>
						<div class="counts-block">
							<div class="views">
								<img src="<?php echo get_template_directory_uri(); ?>/img/view.png" alt="view-img">
								<?php echo get_post_meta ($id,'views',true); ?>
							</div>
							<div class="comments">
								<img src="<?php echo get_template_directory_uri(); ?>/img/comment.png" alt="comments-img">
								<?php echo $comments_count['approved']; ?>
							</div>
						</div>
					</div>
				</a>
			</article>
			<?php
                endwhile;
                endif;
                wp_reset_postdata();
            ?>
			<div class="read-more-block">
				<a href="/blog">Read more</a>
			</div>
		</div>
	</div>
</section>
<section class="what-we-do">
	<div class="container">
		<div class="row">
			<div class="title-block">
				<span class="top-txt">Service</span>
				<div class="title">what we do</div>
				<span class="red-line"></span>
				<p class="title-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
			</div>
			<div class="col-sm-12 col-md-6 col-lg-6 img-block">
				<img src="<?php echo get_template_directory_uri(); ?>/img/what-we-do.png" alt="what-we-do-img">
			</div>
			<div class="col-sm-12 col-md-6 col-lg-6 accordions-block">
				<div class="accordion" id="accordionExample">
                  <div class="card opened">
                    <div class="card-header" id="headingOne">
                      <h5 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                          <img src="<?php echo get_template_directory_uri(); ?>/img/photo.png" alt="photo-icon">Photography<img class="arrow" src="<?php echo get_template_directory_uri(); ?>/img/arrow-up.png" alt="arrow-up">
                        </button>
                      </h5>
                    </div>
                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                      <div class="card-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header" id="headingTwo">
                      <h5 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                          <img src="<?php echo get_template_directory_uri(); ?>/img/EQUALIZER.png" alt="EQUALIZER-icon">creativity<img class="arrow" src="<?php echo get_template_directory_uri(); ?>/img/arrow-up.png" alt="arrow-up">
                        </button>
                      </h5>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                      <div class="card-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header" id="headingThree">
                      <h5 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                          <img src="<?php echo get_template_directory_uri(); ?>/img/BULLSEYE.png" alt="BULLSEYE-icon">web design<img class="arrow" src="<?php echo get_template_directory_uri(); ?>/img/arrow-up.png" alt="arrow-up">
                        </button>
                      </h5>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                      <div class="card-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                      </div>
                    </div>
                  </div>
                </div>
			</div>
		</div>
	</div>
</section>
<section class="team">
	<div class="container">
		<div class="row">
			<div class="title-block">
				<span class="top-txt">Who we are</span>
				<div class="title">Meet our team</div>
				<span class="red-line"></span>
				<p class="title-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
			</div>
			<?php echo do_shortcode("[list-posts orderby='name' order='ASC' posts='3']") ?>
		</div>
	</div>
</section>
<script>
jQuery(document).ready(function($) {
 	$(function() {  
		$("body").niceScroll();
		$(".collapse").niceScroll();
		$('.card').click(function(){
			$('.card').removeClass('opened')
			$(this).addClass('opened');
		});
	});
});
</script>

<?php get_footer(); ?>