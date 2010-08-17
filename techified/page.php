<?php get_header(); ?>
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <div class="fullbox" id="post-<?php the_ID(); ?>">
                <div class="fullbox_header"></div>
                <div class="fullbox_content">
                    <div class="breadcrumb"> 
                        <a href="<?php bloginfo('url'); ?>" title="<?php _e('Home', 'techified'); ?>"><?php _e('Home', 'techified'); ?></a> 
                        <img src="<?php bloginfo('template_directory'); ?>/images/arrow.png" alt=""  /> 
                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                    </div>
                    <h1><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
                    <div class="post_content">
                        <?php the_content(''); ?>
                    </div>
                </div>
                <div class="fullbox_footer"></div>
            </div>
			<div id="page-navigator">
			<?php wp_link_pages('before=<span class="pages">'.__('Pages:', 'techified').'</span>&link_before=<span class="page">&link_after=</span>'); ?>
			</div>
           <!-- <?php comments_template(); ?>  -->
        <?php endwhile; ?>
    <?php else: ?>
    <?php endif; ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>