<?php get_header(); ?>

<div id="content">

 <?php query_posts('posts_per_page=1&cat=6');
              if (have_posts()) : while (have_posts()) : the_post(); ?>
	        
    <div id="lead" class="clearfloat">
			 
			<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
<?php echo get_post_image (get_the_id(), '', '', '' .get_bloginfo('template_url') .'/scripts/timthumb.php?zc=1&amp;w=150&amp;h=180&amp;src='); ?></a>
    
	<div id="lead-text">
    <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
    <?php the_title(); ?></a> 
    </h2>
    
   
    <p class="date"><?php the_time('n/d/y'); ?> &bull; </p>
	<?php the_excerpt(); ?>
	</div>
			</div><!--END LEAD/STICKY POST-->
      <?php endwhile; else: ?>
          <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
      <?php endif; ?>
			
		<div id="more-posts">
		<h3><?php _e('Recent Posts','Mimbo'); ?></h3>
			
		<div class="clearfloat recent-excerpts">
 <?php query_posts('posts_per_page=5&cat=-6');
              if (have_posts()) : while (have_posts()) : the_post(); ?>

			<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
<?php echo get_post_image (get_the_id(), '', '', '' .get_bloginfo('template_url') .'/scripts/timthumb.php?zc=1&amp;w=105&amp;h=85&amp;src='); ?></a>

<h4><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a> 
</h4>

<p class="date"><?php the_time('n/d/y'); ?> &bull; </p>
			<?php the_excerpt(); ?>
						
      <?php endwhile; else: ?>
          <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
      <?php endif; ?>
		</div>

	
	</div><!--END RECENT/OLDER POSTS-->

	<div id="featured-cats"> 	
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Left Sidebar') ) : ?><?php endif; ?>
</div>
</div><!--END CONTENT-->

<?php get_sidebar(); ?>
<?php get_footer(); ?>