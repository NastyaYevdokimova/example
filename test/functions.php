<?php
/**
 * Функция подключения стилей и скриптов
 */
function bootstrap_styles_scripts() {
 // подключение стилей
 wp_enqueue_style( 'bootstrap', plugin_dir_url( __FILE__ ) . 'inc/bootstrap/css/bootstrap.min.css' );
 
 // подключение стилей
 wp_enqueue_script( 'bootstrap_js', plugin_dir_url( __FILE__ ) . 'inc/bootstrap/js/bootstrap.min.js', array( 'jquery' ) );
 
}
 
add_action( 'wp_enqueue_scripts', 'bootstrap_styles_scripts' );
function add_normalize_CSS() {
    wp_enqueue_style( 'normalize-styles', "https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css");
}
// Регистрирует новую боковую панель под названием 'sidebar'
function add_widget_Support() {
                register_sidebar( array(
                                'name' => 'Sidebar',
                                'id' => 'sidebar',
                                'before_widget' => '<div>',
                                'after_widget' => '</div>',
                                'before_title' => '<h2>',
                                'after_title' => '</h2>',
                ) );
}
// Подхватывает(hook) инициацию виджета и запускает нашу функцию
add_action( 'widgets_init', 'add_Widget_Support' );
// Регистрирует новое навигационное меню
function add_Main_Nav() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
}
// Подхватывает (hook) init хук-событие, запускает функцию нашего навигационного меню
add_action( 'init', 'add_Main_Nav' );
function my_custom_init(){
	register_post_type('artist', array(
		'labels'             => array(
			'name'               => 'Художник', // Основное название типа записи
			'singular_name'      => 'Художник', // отдельное название записи типа artict
			'add_new'            => 'Добавить нового',
			'add_new_item'       => 'Добавить нового художникв',
			'edit_item'          => 'Редактировать художника',
			'new_item'           => 'Новый художник',
			'view_item'          => 'Посмотреть художника',
			'search_items'       => 'Найти художника',
			'not_found'          => 'Художник не найден',
			'not_found_in_trash' => 'В корзине художников не найдено',
			'parent_item_colon'  => '',
			'menu_name'          => 'Художники'

		  ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array('title','editor','thumbnail','excerpt','comments')
	) );

}
add_action('init', 'my_custom_init');


if (function_exists('get_books')) {
 get_books();
}
