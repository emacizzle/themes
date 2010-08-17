<div id="sidebar">

<?php if (!is_single()) { ?>

<div id="sidebar-ads">
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(1) ) : ?>
	<?php endif; ?>
</div>
<?php } else {?>
<div id="sidebar-top"> 
	<iframe class="facebook" src="http://www.facebook.com/plugins/like.php?href=<?php echo urlencode(get_permalink($post->ID)); ?>&amp;layout=standard&amp;show_faces=true&amp;width=450&amp;action=like&amp;colorscheme=light" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
</div>

<div id="sidebar-ads">
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(1) ) : ?>
	<?php endif; ?>
</div>

<div id="sidebar-middle" class="clearfloat"> 
<div id="sidebar-left">
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(2) ) : ?> 		
<?php endif; ?> 
<ul><?php wp_list_bookmarks('categorize=0&category=17&title_li=0&show_images=0&show_description=0&orderby=name'); ?></ul>
</div>  

<div id="sidebar-right">
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(3) ) : ?> 		
<?php endif; ?>

</div> 

</div>

<div id="sidebar-bottom"> 
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(4) ) : ?> 		
<?php endif; ?> </div>   

<?php } ?>
</div>