<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/1">
<link rel="openid.server" href="http://openid.claimid.com/server" />
<link rel="openid.delegate" href="http://openid.claimid.com/johnmetta" />
	<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo('charset'); ?>" />
	<style type="text/css" media="screen">
		@import url( <?php bloginfo('stylesheet_url'); ?> );
	</style>
    <link rel="alternate" type="application/rss+xml" title="The Full Monty: <?php bloginfo('name'); ?> RSS Feed" href="http://feeds.feedburner.com/PositivelyGlorious" />

    <link rel="alternate" type="application/rss+xml" title="The Anthropology Feed" href="http://feeds2.feedburner.com/PositivelyGlorious-anthropology" />
    <link rel="alternate" type="application/rss+xml" title="The Easy Listening Feed" href="http://feeds2.feedburner.com/PositivelyGlorious-easy-listening" />
    <link rel="alternate" type="application/rss+xml" title="The Divinity &amp; Humanity Feed" href="http://feeds2.feedburner.com/PositivelyGlorious-divinity-humanity" />
    <link rel="alternate" type="application/rss+xml" title="The Software &amp; Media Feed" href="http://feeds2.feedburner.com/PositivelyGlorious-software-media" />
    <link rel="alternate" type="application/rss+xml" title="The Cider &amp; Mead Feed" href="http://feeds2.feedburner.com/PositivelyGlorious-cider-mead" />
    <link rel="alternate" type="application/rss+xml" title="The Building a Duck Feed" href="http://feeds2.feedburner.com/PositivelyGlorious-building-a-duck" />
    <link rel="alternate" type="application/rss+xml" title="The Pit of Despair Feed" href="http://feeds2.feedburner.com/PositivelyGlorious-pit-of-despair" />

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <?php wp_get_archives('type=monthly&format=link'); ?>
	<?php //comments_popup_script(); // off by default ?>
	<?php wp_head(); ?>
</head>
  <body>
<div id="header">
<!--	<div id="menu">
		<ul>
			<li <?php if(is_home()){echo 'class="current_page_item"';}?>><a href="<?php bloginfo('siteurl'); ?>" title="Home">Home</a></li>
	     <?php wp_list_pages('title_li=&depth=1');?>
		</ul>
	</div>
-->
</div>
<a href="<?php bloginfo('siteurl'); ?>" title="<?php bloginfo('name'); ?>">
<div id="splash">
  <div class="search-form">
    <?php $search_text = "Search"; ?> 
    <form method="get" id="searchform"  action="<?php bloginfo('home'); ?>/"> 
    <input type="text" value="<?php echo $search_text; ?>" name="s" id="s" onblur="if(this.value == '') {this.value = '<?php echo $search_text; ?>';}"  
onfocus="if (this.value == '<?php echo $search_text; ?>')  {this.value = '';}" /> 
    <input type="hidden" id="searchsubmit" /> 
    </form>
  </div>
	<div id="logo">
		<h1><?php bloginfo('name'); ?></h1>
		<h2><?php bloginfo('description');?></h2>
	</div>
</div>
</a>