<div class="fullbox_excerpt">
	<div class="fullbox_content">
		<h3><?php _e('Featured Posts', 'techified'); ?></h3>
		<div class="smooth_gallery">
			<div id="myGallery">
				
				<?php
				for($i = 1; $i <=4; $i++)
				{
					$current_post_id = get_option('techified_featured_post'.$i);
					$saved_post_excerpt = get_option('techified_featured_description'.$i);

					if($current_post_id)
					{
						$current_post_meta = get_post($current_post_id);
						$current_post_title = (function_exists ( 'qtrans_htmlDecodeUseCurrentLanguageIfNotFoundUseDefaultLanguage' )) ? qtrans_htmlDecodeUseCurrentLanguageIfNotFoundUseDefaultLanguage($current_post_meta->post_title) : $current_post_meta->post_title;
						$current_post_excerpt = (strlen($saved_post_excerpt) == 0) ? ((function_exists(qtrans_useCurrentLanguageIfNotFoundShowAvailable)) ? qtrans_useCurrentLanguageIfNotFoundShowAvailable($current_post_meta->post_content) : $current_post_meta->post_content) : $saved_post_excerpt;
						$techified_featured_bigimg = (strlen(get_option('techified_featured_bigimg'.$i)) == 0) ? bloginfo('template_directory').'/slide/'.$i.'.jpg' : get_option('techified_featured_bigimg'.$i);
						$techified_featured_smallimg = (strlen(get_option('techified_featured_smallimg'.$i)) == 0) ? bloginfo('template_directory').'/slide/'.$i.'-small.jpg' : get_option('techified_featured_smallimg'.$i);
						?>
							<div class="imageElement">
								<h3><a href="<?php echo get_permalink($current_post_id); ?>" title="<?php echo $current_post_title; ?>"><?php echo $current_post_title; ?></a></h3>
								<p><?php cutstr($current_post_excerpt, 550); ?></p>
								<a href="<?php echo get_permalink($current_post_id); ?>" title="<?php echo $current_post_title; ?>" class="open"></a> 
								<img src="<?php echo $techified_featured_bigimg; ?>" class="full" alt="" /> 
								<img src="<?php echo $techified_featured_smallimg; ?>" class="thumbnail" alt="" /> 
							</div>
						<?php
					}
					else
					{
						?>
							<div class="imageElement">
								<h3><?php echo sprintf(__('This is featured post %d title', 'techified'), $i); ?></h3>
								<p><?php _e('To set this post. Please proceed to Techified theme options.', 'techified'); ?></p>
								<a href="#" title="poat title here" class="open"></a> 
								<img src="<?php bloginfo('template_directory'); ?>/slide/<?php echo $i; ?>.jpg" class="full" alt="" /> 
								<img src="<?php bloginfo('template_directory'); ?>/slide/<?php echo $i; ?>-small.jpg" class="thumbnail" alt="" /> 
							</div>
						<?php
					}
				}
				?>
			</div>
		</div>
	</div>
</div>