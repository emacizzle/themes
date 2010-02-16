</div>
	</div>
<!--	<div id="footer_area">
		<div id="footer_area_content">
		<?php //if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(5) ) : ?>
                <?php if (0) : ?>
		<div class="box">
			<?php WP_Widget_Recent_Posts::widget(array('before_title'=>'<h3>', 'after_title'=>'</h3>', 'before_widget'=>'<div class="box_content">', 'after_widget'=>'</div>'), array("title" => __('Recent Entry', 'techified'), "number" => 5)); ?>
		</div>
		
		<div class="box">
			<?php WP_Widget_Recent_Comments::widget(array('before_title'=>'<h3>', 'after_title'=>'</h3>', 'before_widget'=>'<div class="box_content">', 'after_widget'=>'</div>'), array("title" => __('Recent Comments', 'techified'), "number" => 5)); ?>
		</div>
		
		<div class="box">
			<h3><?php _e('Most Popular Posts', 'techified'); ?></h3>
			<div class="box_content">
				<?php if(function_exists("akpc_most_popular")) : ?>
				<ul>
					<?php akpc_most_popular(5); ?>
				</ul>
				<?php else: ?>
					<?php _e('Please install popularity contest plugin.', 'techified'); ?>
				<?php endif; ?>
			</div>
		</div>
					
		<div class="box">
			<h3><?php _e('About Author', 'techified'); ?></h3>
			<div class="box_content">
				<?php echo stripslashes(get_option('techified_about_us')); ?>
			 </div>
		</div>
		<?php endif; ?>
</div>   
		</div>
-->	<div id="footer_bottom">
		<div id="footer_bottom_content">
Copyright &copy; <?php echo date('Y'); echo ' <a href="'.get_bloginfo('url').'">'.get_bloginfo('name').'</a>'; ?>. Site mechanic is <a href="http://mettadore.com/">John Metta</a>. </div>
	</div>
</div>
<?php wp_footer(); ?>
</body>
</html>