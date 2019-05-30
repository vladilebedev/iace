<?php

add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' );

/**
 * Init plugin options to white list our options
 */
function theme_options_init(){
	register_setting( 'sample_options', 'sample_theme_options', 'theme_options_validate' );
}

/**
 * Load up the menu page
 */
function theme_options_add_page() {
	add_theme_page( __( 'Настройки найшей темы', 'sampletheme' ), __( 'Настройки найшей темы', 'sampletheme' ), 'edit_theme_options', 'theme_options', 'theme_options_do_page' );
}

/**
 * Create the options page
 */
function theme_options_do_page() {
	global $select_options, $radio_options;

	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;

	?>
	<div class="wrap">
		<?php screen_icon(); echo "<h2>" . wp_get_theme() . __( ': Настройки', 'sampletheme' ) . "</h2>"; ?>

		<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
		<div class="updated fade"><p><strong><?php _e( 'Options saved', 'sampletheme' ); ?></strong></p></div>
		<?php endif; ?>

		<form method="post" action="options.php">
			<?php settings_fields( 'sample_options' ); ?>
			<?php $options = get_option( 'sample_theme_options' ); ?>

			<table class="form-table">

				<tr valign="top"><th scope="row"><?php _e( 'Адрес', 'sampletheme' ); ?></th>
					<td>
						<input id="sample_theme_options[addresstext]" class="regular-text" type="text" name="sample_theme_options[addresstext]" value="<?php esc_attr_e( $options['addresstext'] ); ?>" />
					</td>
				</tr>
				<tr valign="top"><th scope="row"><?php _e( 'E-mail', 'sampletheme' ); ?></th>
					<td>
						<input id="sample_theme_options[mailtext]" class="regular-text" type="text" name="sample_theme_options[mailtext]" value="<?php esc_attr_e( $options['mailtext'] ); ?>" />
					</td>
				</tr>
				<tr valign="top"><th scope="row"><?php _e( 'Телефон 1', 'sampletheme' ); ?></th>
					<td>
						<input id="sample_theme_options[phonetext1]" class="regular-text" type="text" name="sample_theme_options[phonetext1]" value="<?php esc_attr_e( $options['phonetext1'] ); ?>" />
					</td>
				</tr>

				<tr valign="top"><th scope="row"><?php _e( 'Телефон 2', 'sampletheme' ); ?></th>
					<td>
						<input id="sample_theme_options[phonetext2]" class="regular-text" type="text" name="sample_theme_options[phonetext2]" value="<?php esc_attr_e( $options['phonetext2'] ); ?>" />
					</td>
				</tr>

				<tr valign="top"><th scope="row"><?php _e( 'Телефон 3', 'sampletheme' ); ?></th>
					<td>
						<input id="sample_theme_options[phonetext3]" class="regular-text" type="text" name="sample_theme_options[phonetext3]" value="<?php esc_attr_e( $options['phonetext3'] ); ?>" />
					</td>
				</tr>
				
			</table>

			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e( 'Save Options', 'sampletheme' ); ?>" />
			</p>
		</form>
	</div>
	<?php
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function theme_options_validate( $input ) {
	global $select_options, $radio_options;

	// Our checkbox value is either 0 or 1
	if ( ! isset( $input['option1'] ) )
		$input['option1'] = null;
	$input['option1'] = ( $input['option1'] == 1 ? 1 : 0 );

	// Say our text option must be safe text with no HTML tags
	$input['sometext'] = wp_filter_nohtml_kses( $input['sometext'] );

	// Our select option must actually be in our array of select options
	// if ( ! array_key_exists( $input['selectinput'], $select_options ) )
	// 	$input['selectinput'] = null;

	// Our radio option must actually be in our array of radio options
	// if ( ! isset( $input['radioinput'] ) )
	// 	$input['radioinput'] = null;
	// if ( ! array_key_exists( $input['radioinput'], $radio_options ) )
	// 	$input['radioinput'] = null;

	// Say our textarea option must be safe text with the allowed tags for posts
	$input['sometextarea'] = wp_filter_post_kses( $input['sometextarea'] );

	return $input;
}

// adapted from http://planetozh.com/blog/2009/05/handling-plugins-options-in-wordpress-28-with-register_setting/