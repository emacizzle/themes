<?php


add_theme_support( 'post-thumbnails' );
add_image_size( 'single-post-thumbnail', 668, 351, true ); // Permalink thumbnail size
add_image_size( 'category-thumbnail', 110, 110, true );

if ( function_exists('register_sidebar') )
register_sidebar(array(
'before_widget' => '<div class="widgz">',
'after_widget' => '</div>',
'before_title' => '<h2>',
'after_title' => '</h2>',
));


// Category Active when viewing post by http://www.screenshine.net/blog/1474_wordpress-plugin-show-active-category

function show_active_category($text) {
	global $post;
	if( is_single() ) {

		$categories = wp_get_post_categories($post->ID);

		foreach( $categories as $catid ) {
			$cat = get_category($catid);
			if(preg_match('#>' . $cat->name . '</a>#', $text)) {
				$text = str_replace('>' . $cat->name . '</a>', ' class="active_category">' . $cat->name . '</a>', $text);
			}
		}
	}
	return $text;
}
add_filter('wp_list_categories', 'show_active_category');


// Collection Info
$options = array (
	array(
   "id" => "fotofolio_logo",
   "default" => "",
   "type" => "fotofolio_logo"),
  array(
   "id" => "fotofolio_intro",
   "default" => "Tell people a little thing about your self, may be one or two sentences",
   "type" => "fotofolio_intro"),
  array(
   "id" => "fotofolio_slide",
   "default" => "Featured",
   "type" => "fotofolio_slide"),
   array(
   "id" => "fotofolio_slide_num",
   "default" => "5",
   "type" => "fotofolio_slide_num",
   "options" => array( '1' => "1","2","3","4","5","6","7" )),
   array(
   "id" => "fotofolio_testimonial",
   "default" => "Testimonial",
   "type" => "fotofolio_testimonial"),
   array(
   "id" => "fotofolio_detail_comment",
   "default" => "yes",
   "type" => "fotofolio_detail_comment"),
);

// If saved
$uploadpath = wp_upload_dir();
if ($uploadpath['baseurl']=='') $uploadpath['baseurl'] = get_bloginfo('siteurl').'/wp-content/uploads';

function fotofolio_options() {
  global $options, $uploadpath;

  if ('fotofolio_save'== $_REQUEST['action'] ) {
    foreach ($options as $value) {
     if( !isset( $_REQUEST[ $value['id'] ] ) ) {  } else { update_option( $value['id'], stripslashes($_REQUEST[ $value['id']])); } }
     if(stristr($_SERVER['REQUEST_URI'],'&saved=true')) {
     $location = $_SERVER['REQUEST_URI'];
    } else {
     $location = $_SERVER['REQUEST_URI'] . "&saved=true";
    }
    
    if ($_FILES["file-header"]["type"]){
     $directory = $uploadpath['basedir'].'/';
     move_uploaded_file($_FILES["file-header"]["tmp_name"], $directory . $_FILES["file-header"]["name"]);
     update_option('fotofolio_logo', $uploadpath['baseurl']. "/". $_FILES["file-header"]["name"]);
    }

    
    header("Location: $location");
    die;
  }
  
function wordspop_categories() {
    $ftfl_categories = get_categories();
    $ftfl_categories_list = array();
    foreach( $ftfl_categories as $ftflcat ){
        $ftfl_categories_list[$ftflcat->name] = $ftflcat->cat_ID;
    }
    return $ftfl_categories_list;

}


// set default options
  foreach ($options as $default) {
  if(get_option($default['id'])=="") {
  	update_option($default['id'],$default['default']);
   }
  }
   add_menu_page( __('Fotofolio Settings','default'), __('Fotofolio Settings','default'), 10, 'Fotofolio-settings', 'Fotofolio_admin');
  
}

