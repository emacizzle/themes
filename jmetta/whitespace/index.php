<?php get_header(); ?>

<div id="content">

<?php include(TEMPLATEPATH."/l_sidebar.php");?>

	<div id="contentleft">
	
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<h1><?php the_title(); ?></h1>
	
		<?php the_content(__('Read more'));?><div style="clear:both;"></div>
		
		<div class="postmeta">
                <p>
                  <?php if (get_post_meta($post->ID, "wikipedia", $single = true) == 'true') { ?>
                    Description taken in whole or in part from <a href="http://en.wikipedia.org">English Wikipedia</a> and <a href="http://es.wikipedia.org">Wikipedia Español</a>
                    <?php } ?>
			<p>Written by <a href="<?php the_author_meta('user_url'); ?>"><?php the_author(); ?></a> on <?php the_time('F j, Y'); ?> | Filed Under <?php the_category(', ') ?>
                 &nbsp;<?php edit_post_link('(Edit)', '', ''); ?></p>
		</div>
	 			
		<!--
		<?php trackback_rdf(); ?>
		-->
		
		<h4>comments</h4>
		<?php comments_template(); // Get wp-comments.php template ?>
		
		<?php endwhile; else: ?>
		
		<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>
	
	</div>
	
<?php // include(TEMPLATEPATH."/r_sidebar.php");?>
	
</div>

<!-- The main column ends  -->

<?php get_footer(); ?>