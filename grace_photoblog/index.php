<?php 

global $blog_id;
require_once 'gpi.php';
get_header(); ?>
  
	<div id="columnleft"> <!-- columnleft -->
	
	  <h2><?php bloginfo('name'); ?> Gallery</h2>
	  
	  <p>These are the latest photos from the <?php bloginfo('name'); ?> gallery.</p>
	  
  	  <p class="clearall">&nbsp;</p>	
	
	   <ul>
		  <?php 	/* Widgetized sidebar */
				if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Home Page') ) : ?>
				
				<li><h2>Widget Content!</h2>
				<p>This is a Widgetized section of the home page. Why not add some text about yourself and your contact details?.</p>
				<p>Log in then go to "Dashboard > Appearance > Widgets" then select "Sidebar" to change what's displayed here.</p>
				</li>
			
			<?php endif; ?>
			</ul>
	
	</div> <!-- columnleft -->
	
	<div id="columnright"> <!-- columnright -->
	
	  	<ul id="latestworkgallery">	
	  
			<?php

			$i = 1;

			if (have_posts()) : while (have_posts()) : the_post();

			if ($i % 2 == 0)
				$c = ' class="alt"';
			else
				$c = '';
			
				/*
				* Get all image attachments
				*/
				echo "<li".$c.">";
				$img = gpi_get_image(0, "http://raven.redivivablogs.com/wp-content/themes/grace_photoblog/images/zkp-logo.png", false);
				$name = $img['title'];
				$path = str_replace('//','/',$img['path']); // sometimes had double backslashes returned
				$blogdir = '/home/jmettaco/public_html/wp-content/blogs.dir/' . $blog_id. "/";
				$imgpath = str_replace("/home/jmettaco/public_html/", $blogdir, $path);
				$newpath = $imgpath."-front.png";
				if (0) { // for debugging purposes
					unlink($newpath);
				}
				if (!file_exists($newpath)) {
					$image = new Imagick($imgpath);
					$image->setImageFormat("png");
					// Make sure aspect ratio is height=width*.75
					$image->scaleImage(270, 0);
					$height = $image->getImageHeight();
					$width = $image->getImageWidth();
					if ($height > $width) {
						$cropy = ($height-202)/2;
						$image->cropImage(270, 202, 0, $cropy);
					}
					$image->roundCorners(10,10);
					$shadow = $image->clone();
					/* Set image background color to black
					        (this is the color of the shadow) */
					$shadow->setImageBackgroundColor( new ImagickPixel( 'grey' ) );
					 
					/* Create the shadow */
					$shadow->shadowImage( 80, 3, 5, 5 );
					 
					/* Imagick::shadowImage only creates the shadow.
					        That is why the original image is composited over it */
					$shadow->compositeImage( $image, Imagick::COMPOSITE_OVER, 0, 0 ); 
					$shadow->writeImage($newpath);
				}
				$link = get_permalink();				
				echo "\t<a style='text-decoration:none;border=0;align:center' name='$name' href='$link'>\n";
				echo "\t<img src='$newpath' />";
				echo "</a></li>\n";
				
				$i++;
			endwhile; else:
				echo "<p>" . _e('Sorry, no posts matched your criteria.') . "</p>";
			endif; ?>
		  </ul>	  

	  <div class="clearall">&nbsp;</div>
	  
	  
		<p class="postnavigation">
			<?php next_posts_link('<span class="previouspostbutton">&nbsp;</span>') ?> <?php previous_posts_link('<span class="nextpostbutton">&nbsp;</span>') ?>
		</p>
	
	</div> <!-- columnright -->
	
	<p class="clearall">&nbsp;</p>

  </div>  <!-- content -->
  
<?php get_footer(); ?> 