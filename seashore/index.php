<?php get_header();?>
<div id="main">
	<div id="content">

	<?php query_posts('posts_per_page=1');
              if (have_posts()) : while (have_posts()) : the_post(); ?>
	    <div class="post" id="post-<?php the_ID(); ?>">
            <p class="date">
              <span class="month">
                <?php the_time('M') ?>
              </span>
              <span class="day">
                <?php the_time('d') ?>
              </span>
              <span class="year">
                <?php the_time('Y') ?>
              </span>
              </p>
            <h2 class="title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
            <div class="meta">
				      <p>File under <?php the_category(',') ?>. <?php if (function_exists('akpc_the_popularity')) { akpc_the_popularity(); } ?></p>
			      </div>
			      <div class="entry">
              <?php the_content(__('<p style="text-align:right;">Continue Reading &#187;</p>'));?>
              <?php wp_link_pages(); ?>
      			</div>
            <p class="comments">
              <?php comments_popup_link(); ?>
            </p>	          
	        </div>
      <?php endwhile; else: ?>
          <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
      <?php endif; ?>

<?php  query_posts('posts_per_page=4&offset=1');
         if (have_posts()) : while (have_posts()) : the_post(); ?>

	    <div class="post" id="post-<?php the_ID(); ?>">
            <p class="date">
              <span class="month">
                <?php the_time('M') ?>
              </span>
              <span class="day">
                <?php the_time('d') ?>
              </span>
              <span class="year">
                <?php the_time('Y') ?>
              </span>
              </p>
            <h2 class="title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
            <div class="meta">
				      <p>File under <?php the_category(',') ?>. <?php if (function_exists('akpc_the_popularity')) { akpc_the_popularity(); } ?></p>
			      </div>
			      <div class="entry">
              <?php the_excerpt();?>
      			</div>
            </div>
  <?php endwhile; endif; ?>


	</div>

     <?php get_sidebar();?>
  <?php get_footer();?>