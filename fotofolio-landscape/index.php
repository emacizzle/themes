<?php 
get_header();
get_sidebar();
?>
		<div class="main grid_17">
			<div class="stage">
				<?php $the_query = new WP_Query ('cat=' . get_option('fotofolio_slide') . '&posts_per_page=' . get_option('fotofolio_slide_num') . '&order=ASC'); ?><?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
				<div class="slide">
					<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'single-post-thumbnail' ); ?></a>
					<h2><?php the_title(); ?></h2>
				</div>
				<?php endwhile; ?>
			</div>
			
			<div class="latest grid_17 alpha omega">
				<h2 class="grid_5 alpha omega">Recent Art</h2>
				<div class="photos grid_12 alpha omega">
					<?php $the_query = new WP_Query ('posts_per_page=6'); ?>
					<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail(array(68,68)); ?></a>
					<?php endwhile; ?>
					<div class="clear"></div>
				</div>
			</div>
			
			<div class="intro grid_8 alpha omega">
				<p><?php echo get_option('fotofolio_intro'); ?></p>
			</div>
			
			<div class="testimonial grid_7 prefix_1 alpha omega">
				<h2>Testimonial</h2>
				<?php $the_query = new WP_Query ('cat=' . get_option('fotofolio_testimonial') . '&posts_per_page=1&orderby=rand'); ?>
				<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
				<?php the_content(); ?>
				<?php endwhile; ?>
			</div>
						
		</div> <!-- end of main -->
		<div class="clear"></div>
<?php get_footer(); ?>