<?php
/**
 * @package WordPress
 * @subpackage tb_webpaint_Theme
 */
?>

<?php if ( post_password_required() ) : ?>
	<p><?php _e( 'This post is password protected. Enter the password to view any comments.', 'tb_webpaint' ); ?></p>
<?php return; endif; ?>

<?php if ( have_comments() ) : ?>
		<!-- Begin Comments -->
		<div id="comments">
	      <h3><?php comments_number( __('No Comments','tb_webpaint'), __('1 Comment','tb_webpaint'), __('% Comments','tb_webpaint') ); ?> </h3>
	      <ol id="singlecomments" class="commentlist"><?php wp_list_comments( array( 'callback' => 'tb_webpaint_comment' ) ); ?></ol>
	    </div>
	    
    <!-- End Comments -->
<?php endif;  ?>

<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :  ?>
	<div>
		<div class="left marginbottom10"><?php previous_comments_link( __( 'Older Comments ', 'tb_webpaint' ) ); ?></div>
		<div class="right marginbottom10"><?php next_comments_link( __( 'Newer Comments', 'tb_webpaint' ) ); ?> </div>
	</div>
<?php endif;  ?>

<?php if ( have_comments() && comments_open() ){?>
	<hr>
<?php } ?>

<?php if ( comments_open() ) :

		$comments_args = array(
			'fields' => apply_filters( 'comment_form_default_fields', array(
				'author' => '<div class="name-field"><input type="text" name="author" title="'.__( 'Name', 'tb_webpaint' ).'*" /></div>',
				'email'  => '<div class="email-field"><input type="text" name="email" title="'.__( 'Email', 'tb_webpaint' ).'*" /></div>',
				'url'    => '<div class="website-field"><input type="text" id="url" name="url" title="'.__( 'Website', 'tb_webpaint' ).'" /></div>')
			),
			'id_form' => 'comment-form',
	        'title_reply'=>'<div class="clear"></div>'.__( 'Would you like to share your thoughts?', 'tb_webpaint' ),
	        'comment_field' => ' <div class="message-field"><textarea id="message" name="comment" id="textarea" rows="5" cols="30" title="'.__( 'Enter your comment here...', 'tb_webpaint' ).'"></textarea></div>',
			'label_submit' => __( 'Submit' , 'tb_webpaint'),
			'id_submit' => 'btn-submit',
			'comment_notes_after' => ' ' //remove "You may use these HTML tags and attributes: ...."
		);
		comment_form($comments_args); 
    
    endif; ?>
    <script>jQuery("#btn-submit").addClass("btn-submit");</script>