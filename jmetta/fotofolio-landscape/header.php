<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title><?php wp_title('|', true, 'right'); ?> <?php bloginfo('name'); ?></title>
		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/grid.css" type="text/css" />
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />
		<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery-1.3.2.min.js"></script>
		<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/cycle.js"></script>
		<script type="text/javascript">
		$(function() {
		    // run the code in the markup!
		    $('body.home .stage').cycle({ 
		    //fx:    'scrollHorz',
		    fx:     'fade',
		    speed:   1000,
		    timeout:  10000,
			next:   '#stagenav-r', 
		    prev:   '#stagenav-l'
			});
		});
		</script>
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
		<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/fancybox/jquery.mousewheel-3.0.2.pack.js"></script>
		<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/fancybox/jquery.fancybox-1.3.0.pack.js"></script>
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/js/fancybox/jquery.fancybox-1.3.0.css" media="screen" />
		<script type="text/javascript">
		$(document).ready(function() {
			/*
			*   Examples - images
			*/

			$("a.full").fancybox({
				'titleShow'     : true,
				'titlePosition' 	: 'inside'
			});
			});
		</script>
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
	<div class="container container_24"><div class="container2">