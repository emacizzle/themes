<?php
load_theme_textdomain('techified', get_template_directory() . '/lang');
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'functions.php' == basename($_SERVER['SCRIPT_FILENAME']))
die (__('Please do not load this page directly. Thanks!', 'techified'));

/**
 * @brief byte수로 자르는 함수
 **/
function cutstr($string, $cut_size) {
	$string = strip_shortcodes ( $string );
	$string = str_replace ( ']]>', ']]&gt;', $string );
	$string = strip_tags ( $string );
	echo preg_match('/.{'.$cut_size.'}/su', $string, $arr) ? $arr[0].'...' : $string; 
}

if (function_exists ( 'register_sidebar' )) {
	register_sidebar ( array ('name' => 'Techified Sidebar 0', 'before_widget' => '<div class="box">', 'after_widget' => '</div><div class="box_bottom"></div></div>', 'before_title' => '<h3>', 'after_title' => '</h3><div class="box_content">' ) );
	register_sidebar ( array ('name' => 'Techified Sidebar 1', 'before_widget' => '<div class="box">', 'after_widget' => '</div><div class="box_bottom"></div></div>', 'before_title' => '<h3>', 'after_title' => '</h3><div class="box_content">' ) );
	register_sidebar ( array ('name' => 'Techified Sidebar 2', 'before_widget' => '<div class="box">', 'after_widget' => '</div><div class="box_bottom"></div></div>', 'before_title' => '<h3>', 'after_title' => '</h3><div class="box_content">' ) );
	register_sidebar ( array ('name' => 'Techified Sidebar 3', 'before_widget' => '<div class="box">', 'after_widget' => '</div><div class="box_bottom"></div></div>', 'before_title' => '<h3>', 'after_title' => '</h3><div class="box_content">' ) );
	register_sidebar ( array ('name' => 'Techified Footer', 'before_widget' => '<div class="box">', 'after_widget' => '</div><div class="box_bottom"></div></div>', 'before_title' => '<h3>', 'after_title' => '</h3><div class="box_content">' ) );
	function unregister_problem_widgets() {
		unregister_sidebar_widget ( 'Get Recent Comments' );
		unregister_sidebar_widget ( 'Get Recent Trackbacks' );
	}
	add_action ( 'widgets_init', 'unregister_problem_widgets' );
}

