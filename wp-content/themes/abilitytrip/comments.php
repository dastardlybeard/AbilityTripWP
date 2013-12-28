<?php // Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if (!empty($post->post_password)) { // if there's a password
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
			?>

			<p class="nocomments">This post is password protected. Enter the password to view comments.</p>

			<?php
			return;
		}
	}

	/* This variable is for alternating comment background */
	$oddcomment = 'class="alt" ';
?>

<!-- You can start editing here. -->
<?php 
$registereduser = new User();
if ($registereduser->isLoggedIn()) {
?>
			
<?php if ($comments) : ?>
	<h3 id="comments"><?php comments_number('No Responses', 'One Response', '% Responses' );?> to &#8220;<?php the_title(); ?>&#8221;</h3>

	<ol class="commentlist">

	<?php foreach ($comments as $comment) : ?>

		<li <?php echo $oddcomment; ?>id="comment-<?php comment_ID() ?>">
			<?php echo get_avatar( $comment, 32 ); ?>
			<cite><?php comment_author_link() ?></cite> Says:
			<?php if ($comment->comment_approved == '0') : ?>
			<em>Your comment is awaiting moderation.</em>
			<?php endif; ?>
			<br />

			<small class="commentmetadata"><a href="#comment-<?php comment_ID() ?>" title=""><?php comment_date('F jS, Y') ?> at <?php comment_time() ?></a> <?php edit_comment_link('edit','&nbsp;&nbsp;',''); ?></small>

			<?php comment_text() ?>

		</li>

	<?php
		/* Changes every other comment to a different class */
		$oddcomment = ( empty( $oddcomment ) ) ? 'class="alt" ' : '';
	?>

	<?php endforeach; /* end for each comment */ ?>

	</ol>

 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ('open' == $post->comment_status) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments">Comments are closed.</p>

	<?php endif; ?>
<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>

<h3 id="respond">Add your accessible travel knowledge for this destination.</h3>
<p>Fields marked with an (*) are required.</p>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>
<?php else : ?>

<div id="register">
<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( $user_ID ) : ?>

<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Log out &raquo;</a></p>

<?php else : ?>

<div class="row">
<label for="author">* Name or nickname </label>
<div class="field"><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>"  class="txt" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> /></div>
</div>

<div class="row">
<label for="email">* Email <br />
(not published)</label>
<div class="field"><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" class="txt" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> /></div>
</div>

<div class="row">
<label for="url">Add website link <br />
(if applicable)</label>
<div class="field"><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" class="txt" tabindex="3" /></div>
</div>


<?php endif; ?>

<div class="row">
<label for="comment">Write your knowledge here. Upon approval, it will be posted to discussion.</label>
<div class="field">
<textarea name="comment" id="comment" rows="10" tabindex="4"></textarea>
</div>
</div>

<div class="row">
<div class="buttons">
<input type="image" name="submit" value="Submit Comment" src="<?php bloginfo('template_directory'); ?>/_resources/images/AT_btn_SendCmt.gif" alt="Submit Comment" />

<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
</div>
</div>

<?php if (function_exists('seperate_comments_curPageURL')) { ?>
<input type="hidden" name="redirect_to" value="<?php echo seperate_comments_curPageURL() ?>" />
<?php } ?>
</p>
<?php do_action('comment_form', $post->ID); ?>

</form>
</div>


<?php endif; // If registration required and not logged in ?>

<?php endif; ?>

<?php } else { ?>
<div class="discuss"><h4><a href="/register/">REGISTER NOW TO JOIN THE DISCUSSION!</a></h4></div>
<?php } ?>
