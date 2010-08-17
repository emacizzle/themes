<?php get_header(); ?>	
<?php 
	$count = 0; 
?>

<?php if (have_posts()) : ?>
	<div class="fullbox_excerpt">
		<div class="fullbox_content">
			<h3>
				<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
				<?php /* If this is a category archive */ if (is_day()) { ?>
				<?php echo sprintf(__('Archive for %s'), the_time(__('F jS, Y', 'techified'))); ?>
				<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
				<?php echo sprintf(__('Archive for %s'), the_time(__('F, Y', 'techified'))); ?>
				<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
				<?php echo sprintf(__('Archive for %s'), the_time(__('Y', 'techified'))); ?>
				<?php } ?>
			</h3>
			
			<?php while (have_posts()) : the_post(); ?>
				
				<?php
				if($count > 0)
				{
				?>
				<div class="excerpt_separator"></div>
				<?php
				}
				?>
				
				<div class="excerpt_meta" id="post-<?php the_ID(); ?>">
					<div class="excerpt_desc">
						<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
						<?php cutstr($post->post_content, 500); ?>
					</div>
					<div class="excerpt_more"> <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="more-link"><?php _e('READ THE FULL ARTICLE &gt;&gt;', 'techified'); ?></a> </div>
				</div>
				
				<?php $count++; ?>
			<?php endwhile; ?>

		</div>
		<div class="fullbox_footer"></div>
	</div>
	<div id="post-navigator">
	<?php if (function_exists('wp_pagenavi')) : ?>
	<?php wp_pagenavi(); ?>
	<?php else : ?>
	<div class="alignright"><?php previous_posts_link(__('Newer Entries &raquo;', 'techified')); ?></div>
	<div class="alignleft"><?php next_posts_link(__('&laquo; Older Entries', 'techified')); ?></div>
	<?php endif; ?>
	</div>
<?php else: ?>  
	<div class="fullbox">
		<div class="fullbox_header"></div>
		<div class="post_message"><?php _e('Sorry The Archive You Are Looking For Had Been Deleted.', 'techified'); ?></div>
		<div class="fullbox_footer"></div>
	</div>
<?php endif; ?>
		
<?php get_sidebar(); ?>			
<?php get_footer(); ?>