function widget_about() {
?>
<div class="box">
<h3><?php _e('About Author', 'techified'); ?></h3>
<div class="box_content"> <?php
	echo stripslashes ( get_option ( 'techified_about_us' ) );
	?>
 </div>
<div class="box_bottom"></div>
</div>
<?php
}
if (function_exists ( 'register_sidebar_widget' )) {
	$widget_ops = array ('classname' => 'widget_about', 'description' => "Techified - About Author" );
	wp_register_sidebar_widget ( 'widget_about', __('About Author', 'techified'), 'widget_about', $widget_ops );
}
add_action ( 'admin_menu', 'my_theme_menu' );
function my_theme_menu() {
	if (isset ( $_POST ['SaveThemeSetting'] )) {
		update_option ( 'techified_disable_all_ext', $_POST ['techified_disable_all_ext'] );
		update_option ( 'techified_disable_featured_post', $_POST ['techified_disable_featured_post'] );
		update_option ( 'techified_feedburner_uri', $_POST ['techified_feedburner_uri'] );
		update_option ( 'techified_about_us', $_POST ['techified_about_us'] );
		update_option ( 'techified_gfc_id', $_POST ['techified_gfc_id'] );
		update_option ( 'techified_mbl_id', $_POST ['techified_mbl_id'] );
		update_option ( 'techified_top_ads', $_POST ['techified_top_ads'] );
		update_option ( 'techified_300_250_ads', $_POST ['techified_300_250_ads'] );
		update_option ( 'techified_customize_stats', $_POST ['techified_customize_stats'] );
		update_option ( 'techified_customize_stats_icon', $_POST ['techified_customize_stats_icon'] );
		update_option ( 'techified_our_sponsors', $_POST ['techified_our_sponsors'] );
		for($i = 1; $i <= 5; $i ++) {
			$techified_featured_post = $_POST ['techified_featured_post' . $i];
			$techified_featured_description = $_POST ['techified_featured_description' . $i];
			update_option ( 'techified_featured_post' . $i, $techified_featured_post );
			update_option ( 'techified_featured_description' . $i, $techified_featured_description );
			$overrides = array ('test_form' => false );
			$file_big = wp_handle_upload ( $_FILES ['techified_featured_image' . $i], $overrides );
			$file_small = wp_handle_upload ( $_FILES ['techified_featured_thumbnail' . $i], $overrides );
			$url_big = (strlen ( $file_big ['url'] ) == 0) ? $_POST ['techified_featured_image_src' . $i] : $file_big ['url'];
			$url_small = (strlen ( $file_small ['url'] ) == 0) ? $_POST ['techified_featured_thumbnail_src' . $i] : $file_small ['url'];
			update_option ( 'techified_featured_bigimg' . $i, $url_big );
			update_option ( 'techified_featured_smallimg' . $i, $url_small );
		}
	}
	add_theme_page ( 'Techified Theme Settings', 'Techified Settings', 8, __FILE__, 'Techified_options' );
}
function Techified_options() {
	if ($_REQUEST ['updated'])
		echo '<div id="message" class="updated fade"><p><strong>'.__('Techified Theme settings saved.').'</strong></p></div>';
	?>
<div class="wrap">
<h2><?php _e('Techified Theme Settings'); ?></h2>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
<input type="hidden" name="cmd" value="_donations">
<input type="hidden" name="business" value="paypal@cheon.info">
<input type="hidden" name="lc" value="GB">
<input type="hidden" name="item_name" value="Donate to Lightbox M plugin's auther">
<input type="hidden" name="no_note" value="1">
<input type="hidden" name="no_shipping" value="1">
<input type="hidden" name="currency_code" value="USD">
<input type="hidden" name="bn" value="PP-DonationsBF:btn_donate_LG.gif:NonHosted">
<input type="image" src="https://www.paypal.com/en_GB/i/btn/btn_donate_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online."> U.S. Dollar
</form>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
<input type="hidden" name="cmd" value="_donations">
<input type="hidden" name="business" value="paypal.cn@cheon.info">
<input type="hidden" name="lc" value="C2">
<input type="hidden" name="item_name" value="捐赠给 Lightbox M 插件的作者">
<input type="hidden" name="no_note" value="1">
<input type="hidden" name="no_shipping" value="1">
<input type="hidden" name="currency_code" value="CNY">
<input type="hidden" name="bn" value="PP-DonationsBF:btn_donate_LG.gif:NonHosted">
<input type="image" src="https://www.paypal.com/zh_XC/i/btn/btn_donate_LG.gif" border="0" name="submit" alt="PayPal — 最安全便捷的在线支付方式！"> 人民币
</form>
<form method="post" action="options.php" enctype="multipart/form-data">
<p class="submit"><input type="submit" name="SaveThemeSetting" id="SaveThemeSetting" value="<?php _e('Save Theme Settings', 'techified') ?>" /></p>
 <?php
	wp_nonce_field ( 'update-options' );
	?> <h3><?php _e('Common Settings', 'techified'); ?></h3>
<table class="form-table">
	<tr valign="top">
		<th scope="row"><?php _e('Disables loading external page<br />(for example:Addthis,Google Friend Connect)', 'techified'); ?></th>
		<td><input name="techified_disable_all_ext" type="checkbox" value="Y"<?php if( get_option ( 'techified_disable_all_ext' ) ) { ?> checked="checked"<?php } ?> /><?php _e('Can improve the page loading speed', 'techified'); ?></td>
	</tr>
	<tr valign="top">
		<th scope="row"><?php _e('Disables featured post', 'techified'); ?></th>
		<td><input name="techified_disable_featured_post" type="checkbox" value="Y"<?php if( get_option ( 'techified_disable_featured_post' ) ) { ?> checked="checked"<?php } ?> /></td>
	</tr>
	<tr valign="top">
		<th scope="row"><?php _e('Feedburner uri', 'techified'); ?></th>
		<td><input type="text" name="techified_feedburner_uri"
			value="<?php
	echo get_option ( 'techified_feedburner_uri' );
	?>"
			size="40" /></td>
	</tr>
	<tr valign="top">
		<th scope="row"><?php _e('Google Friend Connect Site ID', 'techified'); ?></th>
		<td><input type="text" name="techified_gfc_id"
			value="<?php
	echo get_option ( 'techified_gfc_id' );
	?>"
			size="40" /></td>
	</tr>
	<tr valign="top">
		<th scope="row"><?php _e('MyBlogLog ID', 'techified'); ?></th>
		<td><input type="text" name="techified_mbl_id"
			value="<?php
	echo get_option ( 'techified_mbl_id' );
	?>"
			size="40" /></td>
	</tr>
	<tr valign="top">
		<th scope="row"><?php _e('Top ads or notice', 'techified'); ?></th>
		<td><textarea name="techified_top_ads" id="techified_top_ads"
			cols="45" rows="5"><?php
	echo stripslashes ( get_option ( 'techified_top_ads' ) );
	?></textarea></td>
	</tr>
	<tr valign="top">
		<th scope="row"><?php _e('Right 300x250 ads code', 'techified'); ?></th>
		<td><textarea name="techified_300_250_ads" id="techified_300_250_ads"
			cols="45" rows="5"><?php
	echo stripslashes ( get_option ( 'techified_300_250_ads' ) );
	?></textarea></td>
	</tr>
	<tr valign="top">
		<th scope="row"><?php _e('Our Sponsors code', 'techified'); ?></th>
		<td><textarea name="techified_our_sponsors" id="techified_our_sponsors"
			cols="45" rows="5"><?php if(get_option ( 'techified_our_sponsors' ) != 'N') {
	echo stripslashes ( get_option ( 'techified_our_sponsors' ) );
			}
	?></textarea></td>
	</tr>
	<tr valign="top">
		<th scope="row"><?php _e('Customize stats code', 'techified'); ?></th>
		<td><textarea name="techified_customize_stats" id="techified_customize_stats"
			cols="45" rows="5"><?php
	echo stripslashes ( get_option ( 'techified_customize_stats' ) );
	?></textarea></td>
	</tr>
	<tr valign="top">
		<th scope="row"><?php _e('Customize stats icon code', 'techified'); ?></th>
		<td><textarea name="techified_customize_stats_icon" id="techified_customize_stats_icon"
			cols="45" rows="5"><?php
	echo stripslashes ( get_option ( 'techified_customize_stats_icon' ) );
	?></textarea></td>
	</tr>
	<tr valign="top">
		<th scope="row"><?php _e('About Us', 'techified'); ?></th>
		<td><textarea name="techified_about_us" id="techified_about_us"
			cols="45" rows="5"><?php
	echo stripslashes ( get_option ( 'techified_about_us' ) );
	?></textarea></td>
	</tr>
</table>
<h3><?php _e('Featured Listing', 'techified'); ?></h3> <?php
	$strFeatured = "";
	for($i = 1; $i <= 5; $i ++) {
		?> <h4><?php _e('Featured #', 'techified'); ?><?php
		echo $i?></h4>
<table class="form-table">
	<tr valign="top">
		<th scope="row"><?php _e('Post', 'techified'); ?></th>
		<td> <?php
		global $post;
		$myposts = get_posts ( 'numberposts=-1' );
		$techified_featured = get_option ( 'techified_featured_post' . $i );
		?> <select name="techified_featured_post<?php
		echo $i;
		?>"
			id="techified_featured_post<?php
		echo $i;
		?>">
			<option value="0"><?php _e('[Select Post]', 'techified'); ?></option> <?php
		foreach ( $myposts as $post ) {
			$post_id = $post->ID;
			if ($post_id == $techified_featured) {
				?> <option value="<?php
				echo $post_id;
				?>"
				selected="selected"><?php
				the_title ();
				?></option> 
 <?php
			} else {
				?> <option value="<?php
				echo $post->ID;
				?>"><?php
				the_title ();
				?></option> <?php
			}
		}
		?> </select></td>
	</tr>
	<tr valign="top">
		<th scope="row"><?php _e('Description (Optional)', 'techified'); ?></th>
		<td><textarea
			name="techified_featured_description<?php
		echo $i;
		?>"
			id="techified_featured_description<?php
		echo $i;
		?>" cols="45"
			rows="5"><?php
		echo get_option ( 'techified_featured_description' . $i );
		?></textarea></td>
	</tr>
	<tr valign="top">
		<th scope="row"><?php _e('Image URL (602x245)', 'techified'); ?></th>
		<td><input type="text"
			name="techified_featured_image_src<?php
		echo $i?>"
			value="<?php
		echo get_option ( 'techified_featured_bigimg' . $i );
		?>"
			size="50" /> <br />
		<label><?php _e(' Upload File: ', 'techified'); ?><input type="file"
			name="techified_featured_image<?php
		echo $i?>"
			id="techified_featured_image<?php
		echo $i?>" /> </label></td>
	</tr>
	<tr valign="top">
		<th scope="row"><?php _e('Thumbnail URL (100x75)', 'techified'); ?></th>
		<td><input type="text"
			name="techified_featured_thumbnail_src<?php
		echo $i?>"
			value="<?php
		echo get_option ( 'techified_featured_smallimg' . $i );
		?>"
			size="50" /> <br />
		<label><?php _e(' Upload File: ', 'techified'); ?><input type="file"
			name="techified_featured_thumbnail<?php
		echo $i?>"
			id="techified_featured_thumbnail<?php
		echo $i?>" /> </label></td>
	</tr>
</table> <?php
		$strFeatured .= ',techified_featured_post' . $i . ', techified_featured_description' . $i . ', techified_featured_image_src' . $i . ', techified_featured_image' . $i . ', techified_featured_thumbnail_src' . $i . ',techified_featured_thumbnail' . $i;
	}
	?> <input type="hidden" name="action" value="update" /> <input
	type="hidden" name="page_options"
	value="techified_feedburner_uri,techified_mbl_id,techified_about_us,techified_300_250_ads<?php echo $strFeatured; ?>" />
<p class="submit"><input type="submit" name="SaveThemeSetting"
	id="SaveThemeSetting" value="<?php _e('Save Theme Settings', 'techified') ?>" /></p>
</form>
</div>
<?php } ?>