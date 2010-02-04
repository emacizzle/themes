<div id="sidebar">

<div id="sidebar-ads">
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(1) ) : ?>
	<?php endif; ?>
</div>

<?php if (is_single()) { ?>

<div id="sidebar-top"> 
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