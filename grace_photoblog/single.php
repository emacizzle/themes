<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  
    <div id="feature" class="singlepic">  <!-- feature -->

      <?php the_content(); ?>
	  
	  <div class="clearall">&nbsp;</div>
	
	</div> <!-- feature -->
	
	<div id="columnleft"> <!-- columnleft -->
	
	  <p class="postnavigation">
	  	<?php previous_post_link('<span class="previouspostbutton">%link</span>', '&nbsp;') ?>
		<?php next_post_link('<span class="nextpostbutton">%link</span>', '&nbsp;') ?>
	  </p>
	  
	  <div class="clearall">&nbsp;</div>
		
		<h2 class="meta">Date Added</h2>
	  <p><?php the_time('l, F jS, Y') ?></p>
	  
	  <h2 class="meta">Posted In</h2>
	  <p><?php the_category(', ') ?></p>
	  
	  <?php
		if(get_the_tag_list()) { ?>
		
		  <h2 class="meta">Tagged</h2>
		
		<?php 
		 echo get_the_tag_list('<p>',' ','</p>');
		}
		?>
	
	</div> <!-- columnleft -->
	
	<div id="columnright"> <!-- columnright -->
	
	  <h1 class="single"><?php the_title(); ?></h1>
	  

	  
		<?php

		$mykey_values = get_post_custom_values('Description');
				
		if ( $mykey_values ) {	  
		
		?>
	  
	  <h2 class="meta">Description</h2>
	  <p><?php
				  foreach ( $mykey_values as $key => $value ) {

			      echo $value; 

				  } ?>
				  </p>
				  <?php
				  
				  }



				?>
	  
	  
	  <div id="commentsform"> <!-- commentsform -->
	  <?php // comments_template(); // No comments in this theme?>
	  </div> <!-- commentsform -->

	</div> <!-- columnright -->


	<?php endwhile; endif; ?>	
	
	<p class="clearall">&nbsp;</p>

  </div>  <!-- content -->
  
<?php get_footer(); ?> 