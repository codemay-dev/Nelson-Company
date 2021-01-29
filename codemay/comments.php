<?php
/**
Comments Template
 */
// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
	<?php
		return;
	}
?>

<!-- You can start editing here. -->

<hr />

<?php if ( have_comments() ) : ?>
	<h6 id="comments"><?php comments_number('No Responses', 'One Response', '% Responses' );?> to &#8220;<?php the_title(); ?>&#8221;</h6>

	<ol class="commentlist">
    <?php wp_list_comments(); ?>
	</ol>

  <div class="navigation">
    <?php paginate_comments_links(); ?> 
  </div>

<?php else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->

	<?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments">Comments are closed.</p>

	<?php endif; ?>

<?php endif; ?>

<?php if ( comments_open() ) : ?>

  <div id="respond">
    <h6><?php comment_form_title( 'Leave a Comment', 'Comment to %s' ); ?></h6>

    <div class="cancel-comment-reply">
      <?php cancel_comment_reply_link(); ?>
    </div>

    <?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
      
      <p>You must be <a href="<?php echo wp_login_url( get_permalink() ); ?>">logged in</a> to post a comment.</p>
    
    <?php else : ?>

      <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
        <?php if ( is_user_logged_in() ) : ?>
        
          <p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>.</p>
        
        <?php else : ?>
        
          <input type="text" name="author" id="author" class="form-control" value="<?php echo esc_attr($comment_author); ?>" placeholder="Name" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
          <input type="text" name="email" id="email" class="form-control" value="<?php echo esc_attr($comment_author_email); ?>" placeholder="Email" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
          <input type="text" name="url" id="url" class="form-control" value="<?php echo esc_attr($comment_author_url); ?>" placeholder="Website" size="22" tabindex="3" />
        
        <?php endif; ?>

        <textarea name="comment" id="comment" class="form-control" placeholder="Comments" cols="100%" rows="3" tabindex="4"></textarea>
        
        <input name="submit" type="submit" id="submit" class="btn btn-default" tabindex="5" value="Submit Comment" />
        <?php comment_id_fields(); ?>
        
        <?php do_action('comment_form', $post->ID); ?>
      </form>

    <?php endif; // If registration required and not logged in ?>
  </div>

<?php endif; // if you delete this the sky will fall on your head ?>
