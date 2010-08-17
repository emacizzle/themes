		<div class="sidebar grid_6">
			<h1><a href="<?php bloginfo('url'); ?>"><img src="<?php if(get_option('fotofolio_logo')): echo get_option('fotofolio_logo'); else: echo get_bloginfo('template_url') . '/images/logo.png'; endif; ?>" alt="logo" /></a></h1>
<!--			<ul class="nav">
				<li <?php if(is_home()) echo "class=\"current_page_item\""; ?>><a href="<?php bloginfo('url'); ?>">Home</a></li>
				<?php wp_list_pages('title_li='); ?>
			</ul>
-->			
							<ul class="nav">
							<?php 
							wp_list_categories('title_li=&show_empty=0&depth=1&exclude=' . get_option('fotofolio_testimonial') . ',' . get_option('fotofolio_slide') . ''); ?>
								</ul>
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
			<?php endif; ?>
			<?php include(TEMPLATEPATH . "/copyright.php"); ?>
		</div> <!-- end of sidebar -->