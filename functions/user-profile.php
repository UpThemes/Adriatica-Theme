<?php

add_action( 'show_user_profile', 'my_show_extra_profile_fields' );
add_action( 'edit_user_profile', 'my_show_extra_profile_fields' );

function my_show_extra_profile_fields( $user ) { ?>

	<h3>Extra profile information</h3>

	<table class="form-table">

		<tr>
			<th><label for="twitter">Twitter</label></th>

			<td>
				<input type="text" name="twitter" id="twitter" value="<?php echo esc_attr( get_the_author_meta( 'twitter', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Please enter your Twitter username.</span>
			</td>
		</tr>

	</table>
<?php }

add_action( 'personal_options_update', 'my_save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'my_save_extra_profile_fields' );

function my_save_extra_profile_fields( $user_id ) {

	if ( !current_user_can( 'edit_user', $user_id ) )
		return false;

	/* Copy and paste this line for additional fields. Make sure to change 'twitter' to the field ID. */
	update_usermeta( $user_id, 'twitter', $_POST['twitter'] );
}

function my_author_box() { ?>
	<div class="author-profile vcard">
		
		<?php echo get_avatar( get_the_author_meta( 'user_email' ), '96' ); ?>

		<h3 class="author-name fn n"><?php the_author_posts_link(); ?></h3>

		<p class="author-description author-bio">
			<?php the_author_meta( 'description' ); ?>
		</p>

		<div class="clear"></div>

		<?php if ( get_the_author_meta( 'twitter' ) ) { ?>
			<p class="twitter">
				<a href="http://twitter.com/<?php the_author_meta( 'twitter' ); ?>" title="Follow <?php the_author_meta( 'first_name' ); ?> on Twitter">Follow <?php the_author_meta( 'first_name' ); ?> on Twitter</a>
			</p>
		<?php } // End check for twitter ?>
	</div><?php
}

?>