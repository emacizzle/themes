<?php if ( function_exists('register_sidebar') ) {
    register_sidebar(array(
		'name'=>'TopColumn',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="mast">',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
		'name'=>'LeftColumn',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="mast">',
        'after_title' => '</h3>',
    ));

	register_sidebar(array(
		'name'=>'RightColumn',
    	'before_widget' => '<div id="%1$s" class="widget %2$s">',
    	'after_widget' => '</div>',
    	'before_title' => '<h3 class="mast">',
    	'after_title' => '</h3>',
    ));
    register_sidebar(array(
		'name'=>'BottomColumn',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="mast">',
        'after_title' => '</h3>',
    ));
}
// Custom Header Image Support

define('HEADER_TEXTCOLOR', '');
define('HEADER_IMAGE', '%s/img/header.jpg'); // %s is theme dir uri
define('HEADER_IMAGE_WIDTH', 900);
define('HEADER_IMAGE_HEIGHT', 180);
define( 'NO_HEADER_TEXT', true );


function theme_admin_header_style() {
?>
<style type="text/css">
#headimg {
	background:#fff url(<?php header_image() ?>) no-repeat center;  
	height: <?php echo HEADER_IMAGE_HEIGHT; ?>px;
	width: <?php echo HEADER_IMAGE_WIDTH; ?>px;
}
#headimg * {
  display:none;
}
</style>
<?php
}
function theme_header_style() {
?>
<style type="text/css">
  #splash
  {
  background:url(<?php header_image(); ?>) no-repeat center;
  height:<?php echo HEADER_IMAGE_HEIGHT; ?>px;
  width:<?php echo HEADER_IMAGE_WIDTH; ?>px;
}
</style>
<?php
}
if ( function_exists('add_custom_image_header') ) {
	add_custom_image_header('theme_header_style', 'theme_admin_header_style');
}
?>
<?php function new_excerpt_length($length) {
	return 20;
}
add_filter('excerpt_length', 'new_excerpt_length');
?>