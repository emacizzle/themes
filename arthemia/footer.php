</div>  

<div id="front-popular" class="clearfloat">

<div id="recentpost" class="clearfloat">
<?php 	if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(5) ) : ?> 		
<?php endif; ?></div> 		

<div id="mostcommented" class="clearfloat">
	<?php 	if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(6) ) : ?> 		
	<?php endif; ?></div>

<div id="recent_comments" class="clearfloat">
	<?php 	if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(7) ) : ?> 		
	<?php endif; ?>
	</div>
</div>

<div id="footer"> <?php wp_footer(); ?> Powered by <a href="http://wordpress.org/">WordPress</a> | <?php if ( is_user_logged_in() ) { ?> <?php wp_register('', ''); ?> | <?php } ?> <?php wp_loginout(); ?> | <a href="<?php bloginfo('rss2_url'); ?>">Entries (RSS)</a> | <a href="<?php bloginfo('comments_rss2_url'); ?>">Comments (RSS)</a> | <a href="http://www.michaeljubel.com/2008/05/arthemia-magazine-blog-wordpress-theme-released/" target="_blank">Arthemia</a> theme by <a href="http://www.michaeljubel.com" target="_blank">Michael Jubel</a>

<!-- <?php echo get_num_queries(); ?> queries. <?php timer_stop(1); ?> seconds. -->

</div>

</body>
</html>