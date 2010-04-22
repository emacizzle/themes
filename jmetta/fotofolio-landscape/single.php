<?php 
get_header();
get_sidebar();
?>
		<div class="main grid_17">
			<?php if (have_posts()) : while (have_posts()) : the_post(); $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 800,9999 ), true, '' ); ?>
			<h2 class="title"><?php the_title(); ?></h2>
			<div class="stage">
				<div class="slide">
					<a href="<?php echo $src[0]; ?>" class="full"><?php the_post_thumbnail( 'medium' ); ?></a>
				</div>
			</div>
			<div class="intro">
				<p>Click the image to enlarge it.</p>
				<?php //the_content(); ?>
			</div>
			<div class="navigation" <?php echo $horizontal; ?>>
				<div class="alignright"><?php previous_post_link( '%link', 'Next', TRUE ); ?></div>
				<div class="alignleft"><?php next_post_link( '%link', 'Previous', TRUE ); ?></div>
				<div class="clear"></div>
			</div>
			<div class="section">
			<?php if(get_option('fotofolio_detail_comment')=='yes'): ?>
				<div class="comments">
					<?php comments_template(); ?>
				</div>
			<?php endif; ?>
				<div class="clear"></div>
			</div>
			<?php endwhile; endif;?>		
			</div> <!-- end of main -->
		<div class="clear"></div>
<?php get_footer(); ?>
