<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>

<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<link rel="openid.server" href="http://openid.claimid.com/server" />
<link rel="openid.delegate" href="http://openid.claimid.com/johnmetta" />

<?php wp_head(); ?>

</head>
<body>

<div id="head" class="clearfloat">

<div class="clearfloat">
	<div id="logo" class="left">
	<a href="<?php echo get_option('home'); ?>/"><img src="<?php echo get_option('home'); ?>/wp-content/themes/arthemia/images/johnmetta.png" width="177px" height="39px" alt="" /></a>
	<div id="tagline"><?php bloginfo('description'); ?></div>
	</div>

	<div class="right">
		<a title="RSS" href="http://feed.feedburner.com/Mettadore" target="_blank"  >
			<img alt="RSS" src="http://mettadore.com/social_icons/60/feed.png" />			
		</a>
		<a title="Contact" href="mailto:john@mettadore.com" target="_blank"  >
			<img alt="Email" src="http://mettadore.com/social_icons/60/email.jpg" />
		</a>
		<a title="Twitter" href="http://twitter.com/mettadore" target="_blank"  >
			<img alt="Twitter" src="http://mettadore.com/social_icons/60/twitter.png" />
		</a>
		<a title="Facebook" href="http://facebook.com/john.metta" target="_blank"  >
			<img alt="Facebook" src="http://mettadore.com/social_icons/60/facebook.png" />			
		</a>
		<a title="Google" href="http://www.google.com/profiles/mettadore" target="_blank"  >
			<img alt="Google" src="http://mettadore.com/social_icons/60/google.png" />
		</a>
		<a title="Linkedin" href="http://www.linkedin.com/in/johnmetta" target="_blank"  >
			<img alt="Linkedin" src="http://mettadore.com/social_icons/60/linkedin.png" />			
		</a>
<!-->		<a title="Skype" href="skype:johnmetta?chat" target="_blank"  >
			<img alt="Skype" src="http://mettadore.com/social_icons/60/skype.png" />			
		</a> -->
		<a title="FriendFeed" href="http://friendfeed.com/mettadore" target="_blank"  >
			<img alt="FriendFeed" src="http://mettadore.com/social_icons/60/friendfeed.png" />			
		</a>
		<a title="Lastfm" href="http://www.last.fm/user/Mettadore" target="_blank"  >
			<img alt="Lastfm" src="http://mettadore.com/social_icons/60/lastfm.png" />			
		</a>
<!-->		<a title="Identi" href="http://identi.ca/mettadore" target="_blank"  >
			<img alt="" src="http://mettadore.com/social_icons/60/.png" />			
		</a>-->


	</div>

</div>

<div id="navbar" class="clearfloat">

<ul id="page-bar" class="left clearfloat">

<li><a href="<?php echo get_option('home'); ?>/">Sites & Projects I Manage &mdash;></a></li>

<?php wp_list_pages('sort_column=menu_order&title_li='); ?>

</ul>

<?php include (TEMPLATEPATH . '/searchform.php'); ?>

</div>

</div>

<div id="page" class="clearfloat">