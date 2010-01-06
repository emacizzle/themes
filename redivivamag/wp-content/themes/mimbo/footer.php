</div><!--END WRAPPER-->

<div id="footer" class="clearfloat">
  <div id="copyright">
  &#169; <?php echo date('Y'); ?> <span class="url fn org"><?php bloginfo('name'); ?></span> &bull; 

Site design and maintenance by <A href="http://mettadore.com">John Metta</a>.

<?php wp_footer(); ?>
</div>

<div id="rss">
<img src="<?php bloginfo('template_url'); ?>/images/rss.gif" alt="rss" /><a href="<?php bloginfo('rss2_url'); ?>"><?php _e('Blog Entries','Mimbo'); ?></a> 
&bull;  <a href="<?php bloginfo('comments_rss2_url'); ?>"><?php _e('Comments','Mimbo'); ?></a>
</div> 

</div><!--END FOOTER-->
</div><!--END PAGE-->
</body>
</html>