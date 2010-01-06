<?php 

/*
Template Name: Home Page
*/
global $blog_id;
require_once 'gpi.php';
get_header(); 

	// Featured photo section
/*   	print("\n<div id=\"feature\" class=\"pics\">");
		$catID = get_cat_id('Featured'); // Get the category ID for the Featured category used to display rotating images on homepage
		query_posts('cat='.$catID.''); // Retrieve the latest post from the Featured category
		$images =& get_children( 'post_type=attachment&post_mime_type=image' );
		
		if ( empty($images) ) {
			// no images
		} else {
			foreach ( $images as $attachment_id => $attachment ) {
				//echo $attachment_id;
				 echo wp_get_attachment_url( $attachment_id);
			}
		}
		
	  	if (have_posts()) : while (have_posts()) : the_post(); // Start the Featured loop		
		?>		
		<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_excerpt_rss(); ?></a>		
		<?php		
		endwhile; endif; // End the Featured loop
	print("</div>\n");
	// End Featured Photo section
*/	?>
<div id="columnleft"><!-- columnleft -->
<ul>
	<?php 	/* Widgetized sidebar, if you have the plugin installed. */
		if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Home Page') ) : ?>

	<li>
	<h2>Widget Content!</h2>
	<p>This is a Widgetized section of the home page. Why not add some
	text about yourself and your contact details?.</p>
	<p>Log in then go to "Dashboard > Appearance > Widgets" and select
	Home Page to change what is displayed here.</p>
	</li>
	<?php endif; ?>
</ul>
</div>
<!-- columnleft -->
<div id="columnright"><!-- columnright -->
<h2>Recent Body Art</h2>
<?php function pprint($item) {
		echo "<pre>";
		print_r($item);
		echo "</pre>";
}?>
<ul id="latestworkgallery">
	<?php
			$catID = get_cat_id('Featured'); // Get the category ID for the Featured category used to display rotating images on homepage
			query_posts("showposts=4&cat=$catID&orderby=rand"); 
			$i = 1;
			if ( have_posts() ) : while ( have_posts() ) : the_post();

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
<p class="morebutton"><a
	href="<?php echo get_option('home'); ?>/gallery"
	title="<?php bloginfo('name'); ?> - Gallery" class="button">&nbsp;</a></p>

</div>
<!-- columnright -->

<p class="clearall">&nbsp;</p>

<div></div>
<!-- content -->

<?php get_footer(); ?>