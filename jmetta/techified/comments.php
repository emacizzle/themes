<?php // Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if (!empty($post->post_password)) { // if there's a password
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
			?>

			<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.', 'techified'); ?></p>

			<?php
			return;
		}
	}
?>
<!-- comment area -->
<div class="comment_area">
	<div class="comment_top"></div>
	<?php if ($comments) : ?>
		<h2><?php comments_number(__('No Responses', 'techified'), __('One Response', 'techified'), __('% Responses', 'techified') );?> to &#8220;<?php the_title(); ?>&#8221;</h2>
<div class="tab-content">
<?php if($trackbacks_nr == "0" && pings_open()) { echo "<p class=\"no\">"; ?><?php _e('No trackbacks yet.','techified'); ?><?php echo "</p>"; } ?>
<?php if(!pings_open()) { echo "<p class=\"no\">"; ?><?php _e('Trackbacks are disabled.','techified'); ?><?php echo "</p>"; } ?>
<?php foreach ($comments as $comment) : ?>
<?php $comment_type = get_comment_type(); ?>
<?php if($comment_type != 'comment') { ?>
<div class="trackbacks"><?php comment_author_link() ?></div>
<?php } ?>
<?php endforeach; ?>
</div>
		<div class="commentlist">
		<?php wp_list_comments('type=comment'); ?>
		</div>
	<?php else : // this is displayed if there are no comments so far ?>
		<?php if ('open' == $post->comment_status) : ?>
		<!-- If comments are open, but there are no comments. -->
			<p class="nocomments"><?php comments_number(__('No Responses', 'techified'), __('One Response', 'techified'), __('% Responses', 'techified') );?> to &#8220;<?php the_title(); ?>&#8221;</p>
		<?php else : // comments are closed ?>
			<!-- If comments are closed. -->
			<p class="nocomments"><?php _e('Comments are closed.', 'techified'); ?></p>
		<?php endif; ?>
	<?php endif; ?>
	<div class="comment_bottom"></div>
</div>
<!-- comment area -->
		<div class="comments_page_nav">
		<?php if(function_exists('paginate_comments_links')) : ?>
		<?php paginate_comments_links(); ?>
		<?php else : ?>
		<span class="alignleft"><?php previous_comments_link(__('&laquo; Older Comments','lightword')); ?></span>
		<span class="alignright"><?php next_comments_link(__('Newer Comments &raquo;','lightword')); ?></span>
		<?php endif; ?>
		</div>
<?php if ('open' == $post->comment_status) : ?>
	<div class="fullbox_excerpt" id="respond">
		<div class="fullbox_content_comment">
			<h3 class="title"><?php _e('Leave a Reply:', 'techified'); ?></h3>
			<div id="cancel-comment-reply"> 
				<p><?php cancel_comment_reply_link() ?></p>
			</div>
			<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
				<p><?php echo sprintf(__('You must be <a href="%s">logged in</a> to post a comment.', 'techified'), get_option('siteurl').'/wp-login.php?redirect_to='.urlencode(get_permalink())); ?></p>
			<?php else : ?>
				<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
					<div class="excerpt_meta">
						<div class="comment_form">
							
							<?php if ( $user_ID ) : ?>
								<p><?php echo sprintf(__('Logged in as <a href="%s">%s</a>. <a href="%s" title="Log out of this account">Log out &raquo;</a>', 'techified'), $user_identity, $user_identity, wp_logout_url(get_permalink())); ?></p>
							<?php else : ?>
								<?php if (function_exists('gfc_profile')) {gfc_profile();} ?>
								<div class="form_text_label"><?php _e('Name (required):', 'techified'); ?></div>
								<div>
									<input name="author" type="text" id="author" tabindex="1" value="" class="text_area_style" />
								</div>
								<div class="form_text_label"><?php _e('Mail (will not be published) (required):', 'techified'); ?></div>
								<div>
									<input type="text" name="email" id="email" value="" tabindex="2" class="text_area_style" />
								</div>
								<div class="form_text_label"><?php _e('Website:', 'techified'); ?></div>
								<div>
									<input type="text" name="url" id="url" value="" tabindex="3" class="text_area_style" />
								</div>
							<?php endif; ?>
							
							<div class="form_text_label"><?php _e('Comment (required):', 'techified'); ?></div>
							<div>
								<textarea name="comment" id="comment" tabindex="4" class="text_area_style2"></textarea>
							</div>
						</div>
						<div class="comment_form_instruction"> <strong>XHTML:</strong> <?php _e('You can use these tags:', 'techified'); ?> <code><?php echo allowed_tags(); ?></code> </div>
						<div class="comment_form_submit">
							<input name="submit" type="submit" id="submit" tabindex="5" value="" class="submit_btn" /><?php comment_id_fields(); ?>
						</div>
						<?php do_action('comment_form', $post->ID); ?>
					</div>
				</form>
			<?php endif; // If registration required and not logged in ?>
			
		</div>
		<div class="fullbox_footer"></div>
	</div>
<?php endif; // if you delete this the sky will fall on your head ?>