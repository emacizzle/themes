<?php //------------------------- Top and left sidebars only on front page ------------------
      if (!is_single()) { ?>
        <div class="sidecol" id="sidebarTop">
        <div id="menu">
                <ul>
                   <?php wp_list_pages('title_li=&depth=1&exclude=184');?>
                </ul>
        </div>          
       <?php if ( function_exists('dynamic_sidebar') ) dynamic_sidebar('TopColumn'); ?>
        </div>
	<div id="sidebar1" class="sidecol">
</ul>
 <li><?php if ( function_exists('dynamic_sidebar') ) dynamic_sidebar('LeftColumn'); ?>
 </li>
</ul>
</div>
<?php //---------------------------- End top and left sidebar ------------------------
   } // end if ?>

<div id="sidebar2" class="sidecol">
<ul>
<li id="categories">
	<?php wp_dropdown_categories('show_option_none=Categoræ Blogus'); ?>

<script type="text/javascript"><!--
    var dropdown = document.getElementById("cat");
    function onCatChange() {
		if ( dropdown.options[dropdown.selectedIndex].value > 0 ) {
			location.href = "<?php echo get_option('home');
?>/?cat="+dropdown.options[dropdown.selectedIndex].value;
		}
    }
    dropdown.onchange = onCatChange;
--></script>
</li>
<li>
<select name="archive-dropdown" onChange='document.location.href=this.options[this.selectedIndex].value;'>
<option value=""><?php echo attribute_escape(__('Archæa Blogus')); ?></option>
<?php wp_get_archives('type=monthly&format=option&show_post_count=1'); ?> </select>
</li>
<li>
<?php if ( function_exists('dynamic_sidebar')) dynamic_sidebar('RightColumn'); ?>
</li>
</ul>
</div>
<?php //------------------------- Top and left sidebars only on front page ------------------
      if (!is_single()) { ?>
<div class="sidecol" id="sidebarBottom">
    <ul><li>
        <?php if ( function_exists('dynamic_sidebar') ) dynamic_sidebar('BottomColumn'); ?>
    </li></ul>
</div>
<?php } ?>