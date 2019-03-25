<?php 
	require_once('post-types.php');
	require_once('meta-box.php');
	//Add fearture image
	add_theme_support( 'post-thumbnails' );
	
//Set properties for top and bot menu
	if ( function_exists( 'wp_nav_menu' ) ){
		 if (function_exists('add_theme_support')) {
		  add_theme_support('nav-menus');
		  add_action( 'init', 'register_my_menus' );
		  function register_my_menus() {
		   register_nav_menus(
			array(
			 'top-menu' => __( 'Top Menu' ),
			 'bottom-menu' => __( 'Bottom Menu' )
			)
		   );
		  }
		}
	}
//Twitter in left sidebar
	 if (function_exists('register_sidebar')) {
	 register_sidebar(array(
	  'name' => 'twitter-area',
	  'id'   => 'twitter-area',
	 ));
	}
//create post type Business

function codex_custom_init_business() {
  $labels = array(
    'name' => _x('Business', 'post type general name', 'your_text_domain'),
    'singular_name' => _x('Business', 'post type singular name', 'your_text_domain'),
    'add_new' => _x('Add New', 'Business', 'your_text_domain'),
    'add_new_item' => __('Add New Business', 'your_text_domain'),
    'edit_item' => __('Edit Business', 'your_text_domain'),
    'new_item' => __('New Business', 'your_text_domain'),
    'all_items' => __('All Business', 'your_text_domain'),
    'view_item' => __('View Business', 'your_text_domain'),
    'search_items' => __('Search Business', 'your_text_domain'),
    'not_found' =>  __('No Business', 'your_text_domain'),
    'not_found_in_trash' => __('No Business found in Trash', 'your_text_domain'), 
    'parent_item_colon' => '',
    'menu_name' => __('Business', 'your_text_domain')

  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => array( 'slug' => _x( 'business', 'URL slug', 'your_text_domain' ) ),
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments','custom-fields')
  ); 
  register_post_type('business', $args);
}
add_action( 'init', 'codex_custom_init_business' );

//create post type Video

function codex_custom_init_video() {
  $labels = array(
    'name' => _x('Video', 'post type general name', 'your_text_domain'),
    'singular_name' => _x('Video', 'post type singular name', 'your_text_domain'),
    'add_new' => _x('Add New', 'Video', 'your_text_domain'),
    'add_new_item' => __('Add New Video', 'your_text_domain'),
    'edit_item' => __('Edit Video', 'your_text_domain'),
    'new_item' => __('New Video', 'your_text_domain'),
    'all_items' => __('All Video', 'your_text_domain'),
    'view_item' => __('View Video', 'your_text_domain'),
    'search_items' => __('Search Video', 'your_text_domain'),
    'not_found' =>  __('No Video', 'your_text_domain'),
    'not_found_in_trash' => __('No Video found in Trash', 'your_text_domain'), 
    'parent_item_colon' => '',
    'menu_name' => __('Video', 'your_text_domain')

  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => array( 'slug' => _x( 'video', 'URL slug', 'your_text_domain' ) ),
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments','custom-fields')
  ); 
  register_post_type('video', $args);
}
add_action( 'init', 'codex_custom_init_video' );

//Add Meta Box

add_action( 'add_meta_boxes', 'add_metaboxes' );
function add_metaboxes() {
 add_meta_box('link-video', 'Link Video', 'link_video_callback','video', 'side', 'default');
}

function link_video_callback() {
  global $post;
  echo '<input type="hidden" name="eventmeta_noncename" id="eventmeta_noncename" value="' .
  wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
 
  $link_video = get_post_meta($post->ID, 'link-video', true);
  $type_video= get_post_meta($post->ID, 'type-video', true);
  echo '<p>Link video :</p><input type="text" name="link-video" value="' .  $link_video  . '" class="widefat" /><br><p>Example:www.vimeo.com</p>';
?>
 <input type="radio" name="type-video" value="youtube" <?php if($type_video=="youtube") echo 'checked="checked"'; ?>><span style="margin-right:10px;" >Youtube</span>
 <input type="radio" name="type-video" value="vimeo" <?php if($type_video=="vimeo") echo 'checked="checked"'; ?>><span>Vimeo</span>
<?php 
}

function save_meta_box($post_id, $post) {
    if ( !wp_verify_nonce( $_POST['eventmeta_noncename'], plugin_basename(__FILE__) )) {
    return $post->ID;
    }
    if ( !current_user_can( 'edit_post', $post->ID ))
        return $post->ID;
	//save short content
    $events_meta['link-video'] = $_POST['link-video'];
	$events_meta['type-video'] = $_POST['type-video'];
	 
    foreach ($events_meta as $key => $value) { 
        if( $post->post_type == 'revision' ) return;
        $value = implode(',', (array)$value);
        if(get_post_meta($post->ID, $key, FALSE)) { 
            update_post_meta($post->ID, $key, $value);
        } else { 
            add_post_meta($post->ID, $key, $value);
        }
        if(!$value) delete_post_meta($post->ID, $key); 
    }
}
add_action('save_post', 'save_meta_box', 1, 2);

