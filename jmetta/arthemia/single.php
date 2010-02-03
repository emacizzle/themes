<?php get_header(); ?>

	<div id="content">
	
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<div class="post" id="post-<?php the_ID(); ?>">
	
	<span class="breadcrumbs"><a href="<?php echo get_option('home'); ?>/">Home</a> &raquo; <?php the_category(', ') ?></span>
	
	<h2 class="title"><?php the_title(); ?></h2>
	
	<div id="stats">
<span><?php the_time('j F Y') ?></span>
<span><?php if(function_exists('the_views')) { the_views(); } ?></span>
<span><?php comments_number('No Comment', 'One Comment', '% Comments' );?></span></div>


	<div class="entry clearfloat">
	
	<?php the_content('Read the rest of this entry &raquo;'); ?>

	<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
	
	</div>

	</div>
	
	<div id="comments">
	<?php comments_template(); ?>
	</div>

	<?php endwhile; else: ?>

	<p>Sorry, no posts matched your criteria.</p>

	<?php endif; ?>

	</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>