<?php get_header(); ?>
<?php 
	 if(is_home() && !get_option ( 'techified_disable_featured_post' )) { include (TEMPLATEPATH . '/slider.php'); }
?>
				
	<?php query_posts('p=9');
              if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="fullbox" id="post-<?php the_ID(); ?>">
					<div class="fullbox_header"></div>
					<div class="fullbox_content">
					<!-- <div class="breadcrumb"><?php the_category(', ') ?></div> -->
						<h1><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
					<!--	<div class="post_info">
							<div class="post_info_left"><?php echo __('Posted on', 'techified').' '.get_the_time(__('F j, Y', 'techified')); ?> <?php echo the_author_posts_link(); ?></div>
							<div class="post_info_edit"><?php edit_post_link(__('Edit this entry', 'techified'),'','.'); ?></div>
							<div class="post_info_right"> 
							<?php comments_popup_link(__('No Responses', 'techified'), __('One Response', 'techified'), __('% Responses', 'techified'), 'post_comment'); ?>
<?php  if(!get_option ( 'techified_disable_all_ext' )) { ?>
							<!-- AddThis Button BEGIN -->
							<script type="text/javascript"> var addthis_disable_flash = true; </script>
							<span class="post_bookmark"><a class="addthis_button" href="http://www.addthis.com/bookmark.php?v=250&amp;pub=cheonnii" addthis:url="<?php urlencode(the_permalink()); ?>" addthis:title="<?php urlencode(the_title()); ?>"><?php _e('BOOKMARK', 'techified'); ?></a><script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js?pub=cheonnii"></script></span>
							<!-- AddThis Button END -->
<?php } ?>
							</div>
						</div> -->
						<div class="post_content">
							<?php the_content(__('READ THE FULL ARTICLE >>', 'techified')); ?>
						</div>
					</div>
					<div class="fullbox_footer"></div>
				</div>
		<?php endwhile; ?>
		<div id="post-navigator">
		<?php if (function_exists('wp_pagenavi')) : ?>
		<?php wp_pagenavi(); ?>
		<?php else : ?>
		<div class="alignright"><?php previous_posts_link(__('Newer Entries &raquo;', 'techified')); ?></div>
<!--		<div class="alignleft"><?php next_posts_link(__('&laquo; Older Entries', 'techified')); ?></div> -->
		<?php endif; ?>
		</div>
	<?php else: ?>
	
	<?php endif; ?>
<?php get_sidebar(); ?>			
<?php get_footer(); ?>