<?php get_header(); ?>

	<div id="content">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
 
	 <?php 
      // excludes this post from 'Related posts' in the sidebar
      $GLOBALS['current_id'] = $post->ID; 
      ?>
       <?php $data = get_post_custom($post->ID); ?>
  
		<div id="post-<?php the_ID(); ?>" <?php post_class('style'); ?>>
			<h2 class="posttitle"><?php the_title(); ?></h2>
                     <?php $subtitle = $data['MagSubtitle'][0];
                          if($subtitle != '') {
                         echo "<h3 class='magsubtitle'>" . $subtitle . "</h3>";
                        } ?>
 <div class="postmetadata">
   <div class="byline">
           <?php
             $author = $data['MagAuthor'][0];
             $title = $data['MagTitle'][0];
	if($title != '') {
	   echo "<p class='magtitle'><span style='text-align:left;'>Published as:</span><br/> <em>" . ucfirst($title) . "</em></p>";
           if ($author != '') {
              echo "<p class='magauthor'><em>by</em> " . ucfirst($author) . "</p>";
           }
	} else {
?>
	
           <?php _e('Posted by','Mimbo'); ?> <?php the_author_posts_link('namefl'); ?> <?php _e('on','Mimbo'); ?> <?php the_time('n/d/y'); ?> <br/> <?php _e('Categorized in','Mimbo'); ?> <?php the_category(',') ?>
        <?php } //end else ?>
</div>
</div>
		 
			<div class="entry clearfloat">
				<?php the_content('<p>'.__('Read the rest of this entry','Mimbo').'&raquo;</p>'); ?>

				<?php wp_link_pages(array(
				'before' => '<p><strong> '.__('Pages:','Mimbo').' </strong>', 
				'after' => '</p>', 
				'next_or_number' => 'number')); 
				?>
				</div>
				
			<?php the_tags('<span id="tags"><strong>'.__('Tagged as:','Mimbo').'</strong> ', ', ', '</span>'); ?>
			
	<?php edit_post_link(__('Edit this entry','Mimbo'), '<p>', '&raquo;</p>'); ?>

</div>

	<?php comments_template(); ?>

	<?php endwhile; else: ?>

		<p><?php _e('Sorry, no posts matched your criteria.','Mimbo'); ?></p>

<?php endif; ?>

	</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