function fotofolio_admin() {
    global $options;
?>

<?php if ( $_REQUEST['saved'] ) { ?><div class="updated fade"><p><strong><?php _e('Settings saved.','default'); ?></strong></p></div><?php } ?>
<div class="wrap">

<div id="poststuff" class="metabox-holder">

<div class="stuffbox">
<div class="inside">
<table><tr>
<td>
<p><img src="<?php bloginfo("template_url") ?>/images/wpop-admin-logo.png" /></p>
<p style="font: normal 20px georgia, sans-serif;">Fotofolio Landscape by Wordspop</p>
<p style="font-size: 12px;">Visit our <a href="http://www.wordspop.com">site</a> to get the latest update of <a href="http://www.wordspop.com">Fotofolio Landscape</a>, and also get a great support in our <a href="http://www.wordspop.com">forum</a></p>
<p style="font-size: 12px;">If you like this theme, please support us,  <strong>donate</strong> or <strong>buy the licence to remove link to our site</strong>.</p>
</td>
</tr>
<tr style="text-align: left;">
	<td><div style="width: 100px; float: left;"><a href="https://www.e-junkie.com/ecom/gb.php?i=637393&c=single&cl=108569" target="ejejcsingle"><img src="http://www.e-junkie.com/ej/x-click-butcc.gif" border="0" alt="Buy Now"/></a></div> <div style="width: 100px; float: left;"><form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_s-xclick"/>
<input type="hidden" name="hosted_button_id" value="4465972"/>
<input type="image" src="https://www.paypal.com/en_US/i/btn/btn_donateCC_LG_global.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online."/>
<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1"/><br />
</form></div></td>
</tr>
</table>
</div>
</div>
<form method="post" id="myForm" enctype="multipart/form-data">
<div id="poststuff" class="metabox-holder"> 
 <div class="stuffbox">
  <h3><label for="link_url"><?php _e("Homepage Setting","default"); ?></label></h3>
  <div class="inside">
   <table class="form-table" style="width: auto">
    <?php
     foreach ($options as $value) {
      switch ( $value['type'] ) {
      
      case "fotofolio_logo": ?>
       <tr>
        <th scope="row"><span style="font-size: 12px;font-weight:bold;"><?php _e("Upload your Logo","default"); ?></span><br /><br /><em>Upload only gif, jpg, and png with 185px x 42px dimension</em><br /><br /><em style="color:green">also please make sure your /wp-content/ folder writeable</em></th>
        <td>
         <label>
         <?php if(get_option('fotofolio_logo')) { echo '<div style="background: #efefef;width: 220px;padding: 10px;-moz-border-radius: 4px;-webkit-border-radius: 4px;margin-bottom: 10px;"><img src="'; echo get_option('fotofolio_logo'); echo '"  style="margin-top:10px;" /></div>'; } else {
         echo '<div style="background: #efefef;width: 220px;padding: 10px;-moz-border-radius: 4px;-webkit-border-radius: 4px;margin-bottom: 10px;"><img src="'.get_bloginfo('template_url').'/images/logo.png"/></div>';
         } ?>
          <input style="border-style:solid;border-width:1px;" name="file-header" id="file-header" type="file" />
          </label>
        </td>
        </tr> 
      
      <?php break;
	   case "fotofolio_intro": ?>
        <tr>
        <th scope="row"><span style="font-size: 12px;font-weight:bold;"><?php _e("Short brief about your self","default"); ?></span></th>
        <td>
         <label>
          <textarea name="<?php echo $value['id']; ?>" style="width:400px; height:100px;" cols="" rows=""><?php if(get_option($value['id']) != "") { echo trim(stripcslashes(get_option($value['id']))); } else { echo $value['std']; } ?></textarea>
         </label>
        </td>
        </tr>

      <?php break; 
      case "fotofolio_slide": ?>
        <tr>
        <th scope="row"><span style="font-size: 12px;font-weight:bold;"><?php _e("Category to show on slideshow","default"); ?></span></th>
        <td>
         <label>
          <select style="width:240px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
          	<?php $default = $value['std']; if(!get_option($value['id'])) { $selected = $default; } else { $selected = get_option($value['id']); }
          	foreach(wordspop_categories() as $key => $val) { ?>
          	<option value="<?php echo $val ?>"<?php if($val == $selected) echo 'selected="selected"'; ?>><?php echo $key; ?></option>
          	<?php } ?>
          </select>
          <br /> <span style="color: orange">Selected Category will be excluded from the category list.</span>
         </label>
        </td>
        </tr> 
       
       <?php break; 
      case "fotofolio_slide_num": ?>
        <tr>
        <th scope="row"><span style="font-size: 12px;font-weight:bold;"><?php _e("Slideshow Number","default"); ?></span></th>
        <td>
         <label>
          <select style="width:240px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>"><?php $default = $value['std']; if ( !get_option( $value['id'] ) ) { $selected = $default; } else { $selected = get_option($value['id']); } foreach ( $value['options'] as $key => $val ) { ?><option value="<?php echo $val ?>"<?php if( $val == $selected ) echo 'selected="selected"'; ?>><?php echo $key; ?></option><?php } ?></select>
          </label>
        </td>
        </tr> 
       <?php break;
       case "fotofolio_testimonial": ?>
        <tr>
        <th scope="row"><span style="font-size: 12px;font-weight:bold;"><?php _e("Category to show on testimonial","default"); ?></span></th>
        <td>
         <label>
          <select style="width:240px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
          	<?php $default = $value['std']; if(!get_option($value['id'])) { $selected = $default; } else { $selected = get_option($value['id']); }
          	foreach(wordspop_categories() as $key => $val) { ?>
          	<option value="<?php echo $val ?>"<?php if($val == $selected) echo 'selected="selected"'; ?>><?php echo $key; ?></option>
          	<?php } ?>
          </select>
          <br /> <span style="color: orange">Selected Category will be excluded from the category list.</span>
         </label>
        </td>
        </tr> 
       
       <?php
            	}
      }
	?>
   </table>
  </div>
 </div>
</div>

<div id="poststuff" class="metabox-holder"> 
	<div class="stuffbox">
		<h3><label for="link_url"><?php _e("Detail Page Setting","default"); ?></label></h3>
		<div class="inside">
			<table class="form-table" style="width: auto">
		    <?php
		     foreach ($options as $value) {
		      switch ( $value['type'] ) {
		      
		      case "fotofolio_detail_comment": ?>
		       <tr>
		        <th scope="row"><span style="font-size: 12px;font-weight:bold;"><?php _e("Show Comment Field?","default"); ?></span></th>
		        <td>
		         <label><input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>-yes" type="radio" value="yes"<?php if ( get_option( $value['id'] ) == "yes") { echo " checked"; } ?> /><?php _e("Yes, show the comment","default"); ?></label>
         &nbsp;&nbsp;
         <label><input  name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>-no" type="radio" value="no"<?php if ( get_option( $value['id'] ) == "no") { echo " checked"; } ?> /><?php _e("No, don't let them comment my work","default"); ?></label>
		        </td>
		        </tr> 
		  		<?php
		  		break;
		  			}
		  			}
		  			?>
		  		</table>
		</div>
	</div>
</div>

<input name="fotofolio_save" type="submit" class="button-primary" value="Save changes" />
<input type="hidden" name="action" value="fotofolio_save" />
</form>

</div>
<?php
}
add_action('admin_menu', 'fotofolio_options');
?>