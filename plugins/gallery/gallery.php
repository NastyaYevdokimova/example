<?php
/*
Plugin Name: Picture gallery
Plugin URI: http://localhost/wordpress/
Description: First plugin
Version: 1.0
Author: Nastya
*/

$app_id = 'a0e77ee2-94c0-48b4-8b61-a4e32e405fdd';
$key    = '1lnjZL6Dp9a2xVewylmAQhf7oOA68V9N';
$secret = 'miJa6WfFtzbAIXK3'; 

function pipin_transient_demo(){
	$data=get_transient('sample_trans');
	
	if(false===$data){
		$data='This is the data stored in the transient';
		set_transient('sample_trans',$data,10);
		
	}
	echo $data;
}
add_action('admin_notices', 'pipin_transient_demo');


add_action('admin_menu', 'techiepress_add_menu_page');

function techiepress_add_menu_page(){
	add_menu_page(
		'NY Best sellers',
		'NY Best sellers',
		'manage_options',
		'yt-wp-books-api',
		'get_books_api',
		'dashicons-book',
		16,
	);
}

function get_books_api(){
	$url="https://api.nytimes.com/svc/books/v3/lists/best-sellers/history.json?api-key=$key&offset=20";
	
	$args = array(
		'headers' => array(
			'Content-Type' => 'application/json',
		),
		'body'    => array(),
	);
	
	$response = wp_remote_get($url,$args);
	
	var_dump($response);
}
/**
 * Registers a setting.
 */
function wpdocs_register_my_setting() {
    register_setting( 'my_options_group', 'my_option_name', 'intval' ); 
} 
add_action( 'admin_init', 'wpdocs_register_my_setting' );


$endpoint = 'api.example.com';
 
$body = [
    'name'  => 'Pixelbart',
    'email' => 'pixelbart@example.com',
];
 
$body = wp_json_encode( $body );
 
$options = [
    'body'        => $body,
    'headers'     => [
        'Content-Type' => 'application/json',
    ],
    'timeout'     => 60,
    'redirection' => 5,
    'blocking'    => true,
    'httpversion' => '1.0',
    'sslverify'   => false,
    'data_format' => 'body',
];
 
wp_remote_post( $endpoint, $options );

function custom_post_type(){
	register_post_type('book',
		[
		'public' => true,
		'label'  => esc_html__('Book','gallery'),
		'support' => ['titlte', 'editor', 'thumbnail']
		]	
	);
}
add_action( 'admin_init', 'custom_post_type' );


function wporg_settings_init() {
    // register a new setting for "reading" page
    register_setting('reading', 'wporg_setting_name');
 
    // register a new section in the "reading" page
    add_settings_section(
        'wporg_settings_section',
        'WPOrg Settings Section', 'wporg_settings_section_callback',
        'reading'
    );
 
    // register a new field in the "wporg_settings_section" section, inside the "reading" page
    add_settings_field(
        'wporg_settings_field',
        'WPOrg Setting', 'wporg_settings_field_callback',
        'reading',
        'wporg_settings_section'
    );
}
 
/**
 * register wporg_settings_init to the admin_init action hook
 */
add_action('admin_init', 'wporg_settings_init');
 
/**
 * callback functions
 */
 
// section content cb
function wporg_settings_section_callback() {
    echo '<p>WPOrg Section Introduction.</p>';
}
 
// field content cb
function wporg_settings_field_callback() {
    // get the value of the setting we've registered with register_setting()
    $setting = get_option('wporg_setting_name');
    // output the field
    ?>
    <input type="text" name="wporg_setting_name" value="<?php echo isset( $setting ) ? esc_attr( $setting ) : ''; ?>">
<?php
}


/**
* Registers a text field setting for Wordpress 4.7 and higher.
**/
function register_my_setting() {
    $args = array(
            'type' => 'string', 
            'sanitize_callback' => 'sanitize_text_field',
            'default' => NULL,
            );
    register_setting( 'my_options_group', 'my_option_name', $args ); 
} 
add_action( 'admin_init', 'register_my_setting' );
$response = wp_remote_post( $url, array(
    'method'      => 'POST',
    'timeout'     => 45,
    'redirection' => 5,
    'httpversion' => '1.0',
    'blocking'    => true,
    'headers'     => array(),
    'body'        => array(
        'username' => 'bob',
        'password' => '1234xyz'
    ),
    'cookies'     => array()
    )
);
 
if ( is_wp_error( $response ) ) {
    $error_message = $response->get_error_message();
    echo "Something went wrong: $error_message";
} else {
    echo 'Response:<pre>';
    print_r( $response );
    echo '</pre>';
}