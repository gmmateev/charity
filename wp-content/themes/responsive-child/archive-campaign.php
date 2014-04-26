<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
   Template Name: Campaigns   
 */

get_header(); ?>

<div id="content-archive" >

	<?php $loop = new WP_Query( array( 'post_type' => 'campaign', 'posts_per_page' => 100 ) );?>
	<?php if( $loop->have_posts() ) : ?>

		<?php get_template_part( 'loop-header' ); ?>

		<?php while( $loop->have_posts() ) : $loop->the_post(); ?>

			<?php responsive_entry_before(); ?>
			<div class="content-wrapper">

			<div class='progress-wrapper'>
	  			<div class="progress-slider"></div>
	 		<div class="progress-inner">
	 			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
					<?php responsive_entry_top(); ?>

					<?php get_template_part( 'post-meta' ); ?>
				
					<div class="post-entry">
						<?php if( has_post_thumbnail() ) : ?>
							<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
								<?php the_post_thumbnail( 'thumbnail', array( 'class' => 'alignleft' ) ); ?>
							</a>
						<?php endif; ?>
					
                                        <?php get_template_part('campaign-preview' ); ?>
                                    
						<?php wp_link_pages( array( 'before' => '<div class="pagination">' . __( 'Pages:', 'responsive' ), 'after' => '</div>' ) ); ?>
					</div>

				</div>

	 			</div>
				<div class='progress-circle-outer'></div> 
	 			<div class="progress-circle-inner"></div>
	 			<img src='http://3cky.com/slider-bg.png' alt='slider background'/ class='slider-bg' />
	 			<img src='http://3cky.com/slider-bg-up.png' alt='slider background up'/ class='slider-bg-up'>
			</div>  

				<!-- end of .post-entry -->

				<?php get_template_part('post-data' ); ?>				

				<?php responsive_entry_bottom(); ?>
			</div><!-- end of #post-<?php the_ID(); ?> -->
			<?php responsive_entry_after(); ?>

		<?php
		endwhile;

		get_template_part( 'loop-nav' );

	else :

		get_template_part( 'loop-no-posts' );

	endif;
	?>

</div><!-- end of #content-archive -->


<?php get_footer(); ?>
