</div>
<div id="sidebar">
	<div id="sidebar_top">
               <?php dynamic_sidebar(1); ?>            
	<?php if(get_option('techified_feedburner_uri')) { ?>
		<div class="box">
			<h3><?php _e('Event &amp; News Updates', 'techified'); ?></h3>
			<div class="box_content">
				<div class="rss_box"><?php _e('Sign up to receive breaking news as well as receive other site updates!', 'techified'); ?></div>
				<form action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=<?php echo get_option('techified_feedburner_uri'); ?>', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true" id="rss_form">
					<input type="text" name="email" id="email_rss" value="<?php _e('Enter your email!', 'techified'); ?>" onblur="if (this.value == '') {this.value = 'Enter your email!';}"  onfocus="if (this.value == 'Enter your email!') {this.value = '';}" />
					<input type="submit" name="subscribe_email_btn" id="subscribe_email_btn" value="" />
					<input type="hidden" value="<?php echo get_option('techified_feedburner_uri'); ?>" name="uri"/>
					<input type="hidden" name="loc" value="en_US"/>
				</form>
			</div>
			<div class="box_bottom"></div>
		</div>
		<?php } if (get_option('techified_300_250_ads')) { ?>
		<div class="box">
			<div class="box_header"></div>
			<div class="box_content"> <?php echo stripslashes(get_option('techified_300_250_ads')); ?> </div>
			<div class="box_bottom"></div>
		</div>
		<?php } if (get_option('techified_our_sponsors')) { ?>
		<div class="box">
			<h3><?php _e('Our Sponsors', 'techified'); ?></h3>
			<div class="box_content">
				<div class="img_ads"> <?php echo stripslashes(get_option('techified_our_sponsors')); ?> </div>
			</div>
			<div class="box_bottom"></div>
		</div>
		<? } if (get_option('techified_gfc_id') && !get_option ( 'techified_disable_all_ext' )) { ?>
		<div class="box">
			<h3><?php _e('Google Friend Connect', 'techified'); ?></h3>
			<div class="box_gfc">
				<!-- Include the Google Friend Connect javascript library. -->
				<script type="text/javascript" src="http://www.google.com/friendconnect/script/friendconnect.js"></script>
				<!-- Define the div tag where the gadget will be inserted. -->
				<div id="div-1773825939628624057" style="width:314px;border:1px solid #ffffff;"></div>
				<!-- Render the gadget into a div. -->
				<script type="text/javascript">
				var skin = {};
				skin['BORDER_COLOR'] = '#ffffff';
				skin['ENDCAP_BG_COLOR'] = '#e0ecff';
				skin['ENDCAP_TEXT_COLOR'] = '#333333';
				skin['ENDCAP_LINK_COLOR'] = '#0000cc';
				skin['ALTERNATE_BG_COLOR'] = '#ffffff';
				skin['CONTENT_BG_COLOR'] = '#ffffff';
				skin['CONTENT_LINK_COLOR'] = '#0000cc';
				skin['CONTENT_TEXT_COLOR'] = '#333333';
				skin['CONTENT_SECONDARY_LINK_COLOR'] = '#7777cc';
				skin['CONTENT_SECONDARY_TEXT_COLOR'] = '#666666';
				skin['CONTENT_HEADLINE_COLOR'] = '#333333';
				skin['NUMBER_ROWS'] = '5';
				google.friendconnect.container.setParentUrl('/' /* location of rpc_relay.html and canvas.html */);
				google.friendconnect.container.renderMembersGadget(
				 { id: 'div-1773825939628624057',
				   site: '<?php echo get_option('techified_gfc_id'); ?>' },
				  skin);
				</script>
			</div>
			<div class="box_bottom"></div>
		</div>
		<?php } ?>
		<?php if (get_option('techified_mbl_id') && !get_option ( 'techified_disable_all_ext' )) { ?>
		<div class="box">
			<h3><?php _e('Recent Readers', 'techified'); ?></h3>
			<div class="box_readers">  
				<script type="text/javascript" src="http://pub.mybloglog.com/comm2.php?mblID=<?php echo get_option('techified_mbl_id'); ?>&amp;c_width=274&amp;c_sn_opt=n&amp;c_rows=5&amp;c_img_size=f&amp;c_heading_text=&amp;c_color_heading_bg=FFFFFF&amp;c_color_heading=666666&amp;c_color_link_bg=FFFFFF&amp;c_color_link=666666&amp;c_color_bottom_bg=FFFFFF"></script>
				<a href="http://www.mybloglog.com/buzz/yjoin/?ref_id=<?php echo get_option('techified_mbl_id'); ?>&amp;ref=w" class="join" title="Join My Community"><img alt="Join My Community" src="<?php bloginfo('template_directory'); ?>/images/join.gif" width="140" height="21" border="0" /></a>
			</div>
			<div class="box_bottom"></div>
		</div>
		<?php } ?>
	</div>
	<div id="sidebar_left">
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(2) ) : ?>
		<div class="box">
			<h3><?php _e('Categories', 'techified'); ?></h3>
			<div class="box_content">
				<ul>
					<?php wp_list_categories('depth=1&hide_empty=0&orderby=name&show_count=0&use_desc_for_title=1&title_li='); ?>
				</ul>
			</div>
			<div class="box_bottom"></div>
		</div>

		<div class="box">
			<h3><?php _e('Archives', 'techified'); ?></h3>
			<div class="box_content">
				<ul>
					<?php wp_get_archives('type=monthly&limit=10&show_post_count=0'); ?>
				</ul>
			</div>
			<div class="box_bottom"></div>
		</div>
	<?php endif; ?>	
	</div>
	<div id="sidebar_right">
		
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(3) ) : ?>
	<div class="box">
			<h3><?php _e('Blogroll', 'techified'); ?></h3>
			<div class="box_content">
				<ul>
					<?php get_links(-1, '<li>', '</li>', '', TRUE, 'url', FALSE); ?>
				</ul>
			</div>
			<div class="box_bottom"></div>
		</div>
		
		<div class="box">
			<h3><?php _e('Meta', 'techified'); ?></h3>
			<div class="box_content">
				<ul>
					<?php wp_register(); ?>
		  <li><?php wp_loginout(); ?></li>
		  <li><a href="http://validator.w3.org/check/referer" title="This page validates as XHTML 1.0 Transitional">Valid XHTML</a></li>
		  <li><a href="http://jigsaw.w3.org/css-validator/validator?uri=<?php echo get_settings('home'); ?>&amp;usermedium=all">Valid CSS</a></li>
		  <li><a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress</a></li>
		  <?php wp_meta(); ?>
				</ul>
			</div>
			<div class="box_bottom"></div>
		</div>
	<?php endif; ?>
	</div>
</div>