//Add themes option
	$themename="Geeky social";
	$shortname = "w";
	add_action( 'admin_init', 'ws_theme_options_init' );
	/**
	 * Init plugin options to white list our options
	 */
	function ws_theme_options_init(){
		register_setting( 'ws_theme_options_group', 'ws_theme_options', 'ws_options_validate' );
	}
	
	// Hook for adding admin menus
	add_action('admin_menu', 'theme_options_add_pages');
	
	// action function for above hook
	function theme_options_add_pages() {
		// Add a new top-level menu (ill-advised):
		$hook_suffix_topmenu = add_menu_page(__('Social Network',$themename), __('Social Network',$themename), 'administrator', 'them-options-top-handle', 'ws_toplevel_page' );
	}
	function ws_options_validate( $input ) {
		// Say our text option must be safe text with no HTML tags
		$input['page_left'] = wp_filter_nohtml_kses( $input['page_left'] );
		$input['page_right'] = wp_filter_nohtml_kses( $input['page_right'] );
		$input['video'] = wp_filter_nohtml_kses( $input['video'] );
		$input['facebook'] = wp_filter_nohtml_kses( $input['facebook'] );
		$input['twitter'] = wp_filter_nohtml_kses( $input['twitter'] );
		$input['googleplus'] = wp_filter_nohtml_kses( $input['googleplus'] );
		$input['youtube'] = wp_filter_nohtml_kses( $input['youtube'] );
		$input['yahoo'] = wp_filter_nohtml_kses( $input['yahoo'] );
		$input['bing'] = wp_filter_nohtml_kses( $input['bing'] );
		return $input;
	}
	function ws_toplevel_page() {
		if ( ! isset( $_REQUEST['settings-updated'] ) )
			$_REQUEST['settings-updated'] = false;
	
		?>
		<div class="wrap">
			<?php echo "<h2>" . __( 'Social Network', $themename ) . "</h2>"; ?>
			
			<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
			<div class="updated fade"><p><strong><?php _e( 'Options saved', $themename ); ?></strong></p></div>
			<?php endif; ?>
	
			<form method="post" action="options.php">
				<?php settings_fields( 'ws_theme_options_group' ); ?>
				<?php $options = get_option( 'ws_theme_options' ); ?>
	
				
				<table class="form-table">
                	<tr valign="top">
						<th scope="row"><?php _e( 'Video', $themename ); ?> :</th>
						<td>
							<input type="text" id="ana_theme_options_booknow_link" class="ana_theme_options_booknow_link"  name="ws_theme_options[video]" value="<?php esc_attr_e( $options['video'] ); ?>" style="width:25%;" />
						</td>
					</tr>	
					<tr valign="top">
						<th scope="row"><?php _e( 'Facebook', $themename ); ?> :</th>
						<td>
							<input type="text" id="ana_theme_options_booknow_link" class="ana_theme_options_booknow_link"  name="ws_theme_options[facebook]" value="<?php esc_attr_e( $options['facebook'] ); ?>" style="width:25%;" />
						</td>
					</tr>	
					<tr valign="top">
						<th scope="row"><?php _e( 'Twitter', $themename ); ?> :</th>
						<td>
							<input type="text" id="ana_theme_options_booknow_link" class="ana_theme_options_booknow_link"  name="ws_theme_options[twitter]" value="<?php esc_attr_e( $options['twitter'] ); ?>" style="width:25%;" />
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><?php _e( 'Google plus', $themename ); ?> :</th>
						<td>
							<input type="text" id="ana_theme_options_booknow_link" class="ana_theme_options_booknow_link"  name="ws_theme_options[googleplus]" value="<?php esc_attr_e( $options['googleplus'] ); ?>" style="width:25%;" />
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><?php _e( 'Youtube', $themename ); ?> :</th>
						<td>
							<input type="text" id="ana_theme_options_booknow_link" class="ana_theme_options_booknow_link"  name="ws_theme_options[youtube]" value="<?php esc_attr_e( $options['youtube'] ); ?>" style="width:25%;" />
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><?php _e( 'Yahoo', $themename ); ?> :</th>
						<td>
							<input type="text" id="ana_theme_options_booknow_link" class="ana_theme_options_booknow_link"  name="ws_theme_options[yahoo]" value="<?php esc_attr_e( $options['yahoo'] ); ?>" style="width:25%;" />
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><?php _e( 'Bing', $themename ); ?> :</th>
						<td>
							<input type="text" id="ana_theme_options_booknow_link" class="ana_theme_options_booknow_link"  name="ws_theme_options[bing]" value="<?php esc_attr_e( $options['bing'] ); ?>" style="width:25%;" />
						</td>
					</tr>
				</table>
				<br/>
				<p class="submit">
					<input type="submit" class="button-primary" value="<?php _e( 'Save Options', $themename ); ?>" />
				</p>
			</form>
		</div>
		<?php
	}
?>








