<!-- begin l_sidebar -->

<div id="l_sidebar">

	<ul id="l_sidebarwidgeted">
        <li id="Categories">
        <h3>Founding Board Members</h3>
        <ul>
          <?php $the_query = new WP_Query('cat=15&orderby=name&order=ASC');
          while ($the_query->have_posts()) : $the_query->the_post(); ?>
          <li>&raquo;&nbsp;&nbsp;<strong><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></strong></li>
               <?php endwhile; ?>
        </ul>
        </li>


        <li id="Categories">
        <h3>Los Programas Español</h3>
        <ul>
          <?php $the_query = new WP_Query('cat=3');
          while ($the_query->have_posts()) : $the_query->the_post(); ?>
          <li><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></li>
               <?php endwhile; ?>
        </ul>
        </li>

        <li id="Categories">
        <h3>English Programs</h3>
        <ul>
          <?php $the_query = new WP_Query('cat=4');
          while ($the_query->have_posts()) : $the_query->the_post(); ?>
                     <li><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></li>
               <?php endwhile; ?>
        </ul>
        </li>

        <li id="Categories">
        <h3>Voluntários</h3>
        <ul>
          <?php $the_query = new WP_Query('cat=5');
          while ($the_query->have_posts()) : $the_query->the_post(); ?>
                     <li><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></li>
               <?php endwhile; ?>
        </ul>
        </li>

       <li id="Categories">
        <h3>Admin</h3>
         <ul>
            <li><?php wp_loginout(); ?></li>
            <li><?php wp_register(); ?></li>
            <li><a href="http://codex.wordpress.org/WordPress_Lessons">Wordpress Lessons</a></li>
            <li><a href="http://wordpress.org">Wordpress Home</a></li>
         <ul>
         </li>
	<?php if ( function_exists('dynamic_sidebar') ) { dynamic_sidebar(1);} ?>
</ul>
</div>

<!-- end l_sidebar -->