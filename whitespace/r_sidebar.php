<!-- begin r_sidebar -->
    <?php  if(0) {
    //    if (!is_page('horario-schedule')) { // We don't print the sidebar on the schedule page
                                          // because the table is so big. #kludge
 ?>
	<div id="r_sidebar">
	<ul id="r_sidebarwidgeted">
        <li id="Categories">
        <h3>English Programs</h3>
        <ul>
          <?php $the_query = new WP_Query('cat=4');
          while ($the_query->have_posts()) : $the_query->the_post(); ?>
                     <li><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></li>
               <?php endwhile; ?>
        </ul>
        </li>

	<?php if ( function_exists('dynamic_sidebar') ) dynamic_sidebar(2); ?>

<!--	<li id="Text1">	
	<h3>Text Area #1</h3>
		<p>This is an area on your website where you can add text. This will serve as an informative location on your website, where you can talk about your site.</p>
	</li>
	
	<li id="Text2">	
	<h3>Text Area #2</h3>
		<p>This is an area on your website where you can add text. This will serve as an informative location on your website, where you can talk about your site.</p>
	</li>

	<li id="Text3">	
	<h3>Text Area #3</h3>
		<p>This is an area on your website where you can add text. This will serve as an informative location on your website, where you can talk about your site.</p>
	</li>
-->
	</ul>
			
</div>
<?php } //end "schedule page" if statement 
?>
<!-- end r_sidebar -->