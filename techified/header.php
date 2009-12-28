<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php if (is_home()) { ?>
<?php bloginfo('name'); ?> - <?php bloginfo('description'); ?>
<?php } else if (is_category()) { ?>
<?php wp_title(''); ?> - <?php bloginfo('name'); ?>
<?php } else if (is_single() || is_page()) { ?>
<?php wp_title(''); ?> - <?php bloginfo('name'); ?>
<?php } else if (is_archive()) { ?>
<?php bloginfo('name'); ?> - <?php  if (is_day()) { ?> <?php echo sprintf(__('Archive for %s'), the_time(__('F jS, Y', 'techified'))); ?>
<?php  } elseif (is_month()) { ?>
<?php echo sprintf(__('Archive for %s'), the_time(__('F, Y', 'techified'))); ?>
<?php  } elseif (is_year()) { ?>
<?php echo sprintf(__('Archive for %s'), the_time(__('Y', 'techified'))); ?>
<?php } ?>
<?php } ?>
</title>
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/jd.gallery.css" type="text/css" media="screen" charset="utf-8" />
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/MenuMatic.css" type="text/css" media="screen" charset="utf-8" />
<link href="<?php bloginfo('template_directory'); ?>/style.css" rel="stylesheet" type="text/css" />
<script src="<?php bloginfo('template_directory'); ?>/scripts/mootools-1.2.1-core-yc.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_directory'); ?>/scripts/mootools-1.2-more.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_directory'); ?>/scripts/jd.gallery.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_directory'); ?>/scripts/jd.gallery.transitions.js" type="text/javascript"></script>
<!--[if lt IE 7]>
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/MenuMatic-ie6.css" type="text/css" media="screen" charset="utf-8" />
<![endif]-->
<!-- Load the MenuMatic Class -->
<script src="<?php bloginfo('template_directory'); ?>/js/MenuMatic_0.68.3.js" type="text/javascript" charset="utf-8"></script>

<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style.css" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
<?php wp_get_archives('type=monthly&format=link'); ?>
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>
</head>
<body>
<script type="text/javascript">
    window.addEvent('domready', function() {            
            var myMenu = new MenuMatic();
    });
    <?php if (is_home()) : ?>

    function startGallery() {
        var myGallery = new gallery($('myGallery'), {
            timed: true,
            delay: 5000,
            slideInfoZoneOpacity: 0.8
        });
    }
    window.addEvent('domready', startGallery);
    <?php endif; ?>

</script>
<div id="wrapper">
    <div id="header">
        <div id="header_content">
            <div id="logo">
                <h1><a href="<?php bloginfo('siteurl'); ?>"><?php bloginfo('sitename'); ?></a></h1>
                <h2><?php bloginfo('description'); ?></h2>
            </div>
<?php if ( get_option ( 'techified_top_ads' ) ) { ?>
            <div id="top_ads">
                <?php echo stripslashes ( get_option ( 'techified_top_ads' ) ); ?>
            </div>
<?php } ?>
            <div id="search_box">
                <form action="<?php bloginfo ('home'); ?>" method="get">
                    <input name="s" id="s" alt="Search" class="inputbox" type="text" size="20" value="<?php _e('looking for something?'); ?>"  onblur="if(this.value=='') this.value='<?php _e('looking for something?'); ?>';" onfocus="if(this.value=='<?php _e('looking for something?'); ?>') this.value='';" />
                </form>
            </div>
        </div>
    </div>
    <div id="navigation_area">
        <ul id="nav">
            <li class="cat-item"><a href="<?php bloginfo('url'); ?>" title="<?php _e('Home', 'techified'); ?>"><?php _e('Home', 'techified'); ?></a></li>
            <?php wp_list_pages('title_li=&depth=1'); ?>
        </ul>
    </div>
    <div id="content_area">
        <div id="content_area_content">
            <div id="left_content">